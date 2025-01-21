@extends('admin.center.layout')

@section('content')
    <div class="page-section pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Check if the center exists -->
                    @if($centers)
                        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-primary">{{$centers->name}}</strong>
                                <h3 class="mb-0">
                                    <span><i class="fa-sharp fa-solid fa fa-phone"></i></span> {{$centers->phone}}
                                </h3>
                                <div class="mb-1 text-muted">
                                    <span><i class="fa fa-home"></i></span>  {{$centers->address}}
                                </div>
                                <p class="card-text mb-auto">{{$centers->description}}</p>
                                <a><i class="fa fa-envelope-o" aria-hidden="true"></i> {{$centers->email}}</a>
                            </div>
                            <div class="col-auto d-none d-lg-block">
                                <img width="150" src="{{ asset('imagecenter/' . $centers->imagecenter) }}" alt="Center Image">
                            </div>
                        </div>
                    @else
                        <div class="alert alert-danger">
                            <p>Center not found.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->
@endsection
