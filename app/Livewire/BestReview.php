<?php

namespace App\Livewire;

use App\Models\LikeReview;
use App\Models\Review;
use Livewire\Component;

class BestReview extends Component
{
    public $course;
    public $bestReviews = [];

    public function like($id)
    {
        $review = Review::findOrFail($id);        
        if(LikeReview::where('user_id',auth()->user()->id)->count() == 0){
            $like = new LikeReview();
            $like->user_id = auth()->user()->id;
            $like->review_type = 'App\Models\Review';
            $like->review_id = $review->id;
            $like->status = 1;
            $like->save();
        }
        else{            
            $like = LikeReview::where('user_id',auth()->user()->id)->first();
            $like->user_id = auth()->user()->id;
            $like->review_type = 'App\Models\Review';
            $like->review_id = $review->id;
            $like->status = 1;
            $like->save();
        }
    }
    
    public function dislike($id)
    {
        
        $review = Review::findOrFail($id);        
        if(LikeReview::where('user_id',auth()->user()->id)->count() == 0){
            $like = new LikeReview();
            $like->user_id = auth()->user()->id;
            $like->review_type = 'App\Models\Review';
            $like->review_id = $review->id;
            $like->status = 0;
            $like->save();
        }
        else{            
            $like = LikeReview::where('user_id',auth()->user()->id)->first();
            $like->user_id = auth()->user()->id;
            $like->review_type = 'App\Models\Review';
            $like->review_id = $review->id;
            $like->status = 0;
            $like->save();
        }
    }
    public function render()
    {
        if(Review::where('course_id',$this->course->id)->where('rating','=',5)->count() > 0)
            $this->bestReviews = Review::latest()->take(6)->where('course_id',$this->course->id)->where('rating','=',5)->get();

        elseif(Review::where('course_id',$this->course->id)->where('rating','=',4)->count() > 0)
            $this->bestReviews = Review::latest()->take(6)->where('course_id',$this->course->id)->where('rating','=',4)->get();  

      elseif(Review::where('course_id',$this->course->id)->where('rating','=',3)->count() > 0)
            $this->bestReviews = Review::latest()->take(6)->where('course_id',$this->course->id)->where('rating','=',3)->get();

        elseif(Review::where('course_id',$this->course->id)->where('rating','=',2)->count() > 0)
            $this->bestReviews = Review::latest()->take(6)->where('course_id',$this->course->id)->where('rating','=',2)->get();
            
        elseif(Review::where('course_id',$this->course->id)->where('rating','=',1)->count() > 0)
            $this->bestReviews = Review::latest()->take(6)->where('course_id',$this->course->id)->where('rating','=',1)->get();
        
        else
            $this->bestReviews =  [];


        return view('livewire.best-review');
    }
}
