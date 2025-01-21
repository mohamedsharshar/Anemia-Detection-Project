@foreach($comments as $comment)
    <div style="margin-left: 60px;" class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <p><strong>{{ $comment->user->name }}</strong> : {{ $comment->body }}</p>
        <form method="POST" action="{{ url('/comments' . '/'. $comment->id ) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete category" onclick="return confirm(&quot;Confirm delete?&quot;)" style="background-color:rgba(255, 0, 0, 0.397)"> <i class="fas fa-trash"></i></button>
            
            
            
        </form>
        <a href="" id="reply"></a>
        <form action="{{ route('comments.store') }}" method="post" >
            @csrf
            <div class="form-group">
                <textarea type="text" name="body" class="form-control" placeholder="Reply to {{ $comment->user->name }}" ></textarea>
                <input type="hidden" name="feedback_id" value="{{ $feedback_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" style="background-color: aquamarine"/>
            </div>


        </form>
        @include('feedback.commentsDisplay', ['comments' => $comment->replies])
    </div>
@endforeach  