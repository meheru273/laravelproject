<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function order()
    {
        $order=Order::all();

        return view('admin.order',compact('order'));
    }

    public function delivered($id)
    {
        $order=Order::find($id);
        $order->delivery_status="delivered";
        $order->payment_status="Paid";

        $order->save();
        return redirect()->back();
    }

    public function search(Request $request)
{
    $searchText = $request->search;
    $order = Order::where('slug', 'LIKE', "%{$searchText}%")->orWhere('name', 'LIKE', "%{$searchText}%")->
    orWhere('quantity', 'LIKE', "%{$searchText}%")->get();

    return view('admin.order', compact('order'));
}

public function searchproduct(Request $request)
{
    $searchText = $request->search;
    $product = Product::where('slug', 'LIKE', "%{$searchText}%")
                       ->orWhere('name', 'LIKE', "%{$searchText}%")
                       ->orWhere('regular_price', 'LIKE', "%{$searchText}%")
                       ->get();
    return view('search',['product'=>$product]);
}


}
