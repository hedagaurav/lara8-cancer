@extends('layout')

@section('content')
    <h3><?= ucwords('doctor enquiry list') ?></h3>
    <table>
        <tr>
            <th>Patient Name</th>
            <th>Enquirer Name</th>
            <th>Email</th>
            <th>Cancer Type</th>
            <th>Documents</th>
            <th>Action</th>
        </tr>
        @foreach ($enquiries as $enquiry)
            <tr>
                <td>{{ $enquiry['patient_name'] }}</td>
                <td>{{ $enquiry['user']['name'] }}</td>
                <td>{{ $enquiry['user']['email'] }}</td>
                <td>{{ $enquiry['cancer_detail']['cancer_name'] }}</td>
                <td>documents</td>
                @if($doctor_id == $enquiry['doctor']['id'])
                <td><a href="{{ route('doctor.generate_plan',['patient_id'=> $enquiry['id'] ])}}">Create Plan</a></td>
                @endif
            </tr>
        @endforeach
    </table>
    <div>
        <div>
            <p style="font-size:26px">gaurav heda<span style="font-size: 16px">(MD)</span></p>
        </div>
        <p><strong>hedagaurav93@gmail.com</h6></p>
        <p>doctor contact no : 9876543210</p>
    </div>
@endsection
