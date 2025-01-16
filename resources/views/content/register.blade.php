@extends('layouts.master')

@section('content')

<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Registration Form</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registration Form</li>
                </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>

<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row g-4">

            <!--begin::Col-->
            <div class="col-md-6">
                <!--begin::Form Validation-->
                <div class="card card-info card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Form Validation</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form class="needs-validation" action="{{route('register.store')}}" method="POST">
                        @method('POST')
                        @csrf
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Row-->
                            <div class="row g-3">
                                <!--begin::Col-->
                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">First name</label>
                                    <input type="text" class="form-control" name="firstname" id="validationCustom01"
                                        value="{{old('firstname')}}" />
                                    <div class="feedback">
                                        @error('firstname')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">Last name</label>
                                    <input type="text" class="form-control" name="lastname" id="validationCustom02"
                                        value="{{old('lastname')}}" />
                                    <div class="feedback">
                                        @error('lastname')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6">
                                    <label for="validationCustomUsername" class="form-label">Username</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input type="text" class="form-control" name="username"
                                            id="validationCustomUsername" aria-describedby="inputGroupPrepend"
                                            value="{{old('username')}}" />
                                    </div>
                                    <div class="feedback">
                                        @error('username')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6">
                                    <label for="validationCustom03" class="form-label">City</label>
                                    <input type="text" class="form-control" name="city" id="validationCustom03"
                                        value="{{old('city')}}" />
                                    <div class="feedback">
                                        @error('city')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6">
                                    <label for="validationCustom04" class="form-label">State</label>
                                    <select class="form-select" name="state" id="validationCustom04">
                                        <option selected disabled value="">Choose...</option>
                                        <option value="Bagmati">Bagmati</option>
                                        <option value="Koshi">Koshi</option>
                                        <option value="Gandaki">Gandaki</option>
                                    </select>

                                    <div class="feedback">
                                        @error('state')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6">
                                    <label for="validationCustom05" class="form-label">Zip</label>
                                    <input type="text" class="form-control" name="zipcode" id="validationCustom05"
                                        value="{{old('zipcode')}}" />
                                    <div class="feedback">
                                        @error('zipcode')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" name="tnc" type="checkbox" id="invalidCheck"
                                            {{old('tnc') ? 'checked' : ''}} />
                                        <label class="form-check-label" for="invalidCheck">
                                            Agree to terms and conditions
                                        </label>
                                        <div class="feedback">
                                            @error('tnc')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer">
                            <button class="btn btn-info" type="submit">Submit form</button>
                        </div>
                        <!--end::Footer-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Form Validation-->
            </div>
            <!--end::Col-->

            {{----}}
            <div class="col-md-6">
                @if (session('data'))
                    <h1>Following Data was received</h1>
                    <ul>
                        @foreach (session('data') as $field => $item)
                            <li>{{ucfirst($field) . ": " . $item}}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content-->

@endsection