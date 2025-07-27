<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class vendorstorecontroller extends Controller
{
     public function index(){
           return view('vendor.store.create');
    }
     public function manage(){
           return view('vendor.store.manage');
    }
}
