<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\CancerTypes;
use App\Models\Doctor;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
        $cancer_types = CancerTypes::all();
        
        return view('admin.doctor_add',compact('cancer_types'));
    }

    function store_doctor(Request $request){
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->doctor_name;
            $user->email = $request->doctor_email;
            $user->password = bcrypt(Str::random());
            $user->user_type = 'D';
            if($user->save()){
                $user_id = $user->id;
                $doctor = new Doctor();
                $doctor->user_id = $user_id;
                $doctor->specialization = $request->doctor_cancer;
                if($doctor->save()){
                    // send password via email to the doctor.
                    // $to = $user->email;
                    $to = 'hedagaurav93@gmail.com';
                    $subject = "Laravel Cancer Login Password";
                    $message = "Your login password for Laravel Cancer App is ".$user->password;
                    $this->sendEmail($to,$subject,$message);
                    DB::commit();            

                }
            }

            // return false;
            // old code
            // $doctor = new Doctor();
            // $doctor->fullname = $request->doctor_name;
            // $doctor->email = $request->doctor_email;
            // $doctor->password = 'here';
            // $doctor->username = 'here'.random_int(1,100);
            // $doctor->specialization = $request->doctor_cancer;
            
            // if($doctor->save()){

            //     $doctor_id = $doctor->id;
            //     if($doctor_id){
            //         $doctor_password = Str ::random(8);
            //         echo $doctor_password;
            //     }
            //     // DB::commit();            
            //     echo "doctor added send email";
            // }
        } catch (Exception $ex) {
            DB::rollBack();
            // print_r($ex);
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

    function sendEmail($to='hedagaurav93@gmail.com',$subject=null,$message=null){
        // $details = [
        //     'title' => 'Mail from Laravel App',
        //     'body' => 'This is a test email sent from a Laravel application.'
        // ];

        $details = [
            'title' => $subject,
            'body' => $message
        ];
    
        Mail::to([$to])->send(new TestMail($details));
    
        return "Email sent successfully!";
    }
}
