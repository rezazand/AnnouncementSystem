<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchUsers extends Component
{
    public $target = 'admins';

    public function hydrate()
    {
        $this->emit('select2Hydrate');
    }

    public function render()
    {
        $contacts = [];
        if ($this->target == 'admins') {
            foreach (User::latest()->get() as $user) {
                if ($user->isAdmin() and $user->id != auth()->id()) {
                    $contacts[] = $user;
                }
            }
        } else {
            $contacts = User::where('id','!=',auth()->id())->latest()->get();
        }

        return view('livewire.search-users', compact('contacts'));
    }
}
