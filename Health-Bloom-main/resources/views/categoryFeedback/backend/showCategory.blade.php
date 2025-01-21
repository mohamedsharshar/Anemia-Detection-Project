@extends('categoryFeedback.layout')
@section('content')
<div class="card">
  <div class="card-header">Category {{ $categories->id }}</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">Id : {{ $categories->id }}</h5>
        <p class="card-text">Name : {{ $categories->categoryName }}</p>
        <p>Created : <small class="text-muted">{{ $categories->created_at?->format('d/m/Y H:i:s') }}</small></p>
        <p>Last Update : <small class="text-muted">{{ $categories->updated_at?->format('d/m/Y H:i:s') }}</small></p>
  </div>
      
    </hr>
  
  </div>
</div>