<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class vendorproductcontroller extends Controller
{
     public function index(){
           return view('vendor.product.create');
    }
     public function manage(){
           return view('vendor.product.manage');
    }
}
