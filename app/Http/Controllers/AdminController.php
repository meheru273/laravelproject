<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDelete;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Order;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    
    public function index()
    {

        $total_product=Product::all()->count();
        $total_order=Order::all()->count();
        $total_user=User::all()->count();
        $total_wishlist=Wishlist::all()->count();

        $order=Order::all();
        $total_rev=0;
        foreach($order as $order)
        {
            $total_rev+=$order->price;
        }
        $total_delivered=Order::where('delivery_status','=','delivered')->get()->count();
        $total_processing=Order::where('delivery_status','=','processing')->get()->count();
        return view('admin.index',compact('total_product','total_processing',
    'total_order','total_user','total_rev','total_delivered','total_wishlist'));
    }

    public function createproduct()
    {
        return view('admin.show.product');
    }
    public function showproduct()
    {
        $products= Product::orderBy('created_at','DESC')->get();

        return view('admin.show.plist',[
            'products'=>$products
        ]);

    }
    public function storeproduct(Request $request)
    {


        $rules = [
            'name' => 'required|string|min:5|max:255',
            'slug' => 'required|string|min:5',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'regular_price' => 'required|numeric|min:1',

            'sale_price' => 'nullable|numeric|min:0|lt:regular_price',
            'SKU' => 'required|string|min:3',
            'image' => 'required',
            'images' => 'string',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:categories,id',

        ];
        
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $product = new Product();
        $product->name = $request->name;
        $product->slug = $request->slug;  
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        $product->SKU = $request->SKU;
        $product->image= $request->image;
        $product->images= $request->images;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;

        if($request->image !="")
        {
            $image= $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName= time().'.'.$ext;

            $image->move(public_path('assets/images/fashion/product/front'),$imageName);
            $product->image = $imageName; 
            $product->save();
        }

      return redirect()->route('show.plist')->with('success','product added successfully');

    }

    public function editproduct($id)
    {
        $product =Product::findOrFail($id);

        return view('admin.show.pedit',[
            'product' => $product,
            
        ]);
    }

    public function updateproduct($id,Request $request)
    {
        $product =Product::findOrFail($id);

        $rules = [
            'name' => 'required|string|min:5|max:255',
            'slug' => 'required|string|min:5',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'regular_price' => 'required|numeric|min:1',

            'sale_price' => 'nullable|numeric|min:0|lt:regular_price',
            'SKU' => 'required|string|min:3',
            'image' => 'required',
            'images' => 'string',

];

            $validator = Validator::make($request->all(), $rules);

            if($validator->fails())
            {
                return redirect()->back()->withInput()->withErrors($validator);
            }
           
            $product->name = $request->name;
            $product->slug = $request->slug;  
            $product->short_description = $request->short_description;
            $product->description = $request->description;
            $product->regular_price = $request->regular_price;
            $product->SKU = $request->SKU;
            $product->image= $request->image;
            $product->images= $request->images;



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

      return redirect()->route('show.plist')->with('success','product updated successfully');
        
    }
 public function destroyproduct($id)
 {
    $category =Product::findOrFail($id);
    File::delete(public_path('assets/images/fashion/product/front'.$category->image));

    $category->delete();
    return redirect()->back()->with('message','Product deleted successfully');
 }

 public function user_status()
 {
    $user= UserDelete::orderBy('created_at','DESC')->get();

    return view('admin.user',[
        'user'=>$user
    ]);

 }
 public function delete_user($id)
 {
    $user1=User::findOrFail($id);
    $user2 = UserDelete::findOrFail($id);
    $user1->delete();
    $user2->delete();

    return redirect()->back();

 }
}
