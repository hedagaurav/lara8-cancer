

<table>
    @foreach($doctors as $field => $doctor)
    @if($field == 0 )
    <thead>
        <tr>
            <th>doctor</th>
        </tr>
    </thead>
    @endif
    <tbody>
        <tr>
            <td>{{ $doctor->user->name }}</td>
            <td>{{ $doctor->user->email }}</td>
            <td>{{ $doctor->specialization }}</td>
        </tr>
    </tbody>
    
    @endforeach

    
</table>
