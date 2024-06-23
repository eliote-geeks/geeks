<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Enroll;
use App\Models\Lesson;
use App\Models\Review;
use Livewire\Component;
use App\Models\ClassCourse;
use App\Models\ClassSchool;

class Recommended extends Component
{
    public $title;
    public $courses = [];
    public int $s;
    public float $student_review;
    public $enrolled = false;
    public $total = 0;
    public $lessons = [];
    protected $listeners = [
        'reviewSectionRefresh' => '$refresh',
    ];
    
    
    public function enrolled($id)
    {
        if(Enroll::where('course_id',$id)->where('user_id',auth()->user()->id)->get()->count() == 0)
            {
                $enroll = new Enroll();
                $enroll->course_id = $id;
                $enroll->user_id = auth()->user()->id;
                $enroll->save();
                $this->emit('reviewSectionRefresh');
            }
    }

    public function unrolled(Enroll $enroll)
    {
        $enroll->delete();
        $this->emit('reviewSectionRefresh');
    }


    public function render()
    {  
        $this->courses = Course::inRandomOrder()->where('status',1)->get();
            
        return view('livewire.recommended');
    }
}
