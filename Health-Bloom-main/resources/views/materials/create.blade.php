@extends('services.layoutAdmin')
@section('content')
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Add Material </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('/center/serviceAdmin/material/'.$services->id) }}">Materials</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Material</li>
                </ol>
              </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                <form class="forms-sample" action="{{ url('/serviceAdmin/material')}}" method="POST">
                {!! csrf_field() !!}
                    @csrf
                    <input type="hidden" name="service_id" id="service_id" value="{{$services->id}}" id="service_id" />
                      <div class="form-group">
                        <label for="reference">Reference Name</label>
                        <input type="text" class="form-control" style="color:#0090e7" id="reference" name="reference" placeholder="Service Reference" required="">
                      </div>
                      <div class="form-group">
                        <label for="name">Material Name</label>
                        <input type="text" class="form-control" style="color:#0090e7" id="name" name="name" placeholder="Service Name" required="">
                      </div>
                       <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" style="color:#0090e7" name="description" placeholder="Description" required="">
                      </div>
                       <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" style="color:#0090e7" name="price" id="price" placeholder="Price" required="">
                      </div>
                      <div class="form-group">
                        <label for="nbItems">Number of Items </label>
                        <input type="number" class="form-control" style="color:#0090e7" name="nbItems" id="nbItems" placeholder="Number of Items" required="">
                      </div>
                      <input type="submit" value="Save" class="btn btn-success">
                      <a href="{{ url('/center/serviceAdmin/material/'.$services->id) }}" class="btn btn-primary" title="Back"><i class="fa fa-plus" aria-hidden="true" ></i> Back</a>
                    </form>
                  </div>
                </div>
                </div>
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
@endsection