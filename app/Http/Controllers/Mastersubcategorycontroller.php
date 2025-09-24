<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;

class Mastersubcategorycontroller extends Controller
{
    public function storesubcat(Request $request){
        $validate_data = $request ->validate([
            'subcategory_name'=>'unique:subcategories|max:100|min:5',
            'category_id' => 'required|exists:categories,id'
       ]);
  
       Subcategory ::create($validate_data);
  
       return redirect()->back()->with('message','Subcategory added successfully');   
    }

    public function showsubcat($id){
        $subcategory_info = Subcategory::find($id); 
        return view('admin.sub_category.edit', compact('subcategory_info'));
       }
   
       public function updatesubcat(Request $request, $id){
        $subcategory = Subcategory::findOrFail($id);
        $validate_data = $request ->validate([
            'subcategory_name'=>'unique:subcategories|max:100|min:5',
            
       ]);
   
        $subcategory -> update($validate_data);
   
        return redirect()->back()->with('message','Subcategory updated successfully');
       }
   
       public function deletesubcat($id){
        Subcategory::findorfail($id)->delete();
   
        return redirect()->back()->with('message','Subcategory deleted successfully');
   
       }
}
