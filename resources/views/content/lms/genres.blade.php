@extends('layouts.master')

@section('content')
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row mb-4">
            <div class="col-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleNewGenreModal">
                    New Genre
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleNewGenreModal" tabindex="-1"
                    aria-labelledby="exampleNewGenreModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleNewGenreModalLabel">Enter New Book information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{route('genres.store')}}" method="POST">
                                <div class="modal-body">
                                    @csrf
                                    <!--begin::Row-->
                                    <div class="row g-3">
                                        <!--begin::Col-->
                                        <div class="col-md-12">
                                            <label for="validationCustom01" class="form-label">Title</label>
                                            <input type="text" class="form-control" name="name" id="validationCustom01"
                                                value="{{old('name')}}" autofocus />
                                            <div class="feedback">
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-12">
                                            <label for="validationCustomDesc" class="form-label">Description</label>
                                            <textarea class="form-control" name="description"
                                                id="validationCustomDesc">{{old('description')}}</textarea>
                                            <div class="feedback">
                                                @error('description')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add New Genre</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Row-->

        <!--begin::Row-->
        <div class="row mx-auto col-md-11">
            <table class="table table-striped col-md-8">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($genres))
                        @foreach($genres as $genre)
                            <tr>
                                <th class="col-md-1" scope="row">{{$genre->genre_id}}</th>
                                <td class="col-md-2">{{$genre->name}}</td>
                                <td class="col-md-5">{{$genre->description}}</td>
                                
                                <td class="col-md-3 d-flex align-items-center gap-2">
                                    <div>
                                        <form action="{{route('genres.destroy', $genre->genre_id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="edit">
                                        <form action="{{route('genres.edit', $genre->genre_id)}}" method="GET">
                                            @csrf
                                            @method('GET')
                                            <button type="submit" class="btn btn-primary">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $genres->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

@endsection