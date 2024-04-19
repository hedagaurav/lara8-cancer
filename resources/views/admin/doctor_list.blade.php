@extends('admin.layout')

@section('pagetitle')Doctors List @endsection
@section('content')
<!-- page content -->

<h3>Doctors List</h3>
<table id="doctor_list">
    @foreach($doctors as $field => $doctor)
    @if($field == 0 )
    <thead>
        <tr>
            <th>doctor</th>
            <th>Email</th>
            <th>Cancer Type</th>
        </tr>
    </thead>
    @endif
    <tbody>
        <tr>
            <td>{{ $doctor->fullname }}</td>
            <td>{{ $doctor->email }}</td>
            <td>{{ $doctor->cancer_type->name }}</td>
        </tr>
    </tbody>

    @endforeach


</table>

<!-- /page content -->
@endsection