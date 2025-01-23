@extends('layouts.master')

@section('content')

<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row mb-4">
            <form action="{{route('genres.update', $genre->genre_id)}}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <!--begin::Row-->
                    <div class="row g-3">
                        <!--begin::Col-->
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Genre Name</label>
                            <input type="text" class="form-control" name="name" id="validationCustom01"
                                value="{{$genre->name}}" />
                            <div class="feedback">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>

                    <div class="col-12">
                        <label for="validationCustomDesc" class="form-label">Description</label>
                        <textarea class="form-control" name="description"
                            id="validationCustomDesc">{{$genre->description}}</textarea>
                        <div class="feedback">
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="">
                    <a href="{{route('genres.index')}}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Update Genre</button>
                </div>
            </form>
        </div>
    </div>

    @endsection