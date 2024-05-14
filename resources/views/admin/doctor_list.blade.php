@extends('admin.layout')

@section('pagetitle')Doctors List @endsection
@section('content')
<!-- page content -->

<h3>Doctors List</h3>
<table id="doctor_list" class="doctor_list">
    <thead>
        <tr>
            <th>doctor</th>
            <th>Email</th>
            <th>Cancer Type</th>
        </tr>
    </thead>
    <tbody>
        @foreach($doctors as $field => $doctor)
        <tr>
            <td>{{ $doctor->fullname }}</td>
            <td>{{ $doctor->email }}</td>
            <td>{{ $doctor->cancer_type->name }}</td>
        </tr>
        @endforeach
    </tbody>



</table>

<!-- /page content -->
@endsection

@section('foot_links')
    <script>
        // let table = new DataTable('#doctor_list');
        $(document).ready( function () {
            $('#doctor_list').DataTable();
        } );
    </script>    
@endsection