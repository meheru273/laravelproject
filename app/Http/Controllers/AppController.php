<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Comment;
use App\Models\Reply;

class AppController extends Controller
{
    public function index()
    {
        $products=Product::orderBy('created_at','DESC')->paginate(24);
        $comment=Comment::all();
        $reply=Reply::all();
        return view('index',compact('products','comment','reply'));
       
    }
}
