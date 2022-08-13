<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;

class Sent extends Component
{
    public $messageId;
    public function render()
    {
        if ($this->messageId){
            $replies = Message::find($this->messageId)->replies;
        }else{
            $replies = null;
        }
        $messages = auth()->user()->messages()->where('action','send')->latest()->paginate();

        return view('livewire.sent',compact('messages','replies'));
    }
}
