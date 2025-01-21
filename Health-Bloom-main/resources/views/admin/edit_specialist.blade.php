<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public" />
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
          
        @if(session()->has('message'))
        <div class="alert alert-success">
          <button type="button" class="close" data-bs-dismiss="alert">X</button>
          {{session()->get('message')}}
        </div>
        @endif
        
        <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Edit Specialist </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Specialists</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Specialist</li>
                </ol>
              </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{url('updatespecialist', $specialist->id)}}" method="POST" enctype="multipart/form-data">

                    @csrf

                      <div class="form-group">
                        <label for="specialistname">Specialist Name</label>
                        <input type="text" class="form-control" style="color:#0090e7" name="specialistname" placeholder="Specialist Name" required="" value="{{$specialist->name}}">
                      </div>
                      <div class="form-group">
                        <label for="phonenumber">Phone Number</label>
                        <input type="number" class="form-control" style="color:#0090e7" name="phonenumber" placeholder="Phone Number" required="" value="{{$specialist->phone}}">
                      </div>
                      <div class="form-group">
                        <label for="speciality">Speciality</label>
                        <select class="js-example-basic-single" style="width:100%; color:#0090e7" name='speciality' required="">
                        <option disabled>--Select Speciality-- </option>
                        <option value="Paramedic">Paramedic</option>
                        <option value="Nutritionist">Nutritionist</option>
                        <option value="Physiotherapist">Physiotherapist</option>
                        <option value="Advisor">Advisor</option>
                        <option value="Fitness Trainer">Fitness Trainer</option>
                      </select>
                      </div>
                      <div class="form-group">
                        <label>Old Image</label>
                        <img width="150" height="auto" src="specialistimage/{{$specialist->image}}" />
                      </div>
                      <div class="form-group">
                        <label>Change Image</label>
                        <input type="file" name="file" ><!-- class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>-->
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <a class="btn btn-dark" href="{{url('show_specialist_view')}}" >Cancel</a>
                    </form>
                  </div>
                </div>
                </div>
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
    @stack('modal')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

    <script src="{{ asset('js/jquery.slim.min.js')}}"></script>
    <script src="{{ asset('bs/js/bootstrap.min.js')}}"></script>
    @stack('js')
    
    <script> 
      window.User = {
          id: {{ optional(auth()->user())->id }}
      }
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/livewire/livewire.js?id=36e5f3515222d88e5c4a"></script>
<script>
window.livewire = new Livewire();

document.addEventListener("DOMContentLoaded", function () {
    window.livewire.start();
}
);
</script>
    @livewireScripts
  </body>
</html>