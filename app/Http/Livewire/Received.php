<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;

class Received extends Component
{
    public function render()
    {
        $messages = auth()->user()->messages('to')->latest()->paginate(10);
        return view('livewire.received',compact('messages'));
    }
}
