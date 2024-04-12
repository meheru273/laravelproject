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

    public function bcreate()
    {
        return view ('admin.show.bedit');
    }
    public function showlist()
    {
        $products= Category::orderBy('created_at','DESC')->get();

        return view('admin.show.clist',[
            'products'=>$products
        ]);

    }
    public function store(Request $request)
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

        $category = new Category;
        $category->name=$request->name;
        $category->slug = $request->slug;
        $category->save();

       
        if($request->image !="")
        {
            $image= $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName= time().'.'.$ext;

            $image->move(public_path('assets/images/fashion/product/front'),$imageName);
            $category->image = $imageName; 
            $category->save();
        }

      return redirect()->route('show.clist')->with('success','product added successfully');

    }

    public function edit($id)
    {
        $product =Category::findOrFail($id);

        return view('admin.show.cedit',[
            'product' => $product,
            
        ]);
    }

    public function update($id,Request $request)
    {
        $category =Category::findOrFail($id);

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

            if($request->image !="")
        {
            File::delete(public_path('assets/images/fashion/product/front'.$category->image));
            $image= $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName= time().'.'.$ext;

            $image->move(public_path('assets/images/fashion/product/front'),$imageName);
            $category->image = $imageName; 
            $category->save();
        }

      return redirect()->route('show.clist')->with('success','product updated successfully');
        
    }
 public function destroy($id)
 {
    $category =Category::findOrFail($id);
    File::delete(public_path('assets/images/fashion/product/front'.$category->image));

    $category->delete();
    return redirect()->back()->with('message','Product deleted successfully');
 }
}
