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
                    data-bs-target="#exampleNewBookModal">
                    New Book
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleNewBookModal" tabindex="-1"
                    aria-labelledby="exampleNewBookModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleNewBookModalLabel">Enter New Book information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    <!--begin::Row-->
                                    <div class="row g-3">
                                        <!--begin::Col-->
                                        <div class="col-md-12">
                                            <label for="validationCustom01" class="form-label">Title</label>
                                            <input type="text" class="form-control" name="title" id="validationCustom01"
                                                value="{{old('title')}}" />
                                            <div class="feedback">
                                                @error('title')
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


                                        <!--begin::Col-->
                                        <div class="col-md-6">
                                            <label for="exampleSelect" class="form-label">Author</label>
                                            <select class="form-control" name="author_id" id="exampleSelect" multiple
                                                aria-label="Multiple select example">
                                                @if(isset($bind['authors']))
                                                    <option selected hidden disabled>Select an author</option>
                                                    @foreach($bind['authors'] as $author)
                                                        <option value="{{$author['author_id']}}">
                                                            {{$author['fullname']}}
                                                        </option>
                                                    @endforeach
                                                    @if($bind['authors']->isEmpty())
                                                        <option value="">No author found</option>
                                                    @endif
                                                @endif
                                            </select>
                                            <div class="feedback">
                                                @error('author')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end::Col-->


                                        <!--begin::Col-->
                                        <div class="col-md-6">
                                            <label for="validationCustomGenre" class="form-label">Genre</label>
                                            <select class="form-control" name="genre_id" id="validationCustomGenre"
                                                multiple aria-label="Multiple select example">
                                                @if(isset($bind['genres']))
                                                    <option selected hidden disabled>Select a genre</option>
                                                    @foreach($bind['genres'] as $genre)
                                                        <option value="{{$genre['genre_id']}}">
                                                            {{$genre['name']}}
                                                        </option>
                                                    @endforeach
                                                    @if($bind['genres']->isEmpty())
                                                        <option value="">No genre found</option>
                                                    @endif
                                                @endif
                                            </select>
                                            <div class="feedback">
                                                @error('genre')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-6">
                                            <label for="validationCustomStock" class="form-label">Stock</label>
                                            <input type="text" class="form-control" name="stock"
                                                id="validationCustomStock" value="{{old('stock')}}" />
                                            <div class="feedback">
                                                @error('stock')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-6">
                                            <label for="validationCustomStatus" class="form-label">Availability</label>
                                            <select class="form-control" name="status" id="validationCustomGenre">
                                                <option selected hidden>Select availability</option>
                                                <option value="true">Availabile</option>
                                                <option value="false">Not Availabile</option>
                                            </select>
                                            <div class="feedback">
                                                @error('status')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-6">
                                            <label for="validationCustomImage" class="form-label">Cover</label>
                                            <input type="file" class="form-control" name="cover"
                                                id="validationCustomImage" accept="jpg png jpeg webp" />
                                            <div class="feedback">
                                                @error('cover')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add New Book</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Row-->



        <!--begin::Row-->
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Author</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($books))
                        @foreach($books as $book)
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <img src="{{ Storage::path('' . '\\public\\books\\OP9Rv4MUdWU3nyRkYTEH76jaEnp9UtRRlaI1NKMI.jpg') }}"
                                        alt="Book Cover Page" class="img-thumbnail" style="width: 100px; height: 100px;">
                                </td>
                                <td>{{$book->title}}</td>
                                <td>{{$book->description}}</td>
                                <td>
                                    @foreach($book->authors as $author)
                                        {{$author->fullname . ', '}}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($book->genres as $genre)
                                        {{$genre->name . ', '}}
                                    @endforeach
                                </td>
                                <td>{{$book->stock}}</td>
                                <td>{{$book->status === 1 ? 'Available' : 'Not Available'}}</td>
                                <td class="d-flex align-items-center gap-2">
                                    <div class="del">
                                        <form action="{{route('books.destroy', $book->book_id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="edit">
                                        <form action="{{route('books.edit', $book->book_id)}}" method="GET">
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
                        @if($books->isEmpty())
                            <tr>
                                <td colspan="9" class="text-center">No books found</td>
                            </tr>
                        @endif
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection