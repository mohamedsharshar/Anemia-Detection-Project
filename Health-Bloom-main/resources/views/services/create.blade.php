@extends('services.layoutAdmin')
@section('content')
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Add Service </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('/center/serviceAdmin/'.$centers->id) }}">Services</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Service</li>
                </ol>
              </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                <form class="forms-sample" action="{{ url('/serviceAdmin/')}}" method="POST">
                {!! csrf_field() !!}
                    @csrf
                    <input type="hidden" name="center_id" id="center_id" value="{{$centers->id}}" />
                      <div class="form-group">
                        <label for="name">Service Name</label>
                        <input type="text" class="@error('name') is-invalid @enderror form-control" style="color:#0090e7" id="name" name="name" placeholder="Service Name" required="">
                        @error('name')
                       <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                       <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="@error('description') is-invalid @enderror form-control" style="color:#0090e7" name="description" placeholder="Description" required="">
                        @error('description')
                       <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                      <label for="duration">Duration</label>
                        <select class="js-example-basic-single" style="width:100%; color:#0090e7" id='duration' name='duration' required="required">
                        <option value="30min">30 min</option>
                        <option value="1h">1h</option>
                        <option value="2h">2h</option>
                        <option value="3h">3h</option>
                        <option value="4h">4h</option>
                      </select>
                        </div>
                       <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="@error('price') is-invalid @enderror form-control" style="color:#0090e7" name="price" id="price" placeholder="Price" required="">
                        @error('price')
                       <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <input type="submit" value="Save" class="btn btn-success">
                      <a href="{{ url('/center/serviceAdmin/'.$centers->id) }}" class="btn btn-primary" title="Back"><i class="fa fa-plus" aria-hidden="true" ></i> Back</a>
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