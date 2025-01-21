<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Health Bloom Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">

    <!-- endinject -->
    <!-- Plugin css for this page -->
            <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
            <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
            <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
            <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
<base href="/public" />

    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
                <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/style.css') }}">

    <!-- End layout styles -->
                    <link rel="stylesheet" href="{{ URL::asset('admin/assets/images/favicon.png') }}">

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
              <h3 class="page-title"> Edit Center </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Centers</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Update Center</li>
                </ol>
              </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ url('center/' .$centers->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")

                      <div class="form-group">
                        <label for="name">Center Name</label>
                        <input type="text" class="@error('name') is-invalid @enderror" style="color:#0090e7" name="name" placeholder="Center Name"  value="{{$centers->name}}" required="">
                          @error('name')
                       <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                       <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="@error('description') is-invalid @enderror"  style="color:#0090e7" name="description" placeholder="Description" value="{{$centers->description}}" required="">
                         @error('description')
                       <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="@error('address') is-invalid @enderror" style="color:#0090e7" name="address" placeholder="Address" value="{{$centers->address}}" required="">
                        @error('address')
                       <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                       <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="@error('email') is-invalid @enderror" style="color:#0090e7" name="email" placeholder="Email" value="{{$centers->email}}" required="">
                         @error('email')
                       <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="phonenumber">Phone Number</label>
                        <input type="number" class="@error('phone') is-invalid @enderror" style="color:#0090e7" name="phone" placeholder="Phone Number" value="{{$centers->phone}}" required="">
                       @error('phone')
                       <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                     
                       <div class="form-group">
                        <label for="category">Category</label>
                       <select id="departement" class="custom-select" name="categorycenter">
                          <option>---Select Category---</option> 
                                 @foreach($categoriescenter as $categorycenter)
                           <option value="{{$categorycenter->id}}">{{$categorycenter->categoryName}}</option>

                                @endforeach
                        </select> 
                      </div>
                      <div class="form-group">
                        <label>Old Image</label>
                        <img width="150" height="auto" src="imagecenter/{{$centers->imagecenter}}" />
                      </div>
                      <div class="form-group">
                        <label>Center Image</label>
                        <input type="file" name="file" value="imagecenter" required="" >
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-dark">Cancel</button>
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
<script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="admin/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>    <!-- End custom js for this page -->
  </body>
</html>