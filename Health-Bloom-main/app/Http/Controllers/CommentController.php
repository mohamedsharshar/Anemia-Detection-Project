<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Notifications\FeedbackCommented;
use Illuminate\Support\Facades\Notification;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'body'=>'required',
        ]);
   
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
    
        Comment::create($input);
        //dd(auth()->user());
        //Notification::route('mail', auth()->user()->notify(new FeedbackCommented()));
        //auth()->user()->email->notify(new FeedbackCommented($input));
        return redirect()->back()->with('success', 'Reply Submitted Successfuly');
    }


    public function destroy($id)
    {
        $comment = Comment::destroy($id);
        return redirect()->back()->with('flash_message', 'Comment deleted!');  
    }


}
