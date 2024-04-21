<?php

namespace App\Http\Controllers;



use App\Models\Comment;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {

            $user=Auth::user();
            $userid=$user->id;
            $order=Order::where('user_id','=',$userid)->get();
            $total_order=Order::where('user_id','=',$userid)->get()->count();
            $total_processing = Order::where('user_id', $userid)
                                 ->where('delivery_status', 'processing')
                                 ->count();
            return view('user.index',compact('order','user','total_order','total_processing'));
        }
        
    }

    public function cancel_order($id)
{
    $order = Order::find($id);
    $order->delivery_status = 'Canceled';
    $order->save();

    // Redirect back to the previous page and ensure the 'order' tab is shown
    return redirect()->back()->withFragment('order-details');
}

public function add_comment(Request $request)
{
    if (Auth::id()) {
        $comment = new Comment();
        $comment->name = Auth::user()->name;
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->comment; // This now should work as expected
        $comment->save();

        return redirect()->back();
    } else {
        return redirect('login');
    }
}

public function add_reply(Request $request)
{
    if(Auth::id())
    {
        $reply = new Reply();

        $reply->name=Auth::user()->name;
        $reply->user_id=Auth::user()->id;
        $reply->comment_id=$request->commentId;
        $reply->reply=$request->reply;
        $reply->save();

        return redirect()->back();
    }
    else 
    {
        return redirect('login');
    }
}

public function product_search(Request $request)
{
    $search_text=$request->search;
    $products=Product::where('name','LIKE',"%$search_text%")
    ->orWhere('SKU','LIKE',"%$search_text%")
    ->orWhere('slug','LIKE',"%$search_text%") ->paginate(12);
    $comment=Comment::all();
    $reply=Reply::all();
    return view('shop',compact('products','comment','reply'));
}

}
