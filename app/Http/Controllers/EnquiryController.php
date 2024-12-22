<?php

namespace App\Http\Controllers;

use App\Models\CancerTypes;
use App\Models\Enquiry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnquiryController extends Controller
{
    function index()
    {
        $cancer_types = CancerTypes::all();
        return view('enquiry', compact('cancer_types'));
    }

    function save_enquiries(Request $request)
    {

        try {
            $request->validate([
                'patient_name' => 'required|string|max:255',
                'email' => 'required|email',
                'cancer_type' => 'required|integer',
            ]);
            DB::beginTransaction();

            $user = new User();
            $user->name = $request->patient_name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->user_type = 'P';
            if($user->save()){

                $enquiry = new Enquiry();
                $enquiry->patient_name = $request->patient_name;
                $enquiry->email = $request->email;
                $enquiry->user_id = $user->id;
                $enquiry->cancer_type = $request->cancer_type;
                // $patient->contact_number = $request->contact_no;
                // $patient->address = $request->address;
                // $patient->state = $request->state;
                // $patient->city = $request->city;
                // $patient->pincode = $request->pincode;
                if ($enquiry->save()) {
                    $enquiry_id = $enquiry->id;
                }
            }
            DB::commit();
            return redirect()->back()->with('success', 'Enquiry created successfully.');
        } catch (\Exception $ex) {
            DB::rollback();
            echo "error occured.";
            dd($ex);
        }
    }
}
