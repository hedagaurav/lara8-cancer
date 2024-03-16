<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('admin/index');
    }

    function login(Request $request)
    {
        $data = $request->all();

        if(auth()->attempt($data)){
            return redirect('/')->with('message','User Logged In');
        }
        return view('login')->with('message','Invalid credentials');
    }
}
