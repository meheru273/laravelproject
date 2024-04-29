<?php

namespace App\Http\Controllers;



use App\Models\Comment;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Hash;
use App\Models\UserDelete;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {

            $user=Auth::user();
            $userid=$user->id;
            $order=Order::where('user_id','=',$userid)->get();
            $total_wishlist=Wishlist::where('user_id','=',$userid)->get()->count();
            $total_order=Order::where('user_id','=',$userid)->get()->count();
            $total_processing = Order::where('user_id', $userid)
                                 ->where('delivery_status', 'processing')
                                 ->count();
            return view('user.index',compact('order','user','total_order','total_processing','total_wishlist'));
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
        Alert::success('You Need To LogIn');
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
        Alert::success('You Need To LogIn');
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


    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'string|max:255',
            'address'=>'string|max:255'
        ]);

        $user->update($request->all());

        return redirect()->route('user.index', $user)->with('success', 'Information updated successfully!');
    }

    public function changePasswordForm(User $user)
    {
        return view('user.change-password', compact('user'));
    }

    public function changePassword(Request $request, User $user)
    {
        $request->validate([
            'current_password' => 'required|string|min:6',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Your current password does not match our records.']);
        }

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('user.index', $user)->with('success', 'Password updated successfully!');
    }

    public function deleteid($id)
{
    $user = User::findOrFail($id);  

    // Log deletion attempt
    $deleteuser = new UserDelete();
    $deleteuser->email = $user->email;
    $deleteuser->userid = $user->id;
    $deleteuser->status = 'Delete';
    $deleteuser->save(); 

    return redirect()->back()->with('success', 'Your account Will be deleted');
}

}


