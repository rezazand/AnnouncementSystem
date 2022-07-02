<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;

class SearchRoles extends Component
{
    public $query;
    public $check=0;

    public function render()
    {
        if ($this->check){
            $permissions = Role::find($this->check)->permissions->all();
        }else{
            $permissions = 0;
        }
        $roles = Role::where('label', 'like', '%' . $this->query . '%')->latest()->paginate(5);
        return view('livewire.search-roles',compact('roles','permissions'));
    }
}
