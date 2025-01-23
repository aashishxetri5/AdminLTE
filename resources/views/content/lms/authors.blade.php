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
                    data-bs-target="#exampleNewauthorModal">
                    New Author
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleNewauthorModal" tabindex="-1"
                    aria-labelledby="exampleNewauthorModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleNewauthorModalLabel">Enter New author information
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{route('authors.store')}}" method="POST">
                                <div class="modal-body">
                                    @csrf
                                    <!--begin::Row-->
                                    <div class="row g-3">
                                        <!--begin::Col-->
                                        <div class="col-md-12">
                                            <label for="validationCustom01" class="form-label">Fullname</label>
                                            <input type="text" class="form-control" name="fullname"
                                                id="validationCustom01" value="{{old('fullname')}}" />
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
                                            <input type="email" class="form-control" name="email"
                                                id="validationCustom01" value="{{old('email')}}" />
                                            <div class="feedback">
                                                @error('email')
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
                                    <button type="submit" class="btn btn-primary">Add New Author</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Row-->

        <!--begin::Row-->
        <div class="row col-md-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($authors))
                        @foreach($authors as $author)
                            <tr>
                                <th class="" scope="row">{{$author->author_id}}</th>
                                <td class="">{{$author->fullname}}</td>
                                <td class="">{{$author->email}}</td>
                                <td class="d-flex align-items-center gap-2">
                                    <div>
                                        <form action="{{route('authors.destroy', $author->author_id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="edit">
                                        <form action="{{route('authors.edit', $author->author_id)}}" method="GET">
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
                        @if($authors->isEmpty())
                            <tr>
                                <td colspan="9" class="text-center">No authors found</td>
                            </tr>
                        @endif
                    @endif
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{  $authors->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection