
    @extends('feedback.layout')
    @section('content')
    <div class="page-section">
        <div class="container">
            @if(count($services) !==0)
            <table class="text-center wow fadeInUp" align="center" width="100%">
                <tr style="padding: 6px 12px; background-color: #00D9A5; color: #fff; border-radius: 4px;">
                    <th style="padding: 10px; font-size: 20px;">Name</th>
                    <th style="padding: 10px; font-size: 20px;">Description</th>
                    <th style="padding: 10px; font-size: 20px;">Duration</th>
                    <th style="padding: 10px; font-size: 20px;">Price</th>
                    <th style="padding: 10px; font-size: 20px;">Like</th>
                    <th style="padding: 10px; font-size: 20px;">Dislike</th>
                    <th style="padding: 10px; font-size: 20px;">Actions</th>
                </tr>

                @foreach($services as $item)

                @if($item->status=="Active")
                <tr style="padding: 6px 12px; background-color: #E1EBE8; color: #6E807A; border-radius: 4px;">
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->duration }}</td>
                <td>{{ $item->price }}$</td>
                <td>{{ $item->like }}</td>
                <td>{{ $item->dislike }}</td>

                <!-- <td class="tag-cloud-link">{{ $item->status }}</td> -->
                <td>
                
                                            <!-- <a href="{{ url('/service/' . $item->id) }}" title="View Service"><button class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> -->
                                            <button type="submit"  title="Like Service" onclick="return confirm(&quot;Confirm like?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                            <a href="{{url('/centerUser/service/like', $item->id)}}" class="btn btn-success">Like</a>
                                            </button>
                                            <button type="submit" title="Dislike Service" onclick="return confirm(&quot;Confirm dislike?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                            <a href="{{url('/centerUser/service/dislike', $item->id)}}" class="btn btn-success">Dislike</a>
                                            </button>
                                            <button type="submit" title="Report Service" onclick="return confirm(&quot;The report mail : Hi Health-Bloom your service is far from our request please try to check the likes and dislikes to improve your center ! Confirm report?&quot;)"><a href="{{ url('/report') }}" title="Report Service" class="btn btn-danger">Email Report</a></button>
                                            <button type="submit" title="Message Service" onclick="return confirm(&quot;Some problems ! Confirm message?&quot;)"><a href="{{ url('/sendSMS') }}" title="Message Service" class="btn btn-danger" >Message Report</a></button>
                        
                                            
                                        </td>
                                        
</tr>
@endif
                @endforeach

            </table>
            @else
            <h2> Nothing to show</h2>
            @endif
        </div> <!-- .container -->
    </div>
  @endsection

