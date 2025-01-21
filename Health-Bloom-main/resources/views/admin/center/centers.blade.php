    @extends('admin.center.layoutAdmin')
    @section('content')
       
        <div class=" grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <ul class="navbar-nav ">
               
            </ul>
            
              <div class="search"  width:80%;
          text-align:15px;
          padding-top:15px;
          padding-bottom:15px;>
                  <input type="search" name="search" id="search" placeholder="Search Something here" class="form-control">
              </div>
                    <h4 class="card-title ml-5 mt-5">  Centers List</h4>
                    <a href="{{ url('/center/create') }}" type="button" class="btn btn-primary " style="width:300px">Ajouter un nouveau centre</a>
                    </p>
          
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody id="Content">
                             @foreach($centers as $item)
                          <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{$item->phone }}</td>
                            <td>
                                <!-- <a href="{{ route('center.show',['center'=>$item->id])}}" title="View Center"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> -->
                                <a href="{{ url('/center/' . $item->id . '/edit') }}" title="Edit Center"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                     <form method="POST" action="{{ url('/center' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                            <a href="{{ url('/center/serviceAdmin/' . $item->id) }}" title="List Service"><button class="btn btn-warning btn-sm "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Services List</button></a>
                                            <a href="{{ url('/center/serviceAdmin/' . $item->id . '/create') }}" title="create Service"><button class="btn btn-success btn-sm "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add New Service</button></a>
                                      </form>
                            </td>                      
                            </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              </div>

  <script type="text/javascript"> 
    $('#search').on('keyup',function() {
    $value=$(this).val();
    $.ajax({
        type:'get',
        url:'{{URL::to('search')}}',
        data:{'search':$value},

        success:function(data){
          console.log(data);
          $('#Content').html(data);
        }
    });
    })
  </script>
  @endsection