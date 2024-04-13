<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    

    public function ccreate()
    {
        return view('admin.show.category');
    }
    public function showcat()
    {
        $products= Category::orderBy('created_at','DESC')->get();

        return view('admin.show.clist',[
            'products'=>$products
        ]);

    }
    public function storecat(Request $request)
{
    $rules = [
        'name' => 'required|string|min:5|max:255',
        'slug' => 'required|string|min:5',
        'image' => 'required|image',  
    ];
    
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return redirect()->back()->withInput()->withErrors($validator);
    }

    $category = new Category();
    $category->name = $request->name;
    $category->slug = $request->slug; 

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $imageName = time() . '.' . $ext;
        $image->move(public_path('assets/images/fashion/product/front'), $imageName);
        $category->image = $imageName; 
    }

    $category->save();
    return redirect()->route('show.clist')->with('success', 'Category added successfully');
}


    public function editcat($id)
    {
        $product =Category::findOrFail($id);

        return view('admin.show.cedit',[
            'product' => $product,
            
        ]);
    }

    public function updatecat($id,Request $request)
    {
        $rules = [
            'name' => 'required|string|min:5|max:255',
            'slug' => 'required|string|min:5',
            'image' => 'required|image',

        ];
        
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $product = new Category();
        $product->name = $request->name;
        $product->slug = $request->slug;  

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;
            $image->move(public_path('assets/images/fashion/product/front'), $imageName);
            $product->image = $imageName;

        }
        $product->save();
        

      return redirect()->route('show.clist')->with('success','product added successfully');

    }
 public function destroycat($id)
 {
    $category =Category::findOrFail($id);
    File::delete(public_path('assets/images/fashion/product/front'.$category->image));

    $category->delete();
    return redirect()->back()->with('message','Product deleted successfully');
 }
}
