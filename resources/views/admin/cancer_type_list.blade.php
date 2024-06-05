@extends('admin.layout')

@section('pagetitle')Cancer Types List @endsection
@section('content')
<h3>Cancer Types List</h3>
<table id="cancer_types_list">
    <thead>
        <tr>
            <th>Cancer Name</th>
            {{-- <th>Desctiption</th> --}}
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cancer_types_list as $index => $cancer_type)
        <tr>
            <td>{{ $cancer_type->cancer_name }}</td>
            {{-- <td>{{ $cancer_type->description }}</td> --}}
            <td></td>
        </tr>
        @endforeach
    </tbody>



</table>

    
@endsection


@section('foot_links')
    <script>
        // let table = new DataTable('#doctor_list');
        $(document).ready( function () {
            $('#cancer_types_list').DataTable();
        } );
    </script>    
@endsection