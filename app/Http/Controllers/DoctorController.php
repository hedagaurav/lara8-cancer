<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\CancerTypes;
use App\Models\Doctor;
use App\Models\Enquiry;
use App\Models\Patient;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{

    function login(Request $request)
    {
        $data = $request->all();

        if(auth()->attempt($data)){
            return redirect('/')->with('message','User Logged In');
        }
        return view('login')->with('message','Invalid credentials');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor_id = auth()->id();
        $doctor = User::with('doctor')->findOrFail($doctor_id)->toArray();
        // dd($doctor);

        $enquiries = Enquiry::with('user','cancer_detail')->where('cancer_type',$doctor['doctor']['specialization'])->get()->toArray();
        // dump($doctor->toArray());
        // dump($enquiries);
        // exit;
        // print_r($enquiries);
        
        return view('doctor.doctor_enquiries_list',compact(['doctor','enquiries']));
    }

    /**
     * Show the form for creating a plan for the patient enquiry.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate_plan()
    {
        $cancer_type = CancerTypes::all();
        return view('doctor.generate_plan',compact('cancer_type'));
    }

    /**
     * save plan for the patient enquiry.
     *
     * @param \Illuminate\Http\Request $reqeust
     * @return \Illuminate\Http\Response
     */
    function create_plan($request){

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cancer_type = CancerTypes::all();
        return view('admin.doctor_add',compact('cancer_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateDoctorRequest $request
     * @param \App\Models\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
