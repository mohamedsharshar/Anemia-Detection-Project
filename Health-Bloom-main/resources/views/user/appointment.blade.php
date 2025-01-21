<div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

      <form class="main-form" action="{{url('appointment')}}" method="POST">

      @csrf

        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" class="form-control" placeholder="Full name" name="name">
          </div>
          @error('name')
          <div class="alert alert-danger">*{{$message}}</div>
          @enderror
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" class="form-control" placeholder="Email address.." name="email">
          </div>
          @error('email')
          <div class="alert alert-danger">*{{$message}}</div>
          @enderror
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" class="form-control" name="date">
          </div>
          @error('date')
          <div class="alert alert-danger">*{{$message}}</div>
          @enderror
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select id="departement" class="custom-select" name="specialist">
              <option value="">---Select Specialist---</option>  
            
            @foreach($specialists as $specialist)

              <option value="{{$specialist->id}}">{{$specialist->name}} : {{$specialist->speciality}}</option>

            @endforeach

            </select>
          </div>
          @error('specialist')
          <div class="alert alert-danger">*{{$message}}</div>
          @enderror
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" class="form-control" placeholder="Number.." name="phone">
          </div>
          @error('phone')
          <div class="alert alert-danger">*{{$message}}</div>
          @enderror
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>

        <button type="submit" style="visibility: visible; animation-name: zoomIn; cursor: pointer; color: #fff; background-color: #00D9A5; border-color: transparent; padding: 8px 24px; -webkit-animation-name: zoomIn; animation-name: zoomIn; margin-top: 1rem !important; color: #fff; ">Submit Request</button>
      </form>
    </div>
  </div> <!-- .page-section -->