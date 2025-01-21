@extends('services.layoutAdmin')
@section('content')
<div class="card">
  <div class="card-header">Material Page</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">Name : {{ $materials->name }} Reference : {{ $materials->reference }} </h5>
        <p class="card-text">Description : {{ $materials->description }}</p>
        <p class="card-text">Price : {{ $materials->price }}</p>
        <p class="card-text">Number of items : {{ $materials->nbItems }}</p>
        <p class="card-text">Status : {{ $materials->status }}</p>
  </div>
  <a href="{{ url('/center/serviceAdmin/material/'.$materials->service_id) }}" class="btn btn-success btn-sm" title="Back">
    <i class="fa fa-plus" aria-hidden="true"></i> Back
  </a>
    </hr>
  </div>
</div>
@endsection