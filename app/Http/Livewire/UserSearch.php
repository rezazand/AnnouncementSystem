<?php

namespace App\Http\Livewire;

use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class UserSearch extends Component
{
    public $query;
    public $check;

    public function render()
    {
        if (auth()->user()->can('access-all-departments')) {
            $users = User::where('name', 'like', '%' . $this->query . '%')->latest()->paginate(5);
        } else {
            $users = User::where('department_id', auth()->user()->department_id)->where('name', 'like', '%' . $this->query . '%')->latest()->paginate(5);
        }
        if ($this->check) {
            $userE = User::find($this->check);
            $departments = Department::all();
            $roles = Role::all();
        } else {
            $userE = null;
            $departments = null;
            $roles = null;
        }
        return view('livewire.user-search', compact('users', 'userE', 'departments', 'roles'));
    }
}
