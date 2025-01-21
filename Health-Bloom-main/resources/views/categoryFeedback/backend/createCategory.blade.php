@extends('categoryFeedback.backend.layout')
@section('content')
<div class="card">
  <div class="card-header">Add Category</div>
  <div class="card-body">
      
      <form action="{{ url('category') }}" method="post">
        {!! csrf_field() !!}
        <label>Name of the category</label></br>
        <input type="text" name="categoryName" id="categoryName" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop