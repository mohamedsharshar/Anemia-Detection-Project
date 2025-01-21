<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Center;
use Illuminate\Http\Request;

class FeedbackBackendController extends Controller
{
/**
     * Display a Listing of the resource.
     * @return \ILLuminate\Http\Response
     */
    public function index(Request $request){
        $search = $request->search;

        $feedbacks = Feedback::when($search, function($query, $search){
             return $query->where('name', 'like', "%{$search}")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orderBy('created_at', 'desc')
                        ->get();
        })->paginate(5);
        $feedbacks = Feedback::all();
        $users = User::all();
        $centers = Center::all();
        return view("feedback.backend.indexBack",[
        'feedbacks'=>$feedbacks,
        'users'=>$users,
        'centers'=>$centers,
    ]);
    }

    public function create(){
     return view('feedback.createFeedback');
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

    public function show($id)
    {
        $feedback=Feedback::find($id);
        return view('feedback.backend.showDetailsBack', ['feedback'=>$feedback]);
    }

    public function downloadFeedback($id)
    {
        $feedback_download = Feedback::table('feedback')->where('id',$id)->first();
        
    }

    public function destroy($id)
    {
        Feedback::destroy($id);
        return redirect('feedbackAdmin')->with('flash_message', 'Feedback deleted!');  
    }


}
