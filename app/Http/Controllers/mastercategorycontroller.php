<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class mastercategorycontroller extends Controller
{
     public function storecat(Request $request){
        $validate_data = $request ->validate([
             'category_name'=>'unique:categories|max:100|min:5',
        ]);

        Category::create($validate_data);

        return redirect()->back()->with('success','Category added successfully');
    }

    public function showcat($id){
     $category_info = Category::find($id); 
     return view('admin.category.edit', compact('category_info'));
    }

    public function updatecat(Request $request, $id){
     $category = Category::findOrFail($id);
     $validate_data = $request ->validate([
          'category_name'=>'unique:categories|max:100|min:5',
     ]);

     $category -> update($validate_data);

     return redirect()->back()->with('message','Category updated successfully');
    }

    public function deletecat($id){
     category::findorfail($id)->delete();

     return redirect()->back()->with('message','Category deleted successfully');

    }
}
