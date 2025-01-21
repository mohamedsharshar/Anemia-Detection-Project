   @extends('admin.center.layoutAdmin')
    @section('content')
        
        <div class=" grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Categories List</h4>
                     <a href="{{ url('/categorycenter/create') }}" type="button" class="btn btn-primary btn-fw">Ajouter une nouvelle catégorie</a>

                    </p>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                          
                          </tr>
                        </thead>
                        <tbody>
                             @foreach($categoriescenter as $item)
                          <tr>
                            <td>{{ $item->categoryName }}</td>
                             <td>
                                <a href="{{ url('/categorycenter/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                    <form method="POST" action="{{ url('/categorycenter' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
  @endsection