<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class AppController extends Controller
{
    public function index()
    {
        $products=Product::orderBy('created_at','DESC')->paginate(24);
        return view('index',['products'=>$products]);
       
    }
}
