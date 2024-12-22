<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\CancerTypes;
use App\Models\Doctor;
use App\Models\Enquiry;
use App\Models\Patient;
use App\Models\Treatment_plan;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;

class DoctorController extends Controller
{

    function login(Request $request)
    {
        $data = $request->all();

        if (auth()->attempt($data)) {
            return redirect('/')->with('message', 'User Logged In');
        }
        return view('login')->with('message', 'Invalid credentials');
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

        $enquiries = Enquiry::with('user', 'cancer_detail', 'doctor')->where('cancer_type', $doctor['doctor']['specialization'])->get()->toArray();

        // $treatment_plan = Treatment_plan::where('patient_id',$patient_id)->first()->toArray();
        // dump($doctor->toArray());
        // dump($enquiries);
        // exit;
        // print_r($enquiries);

        return view('doctor.doctor_enquiries_list', compact(['doctor', 'enquiries', 'doctor_id']));
    }

    /**
     * Show the form for creating a plan for the patient enquiry.
     *
     * @param int $patient_id
     * @return \Illuminate\Http\Response
     */
    public function generate_plan($patient_id)
    {
        $patient = Enquiry::with('user', 'cancer_detail')->findOrFail($patient_id)->toArray();
        $doctor_id =  auth()->id();

        // $doctor = Enquiry::with('doctor')->find($patient_id)->toArray();
        // dd($treatment_plan);
        // dd($doctor);
        return view('doctor.generate_plan', compact('patient', 'doctor_id'));
    }

    /**
     * save plan for the patient enquiry.
     *
     * @param \Illuminate\Http\Request $reqeust
     * @return \Illuminate\Http\Response
     */
    function create_plan(Request $request)
    {
        DB::beginTransaction();
        try {
            $treatment_plan = new Treatment_plan();
            $treatment_plan->patient_id = $request->patient_id;
            $treatment_plan->doctor_id = $request->doctor_id;
            $treatment_plan->treatment = $request->treatment_plan;
            if ($treatment_plan->save()) {
                $this->create_treatment_plan_pdf($treatment_plan);
                DB::commit();
                $status = ['status' => true, 'message' => 'Treatment plan Created'];
                return 'treatment plan created.';
            }
        } catch (Exception $ex) {
            DB::rollBack();
            dd($ex);
        }
    }

    public function create_treatment_plan_pdf($treatment_plan = null)
    {

        $treatment_plan_path = public_path('treatment_plans/');

        $doctor = Doctor::with('user')->find($treatment_plan['doctor_id'])->toArray();
        $doctor_html_header = '';
        $doctor_html_header .= "
        <div>
            <p style='font-size:26px'>{$doctor['user']['name']}<span style='font-size: 16px'>(MD)</span></p>
            <span><strong>{$doctor['user']['email']}</strong></span>
            <br>
            <span>contact no : 9876543210</span>
        </div>
        <hr>";

        if (!file_exists($treatment_plan_path)) {
            mkdir($treatment_plan_path, 755, true);
        }

        $treatment_plan_filename = "Treatment Plan " . $treatment_plan->patient_id . "_" . time() . ".pdf";


        $mpdf = new Mpdf(
            ['margin_top' => 50]
            // ['setAutoTopMargin' => 'stretch']
        );
        $mpdf->SetHTMLHeader($doctor_html_header);
        $mpdf->WriteHTML($treatment_plan->treatment);

        // $mpdf->Output($treatment_plan_path.$treatment_plan_filename,\Mpdf\Output\Destination::STRING_RETURN);

        return $mpdf->OutputFile($treatment_plan_path . $treatment_plan_filename);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cancer_type = CancerTypes::all();
        return view('admin.doctor_add', compact('cancer_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {}

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
