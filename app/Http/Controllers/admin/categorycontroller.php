<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class categorycontroller extends Controller
{
    public function index(){
           return view('admin.category.create');
    }
    public function manage(){
           return view('admin.category.manage');
    }
}
