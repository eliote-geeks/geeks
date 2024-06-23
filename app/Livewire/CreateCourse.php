<?php

namespace App\Livewire;

use Exception;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Lecture;
use Livewire\Component;
use App\Models\Category;
use App\Models\YahooMail;
use App\Models\ClassCourse;
use App\Models\ClassSchool;
use App\Models\Requirement;
use Dawson\Youtube\Youtube;
use App\Models\Subscription;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\CourseNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CourseVerificationNotification;

class CreateCourse extends Component
{
    use WithFileUploads;
    public $myCourses = [];
    public $fields = [];
    public $show = false;
    public $short_description;
    public $categories = [];
    public $i;
    public $courseId;
    public $summary;
    public  $url ;
    public $A = 'audio';
    public $V = 'video';
    public $F = 'text';
    //step1
    public $current_Page = 1;
    public $title;
    public $category_id ;
    public $level;
    public $description;
    //Step 2
    public $photo;
    public $video_url = 'https://yourvideourl.com';

    //lessons
    public $lecture_id;
    public $VideoTitle;
    public $duration;
    public $video;
    public $editSection;
    public $requirements;
    public $search = '';
    public $errorMode = 1;

    
    //step 3
    public $target = " " ;
    private $validationRules = [
       1 => [ 
        'title' => 'required|max:120|unique:courses|min:5',
        'category_id' => 'required',
        'level' => 'required',
        'description' => 'required|min:10',
       ],
       2 => [
            'photo' => 'image|max:10485760', 
            'video_url' => 'required|url',        
       ],
       3 => [
            'nameField' => 'required|string|max:25|min:3'
       ],
       4 =>[
        'summary' => 'required|min:8',
        'short_description' => 'required|min:10',
        'requirements' => 'required'        
       ]
       
    ];

    //step 4 
    public $course_title;
    protected $tag;
    public $requirement;
    public $levelCourse = [
        1 => 'intermediate',
        2 => 'Beginners',
        3 => 'Expert',
        4 => 'Advance',
        5 => 'Master'
    ];



    public $pages = [
        1 => [
            'heading' =>'1',
            'subheading' => 'Basic Information ',
        ],
        2 => [
            'heading' => '2',
            'subheading' => 'Courses Media',
        ],
        3 => [
            'heading' => '3',
            'subheading' => 'Curriculum',
        ],
        4 => [
            'heading' => '4',
            'subheading' => 'Requirements',
        ]
    ];

    
    public $nameField = [];
    public $videoLecture;
    public $userId;
    public $lectureId;
    
    public $titleVideoU;
    public $dureeU;
    
    protected $listeners = [
        'refreshField' => '$refresh',
    ];
    public $message = '';
    public $id_lesson;

    public $lessonCourse = [];

    public function mount()
    {
        $this->message = 'Welcome to the reusable modal example';
        $this->userId = Auth::user()->id;
        $this->current_Page = 1;
        $this->myCourses = Course::where('user_id',auth()->user()->id)->get();
    }

    public function show($id)
    {
        $this->id_lesson = $id;
        if($this->show ==true)
            $this->show = false;
        else
            $this->show = true;
    }

    public function deleteLesson($id)
    {
        try{
            $lesson = Lesson::findOrFail($id);
            $lesson->delete();            
        }
        catch(Exception $e){
            $this->emit('refreshField');
        }   
        $this->emit('refreshField');
    }

    public function editSection($id)
    {
        $this->validate([
            'editSection' => 'required'
        ]);
        $lecture = Lecture::findOrFail($id);
        $lecture->nameField = $this->editSection;
        $lecture->save();
        $this->reset('editSection');
        session()->flash('message','changed save');
        $this->emit('refreshField');
    }

    public function updated($propertyName)
    {
        if($this->errorMode == 1)
            $this->validateOnly($propertyName,$this->validationRules[$this->current_Page]);
    }



