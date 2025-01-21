<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Center;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    /**
     * Display a Listing of the resource.
     * @return \ILLuminate\Http\Response
     */
    public function index(Request $request){
        $search = $request->search;

        $feedbacks = Feedback::when($search, function($query, $search){
             $query->where('name', 'like', "%{$search}")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orderBy('created_at', 'desc')
                        ->get();
        })->paginate(5);
        $users = User::all();
        $centers = Center::all();
        return view("feedback.index",[
        'feedbacks'=>$feedbacks,
        'users'=>$users,
        'centers'=>$centers,
    ]);
    }

    public function show($id)
{
    $feedback=Feedback::find($id);
    return view('feedback.showDetailsFeedback', ['feedback'=>$feedback]);
}


// public function reviewstore(Request $request){
//     $review = new Rating();
//     $review->feedback_id = $request->feedback_id;
//     $review->star_rating = $request->rating;
//     $review->user_id = Auth::user()->id;
//     $review->save();
//     return redirect()->back()->with('flash_msg_success','Your review has been submitted Successfully,');
// }



    public function create(){
    $centers = Center::all();
     return view('feedback.createFeedback', compact('centers'));
}

public function store(Request $request){
    $request->validate([
        'name'=>'required|between:3,100',
        'description'=>'required|between:3,200',
        'center_id'=>'required',
    ], [], [
        'name'=>'name',
        'description'=>'description',
        'center_id'=>'center_id'
    ]);
    $data = new Feedback;
    $data->name = $request->name;
    $data->description = $request->description;
    $data->center_id = $request->center_id;
    $data->user_id = Auth::user()->id;
    $data->save();
    return redirect()->route('feedback.index')->with( 'store', 'success');

}


    
public function edit(Feedback $feedback)
{
    return view('feedback.editFeedback', ['feedback'=>$feedback]);
}

public function update(Request $request, Feedback $feedback){
    $request->validate([
        'name'=>'required|between:3,100',
        'description'=>'required|between:3,200',
        'status'=>'required',
        'rating'=>'required',
    ], [], [
        'id'=>'id',
        'name'=>'name',
        'description'=>'description',
        'status'=>'status',
        'rating'=>'rating',
    ]);

    $feedback->update([
    'id'=> ucwords($request->id),
    'name'=> ucwords($request->name),
    'description'=> ucwords($request->description),
    'status'=> ucwords($request->status),
    'rating'=> ucwords($request->rating),

]);
        return redirect()->route('feedback.index')->with( 'update', 'success');

}

public function destroy($id)
    {
        Feedback::destroy($id);
        return redirect('feedback')->with('flash_message', 'Feedback deleted!');  
    }

}
