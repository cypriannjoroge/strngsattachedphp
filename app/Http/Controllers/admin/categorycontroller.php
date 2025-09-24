<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class Categorycontroller extends Controller
{
    public function index(){
           return view('admin.category.create');
    }
    public function manage(){
       $categories = Category::all();
           return view('admin.category.manage', compact('categories'));
    }
}
