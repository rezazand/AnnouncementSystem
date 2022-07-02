<?php

namespace App\Http\Livewire;

use App\Models\Department;
use Livewire\Component;

class SearchDepartment extends Component
{
    public $query;
    public $check;

    public function render()
    {
        $departments = Department::where('label', 'like', '%' . $this->query . '%')->latest()->paginate(5);
        return view('livewire.search-department',compact('departments'));
    }
}
