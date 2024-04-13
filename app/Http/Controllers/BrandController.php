<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\File;


class BrandController extends Controller
{


    public function bcreate()
    {
        return view('admin.show.brand');
    }
    public function showbrand()
    {
        $products= Brand::orderBy('created_at','DESC')->get();

        return view('admin.show.blist',[
            'products'=>$products
        ]);

    }
    public function storebrand(Request $request)
    {


        $rules = [
            'name' => 'required|string|min:5|max:255',
            'slug' => 'required|string|min:5',
            'image' => 'required',
            
        ];
        
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $product = new Brand();
        $product->name = $request->name;
        $product->slug = $request->slug;  
        $product->save();

        if($request->image !="")
        {
            $image= $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName= time().'.'.$ext;

            $image->move(public_path('assets/images/fashion/product/front'),$imageName);
            $product->image = $imageName; 
            $product->save();
        }

      return redirect()->route('show.blist')->with('success','product added successfully');

    }

    public function editb($id)
    {
        $product =Brand::findOrFail($id);

        return view('admin.show.bedit',[
            'product' => $product,
            
        ]);
    }

    public function updateb($id,Request $request)
    {
        $product =Brand::findOrFail($id);

        $rules = [
            'name' => 'required|string|min:5|max:255',
            'slug' => 'required|string|min:5',
            'image' => 'required',
];

            $validator = Validator::make($request->all(), $rules);

            if($validator->fails())
            {
                return redirect()->back()->withInput()->withErrors($validator);
            }
           
            $product->name = $request->name;
            $product->slug = $request->slug;  
            $product->image= $request->image;

            if($request->image !="")
        {
            File::delete(public_path('assets/images/fashion/product/front'.$product->image));
            $image= $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName= time().'.'.$ext;

            $image->move(public_path('assets/images/fashion/product/front'),$imageName);
            $product->image = $imageName; 
            // $brand->image = $imageName; 
            $product->save();
            //  $brand->save();
        }

      return redirect()->route('show.blist')->with('success','product updated successfully');
        
    }
 public function destroyb($id)
 {
    $category =Brand::findOrFail($id);
    File::delete(public_path('assets/images/fashion/product/front'.$category->image));

    $category->delete();
    return redirect()->back()->with('message','Product deleted successfully');
 }
}