    public function saveLesson($id)
    {
        $this->validate([
            'duration' => 'required',
            // 'video' => 'required|mimes:mp4,avi,mkv',
            'video' => 'required|active_url|unique:lessons'
        ]);
        
        
        // $video = Youtube::upload($this->video->getPathName(), [
        //     'title'  => $this->VideoTitle,
        //     'description' => 'slow motion array'
        // ]);
        // dd($video);
        // Youtube::delete('VIDEO_ID');
        $lesson = new Lesson();
        $lesson->lecture_id = $id;
        $lesson->course_title = $this->title;
        $lesson->user_id = $this->userId;
        $lesson->title = $this->VideoTitle;
        $lesson->duration = $this->duration;
        $lesson->video = $this->video;
        // $lesson->video = $video->getVideoId();
        $lesson->save();
        if(Course::where('title',$this->title)->count() > 0)
        {
            $c = Course::where('title',$this->title)->first();
            foreach(\App\Models\Subscription::where('course_id',$c->id)->where('type','buy')->get() as $sb)
            {
                $mail = new YahooMail();
                $mail->author_id = auth()->user()->id;
                $mail->email_to = $sb->user_id;
                $mail->subject = 'New Lesson in <b>'.$c->title.'</b>';
                $mail->body = Auth::user()->name. ' Just add new lesson on course <b>'.$c->title.'</b>';
                $mail->save();
            }
        }

        $this->show=false;
        $this->reset(['VideoTitle','duration','video']);
        $this->emit('refreshField');
    }

    public function edit($id)
    {
        $course = Course::find($id);
        $this->title = $course->title;
         $this->category_id = $course->category_id;
         $this->level = $course->level;
         $this->description = $course->description;         
         $this->video_url = $course->video_url;
         $this->requirements = $course->requirements;   
         $this->summary = $course->summary ;
         $this->short_description = $course->short_description ;
         $this->errorMode = 0;
         $this->courseId = $id;

         if(Lesson::where('course_title',$course->title)->count() > 0)
            $this->lessonCourse = Lesson::where('course_title',$course->title)->get();

         $this->reset('photo');
         $this->emit('refreshField');
    }

    public function typeFile($id)
    {
        dd($id);
    }

    public function render()
    {
        if($this->title == null)            
            $this->current_Page = 1;    
        else{
            $this->fields = Lecture::where('course_title',$this->title)->where('user_id',$this->userId)->get();                        
            $this->categories = Category::where('category_id',0)->orWhere('category_id','!=',0)->where('view',1)->get();
            // ('category_id','<>',0)->get();                    
        }
        if($this->search != '')
        {
            $this->myCourses = Course::where('title','like','%'.$this->search.'%')->get();
        }
        
        return view('livewire.create-course',[
            'classes' => \App\Models\ClassInstructor::where('user_id',auth()->user()->id)->where('status',1)->paginate(5)
        ]);
    }

    public function class($id)
    {
        $c = ClassSchool::find($id);
        $v = ClassCourse::where('course_id',$this->courseId)->where('school_id','!=',$c->school_id)->count();
        if(($v == 0)){
            if((\App\Models\ClassCourse::where('course_id',$this->courseId)->where('class_id',$id)->count() == 0)){
                if(ClassCourse::where('course_id',$this->courseId)->count() == 0){
                    $class = new ClassCourse();
                    $class->class_id = $id;
                    $class->course_id = $this->courseId;
                    $class->school_id = $c->school_id;
                    $class->save();
                }
            }
            else{
                $class = ClassCourse::where('course_id',$this->courseId)->where('class_id',$id)->first();
                $class->delete();
            }
    }
    }

    public function page($id)
    {
        $this->current_Page = $id;
    }


    public function addField()
    {        
        $this->validate([
            'nameField' => 'required|string|max:25'
        ]);
        if($this->title == null)
        {
            $this->current_Page = 1;
        }

        $field = new Lecture;
        $field->nameField = $this->nameField;
        // $field->videoLecture = $this->videoLecture;
        $field->course_title = $this->title;
        $field->user_id = $this->userId;    
        $field->save();
        session()->flash('message','saved');
        $this->fields[] = count($this->fields) + 1;
        $this->reset(['nameField']);
        $this->emit('refreshField');
    }

    public function removeField($key)
    {
        $requirement = Lecture::findOrFail($key);
        $requirement->delete();
        session()->flash('message','removed');
        $this->emit('refreshField');
    }

