<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
 {
    return view('cart');
    
 }

 public function addToCart($slug)
 {
    $product = Product::where('slug',$slug)->first();

    if ($product) {
        $cart = new Cart();
        $cart->name = $product->name;
        $cart->slug = $product->slug;
        
        
        if ($product->sale_price) {
            $cart->price = $product->sale_price;
        } else {
            $cart->price = $product->regular_price;
        }
        
        $cart->quantity = 1; 
        $cart->save();
    }
    return view('cart',['product'=>$product,]);

 }
 public function remove($slug)
 {

 }
}
