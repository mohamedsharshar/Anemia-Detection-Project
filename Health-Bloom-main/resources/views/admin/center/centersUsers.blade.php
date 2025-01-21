
@extends('admin.center.layout')
@section('content')  
  <div class="page-section bg-light">
    <div class="container">
      
      <h1 class="text-center wow fadeInUp">Our Centers</h1>

      <div class="row mt-5" >
         @foreach($centers as $item)

        <div class="col-lg-4 py-2 wow zoomIn" >

          <div class="card-blog" >
            <div class="header">
             
              <a href="{{ url('/centerUser/' . $item->id ) }}" class="post-thumb">
                <img width="150" src="imagecenter/{{$item->imagecenter}}" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="{{ url('/centerUser/' . $item->id ) }}">  {{ $item->name }}</a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                  <span><i class="fa fa-envelope-o" aria-hidden="true"></i> {{$item->email}}</span>
                </div>
               
                <i class="fa-sharp fa-solid fa fa-phone"></i>  {{$item->phone}}
              </div>
            </div>
            <button  class="btn btn-primary" title="services" ><i class="fa fa-trash-o" aria-hidden="true"></i>
                                            <a href="{{url('/centerUser/service', $item->id)}}">show center services</a>
                                            </button>
          </div>
            
        </div>
                @endforeach

</div>

      

      </div>
    </div>
  </div> <!-- .page-section -->

@endsection