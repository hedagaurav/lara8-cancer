<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TreatmentEnquiryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => 'required',
            'email' => 'required|unique:patients',
            'password' => 'required',
            'contact_no' => 'required',
            'cancer_type' => 'required',
            'address' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pincode' => 'required',
            // 'documents' => 'required',
        ];
    }
}
