@extends('layout')

@section('page_title')
    Cancer Treatment Enquiry
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-end">
            <a href="{{ route('login') }}">Login</a>
        </div>
        <div class="row justify-content-center">
            <h3>Cancer Treatment Enquiry</h3>
        </div>
        @if (Session::has('success'))
            <div>
                <h5>{{ Session::get('success') }}</h5>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-8 col-lg-6">
                <form action="{{ route('save.enquiry') }}" class="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-group">
                        <label for="patient_name"><?= ucwords('Patient Full Name') ?>: <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="patient_name" id="patient_name"
                            value="Gaurav Heda">
                        @error('patient_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row form-group">
                        <label for="email"><?= ucfirst('email') ?> <span class="text-danger">*</span></label>
                        <div class="col-sm-8"></div>
                        <input type="text" class="form-control" name="email" id="email"
                            value="hedagaurav1378+cancer{{ random_int(1, 100) }}@gmail.com">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row form-group">
                        <label for="password"><?= ucwords('password') ?> <span class="text-danger">*</span></label>
                        <div class="col-sm-8"></div>
                        <input type="password" class="form-control" name="password" id="password" value="password">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="row form-group">
                        <label for="contact_no"><?= ucwords('contact no') ?> <span class="text-danger">*</span></label>
                        <div class="col-sm-8"></div>
                        <input type="text" class="form-control" name="contact_no" id="contact_no" value="8983037771">
                        @error('contact_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    <div class="row form-group">
                        <label for="cancer_type"><?= ucwords('cancer type') ?>: <span class="text-danger">*</span></label>
                        <select type="text" class="form-control" name="cancer_type" id="cancer_type" required>
                            <option value=""><?= ucwords('Select cancer type') ?></option>
                            @if ($cancer_types->count() > 0)
                                <?php $random = random_int(1, $cancer_types->count()); ?>
                                @foreach ($cancer_types as $cancer_type)
                                    <option value="{{ $cancer_type->id }}"
                                        {{ $cancer_type->id == $random ? 'selected' : '' }}>
                                        {{ ucfirst($cancer_type->cancer_name) }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('cancer_type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="row form-group">
                        <label for="address"><?= ucwords('address') ?> <span class="text-danger">*</span></label>
                        <div class="col-sm-8"></div>
                        <input type="text" class="form-control" name="address" id="address" value="bhiwandi">
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    {{-- <div class="row form-group">
                    <label for="country"><?= ucwords('country') ?> <span class="text-danger"></span></label>
                    <div class="col-sm-8"></div>
                    <input type="text" class="form-control" name="country" id="country" value="India" readonly >
                </div>
                <div class="row form-group">
                    <label for="state" class="col-form-label"><?= ucwords('state') ?>: <span class="text-danger">*</span></label>

                    <select type="text" class="form-control" name="state" id="state">
                        <option value=""><?= ucwords('Select state') ?></option>
                        <option value="maharashtra" selected><?= ucfirst('maharashtra') ?></option>
                    </select>
                    @error('state') <div class="text-danger">{{ $message}}</div>@enderror
                </div>
                <div class="row form-group">
                    <label for="city"><?= ucwords('City') ?>: <span class="text-danger">*</span></label>

                    <select type="text" class="form-control" name="city" id="city">
                        <option value=""><?= ucwords('Select city') ?></option>
                        <option value="airoli" selected><?= ucwords('airoli') ?></option>
                    </select>
                    @error('city') <div class="text-danger">{{ $message}}</div>@enderror
                </div>
                <div class="row form-group">
                    <label for="pincode"><?= ucwords('pincode') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-8"></div>
                    <input type="text" class="form-control" name="pincode" id="pincode" value="421302">
                    @error('pincode') <div class="text-danger">{{ $message}}</div>@enderror
                </div> --}}
                    {{-- <div class="row form-group">
                        <label for="documents"><?= ucwords('documents') ?> <span class="text-danger">*</span></label>
                        <div class="col-sm-8"></div>
                        <input type="file" class="form-control" name="documents" id="documents" multiple>
                        @error('documents')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    <div class="row justify-content-center">
                        <input type="submit" class="btn btn-info" value="Submit Enquiry">

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
