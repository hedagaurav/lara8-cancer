<?php

namespace App\Http\Controllers;

use App\Http\Requests\TreatmentEnquiryRequest;
use App\Models\Enquiry;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TreatmentController extends Controller
{
    function treatment_enquiry(TreatmentEnquiryRequest $request){
        /**
         * 1. save patient details in the patient table
         * 2. save enquiry details in enquiries table with patient id as foreign key.
         * 3. save the documents in the documents
         */
        // dd($request->all());

        DB::beginTransaction();

        try {
            
            $patient = new Patient();
            $patient->full_name = $request->fullname;
            $patient->email = $request->email;
            $patient->password = $request->password;
            $patient->cancer_type = $request->cancer_type;
            $patient->contact_number = $request->contact_no;
            $patient->address = $request->address;
            $patient->state = $request->state;
            $patient->city = $request->city;
            $patient->pincode = $request->pincode;
            if($patient->save()){
                
                $patient_id = $patient->id;
                
                $enquiry = new Enquiry();
                $enquiry->patient_id = $patient_id;
                $enquiry->cancer_type_id = $request->cancer_type;
                $enquiry->save();
                
                $enquiry_id = $enquiry->id;
                
            }
            DB::commit();
            echo "enquiry added.";

        } catch (\Exception $ex) {
            DB::rollback();
            echo "error occured.";
            dd($ex);
        }

    }
}
