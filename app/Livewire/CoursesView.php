<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesView extends Component
{
    use WithPagination;
    
    public $search;
    protected $queryString = ['search'];
    public $courseId;
    public Int $selectedIndex = 0;
    protected $paginationTheme = 'bootstrap';


    public function IncrementIndex()
    {
        $this->selectedIndex++;
    }

    public function render()
    {
        
        return view('livewire.courses-view',[
            'courses' => Course::paginate(3),
            'courses_pending' => Course::where('status',0)->get(),
            'courses_view' => Course::where('title','like','%'.$this->search.'%')->get(),
            'courses_approved' => Course::where('status',1)->get(),
        ]);
    }

    public function getCourseProperty()
    {
        return Course::findOrFail($this->courseId);
    }

    public function rejectedCourse($id)
    {
        // $this->courseId = $id;
        // Course::find($this->courseId)->delete();
        $this->courseId = $id;
        $course = Course::find($this->courseId);
        $course->status = 0;
        $course->save();
       session()->flash('message','Saved!');

        // flash('message','Course status changed')->success();
    }
    public function trending($id)
    {
        $course = Course::find($id);
        
        if($course->trending == null)
        {
            $course->trending = 'trending';            
            $course->save();
            session()->flash('message','Course trending changed');
        }
        else
        {
            $course->trending = null;
            $course->save();
            session()->flash('message','Course trending changed');
        }

         session()->flash('message','updated trending!!');
    }


    public function approvedCourse($id)
    {
        $this->courseId = $id;
        $course = Course::find($this->courseId);
        $course->status = 1;
        $course->save();
        session()->flash('message','Course status approved changed');
    }

    public function approved($id)
    {
        $course = Course::where('id',$id)->get();
        $course->status = 1;
        //dd($this->course);
        $course->save();
        session()->flash('message','Course status approved changed');
    }
}
