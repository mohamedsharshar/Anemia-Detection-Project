@extends('services.layoutAdmin')
@section('content')
<div class="card">
  <div class="card-body editForm">
      
      <form action="{{ url('/serviceAdmin/material/'.$materials->id) }}" method="post" >
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$materials->id}}" id="id" />
        <input type="hidden" name="service_id" id="service_id" value="{{$materials->service_id}}" id="id" />

        <label>Reference</label></br>
        <input type="text" name="reference" id="reference" value="{{$materials->reference}}" class="form-control"></br>

        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$materials->name}}" class="form-control"></br>

        <label>Description</label></br>
        <input type="text" name="description" id="description" value="{{$materials->description}}" class="form-control"></br>

        <label>Price</label></br>
        <input type="number" name="price" id="price" value="{{$materials->price}}" class="form-control"></br>

        <label>Number of items</label></br>
        <input type="number" name="nbItems" id="nbItems" value="{{$materials->nbItems}}" class="form-control"></br>
        
        <input type="submit" value="Update" class="btn btn-success">

        <a href="{{ url('/center/serviceAdmin/material/'.$materials->service_id) }}" class="btn btn-primary" title="Back">
    <i class="fa fa-plus" aria-hidden="true" ></i> Back
  </a>
  </br>
    </form>
  
  </div>
</div>
@endsection