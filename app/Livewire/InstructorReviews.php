<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Review;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class InstructorReviews extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'reviewSectionRefresh' => '$refresh',
    ];
    public $reviews = [];
    public $courses = [];
    public $rat;
    public $sort;
    public $course_id;
    public $content;

    public function mount()
    {
        $this->courses = Course::where('user_id',auth()->user()->id)->where('status',1)->get();
        $this->reviews =  DB::table('reviews')
        ->leftJoin('courses','courses.id','=','reviews.course_id')
        ->selectRaw('reviews.*')
        ->where('courses.user_id',auth()->user()->id)
        ->get();
    }

    public function search()
    {
        if($this->rat != null && $this->sort != null && $this->course_id != null)
        {
            $this->reviews =  DB::table('reviews')
            ->leftJoin('courses','courses.id','=','reviews.course_id')
            ->selectRaw('reviews.*')
            ->where('courses.id','=',$this->course_id)
            ->where('reviews.rating','=',$this->rat)
            ->orderByRaw('reviews.id '.$this->sort)
            ->where('courses.user_id','=',auth()->user()->id)
            ->get();
        }elseif($this->rat != null && $this->sort != null){
            $this->reviews =  DB::table('reviews')
            ->leftJoin('courses','courses.id','=','reviews.course_id')
            ->selectRaw('reviews.*')
            ->where('courses.user_id',auth()->user()->id)
            ->where('reviews.rating','=',$this->rat)
            ->orderByRaw('reviews.id '.$this->sort)
            ->get();
        }
        elseif($this->rat != null)
        {
            $this->reviews =  DB::table('reviews')
            ->leftJoin('courses','courses.id','=','reviews.course_id')
            ->selectRaw('reviews.*')
            ->where('courses.user_id',auth()->user()->id)
            ->where('reviews.rating','=',$this->rat)
            ->get();
        }
        elseif($this->course_id != null)
        {
            $this->reviews =  DB::table('reviews')
            ->leftJoin('courses','courses.id','=','reviews.course_id')
            ->selectRaw('reviews.*')
            ->where('courses.user_id',auth()->user()->id)
            ->where('courses.id','=',$this->course_id)
            ->get();
        }
        elseif($this->sort != null){
            $this->reviews =  DB::table('reviews')
            ->leftJoin('courses','courses.id','=','reviews.course_id')
            ->selectRaw('reviews.*')
            ->where('courses.user_id',auth()->user()->id)
            ->orderByRaw('reviews.id '.$this->sort)
            ->get();
        }
        else{
            $this->reviews =  DB::table('reviews')
            ->leftJoin('courses','courses.id','=','reviews.course_id')
            ->selectRaw('reviews.*')
            ->where('courses.user_id',auth()->user()->id)
            ->get();
        }
        $this->emit('reviewSectionRefresh');
    }

    public function render()
    {
        
        return view('livewire.instructor-reviews',[
            'courses' => Course::where('user_id',auth()->user()->id)->where('status',1)->get(),
            $this->reviews =  DB::table('reviews')
            ->leftJoin('courses','courses.id','=','reviews.course_id')
            ->selectRaw('reviews.*')
            ->where('courses.user_id',auth()->user()->id)
            ->get(),
        ]);
    }

    public function delete($id)
    {
        \App\Models\Review::findOrFail($id)->delete();
        session()->flash('message','deleted success!!!');
        $this->emit('reviewSectionRefresh');

    }

    public function response($id)
    {
        $this->validate([
            'content' => 'required|max:1300',        
        ]);
        $review = Review::findOrFail($id);

        $response = new \App\Models\Response();
        $response->author_id = auth()->user()->id;
        $response->client_id = $review->user_id;
        $response->course_id = $review->course_id;
        $response->content = $this->content;
        $response->comment_id = $review->id;
        $response->comment_type = 'App\Models\Response';
        $response->save();
        $this->reset('content');
        session()->flash('message','sending message success');
        $this->emit('reviewSectionRefresh');
    }
}
