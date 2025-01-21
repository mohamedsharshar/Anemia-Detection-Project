
@extends('feedback.backend.layoutBack')
@section('content')
@if ( session ('destroy'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> Delete Successfully! </strong> Comment has been successfully Delete.
    <button class= "btn-close" type="button" data-bs-dismiss="alert"><span aria-hidden="true">&times;</span></button>
</div>
@endif
<div class="card">
    <div class="card-header">Feedback details</div>
    <div class="card-body">

    {{-- <p>ID : {{ $feedback->id }}</p> --}}
    <p>Name : <strong>{{ $feedback->name }}</strong></p>
    <p>Description : {{ $feedback->description }}</p>
    <p>Rating : {{ $feedback->rating }}</p>
    <p>Created : <small class="text-muted">{{ $feedback->created_at?->format('d/m/Y H:i:s') }}</small></p>
    <p>Last Update : <small class="text-muted">{{ $feedback->updated_at?->format('d/m/Y H:i:s') }}</small></p>

    </div>

    @include('feedback.commentsDisplay', ['comments' => $feedback->comments, 'feedback_id' => $feedback->id]) 

    <hr />
    
    <form method="post" action="{{ route('comments.store') }}">
        @csrf
        <div class="form-group">
            <textarea class="form-control" name="body" placeholder="Add comment..."></textarea>
            <input type="hidden" name="feedback_id" value="{{ $feedback->id }}" />
        </div>
        <div class="form-group">
            <input type="submit" style="background-color: rgb(65, 209, 65) " class="btn btn-success" value="Add Comment" />
           
            {{-- <button class="btn btn-sm" type="button" action="{{route('comments.destroy',['comments'=>$comments->id])}}">
                <i class="fas fa-trash"></i>
              </button> --}}
        </div>
    </form>
</div>

@endsection