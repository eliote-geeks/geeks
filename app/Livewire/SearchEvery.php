<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\School;
use App\Models\User;
use Livewire\Component;

class SearchEvery extends Component
{
    public $search;
    public function render()
    {
        if($this->search != null)
        {
            return view('livewire.search-every',[
                'courses' => Course::where('title','like','%'.$this->search.'%')->latest()->get(),
                'users' => User::where('name','like','%'.$this->search.'%')->latest()->get(),
                'schools' => School::where('title','like','%'.$this->search.'%')->latest()->get()
                
            ]);
        }
        return view('livewire.search-every',[
            'courses' => [],
            'users' => [],
            'schools' => []
        ]);
    }
}
