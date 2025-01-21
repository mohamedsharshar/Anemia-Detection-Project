
@extends('feedback.backend.layoutBack')
@section('content')
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
<form action="?" class="col-auto ms-auto">
    <div class='input-group'>
      <input type="text" name="search" value="{{request()->search}}" placeholder="Search" class="form-control">
      <button class="btn btn-secondary" type="submit" style="background-color:rgba(35, 241, 197, 0.521)">
        Go. !
      </button>
    </div>
  </form>
    <div class="card-body p-0">
        <table class="table table-striped table-hover m-0">
           <thead>
               <tr>
                   <th>User Name</th>
                   <th>Center Name</th>
                   <th>Feedback</th>
                   <th>Description</th>
                   <th>Rating</th>
                   <th>Action</th>
               </tr>
           </thead>
            <tbody>@foreach ($feedbacks as $feedback )
                
               
                   <tr>
                       <td>
                        @foreach ($users as $user )
                        
                            @if($user->id == $feedback->user_id)
                                {{ $user->name }}
                            @endif
                        @endforeach
                        
                    </td>
                       <td>{{ $feedback->center_id }}</td>
                       <td>{{ $feedback->name }}</td>
                       <td>{{ $feedback->description }}</td>
                       <td>{{ $feedback->rating }}</td>
                        <td>
                            <a href="{{ route('feedbackAdmin.show',['feedbackAdmin'=>$feedback->id])}}" class="btn btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>

                            {{-- <a href="{{ url('feedbackAdmin/download/'.$feedback->id)}}" class="btn btn-sm">
                                <i class="fas fa-download">Download</i>
                            </a> --}}
                            
                        </td>

                       
                   </tr>
               
               @endforeach
           </tbody>
        </table>
    </div>
    {{-- <div class="card-body pb-0">
        {{ $feedbacks->appends(['search'=>request()->search])->links('vendor.pagination.bootstrap-4')}}
    </div> --}}
</div>

@endsection