@extends('layout')

@section('page_title')
Cancer Treatment Enquiry
@endsection

@section('content')
<style>
    .col-sm-8 {
        padding: padding 30px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <h3>Cancer Treatment Enquiry</h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-lg-6">
            <form action="{{ route('treatment_enquiry') }}" class="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row form-group">
                    <label for="fullname"><?= ucwords('Full Name') ?>: <span class="text-danger">*</span></label>
                    <div class="col-sm-8"></div>
                    <input type="text" class="form-control" name="fullname" id="fullname" required>
                </div>
                <div class="row form-group">
                    <label for="email"><?= ucfirst('email') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-8"></div>
                    <input type="text" class="form-control" name="email" id="email" required>
                </div>
                <div class="row form-group">
                    <label for="password"><?= ucwords('password') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-8"></div>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="row form-group">
                    <label for="contact_no"><?= ucwords('contact no') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-8"></div>
                    <input type="text" class="form-control" name="contact_no" id="contact_no" required>
                </div>
                <div class="row form-group">
                    <label for="cancer_type"><?= ucwords('cancer type') ?>: <span class="text-danger">*</span></label>

                    <select type="text" class="form-control" name="cancer_type" id="cancer_type">
                        <option value=""><?= ucwords('Select cancer type') ?></option>
                        <option value="throat"><?= ucfirst('throat') ?></option>
                    </select>

                </div>
                <div class="row form-group">
                    <label for="address"><?= ucwords('address') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-8"></div>
                    <input type="text" class="form-control" name="address" id="address" required>
                </div>
                <div class="row form-group">
                    <label for="country"><?= ucwords('country') ?> <span class="text-danger"></span></label>
                    <div class="col-sm-8"></div>
                    <input type="text" class="form-control" name="country" id="country" value="India" readonly required>
                </div>
                <div class="row form-group">
                    <label for="state" class="col-form-label"><?= ucwords('state') ?>: <span class="text-danger">*</span></label>

                    <select type="text" class="form-control" name="state" id="state">
                        <option value=""><?= ucwords('Select state') ?></option>
                        <option value="throat"><?= ucfirst('maharashtra') ?></option>
                    </select>

                </div>
                <div class="row form-group">
                    <label for="city"><?= ucwords('City') ?>: <span class="text-danger">*</span></label>

                    <select type="text" class="form-control" name="city" id="city">
                        <option value=""><?= ucwords('Select city') ?></option>
                        <option value="throat"><?= ucwords('airoli') ?></option>
                    </select>

                </div>
                <div class="row form-group">
                    <label for="pincode"><?= ucwords('pincode') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-8"></div>
                    <input type="text" class="form-control" name="pincode" id="pincode" required>
                </div>
                <div class="row form-group">
                    <label for="documents"><?= ucwords('documents') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-8"></div>
                    <input type="file" class="form-control" name="documents" id="documents" multiple required>
                </div>
                <div class="row justify-content-center">
                    <input type="submit" class="btn btn-info" value="Submit Enquiry">

                </div>
            </form>
        </div>
    </div>
</div>
@endsection