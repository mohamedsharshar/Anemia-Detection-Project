@extends('services.layoutAdmin')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Material List</h2>
                    </div>
                    <div class="card-body">
                        @if(count($materials)!=0)
                        <a href="{{ url('/center/serviceAdmin/material/' . $materials->first()->service_id. '/create') }}" class="btn btn-success btn-sm" title="Add New Service">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        @else
                        <a href="{{ url('/center/serviceAdmin/material/' .$id. '/create') }}" class="btn btn-success btn-sm" title="Add New Material">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Reference</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Items number</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($materials as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->reference }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->nbItems }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                        @if($item->status=="Available")
                                            <a href="{{ url('/center/serviceAdmin/material/' . $item->id.'/show') }}" title="View Service"><button class="btn btn-info "><i class="fa fa-eye" aria-hidden="true"></i> Show</button></a>
                                            <a href="{{ url('/center/serviceAdmin/material/' . $item->id . '/edit') }}" title="Edit Service"><button class="btn btn-primary "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <button type="submit" class="btn btn-warning" title="Archive Service" onclick="return confirm(&quot;Confirm archive Material?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                            <a href="{{url('/center/serviceAdmin/material/archive', $item->id)}}">Archive</a>
                                            </button>
                                            <form method="POST" action="{{ url('/serviceAdmin/material'.'/'. $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger" title="Delete Service" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        @else
                                        <button type="submit" class="btn btn-success" title="Active Service" onclick="return confirm(&quot;Confirm archive Material?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                            <a href="{{url('/center/serviceAdmin/material/active', $item->id)}}">Active</a>
                                            </button>
                                            @endif

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
    </div>
    @endsection