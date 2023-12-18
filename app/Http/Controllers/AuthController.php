<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function login(Request $request){
//        \DB::enableQueryLog();
        // echo "<pre>";
//        $dr = Doctor::select('id')->get();
        // $query = User::select('id')->where('user_type','D')->doesntHave('doctor')->get()->toArray();
        // print_r($query);
//        $sql = str_replace_array('?', $query->getBindings(), $query->toSql());
//        print_r($sql);
//        print_r(\DB::getQueryLog()); // Show results of log

//        $data['email'] = $request->get('email');
//        $data['password'] = $request->get('password');
        $data = $request->except('_token');

        // print_r($data);

       $user = User::where('email',$data['email'])->first();
//        var_dump($user);
       if(!$user){
           return redirect()->back()->with('message','User Not found.');
        //    return view('login')->with('message','User Not found.');
       }
       if(auth()->attempt($data)){

           switch ($user->user_type){
               case "S":
                   return redirect('admin')->with('message','User Logged In');
               case "D":
               return redirect('doctor')->with('message','User Logged In');
               case "P":
               return redirect('/')->with('message','User Logged In');
               break;
               default:
                   return redirect('login');

           }
           return redirect('/')->with('message','User Logged In');
           print_r($user);
       }
       return view('login')->with('message','Invalid credentials');
    }
}
