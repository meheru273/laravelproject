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

 public function addToCart($slug,Cart $cart)
 {
    $product = Product::where('slug',$slug)->first();

    $cartItem = new Cart();
    $cartItem->id = $product->id;
    $cartItem->name = $product->name;
    $cartItem->price = $product->sale_price;
    $cartItem->quantity = 1; // Assuming initial quantity is 1
    
    return view('cart',['product'=>$product,]);

 }
 public function remove($slug)
 {

 }
}