    public function validateData()
    {
    if($this->errorMode == 1){
        if($this->current_Page == 1)
        {
            $this->validate([        
                'category_id' => 'required',
                'level' => 'required',
                'title' => 'required|max:120|unique:courses|min:5',
                'description' => 'required|min:10',
             ]);
        }
        elseif($this->current_Page == 2)
        {
            $this->validate([        
                'photo' => 'image|max:10485760', 
                'video_url' => 'required'
             ]);
        }
        // elseif($this->current_Page == 3)
        // {

        // }
        elseif($this->current_Page == 4)
        {
            $this->validate([        
                'requirements' => 'required',
                'summary' => 'required',
                'short_description' => 'required',
             ]);                        
        }
    }
} 

    public function goToNextPage()
    {
        if($this->errorMode == 1){
            $this->resetErrorBag();
            $this->validateData();
        }
        if($this->photo!=null)
        {
            $this->photo->store('courses');
            $this->url = Storage::url($this->photo);
        }
        if($this->current_Page > 4)
            $this->current_Page == 4;
        else
            $this->current_Page++;
        
    }



    public function goToPreviousPage()
    {
        if($this->errorMode == 1)
        {
           $this->resetErrorBag();
           $this->validateData();
        }

        if($this->current_Page < 1)
            $this->current_Page == 1;
        else
            $this->current_Page--;
    }

    public function submit()
    {
        //dd($this->category_id);
        if($this->errorMode == 1){
            $this->resetErrorBag(); 
            $this->validate([        
                'category_id' => 'required',
                'level' => 'required',
                'title' => 'required|max:120|unique:courses|min:10',
                'description' => 'required|min:10',
                'photo' => 'image|max:10485760', 
                'video_url' => 'required|url',
                'summary' => 'required',
                'short_description' => 'required',
                'requirements' => 'required'
            ]);
            
        }

        if($this->errorMode == 1){
            $this->photo =  $this->photo->store('courses','public');
            $course = new Course();        
         
        }
        else{
            $course = Course::find($this->courseId);
            if($this->photo == null){
                $this->photo == $course->photo;
            }
            else{
                $this->photo =  $this->photo->store('courses','public');
            }

            if(Lesson::where('course_title',$course->title)->count() > 0)
            {
                foreach($this->lessonCourse as $lessonC)
                {
                    $lessonC->course_title = $this->title;
                    $lessonC->save();
                }
            }
        }


        $course->title = $this->title;
        $course->category_id = $this->category_id;
        $course->level = $this->level;
        $course->description = $this->description;
        $course->short_description = $this->short_description;
        if($this->photo != null)
            $course->photo = $this->photo;           
        $course->video_url = $this->video_url;            
                
        $course->user_id = $this->userId;
        $course->summary = $this->summary;
        if($this->level == 'Beginners')
        {
            $course->discount_price = 0;
            $course->actual_price = 0;
        }
        elseif($this->level == 'Intermediate')
        {
            $course->discount_price = 5;
            $course->actual_price = 5;
        }
        elseif($this->level == 'Advance')
        {
            $course->discount_price = 10;
            $course->actual_price = 10;
        }
        elseif($this->level == 'Master')
        {
            $course->discount_price = 15;
            $course->actual_price = 15;
        }
        else{
            $course->discount_price = 0;
            $course->actual_price = 0;
        }
        $course->view_count = 0;
        $course->subscriber_count = 0;
        $course->status = 0;            
        $course->requirements = $this->requirements;    

        
        $ui = auth()->user();
        if(!empty(auth()->user()->first_name) && !empty(auth()->user()->last_name) && !empty(\App\Models\Instructor::where('instructor_id',auth()->user()->id)->first()->paypal_email)){
            $course->save();
            Notification::send($ui,new CourseVerificationNotification($course));
        }
        
        $this->reset(['category_id','description','short_description','photo','video_url','summary']);
        $this->courseId = $course->id;
        $this->userId = Auth::user()->id;
        $this->current_Page = 1;
        $this->errorMode = 1;
        session()->flash('message','Your course  successfully uploaded go to dashboard for publish!!');
        if($this->errorMode == 1){
            Notification::send(\App\Models\User::all(), new CourseNotification($course->title));
            
        }
       
            
    }

    
    public function land($i)
    {
        $this->current_Page = $i;
    }


}
