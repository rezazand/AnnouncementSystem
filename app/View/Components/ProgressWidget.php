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
        $messages = auth()->user()->messages()->with('replies')->get();

        $base = [];
        foreach ($messages as $message) {
            $receiverDepartment = $message->receiver()->department->label;

            if (!array_key_exists($receiverDepartment, $base)) {
                $base[$receiverDepartment] = ['all' => 0, 'reply' => 0];
            }
            if ($message->receiver()->name != auth()->user()->name){//todo
                if ($message->replies()->first() != null) {
                    foreach ($message->replies as $reply) {
                        $base[$receiverDepartment] = ['all' => $base[$receiverDepartment]['all']+1 ,'reply' => $base[$receiverDepartment]['reply'] + 1];
                    }
                } else {
                    $base[$receiverDepartment] = ['all' => $base[$receiverDepartment]['all'] + 1,'reply' => $base[$receiverDepartment]['reply']];
                }
            }
        }

        $data=[];
        foreach ($base as $key=>$value){
            $data['labels'][] = $key;
            $data['reply'][] = $value['reply'];
            $data['all'][] = $value['all'];
        }

        return view('components.progress-widget', compact('data'));
    }
}
