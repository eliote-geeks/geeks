<?php

namespace App\Livewire;

use FFMpeg\FFMpeg;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Report;
use App\Models\Lecture;
use Livewire\Component;
use App\Models\Question;
use App\Models\Response;
use App\Models\YahooMail;
use App\Models\Subscription;
use Livewire\WithPagination;
use App\Models\ProgressCourse;
use App\Models\ProgressLesson;
use Illuminate\Support\Str as str;
use App\Http\Controllers\SubscriptionController;
use MattLibera\LivewireFlash\Livewire\FlashMessage;

class CourseResume extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'refreshField' => '$refresh',
    ];
    public $content;
    public $mask;
    public $course;
    public $pp = 0;
    public $url = '';
    public $per;
    public $videoTrue = false;
    public $response;
    public $zoneFoundator;
    

    public function mount()
    {
        $zoneFoundator = 0;
        if(\App\Models\ClassCourse::where('course_id',$this->course->id)->count() > 0)
        {
            $classCourse = \App\Models\ClassCourse::where('course_id',$this->course->id)->first();                
            if(\App\Models\ClassSchool::where('id',$classCourse->class_id)->count() > 0)
            {
                if(\App\Models\ClassSchool::where('id',$classCourse->class_id)->first()->user_id == auth()->user()->id)
                {
                    $this->zoneFoundator = 1;                        
                }
            }
        }        
        $this->per = (\App\Models\ProgressLesson::where('course_id',$this->course->id)->where('user_id',auth()->user()->id)->where('view',1)->count() / \App\Models\Lesson::where('course_title',$this->course->title)->where('user_id',$this->course->user->id)->count()) * 100;
        if((Subscription::where('course_id',$this->course->id)->where('user_id',auth()->user()->id)->where('type','buy')->get()->count() > 0 ) || (auth()->user()->is_subscribed == 1 && auth()->user()->subscription_id != null) || ($this->course->user->id == auth()->user()->id) || ($this->course->discount_price == 0) || ($this->zoneFoundator == 1)){
            $this->pp = Lecture::where('course_title',$this->course->title)->orderBy('id')->first()->id;        
            $this->url = Lesson::where('lecture_id',$this->pp)->where('course_title',$this->course->title)->where('user_id',$this->course->user->id)->first();
            $this->mask = 1;        
        }
        else{
            return route('courses.subscribe',[
                'id'  => $this->course->id     
            ]);
        }
    }

    public function url($id)
    {
        if((auth()->user()->is_subscribed == 1) || (Subscription::where('course_id',$this->course->id)->where('user_id',auth()->user()->id)->where('type','buy')->count() > 0 ) || ($this->course->user->id == auth()->user()->id) || ($this->zoneFoundator == 1)){
            if((auth()->user()->is_subscribed == 1) && (auth()->user()->subscription_id != null))
            {                
                if((SubscriptionController::showSubscription(auth()->user()->subscription_id)->status !='ACTIVE')){                    
                    return route('courses.subscribe',[
                        'id'  => $this->course->id     
                    ]);        
                }
            }
            $this->url = Lesson::find($id);
            $this->pp = $this->url->lecture_id;
            $total = 0;
            if(ProgressLesson::where('lesson_id',$this->url->id)->where('user_id',auth()->user()->id)->count() == 0)
            {
                $arrayHour = explode(':',$this->url->duration);
                $second = 3600 * $arrayHour[0] + 60 * $arrayHour[1] + $arrayHour[2];
                $total += $second;                
                
                sleep(3);
                
                    $pL = new ProgressLesson();
                    $pL->user_id = auth()->user()->id;
                    $pL->course_id = Course::where('title',$this->url->course_title)->first()->id; 
                    $pL->lesson_id = $this->url->id;
                    $pL->view = 1;
                    // sleep(5);
                    $pL->save();
                    $percent = (ProgressLesson::where('course_id',$this->course->id)->where('user_id',auth()->user()->id)->where('view',1)->count() / Lesson::where('course_title',$this->url->course_title)->count()) * 100;        
                    if($percent >= 100){
                        $mail = new YahooMail();
                        $mail->author_id = User::where('email','mashashie@yahoo.com')->first()->id;
                        $mail->email_to = $this->course->user->id;
                        $mail->subject = 'Notifications';
                        $mail->body = '<b>'.User::findOrFail(auth()->user()->id)->pseudo.'</b> complete all your videos course felicitations!! <b>'.$this->course->title.'</b>';
                        $mail->save();
                    }
                    if(ProgressCourse::where('course_id',$this->course->id)->where('user_id',auth()->user()->id)->count() > 0)
                    {
                        $pC = ProgressCourse::where('course_id',$pL->course_id)->where('user_id',auth()->user()->id)->first();
                        // $pC->course_id = $pL->course_id;
                        // $pC->user_id = auth()->user()->id;
                        $pC->percent = $percent;
                        $pC->save();
                    }
                    else{
                        $pC = new ProgressCourse();
                        $pC->course_id = $pL->course_id;
                        $pC->user_id = auth()->user()->id;
                        $pC->percent = $percent;
                        $pC->save();
                    }
            
            }

        }
        else{
            $user = User::find(auth()->user()->id);
            $user->is_subscribed = 0;
            $user->save();
            return route('courses.subscribe',[
                'id'  => $this->course->id     
            ]);
        }
    }
    // public function convert()
    // {
    //     $media = FFMpeg::open('https://www.youtube.com/watch?v=SDiNIbn6dV0');

    //     $durationInSeconds = $media->getDurationInSeconds(); // returns an int
    //     $durationInMiliseconds = $media->getDurationInMiliseconds(); // returns a float
    //     dd($durationInSeconds);
    // }
    public function mask()
    {
        if($this->mask == 1)
            $this->mask = 0;
        else
            $this->mask = 1;
    }
    public function comments()
    {
        $this->validate([
            'content' => 'max:90|required'
        ]);
        $question = new Question();
        $question->lesson_id = $this->url->id;        
        $question->content = $this->content;
        $question->user_id = auth()->user()->id;
        $question->save();        
        if(auth()->user()->id != $this->course->user->id){
            $mail = new YahooMail();
            $mail->author_id = User::where('email','mashashie@yahoo.com')->first()->id;
            $mail->email_to = $this->course->user->id;
            $mail->subject = 'Notifications';
            $mail->body = 'Hello Dear <b>'.$this->course->user->pseudo.'</b> You have new comment from <b>'.auth()->user()->pseudo.'</b> on your course <b>'.$this->course->title.'</b> on lesson <b>'.$this->url->title.'</b>
            <a href="'.route('courses.resume',$this->course->id).'">click here to view</a
            ';
            $mail->save();
        }
        session()->flash('message','success');
        $this->reset(['content']);
        $this->mask = 0;
        $this->emit('refreshField');
    }

    public function response($id)
    {
        $this->validate([
            'response' => 'required|max:90'
        ]);
        $comment = Question::find($id);

        $response = new Response();
        $response->author_id = auth()->user()->id;
        $response->client_id = $comment->user->id;
        $response->course_id = $this->course->id;
        $response->content = $this->response;
        $response->comment_id = $comment->id;
        $response->comment_type = 'App\Models\LessonResponse';
        $response->save();
        if($response->author_id != $response->client_id){
            $mail = new YahooMail();
            $mail->author_id = User::where('email','mashashie@yahoo.com')->first()->id;
            $mail->email_to = $comment->user->id;
            $mail->subject = 'Notifications';
            $mail->body = 'You have new response at comment <b>'.str::limit($comment->content,20).'</b> from <b>'.auth()->user()->pseudo.'</b> on your course <b>'.$this->course->title.'</b> on lesson <b>'.$this->url->title.'</b> <a href="'.route('courses.resume',$this->course->id).'">click here to goto course</a>';
            $mail->save();
        }

        $this->emit('reviewSectionRefresh');
        $this->reset('response');
        session()->flash('message','success rated');
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
        if(ProgressCourse::where('user_id',auth()->user()->id)->where('course_id',$this->course->id)->count() > 0){
            $this->per =  ProgressCourse::where('user_id',auth()->user()->id)->where('course_id',$this->course->id)->first()->percent;      
        }
        else{
            $this->per = 0;
        }

        $percent = (ProgressLesson::where('course_id',$this->course->id)->where('user_id',auth()->user()->id)->where('view',1)->count() / Lesson::where('course_title',$this->course->title)->where('user_id',$this->course->user->id)->count()) * 100;        
                if(ProgressCourse::where('course_id',$this->course->id)->where('user_id',auth()->user()->id)->count() > 0)
                {
                    $pC = ProgressCourse::where('course_id',$this->course->id)->where('user_id',auth()->user()->id)->first();                    
                    $pC->percent = $percent;
                    $pC->save();
                }
                else{
                    $pC = new ProgressCourse();
                    $pC->course_id = $this->course->id;
                    $pC->user_id = auth()->user()->id;
                    $pC->percent = $percent;
                    $pC->save();
                }

        return view('livewire.course-resume',[
            'comments' => Question::where('lesson_id',$this->url->id)->latest()->paginate(4)
        ]);
    }

    public function deleteComment($id)
    {
        $comment = Question::findOrFail($id);
        $comment->delete();
        $this->emit('reviewSectionRefresh');
        session()->flash('message','Comment deleted!!');
    }

    public function report($id)
    {
        $lesson = Lesson::findOrFail($id);

        if(Report::where([
            'user_id' => auth()->user()->id,
            'entity_type' => 'App\Models\Lesson',
            'entity_id' => $lesson->id
        ])->count() == 0){
            $rep = new Report();
            $rep->user_id = auth()->user()->id;
            $rep->entity_id = $lesson->id;
            $rep->entity_type = 'App\Models\Lesson';
            $rep->save();            

            $report = Report::where([
                'entity_id' => $lesson->id,
                'entity_type' => 'App\Models\Lesson'
            ])->count();

            if($report > 10)
            {                
                $lesson->delete();
            }
        }     
        session()->flash('message','report saved!!');
        $this->emit('reviewSectionRefresh');
    }
}
