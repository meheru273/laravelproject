<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

class ShopController extends Controller
{
    public function index()
    {
        $products=Product::orderBy('created_at','DESC')->paginate(12);
        $comment=Comment::all();
        $reply=Reply::all();
        return view('shop',compact('products','comment','reply'));
    }
    public function productDetails($slug)
{
    $product = Product::where('slug',$slug)->first();    
    $rproducts=Product::where('slug','!=',$slug)->inRandomOrder('id')->get()->take(8);
    return view('details',['product'=>$product,'rproducts'=>$rproducts]);
}

public function add_cart($id,Request $request)
{
    if(Auth::id())
    {
         $user=Auth::user();
         $product=Product::find($id);
         $cart=new Cart();
         $cart->name=$user->name;
         $cart->email=$user->email;
         $cart->phone=$user->phone;
         $cart->address=$user->address;
         $cart->user_id=$user->id;

         $cart->slug=$product->slug;

         if($product->sale_price !=null)
         {
            $cart->price=$product->sale_price * $request->quantity;
         }
         else
         {
            $cart->price=$product->regular_price * $request->quantity;
         }
         
         $cart->image=$product->image;
         $cart->product_id=$product->id;
         $cart->quantity=$request->quantity;

         $cart->save();
         return redirect()->back();



    }
    else 
    {
        return redirect('login');
    }
}

public function show_cart()
{
    if(Auth::id())
    {
        $id=Auth::user()->id;
        $cart=Cart::where('user_id','=',$id)->get();
        return view('user.showcart',compact('cart'));
    }
    else
    {
        return redirect('login')->with('message','please login in');
    }

}

public function remove_cart($id)
{
    $cart=Cart::find($id);
    $cart->delete();
    return redirect()->back();
}

public function cash_order()
{
      $user = Auth::user();
      $userid= $user->id;

      $data=Cart::where('user_id','=',$userid)->get();

      foreach($data as $data)
      {
        $order = new Order();
        $order->name=$data->name;
        $order->email=$data->email;
        $order->phone=$data->phone;
        $order->address=$data->address;
        $order->user_id=$data->user_id;
        $order->slug=$data->slug;
        $order->price=$data->price;
        $order->quantity=$data->quantity;
        $order->image=$data->image;
        $order->product_id=$data->product_id;
        $order->payment_status='Cash on delivery';
        $order->delivery_status='processing';
        $order->save();

        $cart_id=$data->id;
        $cart= Cart::find($cart_id);
        $cart->delete();
      }

      return redirect()->back()->with('message','we have recieved your Order');

}
public function stripe($totalprice)
{
   return view('user.stripe',compact('totalprice')); 
}
public function stripePost(Request $request,$totalprice)
{
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    Stripe\Charge::create ([
            "amount" => $totalprice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks for Buying" 
    ]);
    $user = Auth::user();
    $userid= $user->id;

    $data=Cart::where('user_id','=',$userid)->get();

    foreach($data as $data)
    {
      $order = new Order();
      $order->name=$data->name;
      $order->email=$data->email;
      $order->phone=$data->phone;
      $order->address=$data->address;
      $order->user_id=$data->user_id;
      $order->slug=$data->slug;
      $order->price=$data->price;
      $order->quantity=$data->quantity;
      $order->image=$data->image;
      $order->product_id=$data->product_id;
      $order->payment_status='Paid';
      $order->delivery_status='processing';
      $order->save();

      $cart_id=$data->id;
      $cart= Cart::find($cart_id);
      $cart->delete();
    }

  
    Session::flash('success', 'Payment successful!');
          
    return back();
}
}
