<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Product;

use App\Models\Wishlist;

use App\Models\Cart;

use RealRashid\SweetAlert\Facades\Alert;


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
         $userid=$user->id;
         $product=Product::find($id);
         
         $product_exist_id = Wishlist::where('product_id', '=', $id)
         ->where('user_id', '=', $userid)->get('id')->first();


         if($product_exist_id)
        {

            $cart=Wishlist::find($product_exist_id)->first();

            $quantity=$cart->quantity;

            $cart->quantity=$quantity+$request->quantity;

                if($product->sale_price !==null)
                {
                    $cart->price=$product->sale_price * $cart->quantity;
                }
                else
                {
                    $cart->price=$product->regular_price * $cart->quantity;
                }

                    $cart->save();
        }
        else{
         $cart=new Wishlist();
         $cart->name=$user->name;
         $cart->email=$user->email;
         $cart->phone=$user->phone;
         $cart->address=$user->address;
         $cart->user_id=$user->id;
         $cart->quantity=$request->quantity;
         $cart->slug=$product->slug;

         if($product->sale_price !==null)
         {
            $cart->price=$product->sale_price * $request->quantity;
         }
         else
         {
            $cart->price=$product->regular_price * $request->quantity;
         }
         
         $cart->image=$product->image;
         $cart->product_id=$product->id;

         $cart->save();
        }

         Alert::success('Product Added Successfully','In WishList');
         return redirect()->back();


    }
    else 
    {
        
        Alert::success('You Need To Login First');
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
        Alert::success('You Need To LogIn');
        return redirect('login')->with('message','please login in');
    }

}

public function add_to_cart($id, Request $request)
{
    if (!Auth::check()) {
        Alert::error('You need to log in first');
        return redirect('login');
    }

    $wishlistItem = Wishlist::find($id);
    if (!$wishlistItem) {
        return back()->with('error', 'Wishlist item not found.');
    }

    $userid = Auth::id();

    
    $product_exist = Cart::where('product_id', $wishlistItem->product_id)
                         ->where('user_id', $userid)
                         ->first();

    if ($product_exist) {

        $product_exist->quantity += $request->input('quantity');
        if ($wishlistItem->sale_price !== null) {
            $product_exist->price = $wishlistItem->sale_price * $product_exist->quantity;
        } else {
            $product_exist->price = $wishlistItem->regular_price * $product_exist->quantity;
        }
        $product_exist->save();
    } else {

        $cart = new Cart();
        $cart->product_id = $wishlistItem->product_id;
        $cart->slug = $wishlistItem->slug;
        $cart->price = $wishlistItem->sale_price ?? $wishlistItem->regular_price;
        $cart->email = $wishlistItem->email;
        $cart->phone = $wishlistItem->phone;
        $cart->address = $wishlistItem->address;
        $cart->user_id = $userid;
        $cart->quantity = $request->input('quantity');
        $cart->name = $wishlistItem->name;
        $cart->image = $wishlistItem->image;
        $cart->save();
    }

    
    $wishlistItem->delete();

    Alert::success('Product added to cart successfully');
    return redirect()->back()->with('success', 'Product added to cart successfully');
}

public function remove_wishlist($id)
{
    $cart=Wishlist::find($id);
    $cart->delete();
    Alert::success('Product Removed Successfully','From WishList');
    return redirect()->back();
}

}
