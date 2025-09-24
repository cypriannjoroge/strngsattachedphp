<?php

namespace App\Http\Controllers\vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;

class vendorstorecontroller extends Controller
{
     public function index(){
           return view('vendor.store.create');
    }
     public function manage(){
      $user_id = Auth::user()->id;
      $stores = Store::where('user_id',$user_id)->get();
           return view('vendor.store.manage',compact('stores'));
    }

    public function store(Request $request){
      $validate_data = $request ->validate([
            'store_name'=>'unique:stores|max:100|min:3',
            'slug'=>'required|unique:stores|max:100|min:3',
            'details'=>'required',
       ]);

       Store::create([
            'store_name'=>$request->store_name,
            'slug'=>$request->slug,
            'details'=>$request->details,
            'user_id'=>Auth::user()->id,
       ]);

       return redirect()->back()->with('message','Store created successfully');
    }

    public function updatestore(Request $request, $id){
      $store = Store::findOrFail($id);
      $validate_data = $request ->validate([
           'store_name'=>'unique:stores|max:100|min:3',
           'slug'=>'required|unique:stores|max:100|min:3',
           'details'=>'required',
      ]);
 
      $store -> update($validate_data);
 
      return redirect()->back()->with('message','Store updated successfully');
     }
 
     public function deletestore($id){
      Store::findOrFail($id)->delete();
 
      return redirect()->back()->with('message','Store deleted successfully');
 
     }
}
