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
                if ($user->isAdmin()) {
                    $contacts[] = $user;
                }
            }
        } else {
            $contacts = User::latest()->get();
        }

        return view('livewire.search-users', compact('contacts'));
    }
}
