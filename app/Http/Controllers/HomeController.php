<?php

namespace App\Http\Controllers;

use App\Models\States;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $provinces = States::all();
        return view('index',compact('provinces'));
    }

    public function signup(){
        return view('signup');
    }

    public function login(){
        return view('login');
    }

    public function logadmin(){
        return view('admin.admin_login');
    }

    public function about(){
        return view('about');
    }  

    public function contact(){
        return view('contactus');
    } 
}
