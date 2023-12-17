<?php

namespace App\Http\Controllers;

use App\Http\Requests\TreatmentEnquiryRequest;
use App\Models\User;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    function treatment_enquiry(TreatmentEnquiryRequest $request){
        // echo "<pre>";
        // print_r($request->all());

        print_r(User::where('user_type','D')->get());
        $data = [];

//        $data['enquiry_list'] = '';
//        return view('treatment_enquiry_list',compact('data'));
    }
}
