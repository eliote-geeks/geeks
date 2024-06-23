<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Enroll;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class MostPopular extends Component
{
    public $sales;

    public function enrolled($id)
    {
        if(Enroll::where('course_id',$id)->where('user_id',auth()->user()->id)->get()->count() == 0)
            {
                $enroll = new Enroll();
                $enroll->course_id = $id;
                $enroll->user_id = auth()->user()->id;
                $enroll->save();
                session()->flash('message','Favoris add  Successfully');
            }
    }

    public function unrolled(Enroll $enroll)
    {
        $enroll->delete();
    }
    
    public function render()
    {
        $this->sales = DB::table('reviews')
            ->leftJoin('courses','courses.id','=','reviews.course_id')
            ->selectRaw('courses.*, sum(reviews.rating) total')       
            ->where('courses.status','=',1)     
            ->where('courses.deleted_at','=',null)     
            ->where('reviews.deleted_at','=',null)     
            ->groupBy('reviews.course_id')
            ->inRandomOrder()
            ->distinct()
            ->get();

        return view('livewire.most-popular',[
        ]);
    }
}
 