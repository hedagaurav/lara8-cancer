<?php

namespace App\Http\Controllers;

use App\Models\CancerTypes;
use App\Models\Doctor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    function list_doctor(){
        $doctors = Doctor::with(['cancer_type'])->get();
        return view('admin.doctor_list',compact(['doctors']));
    }

    function add_doctor(){
        $cancer_type = CancerTypes::all();
        return view('admin.doctor_add',compact('cancer_type'));
    }

    function store_doctor(Request $request){
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

    function list_cancer_types(){
        $cancer_types_list = CancerTypes::all();
        return view('admin/cancer_type_list',compact('cancer_types_list'));
    }

    function add_cancer_types(){
        return view('admin/cancer_type_add');
    }
    function store_cancer_types(Request $request){
        DB::beginTransaction();
        try {
            $cancer_type = new CancerTypes();
            $cancer_type->name = $request->cancer_type_name;
            $cancer_type->description = $request->cancer_type_description;
            
            if($cancer_type->save()){

                $cancer_type_id = $cancer_type->id;
                DB::commit();            
                echo "cancer type added";
            }
        } catch (Exception $ex) {
            DB::rollBack();
            dd($ex);

        }    
    }
}
