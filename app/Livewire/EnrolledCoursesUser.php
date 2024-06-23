<?php

namespace App\Livewire;

use App\Models\Enroll;
use Livewire\Component;

class EnrolledCoursesUser extends Component
{
    public function enrolled($id)
    {
        if(Enroll::where('course_id',$id)->where('user_id',auth()->user()->id)->get()->count() == 0)
            {
                $enroll = new Enroll();
                $enroll->course_id = $id;
                $enroll->user_id = auth()->user()->id;
                $enroll->save();
                session()->flash('message','course enroll successfully' );
            }
    }

    public function unrolled(Enroll $enroll)
    {
        $enroll->delete();
        session()->flash('message','Course removed to favoris successfully');
    }

    public function render()
    {
        $enrolls = Enroll::where('user_id',auth()->user()->id)->get();
        return view('livewire.enrolled-courses-user',[
            'enrolls' => $enrolls,
        ]);
    }
}
