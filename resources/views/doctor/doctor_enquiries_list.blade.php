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
                <td><a href="{{ route('doctor.generate_plan')}}">Create Plan</a></td>
            </tr>
        @endforeach
    </table>
@endsection
