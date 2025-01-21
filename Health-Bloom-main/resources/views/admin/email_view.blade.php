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
                    <h3 class="page-title"> Appointments Management </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Appointments</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Send Email</li>
                </ol>
              </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{url('sendemail', $data->id)}}" method="POST">

                    @csrf

                      <div class="form-group">
                        <label for="greeting">Greeting</label>
                        <input type="text" class="form-control" style="color:#0090e7" name="greeting" required="" >
                      </div>
                      <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" style="color:#0090e7" name="message" required=""></textarea>
                      </div>
                      <div class="form-group">
                        <label for="actiontext">Action Text</label>
                        <input type="text" class="form-control" style="color:#0090e7" name="actiontext" required="" >
                      </div>
                      <div class="form-group">
                        <label for="actionurl">Action URL</label>
                        <input type="text" class="form-control" style="color:#0090e7" name="actionurl" required="" >
                      </div>
                      <div class="form-group">
                        <label for="endpart">End Part</label>
                        <input type="text" class="form-control" style="color:#0090e7" name="endpart" required="" >
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <a class="btn btn-dark" href="{{url('showappointment')}}" >Cancel</a>
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