@extends('categoryFeedback.layout')
@section('content')
<div class="card">
  <div class="card-header">Update Page</div>
  <div class="card-body">
      
      <form action="{{ url('category/' .$categories->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$categories->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="categoryName" id="categoryName" value="{{$categories->categoryName}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop