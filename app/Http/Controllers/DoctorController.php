<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\CancerTypes;
use App\Models\Doctor;
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
        $doctors = Doctor::with(['cancer_type'])->get();
        
        // $cancer = $doctors[0];
        // echo "<pre>";
        // print_r($doctors->toArray());
        // $user_cancer = User::has('doctor')->with('doctor.cancer_type')->get();
        // print_r($user_cancer->toArray());
        // exit;
        return view('admin.doctor_list',compact(['doctors']));
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
        DB::beginTransaction();
        try {
            $doctor = new Doctor();
            $doctor->fullname = $request->doctor_name;
            $doctor->email = $request->doctor_email;
            $doctor->password = 'here';
            $doctor->username = 'here'.random_int(1,100);
            $doctor->specialization = $request->doctor_cancer;
            
            if($doctor->save()){

                $doctor_id = $doctor->id;
                DB::commit();            
                echo "doctor added send email";
            }
        } catch (Exception $ex) {
            DB::rollBack();
            dd($ex);

        }

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
