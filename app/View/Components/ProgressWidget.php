<?php

namespace App\View\Components;

use App\Models\Department;
use Illuminate\View\Component;

class ProgressWidget extends Component
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
        $departments = Department::all();
        $messages = auth()->user()->messages()->with('replies')->get();
//
//
//        $array = [];
//        foreach ($messages as $message) {
//            $receiverDepartment = $message->receiver->department->label;
//            if ($message->replies != null) {
//                foreach ($message->replies as $reply) {
//                    if ($reply->user->id == $message->user->id) {
//                        $array[]=[$receiverDepartment,$message->user->id];
//                    }
//                }
//            }
//        }
//        dd($departments);
        return view('components.progress-widget', compact('departments'));
    }
}
