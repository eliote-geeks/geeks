<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Enroll;
use Livewire\Component;

class TrendingPosts extends Component
{
    public int $s;
    public float $student_review;
    
    public function enrolled($id)
    {
        if(Enroll::where('course_id',$id)->where('user_id',auth()->user()->id)->where('status',1)->get()->count() == 0)
            {
                $enroll = new Enroll();
                $enroll->course_id = $id;
                $enroll->user_id = auth()->user()->id;
                $enroll->save();
                session()->flash('message','Favoris added Successfully');
            }
    }

    public function unrolled(Enroll $enroll)
    {
        $enroll->delete();
    }
    public function render()
    {        
        return view('livewire.trending-posts',[
            "courses_tren" => Course::InRandomOrder()->where('trending','trending')->where('status',1)->get(),
        ]);
    }
}
