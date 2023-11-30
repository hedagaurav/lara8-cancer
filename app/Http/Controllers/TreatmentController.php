<?php

namespace App\Http\Controllers;

use App\Http\Requests\TreatmentEnquiryRequest;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    function treatment_enquiry(TreatmentEnquiryRequest $request){
        // echo "<pre>";
        // print_r($request->all());

        $data = [];

        $data['enquiry_list'] = '';
        return view('treatment_enquiry_list',compact('data'));
    }
}
