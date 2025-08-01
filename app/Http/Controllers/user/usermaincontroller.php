<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class usermaincontroller extends Controller
{
     public function index(){
           return view('user.profile');
    }
    public function history(){
           return view('user.history');
    }
    public function payment(){
           return view('user.payment');
    }
    public function affiliate(){
           return view('user.affiliate');
    }
    
}
