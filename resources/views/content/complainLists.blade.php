@extends('layouts.master')

@section('content')

<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="accordion accordion-flush" id="accordionFlushExample">

                @foreach ($complaintList as $complaint)

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="{{"flush-heading" . $loop->index}}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#{{"flush-collapse" . $loop->index}}" aria-expanded="false"
                                aria-controls="{{"flush-collapse" . $loop->index}}">
                                {{$complaint['email']}}
                            </button>
                        </h2>
                        <div id="{{"flush-collapse" . $loop->index}}" class="accordion-collapse collapse"
                            aria-labelledby="{{"flush-heading" . $loop->index}}" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="image">
                                    <img src="{{ asset($complaint['file']) }}" alt="" height="200px" width="200px">
                                </div>
                                <p>
                                    {{$complaint['details']}}
                                </p>
                                <div class="action">
                                    <form action="{{route('complain.destroy', $complaint->id)}}" method="POST">
                                        @csrf
                                        @method('Delete')
                                        <input type="submit" name="delete" value="Resolved" class="btn btn-info">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@if(session()->has('success'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true,
        }
        toastr.success("{{session('success')}}", 'Successs!', { timeOut: 12000 });
    </script>
@endif

@if (session()->has('error'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true,
        }
        toastr.error("{{session('error')}}", 'Oops!', { timeOut: 12000 });
    </script>
@endif

@endsection