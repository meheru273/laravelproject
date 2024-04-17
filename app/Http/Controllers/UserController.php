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
            return view('user.index',compact('order'));
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
    $products=Product::where('slur','LIKE','%$search_text%')->get();
    return view('shop',compact('products'));
}

}
