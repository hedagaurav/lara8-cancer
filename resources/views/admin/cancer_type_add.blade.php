@extends('admin.layout')
@section('content')
<h3>Add Cancer Type</h3>

<form action="{{ route('cancer_type.store') }}" method="post">
    @csrf
    <?php $random_int = random_int(1,100);?>
    <label for="cancer_type_name">Cancer Type Name</label>
    <input type="text" name="cancer_type_name" id="cancer_type_name" value="marianna<?=$random_int; ?>">
    <label for="cancer_type_description">Cancer Type Description</label>
    <textarea name="cancer_type_description" id="cancer_type_description" cols="30" rows="10">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. In optio deserunt tempore fuga. Praesentium ducimus maiores nisi repudiandae rem itaque ipsam quasi accusamus ea, eaque minus sunt consequuntur, doloremque porro?
    </textarea>
    
    <button type="submit">add cancer type</button>
</form>
@endsection