<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Product;

use App\Models\Wishlist;

use App\Models\Cart;

class WishlistController extends Controller
{

    public function showwishlist()
    {
        return view('wishlist');
    }
    public function add_wishlist($id,Request $request)
{
    if(Auth::id())
    {
         $user=Auth::user();
         $product=Product::find($id);
         $cart=new Wishlist();
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

public function show_wishlist()
{
    if(Auth::id())
    {
        $id=Auth::user()->id;
        $cart=Wishlist::where('user_id','=',$id)->get();
        return view('wishlist',compact('cart'));
    }
    else
    {
        return redirect('login')->with('message','please login in');
    }

}

public function add_to_cart($id, Request $request)
{
    if (!Auth::check()) {
        return redirect('login')->with('error', 'You need to be logged in');
    }


    $product = Wishlist::find($id);
    if (!$product) {
    
        return back()->with('error', 'Product not found.');
    }


    $cart = new Cart();
    $cart->product_id = $product->id;
    $cart->user_id = Auth::id(); 
    $cart->quantity = $request->input('quantity');
    $cart->price = $product->sale_price ? $product->sale_price : $product->regular_price;


    $cart->name = $product->name;
    $cart->image = $product->image;
    $cart->save();

    $product->delete();
    return back()->with('success', 'Product added to cart successfully.');
}
public function remove_wishlist($id)
{
    $cart=Wishlist::find($id);
    $cart->delete();
    return redirect()->back();
}

}
