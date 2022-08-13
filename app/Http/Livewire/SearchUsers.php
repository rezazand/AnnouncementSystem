<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchUsers extends Component
{
    public $query;
    public $target = 'admins';

    public function mount()
    {
        $this->query='';

    }

    public function render()
    {
        $contacts = User::where('name','like','%'.$this->query.'%')->latest()->paginate(5);

        return view('livewire.search-users',compact('contacts'));
    }
}
