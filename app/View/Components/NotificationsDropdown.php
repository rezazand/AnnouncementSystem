<?php

namespace App\View\Components;

use App\Models\Message;
use Illuminate\View\Component;

class NotificationsDropdown extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
//        $newMessages = auth()->user()->messages()->where('status',1)->count();
        $newMessages = 0;
        foreach (Message::all()->where('status', 1) as $message) {
            if ($message->receivers()->contains(auth()->user())) {
                $newMessages++;
            }
        }


        $newReplies = 0;
        foreach (auth()->user()->messages()->where('action', 'send')->with(['replies' => function ($query) {
            $query->where('status', 1);
        }])->get() as $message) {
            if ($message->replies != null){
                $newReplies += $message->replies->count();
            }
        }

        return view('components.notifications-dropdown', compact('newMessages', 'newReplies'));
    }
}
