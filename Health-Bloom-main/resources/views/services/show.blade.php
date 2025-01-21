@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Service Details</h1>

    <!-- Check if the service exists -->
    @if($service)
        <div class="card">
            <div class="card-header">
                <h2>{{ $service->name }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Description:</strong> {{ $service->description }}</p>
                <p><strong>Phone:</strong> {{ $service->phone }}</p>
                <p><strong>Email:</strong> {{ $service->email }}</p>
                <p><strong>Address:</strong> {{ $service->address }}</p>
                <p><strong>Status:</strong> {{ $service->status ? 'Active' : 'Inactive' }}</p>
                <p><strong>Created At:</strong> {{ $service->created_at->format('M d, Y') }}</p>
                <p><strong>Updated At:</strong> {{ $service->updated_at->format('M d, Y') }}</p>

                <!-- Add any additional fields here -->

                <a href="{{ route('services.index') }}" class="btn btn-primary">Back to Services</a>
            </div>
        </div>
    @else
        <div class="alert alert-danger">
            <p>Service not found.</p>
        </div>
        <a href="{{ route('services.index') }}" class="btn btn-primary">Back to Services</a>
    @endif
</div>
@endsection
