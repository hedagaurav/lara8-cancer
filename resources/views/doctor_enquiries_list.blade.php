@extends('layout')

@section('content')
<h3><?= ucwords('doctor enquiry list') ?></h3>
<table>
    @foreach ($enquiries as $enquiry)
        <tr>
            <td>{{ $enquiry['patient']['full_name'] }}</td>
            <td>{{ $enquiry['patient']['email'] }}</td>
            <td>{{ $enquiry['patient']['city'] }}</td>
            <td>{{ $enquiry['cancer_type']['name'] }}</td>
            <td>documents</td>
        </tr>
        @endforeach
    </table>


@endsection