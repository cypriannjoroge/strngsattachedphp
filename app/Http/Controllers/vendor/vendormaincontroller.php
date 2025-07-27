<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class vendormaincontroller extends Controller
{
     public function index(){
           return view('vendor.dashboard');
    }
     public function orderhistory(){
           return view('vendor.orderhistory');
    }
}
