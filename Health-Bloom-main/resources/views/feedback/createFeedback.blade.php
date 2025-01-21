@extends('feedback.layout')
@section('content')
<div class="row">
     <div class="col-md-6 col-1g-4">
         <form action="{{ route('feedback.store') }}" method="post" class="card">
             <div class="card-header">
                 <i class="fas fa-circle-plus"></i> New Feedback
            </div>
             <div class="card-body">
                @csrf
                <div class="mb-3">
                     <label for="" class= "form-labe1"> Name</label>
                     <input type="text" name= "name" id="name"
                      class= "form-control @error('name') is-invalid @enderror">
                     @error('name')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                     @enderror
                </div>

                <div class="mb-3">
                     <label for="" class= "form-labe1"> Description</label>
                     <input type="text" name= "description" id="description"
                      class= "form-control @error('description') is-invalid @enderror">
                     @error('description')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                     @enderror
                </div>

        
            <div class="mb-3">
              <label for="" class= "form-labe1"> Status </label>
              <input type="text" name= "status" value="{{ old('status') }}"
              class= "form-control @error('status') is-invalid @enderror"> 
              @error('status')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  
                    <select name= "status" value="{{ old('status') }}"
                        class= "form-control @error('status') is-invalid @enderror" class="form-control">>
                    <option value="">--Please choose an option--</option>
                    <option value="0">Activé</option>
                    <option value="1">Archivé</option>
                    </select>
               @enderror
            </div>
            
            <div class="form-group">
                <label for="center_id">Center</label>
               <select id="center_id" class="custom-select" name="center_id">
               <option>---Select center---</option> 

             @foreach($centers as $center)

             <option value="{{$center->id}}">{{$center->name}}</option>

             @endforeach
     </select>
              </div>
             
                
 <div class="card-footer text-end">
     <button class="btn btn-primary" type="submit" style="background-color: #00D9A5">
        <i class="fas fa-database" ></i> 
        Save
    </button>
 </div>

        </form>
    </div>
</div>

@endsection