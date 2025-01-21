@extends('feedback.layout')
@section('content')
@livewireStyles
  <div class="row">
     <div class="col-md-6 col-1g-4 " style="margin-left: 340px">
         <form action="{{ route('feedback.update',['feedback'=>$feedback->id]) }}" method="post" class="card">
             <div class="card-header">
                 <i class="fas fa-circle-edit"></i> Update Feedback
            </div>
             <div class="card-body">
                @csrf
                @method('put')
                <div class="mb-3">
                    <input type="hidden" name= "id" value="{{ old('id', $feedback->id) }}">
                     <label for="" class= "form-labe1"> Name</label>
                     <input type="text" name= "name" value="{{ old('name', $feedback->name) }}"
                      class= "form-control @error('name') is-invalid @enderror">
                     @error('name')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                     @enderror
                </div>

                <div class="mb-3">
                     <label for="" class= "form-labe1"> Description</label>
                     <input type="text" name= "description" value="{{ old('description',$feedback->description) }}"
                      class= "form-control @error('description') is-invalid @enderror">
                     @error('description')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                     @enderror
                </div>

                <div class="mb-3">
                  <!-- <label for="" class= "form-labe1"> status </label> -->
                  <select name= "status" value="{{ old('status', $feedback->status) }}"
                        class= "form-control @error('status') is-invalid @enderror" class="form-control" hidden>
                    <option value="0">Activé</option>
                    <option value="1">Archivé</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="" class= "form-labe1"> Rating </label>
                  <input type="text" name= "rating" value="{{ old('rating', $feedback->rating) }}"
                   class= "form-control @error('rating') is-invalid @enderror">
                  @error('rating')
                       <div class="invalid-feedback">
                           {{ $message }}
                       </div>
                  @enderror
              </div>
            </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit" style="background-color: #00D9A5">
                        <i class="fas fa-database" ></i>
                        Update
                    </button>
                </div>
                
        </form>
        
    </div>
  </div>
  @livewireScripts
  @endsection  
 