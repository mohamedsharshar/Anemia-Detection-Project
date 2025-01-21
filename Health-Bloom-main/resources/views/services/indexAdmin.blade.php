@extends('services.layoutAdmin')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Service List</h2>
                    </div>
                    <div class="card-body">
                        @if(count($services)!=0)
                        <a href="{{ url('/center/serviceAdmin/' . $services->first()->center_id. '/create') }}" class="btn btn-success btn-sm" title="Add New Service">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        @else
                        <a href="{{ url('/center/serviceAdmin/' .$id. '/create') }}" class="btn btn-success btn-sm" title="Add New Service">
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
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Duration</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($services as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->duration }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                        @if($item->status=="Active")
                                            <a href="{{ url('/center/serviceAdmin/' . $item->id .'/show') }}" title="View Service"><button class="btn btn-info "><i class="fa fa-eye" aria-hidden="true"></i> Show</button></a>
                                            <a href="{{ url('/center/serviceAdmin/' . $item->id . '/edit') }}" title="Edit Service"><button class="btn btn-primary "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <button type="submit" class="btn btn-warning" title="Archive Service" onclick="return confirm(&quot;Confirm archive service?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                            <a href="{{url('/center/serviceAdmin/archive', $item->id)}}">Archive</a>
                                            </button>
                                            <form method="POST" action="{{ url('/serviceAdmin' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger" title="Delete Service" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                            <a href="{{ url('/center/serviceAdmin/material/' . $item->id) }}" title="List Material"><button class="btn btn-warning "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Materials List</button></a>
                                            <a href="{{ url('/center/serviceAdmin/material/' . $item->id. '/create') }}" title="create Material"><button class="btn btn-success "><i class="fa fa-eye" aria-hidden="true"></i> Add new Material</button></a>
                                        @else
                                        <button type="submit" class="btn btn-success" title="Active Service" onclick="return confirm(&quot;Confirm archive service?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                            <a href="{{url('/center/serviceAdmin/active', $item->id)}}">Active</a>
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