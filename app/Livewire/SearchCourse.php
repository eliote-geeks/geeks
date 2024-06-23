<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class SearchCourse extends Component
{
    public $search = '';
    public function render()
    {
        // session()->flash('message','hey pauli');
        sleep(2);
        if($this->search !=  ''){
            return view('livewire.search-course',[
                'courses' => Course::where('status',1)->where('title','like','%'.$this->search.'%')->take(4)->get()
            ]);
         }
         else{
            return view('livewire.search-course');
         }
    }
}
