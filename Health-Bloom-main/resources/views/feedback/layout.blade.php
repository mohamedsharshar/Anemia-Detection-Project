<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>Health Bloom - Medical Center</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"/>

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">

  @livewireStyles
</head>
<header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">Health</span>-Bloom</a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('home')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('specialists')}}">Specialists</a>
            </li>
            

            @if(Route::has('login'))

            @auth
            <li class="nav-item">
              <a class="nav-link" href="{{url('centerUser')}}">Centers</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="{{url('myappointment')}}">My Appointment</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/feedback">My Feedback</a>
            </li>
            @if(auth()->user())
          <li class="nav-item">
            <a class="nav-link" href=""
                ><i class="fa-solid fa-bell"></i> <span id="js-count">{{
                auth()->user()->unreadNotifications->count()
                }}</span></a>
        </li>
        @endif

            <x-app-layout>
            </x-app-layout>

            @else

            <li class="nav-item">
                <a class="btn btn-primary ml-lg-3" href="{{route('login')}}">Login</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-primary ml-lg-3" href="{{route('register')}}">Register</a>
            </li>

            @endauth

            @endif

          </ul>
        </div>
         <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>
<body>

    <div class="hero-section" style="color: #00D9A5">
      <div class="container text-center wow zoomIn">
        <h1 class="display-4">Customer Feedback</h1>
        <!-- <a href="#" class="btn btn-primary">Let's Consult</a> -->
      </div>
    </div>

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
<div class="container">
   @yield('content')
 </div>

