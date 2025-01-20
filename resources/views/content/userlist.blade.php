@extends('layouts.master')

@section('content')

<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">General Form</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-user"><a href="#">Home</a></li>
                    <li class="breadcrumb-user active" aria-current="page">General Form</li>
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
            <div class="col-md-12">
                {{--dd($users)--}}
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Firstname</th>
                            <th scope="col">Lastname</th>
                            <th scope="col">Username</th>
                            <th scope="col">City</th>
                            <th scope="col">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <th scope="row"> {{$key + 1}} </th>
                                <!-- <th scope="row"> {{$loop->index + 1}} </th> -->
                                <td>{{$user->firstname}}</td>
                                <td>{{$user->lastname}}</td>
                                <td>{{"@"}}{{$user->username}}</td>
                                <td>{{$user->city}}</td>
                                <td class="text-center">
                                    <div class="d-flex gap-3 justify-content-center">

                                        <form action="{{route("users.destroy", $user->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="text-danger bg-transparent border-0">
                                                <span class="bi bi-trash-fill"> Delete</span>
                                            </button>
                                        </form>

                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="text-danger bg-transparent border-0 text-decoration-none">
                                            <span class="bi bi-pencil-square"> Edit </span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $users->links('pagination::bootstrap-4') }}
                </div>

            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content-->

@endsection