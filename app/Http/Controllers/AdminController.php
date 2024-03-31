<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function showlist()
    {
        return view('admin.list');
    }
    public function create()
    {

    }
    public function store(Request $request)
    {


        $rules = [
            'name' => 'required|string|min:5|max:255',
            'slug' => 'required|string|min:5',
            // 'short_description' => 'required|string',
            // 'description' => 'required|string',
            // 'regular_price' => 'required|numeric|min:1',

            // 'sale_price' => 'nullable|numeric|min:0|lt:regular_price',
            // 'SKU' => 'required|string|min:3',
            'image' => 'required|string|max:255',
            // 'images' => 'string',
            // 'category_id' => 'required|integer',
            // 'brand_id' => 'required|integer'

            // 'stock_status' => 'required|in:instock,outofstock',
            // 'featured' => 'boolean',
            // 'quantity' => 'integer|min:0',
            
        ];
        
        $validator = Validator::make($request->all(), $rules);


        if($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $category = new Category;
        $category->name=$request->name;
        $category->slug = $request->slug;
        $category->image= $request->image;
        $category->save();

        $brand = new Brand;
        $brand->name=$request->name;
        $brand->slug = $request->slug;
        $brand->image= $request->image;
        $category->save();

        // $product = new Product();
        // $product->name = $request->name;
        // $product->slug = $request->slug;  
        // $product->short_description = $request->short_description;
        // $product->description = $request->description;
        // $product->regular_price = $request->regular_price;
        // $product->SKU = $request->SKU;
        // $product->image= $request->image;
        // $product->images= $request->images;
        // $product->category_id= $request->category_id;
        // $product->brand_id = $request->brand_id;

        

      return redirect()->route('show.list')->with('success','product added successfully');

        

        
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
