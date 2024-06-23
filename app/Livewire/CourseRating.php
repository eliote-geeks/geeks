<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Report;
use App\Models\Review;
use Livewire\Component;
use App\Models\Response;
use App\Models\LikeReview;
use App\Notifications\CommentCourseNotification;
use Livewire\WithPagination;
use App\Notifications\LikeNotification;
use App\Notifications\ReportNotification;
use Illuminate\Support\Facades\Notification;

class CourseRating extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'reviewSectionRefresh' => '$refresh',
    ];
    
    public $limit = 2;
    public $rating = 1;
    public $review;
    public $content;
    public $course;
    public $rat;
    public $hideForm = true;
    public function OrderRating()
    {
        $id = $this->rat;
        $this->reviews = Review::latest()->take(4)->where('course_id',$this->course->id)->where('rating',$id)->get();     
    }

    public function delete($id)
    {
        $delete = Review::findOrFail($id);
        $delete->delete();
        $this->emit('reviewSectionRefresh');
        session()->flash('message','deleted success!!!');
    }

    public function more($id)
    {
        $this->limit += 2;
    }

    public function save()
    {
        $this->validate([
            'review' => 'required|max:90|min:3',
            'rating' => 'required'
        ]);
        $rev = Review::where('course_id',$this->course->id)->get();
        $review = new Review();
        $review->user_id = auth()->user()->id;
        $review->course_id = $this->course->id;
        $review->rating = $this->rating;
        $review->review = $this->review;
        $review->save();
        Notification::send(\App\Models\User::findOrFail($this->course->user_id), new CommentCourseNotification($review->id));         
        $this->reset(['rating','review']);
        $this->emit('reviewSectionRefresh');
        session()->flash('message','success rated');
        
    }

    public function response($id)
    {
        $this->validate([
            'content' => 'required|max:1300',        
        ]);
        $review = Review::find($id);

        $response = new Response();
        $response->author_id = auth()->user()->id;
        $response->client_id = $review->user->id;
        $response->course_id = $this->course->id;
        $response->content = $this->content;
        $response->comment_id = $review->id;
        $response->comment_type = 'App\Models\Response';
        $response->save();


        $this->emit('reviewSectionRefresh');
        $this->reset('content');
        session()->flash('message','success rated');
    }

    public function report($id)
    {
        $review = Review::findOrFail($id);

        if(Report::where([
            'user_id' => auth()->user()->id,
            'entity_type' => 'App\Models\Review',
            'entity_id' => $review->id
        ])->count() == 0){
            $rep = new Report();
            $rep->user_id = auth()->user()->id;
            $rep->entity_id = $review->id;
            $rep->entity_type = 'App\Models\Review';
            $rep->save();   
            Notification::send(\App\Models\User::findOrFail($review->user_id), new ReportNotification($review->review));         

            $report = Report::where([
                'entity_id' => $review->id,
                'entity_type' => 'App\Models\Review'
            ])->count();

            if($report > 10)
            {                
                $review->delete();
            }
        }
        $this->emit('reviewSectionRefresh');
        session()->flash('message','report saved!!');
    }

    public function deleteResponse($id)
    {
        $response = Response::findOrFail($id);        
        $response->delete();
        $this->emit('reviewSectionRefresh');
        session()->flash('message','success removed comment');
    }

    public function render()
    {
        $verified = Review::where('course_id',$this->course->id)->where('user_id',auth()->user()->id)->get();
        if($verified->count() > 0)
            $this->hideForm = false;        

        // if(Course::where('user_id',auth()->user()->id)->get())
        //      $this->hideForm = true;

                
        return view('livewire.course-rating',[
            'reviews' => Review::latest()->where('course_id',$this->course->id)->paginate(4)
        ]);
    }

    public function like($id)
    {
        $review = Review::findOrFail($id);        
        if(LikeReview::where([
            'review_type' => 'App\Models\Review',            
            'user_id' => auth()->user()->id,
            'review_id' => $review->id,
            'status' => 1
        ])->count() == 0){

            if(LikeReview::where([
                'review_type' => 'App\Models\Review',            
                'user_id' => auth()->user()->id,
                'review_id' => $review->id
            ])->count() == 0){
                
                $like = new LikeReview();
                $like->user_id = auth()->user()->id;
                $like->review_type = 'App\Models\Review';
                $like->review_id = $review->id;
                $like->status = 1;
                $like->save();   
                Notification::send(\App\Models\User::findOrFail($review->user_id), new LikeNotification($like->id));         
            }
        }
        else{            
            $like = LikeReview::where([
                'review_type' => 'App\Models\Review',            
                'user_id' => auth()->user()->id,
                'review_id' => $review->id,
                'status' => 1
            ])->first()->delete();         
        }
    }
    
    public function dislike($id)
    {        
        $review = Review::findOrFail($id);        
        if(LikeReview::where([
            'review_type' => 'App\Models\Review',
            'user_id' => auth()->user()->id,
            'review_id' => $review->id,
            'status' => 0
        ])->count() == 0){
            if(LikeReview::where([
                'review_type' => 'App\Models\Review',            
                'user_id' => auth()->user()->id,
                'review_id' => $review->id
            ])->count() == 0){
                $like = new LikeReview();
                $like->user_id = auth()->user()->id;
                $like->review_type = 'App\Models\Review';
                $like->review_id = $review->id;
                $like->status = 0;
                $like->save();
            }
        }
        else{            
            $like = LikeReview::where([
                'review_type' => 'App\Models\Review',            
                'user_id' => auth()->user()->id,
                'review_id' => $review->id,
                'status' => 0
            ])->first()->delete();
        }
    }
}
