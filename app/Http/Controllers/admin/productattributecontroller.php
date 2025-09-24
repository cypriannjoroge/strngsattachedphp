<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\DefaultAttribute;
use App\Http\Controllers\Controller;

class productattributecontroller extends Controller
{
    public function index(){
             return view('admin.product_attribute.create');
    }
    public function manage(){ 
       $allattributes = DefaultAttribute::all();
           return view('admin.product_attribute.manage', compact('allattributes'));
    }

    public function createattribute(Request $request){
       $validate_data = $request ->validate([
              'attribute_value'=>'unique:default_attributes|max:100|min:1',
         ]);
 
         DefaultAttribute::create($validate_data);
 
         return redirect()->back()->with('success','Default Attribute added successfully');
    }

    public function showattribute($id){
       $attribute_info = DefaultAttribute::find($id); 
       return view('admin.product_attribute.edit', compact('attribute_info'));
      }
  
      public function updateattribute(Request $request, $id){
       $attribute = DefaultAttribute::findOrFail($id);
       $validate_data = $request ->validate([
            'attribute_value'=>'unique:default_attributes|max:100|min:1',
       ]);
  
       $attribute -> update($validate_data);
  
       return redirect()->back()->with('message','Attribute updated successfully');
      }
  
      public function deleteattribute($id){
       DefaultAttribute::findorfail($id)->delete();
  
       return redirect()->back()->with('message','Attribute deleted successfully');
  
      }

}
