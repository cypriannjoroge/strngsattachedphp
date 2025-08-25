<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class mastercategorycontroller extends Controller
{
//     public function storecat(Request $request)
// {
//     $request->validate([
//         'category_name' => 'unique:categoriesed|string|max:255',
//     ]);

//     Category::create([
//         'category_name' => $request->category_name,
//     ]);

//     return redirect()->back()->with('success', 'Category added successfully!');
// }
     public function storecat(Request $request){
        $validate_data = $request ->validate([
             'category_name'=>'unique:categories|max:100',
        ]);

        Category::create($validate_data);

    }
}
