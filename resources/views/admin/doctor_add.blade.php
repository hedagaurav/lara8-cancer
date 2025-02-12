@extends('admin.layout')
@section('content')
    <h3>Add Doctor</h3>

    <form action="{{ route('doctor.save') }}" method="post">
        @csrf
        <label for="doctor_name">Doctor Name</label>
        <input type="text" name="doctor_name" id="doctor_name" value="marianna">
        <label for="doctor_email">Doctor Email</label>
        <input type="text" name="doctor_email" id="doctor_email" value="m<?= random_int(1, 100) ?>@gmail.com">
        <label for="doctor_cancer">Doctor Cancer</label>
        <select name="doctor_cancer" id="doctor_cancer" required>
            @if ($cancer_types->count() > 0)
                <?php $random = random_int(1, $cancer_types->count()); ?>
                @foreach ($cancer_types as $cancer)
                    <option value="{{ $cancer->id }}" {{ $cancer->id == $random ? 'selected' : '' }}>
                        {{ ucfirst($cancer->cancer_name) }}
                    </option>
                @endforeach
            @endif
        </select>

        <button type="submit">add doctor</button>
    </form>
@endsection
