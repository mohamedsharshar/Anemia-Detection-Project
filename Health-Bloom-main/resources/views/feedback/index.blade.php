@extends('feedback.layout')
@section('content')
@livewireStyles
    @if ( session ('store'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Saved Successfully! </strong> Feedback has been successfully saved.
            <button class= "btn-close" type="button" data-bs-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        </div
    @endif

    @if ( session ('update'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Updated Successfully! </strong> Feedback has been successfully updated.
            <button class= "btn-close" type="button" data-bs-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        </div>
    @endif

    @if ( session ('destroy'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> Delete Successfully! </strong> Feedback has been successfully Delete.
        <button class= "btn-close" type="button" data-bs-dismiss="alert"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif




    <div class="card mb-5">
     <div class="card-body">
         <div class="row">
             <div class="col-auto">
                 <a href="{{ route('feedback.create') }}" class= "btn btn-primary">
                     <i class="fas fa-circle-plus"></i> Add feedback
                 </a>
            </div>
            <form action="?" class="col-auto ms-auto">
              <div class='input-group'>
                <input type="text" name="search" value="{{request()->search}}" placeholder="Search" class="form-control">
                <button class="btn btn-secondary" type="submit" style="background-color:rgba(35, 241, 197, 0.521)">
                  Go. !
                </button>
              </div>
            </form>
        </div>
    </div>

    <div class="card-body p-0">
        <table class="table table-striped table-hover m-0">
           <thead>
               <tr>
                   <th>User Name</th>
                   <th>Center Name</th>
                   <th>Feedback</th>
                   <th>Description</th>
                   <th>Action</th>
               </tr>
           </thead>
            <tbody>
               @foreach ($feedbacks as $feedback )
                   <tr>
                       <td>
                        
                        @foreach ($users as $user )
                        @if($user->id == $feedback->user_id)
                        {{ $user->name }}
                    @endif
                        @endforeach
                        
                    </td>
                    @foreach ($centers as $center)
                      @if($center->id == $feedback->center_id)
                       <td>{{ $center->name }}</td>
                       @endif
                    @endforeach
                       <td>{{ $feedback->name }}</td>
                       <td>{{ $feedback->description }}</td>
                        <td>
                          @if($feedback->user_id == Auth::user()->id)
                            <a href="{{ route('feedback.show',['feedback'=>$feedback->id])}}" class="btn btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                        
                            <a href="{{ route('feedback.edit',['feedback'=>$feedback->id])}}" class="btn btn-sm">
                              <i class="fas fa-edit"></i>
                          </a>
                          
                            {{-- <button class="btn btn-sm" type="button" id="modalDelete" data-url="{{route('feedback.destroy',['feedback'=>$feedback->id])}}">
                              <i class="fas fa-trash"></i>
                            </button> --}}
                            <form method="POST" action="{{ url('/feedback' . '/' . $feedback->id) }}" accept-charset="UTF-8" style="display:inline">
                              {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-danger btn-sm" title="Delete category" onclick="return confirm(&quot;Confirm delete?&quot;)" style="background-color:rgba(255, 0, 0, 0.397)"> <i class="fas fa-trash"></i></button>
                              
                              
                              
                          </form>
                        @else
                        <a href="{{ route('feedback.show',['feedback'=>$feedback->id])}}" class="btn btn-sm">
                          <i class="fas fa-eye"></i>
                        </a>
                    
                       
                          <a style="float: right; margin-right:70px"><livewire:feedback-likes :feedback="$feedback"/> </a>
                        </td>
                      @endif
                        


                   </tr>
               @endforeach
           </tbody>
        </table>
        
    </div>
    <div class="card-body pb-0">
      {{ $feedbacks->appends(['search'=>request()->search])->links('vendor.pagination.bootstrap-4')}}
    </div>
</div>
@livewireScripts
@endsection


@push('modal')
<div class="modal" tabindex="-1" id="modalDelete">
  <div class="modal-dialog">
    <form action="#" method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fas fa-trash"></i> Delete 
        </h5>
        <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
      </div>
      <div class="modal-body">
        @csrf
        @method('delete')
        <p> Are you sure it will be deleted ? </p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
        <button class="btn btn-danger" type="submit">Yes, Delete ! </button>
      </div>
    </form>
  </div>
</div>
@endpush

@push('js')
<script>
  $(function(){
    let modalDelete = new bootstrap.Modal( $('#modalDelete'));
    $('.delete').click(function(){
      let url = $(this).attr('data-url');
      $('#modalDelete form').attr('action', url);
      modalDelete.show();
    });
  })
  </script>
@endpush
