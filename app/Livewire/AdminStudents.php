<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminStudents extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.admin-students',[
            'students_search' => User::where('user_type','App\Models\Student')->where('name','like','%'.$this->search.'%')->orWhere('email','like','%'.$this->search.'%')->orWhere('first_name','like','%'.$this->search.'%')->orWhere('last_name','like','%'.$this->search.'%')->get(),
        ]);
    }
}
