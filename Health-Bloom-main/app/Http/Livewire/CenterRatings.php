<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Feedback;

class CenterRatings extends Component
{
    public $rating;
    public $name;
    public $center_id;
    public $description;
    public $currentId;
    public $feedback;
    public $hideForm;

    protected $rules = [
        'rating' => ['required', 'in:1,2,3,4,5'],
        'comment' => 'required',

    ];

    public function render()
    {
        $comments = Feedback::where('id', $this->feedback->id)->where('status', 1)->with('user')->get();
        return view('livewire.center-ratings', compact('comments'));
    }

    public function mount()
    {
        if(auth()->user()){
            $rating = Feedback::where('user_id', auth()->user()->id)->where('id', $this->feedback->id)->first();
            if (!empty($rating)) {
                $this->rating  = $rating->rating;
                $this->comment = $rating->comment;
                $this->currentId = $rating->id;
            }
        }
        return view('livewire.center-ratings');
    }

    public function delete($id)
    {
        $rating = Feedback::where('id', $id)->first();
        if ($rating && ($rating->user_id == auth()->user()->id)) {
            $rating->delete();
        }
        if ($this->currentId) {
            $this->currentId = '';
            $this->rating  = '';
            $this->comment = '';
        }
    }

    public function rate()
    {
        $rating = Feedback::where('user_id', $this->feedback->user_id)->where('id', $this->feedback->id)->first();
        // $this->validate();
        if (!empty($rating)) {
            $rating->user_id = auth()->user()->id;
            $rating->id = $this->feedback->id;
            $rating->rating = $this->rating;
            $rating->name = $this->feedback->name;
            $rating->description = $this->feedback->description;
            $rating->center_id = $this->feedback->center_id;
            $rating->status = 1;
            try {
                $rating->update();
            } catch (\Throwable $th) {
                throw $th;
            }
            session()->flash('message', 'Success!');
        } else {
            $rating = new Feedback;
            $rating->user_id = auth()->user()->id;
            $rating->id = $this->feedback->id;
            $rating->rating = $this->rating;
            $rating->name = $this->feedback->name;
            $rating->description = $this->feedback->description;
            $rating->center_id = $this->feedback->center_id;
            $rating->status = 1;
            try {
                $rating->save();
            } catch (\Throwable $th) {
                throw $th;
            }
            $this->hideForm = true;
        }
    }
}

