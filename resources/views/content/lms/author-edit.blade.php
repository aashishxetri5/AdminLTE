@extends('layouts.master')

@section('content')
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row mb-4">

            <form action="{{route('authors.update', $author->author_id)}}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <!--begin::Row-->
                    <div class="row g-3">
                        <!--begin::Col-->
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Fullname</label>
                            <input type="text" class="form-control" name="fullname" id="validationCustom01"
                                value="{{$author->fullname}}" />
                            <div class="feedback">
                                @error('fullname')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-12">
                            <label for="validationCustomEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="validationCustom01"
                                value="{{$author->email}}" />
                            <div class="feedback">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                </div>
                <div class="">
                    <a href="{{route('authors.index')}}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Update Author</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection