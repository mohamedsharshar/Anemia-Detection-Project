<?php

namespace App\Http\Livewire;
use App\Notifications\FeedbackLiked;
use Livewire\Component;

class FeedbackLikes extends Component
{
    public $feedback;
    public function render()
    {
        return view('livewire.feedback-likes');
    }

    public function like()
    {
        if (auth()->check()) {
            $response = 
        auth()->user()->likes()->toggle($this->feedback->id);
            if($response['attached']){
                $this->feedback->user->notify(new FeedbackLiked($this->feedback));
            }
        } else {
            $this->emit('flash-message', 'Merci de vous connecter pour ajouter une mission dans vos favoris.', 'error');
            return;
        }
    }
}
