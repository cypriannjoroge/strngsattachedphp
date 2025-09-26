<?php

namespace App\Http\Controllers\vendor;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Auth;

class vendorproductcontroller extends Controller
{
     public function index(){
      $authuserid = Auth::id();
      $stores = Store::where('user_id',$authuserid)->get();
           return view('vendor.product.create',compact('stores'));
    }
     public function manage(){
      $currentSeller = Auth::id();
      $products = Product::where('seller_id',$currentSeller)->get();
           return view('vendor.product.manage',compact('products'));
    }

    public function storeproduct(Request $request){
      $request->validate([
              'product name'=>'string|max:255',
              'description'=>'nullable|string',
              'images.*'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
              'sku'=>'required|string|unique:products,sku',
              'category_id'=>'required|exists:categories,id',
              'subcategory_id'=>'nullable|exists:subcategories,id',
              'store_id'=>'required|exists:stores,id',
              'regular_price'=>'required|numeric|min:0',
              'discounted_price'=>'nullable|numeric|min:0',
              'tax_rate'=>'required|numeric|min:0|max:100',
              'stock_quantity'=>'required|integer|min:0',
              
      ]);
      
       $product = Product::create([
        'product_name'=>$request->product_name,
        'description'=>$request->description,
        'sku'=>$request->sku,
        'seller_id'=>Auth::id(),
        'category_id'=>$request->category_id,
        'subcategory_id'=>$request->subcategory_id,
        'store_id'=>$request->store_id,
        'regular_price'=>$request->regular_price,
        'discounted_price'=>$request->discounted_price,
        'tax_rate'=>$request->tax_rate,
        'stock_quantity'=>$request->stock_quantity,
        'slug'=>$request->slug,
        'meta_title'=>$request->meta_title,
        'meta_description'=>$request->meta_description,
        
      ]);

      if($request->hasfile('images')){
        foreach($request->file('images') as $file){
          $path=$file->store('product_images','public');
          ProductImage::create([
            'product_id' => $product->id,
            'img_path' => $path,
            'is_primary' => false,
 
          ]);
        }
      }

      return redirect()->back()->with('message','Product added successfully');
    }

    public function deleteproduct($id){
      $product = Product::findOrFail($id);
      $product->images()->delete();
      $product->delete();
 
      return redirect()->back()->with('message','Product deleted successfully');
 
     }
}
