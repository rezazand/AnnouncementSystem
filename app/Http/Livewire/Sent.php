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
        $messages = auth()->user()->messages('user_id')->latest()->paginate(10);
        return view('livewire.sent',compact('messages','replies'));
    }
}
