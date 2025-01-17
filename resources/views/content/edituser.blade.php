@extends('layouts.master')

@section('content')
<div class="col-md-8 mx-auto my-auto">
    <div class="my-2">
        <h1>Edit user data</h1>
    </div>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="..." class="rounded me-2" alt="...">
            <strong class="me-auto">Bootstrap</strong>
            <small class="text-body-secondary">11 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Hello, world! This is a toast message.
        </div>
    </div>
    <div class="bg-white py-4">
        @if(isset($error) && $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @else

            <form action="{{isset($user) ? route('users.update', $user->id) : '#'}}" method="post">
                @method('PUT')
                @csrf
                <!--begin::Row-->
                <div class="row g-3">
                    <!--begin::Col-->
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">First name</label>
                        <input type="text" class="form-control" name="firstname" id="validationCustom01"
                            value="{{old('firstname', $user->firstname)}}" />
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
                            value="{{old('lastname', $user->lastname)}}" />
                        <div class="feedback">
                            @error('lastname')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-12">
                        <label for="validationCustomUsername" class="form-label">Username</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend"><b>@</b></span>
                            <input type="text" class="form-control" name="username" id="validationCustomUsername"
                                aria-describedby="inputGroupPrepend" value="{{old('username', $user->username)}}" />
                        </div>
                        <div class="feedback">
                            @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">City</label>
                        <input type="text" class="form-control" name="city" id="validationCustom03"
                            value="{{old('city', $user->city)}}" />
                        <div class="feedback">
                            @error('city')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <div class="row my-3">
                    <!-- /.col -->
                    <div class="col">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <!--end::Row-->
            </form>
        @endif
    </div>
</div>
@endsection