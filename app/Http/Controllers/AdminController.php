<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function showlist()
    {
        $products= Category::orderBy('created_at','DESC')->get();

        return view('admin.list',[
            'products'=>$products
        ]);

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
            'image' => 'required',
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
        // $category->image= $request->image;
        $category->save();

        $brand = new Brand;
        $brand->name=$request->name;
        $brand->slug = $request->slug;
        // $brand->image= $request->image;
        $brand->save();

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

        if($request->image !="")
        {
            $image= $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName= time().'.'.$ext;

            $image->move(public_path('assets/images/fashion/product/front'),$imageName);
            $category->image = $imageName; 
            $brand->image = $imageName; 
            $category->save();
            $brand->save();
        }

      return redirect()->route('show.list')->with('success','product added successfully');

    }

    public function edit($id)
    {
        $product =Category::findOrFail($id);
        // $brand=Brand::findOrFail($id);

        return view('admin.edit',[
            'product' => $product,
            
        ]);
    }

    public function update($id,Request $request)
    {
        $category =Category::findOrFail($id);
        // $brand =Brand::find($category);

        $rules = [
            'name' => 'required|string|min:5|max:255',
            'slug' => 'required|string|min:5',
            'image' => 'required',];

            $validator = Validator::make($request->all(), $rules);

            if($validator->fails())
            {
                return redirect()->back()->withInput()->withErrors($validator);
            }
           
            $category->name=$request->name;
            $category->slug = $request->slug; 
            $category->save();

            // $brand->name=$category->name;
            // $brand->slug = $category->slug;
            // $brand->save();




            if($request->image !="")
        {
            File::delete(public_path('assets/images/fashion/product/front'.$category->image));
            $image= $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName= time().'.'.$ext;

            $image->move(public_path('assets/images/fashion/product/front'),$imageName);
            $category->image = $imageName; 
            // $brand->image = $imageName; 
            $category->save();
            //  $brand->save();
        }

      return redirect()->route('show.list')->with('success','product updated successfully');
        
    }
    public function delete($id)
    {

        $category= Category::findOrFail($id);
        File::delete(public_path('assets/images/fashion/product/front'.$category->image));

        $category->delete();
        return redirect()->route('show.list')->with('success','product deleted successfully');

    }
}
