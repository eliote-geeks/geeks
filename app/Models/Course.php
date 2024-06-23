<?php

namespace App\Models;

use App\Models\Lecture;
use App\Models\Response;
use App\Models\Trending;
use App\Models\Requirement;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use tizis\laraComments\Contracts\ICommentable;
use tizis\laraComments\Traits\Commentable;

/**
 * Class Course
 * @package App\Models
 * @version April 15, 2022, 2:21 pm UTC
 *
 * @property \App\Models\Category $category
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $comments
 * @property \Illuminate\Database\Eloquent\Collection $coursesUsers
 * @property \Illuminate\Database\Eloquent\Collection $enrolls
 * @property \Illuminate\Database\Eloquent\Collection $items
 * @property \Illuminate\Database\Eloquent\Collection $lessons
 * @property \Illuminate\Database\Eloquent\Collection $payments
 * @property \Illuminate\Database\Eloquent\Collection $reviews
 * @property \Illuminate\Database\Eloquent\Collection $views
 * @property integer $user_id
 * @property integer $category_id
 * @property string $title
 * @property string $description
 * @property string $short_description
 * @property string $about_instructor
 * @property number $discount_price
 * @property number $actual_price
 * @property string $playlist_url
 * @property integer $view_count
 * @property integer $subscriber_count
 * @property integer $status
 * @property string $photo
 */
class Course extends Model implements ICommentable
{
    use SoftDeletes;
    use Commentable; 
    use HasFactory;

    public $table = 'courses';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'level',
        'about_instructor',
        'discount_price',
        'actual_price',
        'playlist_url',
        'view_count',
        'subscriber_count',
        'status',
        'photo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'category_id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'about_instructor' => 'string',
        'discount_price' => 'float',
        'actual_price' => 'float',
        'playlist_url' => 'string',
        'view_count' => 'integer',
        'subscriber_count' => 'integer',
        'status' => 'integer',
        'photo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'category_id' => 'required',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'about_instructor' => 'required|string',
        'discount_price' => 'required|numeric',
        'actual_price' => 'required|numeric',
        'playlist_url' => 'required|string|max:255',
        'view_count' => 'required|integer',
        'subscriber_count' => 'required|integer',
        'status' => 'required|integer',
        'photo' => 'nullable|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class, 'course_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function coursesUsers()
    {
        return $this->hasMany(\App\Models\CoursesUser::class, 'course_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function enrolls()
    {
        return $this->hasMany(\App\Models\Enroll::class, 'course_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function items()
    {
        return $this->hasMany(\App\Models\Item::class, 'course_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function lessons()
    {
        return $this->hasMany(\App\Models\Lesson::class, 'course_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'course_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function reviews()
    {
        return $this->hasMany(\App\Models\Review::class, 'course_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function views()
    {
        return $this->hasMany(\App\Models\View::class, 'course_id');
    }

    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }


    public function rating($id)
    {
        $student_review=0;
        $s=0;
        $rat1 = \App\Models\Review::where('course_id',$id)->where('rating','=','1')->get();
        $rat2 = \App\Models\Review::where('course_id',$id)->where('rating','=','2')->get();
        $rat3 = \App\Models\Review::where('course_id',$id)->where('rating','=','3')->get();
        $rat4 = \App\Models\Review::where('course_id',$id)->where('rating','=','4')->get();
        $rat5 = \App\Models\Review::where('course_id',$id)->where('rating','=','5')->get();
        $rat = \App\Models\Review::where('course_id',$id)->get();
        if($rat->count() == 0){    
            $student_review=0;
            $s=0;
        }
        else{
            $student_review = round((($rat1->count() * 1) + ($rat2->count() * 2) + ($rat3->count() * 3) + ($rat4->count() * 4) + ($rat5->count() * 5)) / $rat->count(),1);
            $s = $rat->count();
        }    
        return ['0' => $student_review,
                '1' => $s
               ];
    }

    public function hourSecond($hour)
    {
        $arrayHour = explode(':',$hour);
        $second = 3600 * $arrayHour[0] + 60 * $arrayHour[1] + $arrayHour[2];
        return $second;
    }

    public function hourCourse($title)
    {
        $lessons = \App\Models\Lesson::where('course_title',$title)->get();
        $total = 0;
        foreach($lessons as $lesson){
            $arrayHour = explode(':',$lesson->duration);
            $second = 3600 * $arrayHour[0] + 60 * $arrayHour[1] + $arrayHour[2];
            $total += $second;            
        }        
        $hourTotal = $total/3600;
        return round($hourTotal).'h';    
    }

    public function lessonMin($id)
    {
        $lesson = Lesson::find($id);
        $arrayHour = explode(':',$lesson->duration);
        $second = 3600 * $arrayHour[0] + 60 * $arrayHour[1] + $arrayHour[2];
         
         $min = round($second/60) >= 60 ? round($second/60/60).'h' : round($second/60).'min';
         return $min;
        
    }

    public function minField($id)
    {
        $lessons = \App\Models\Lesson::where('lecture_id',$id)->get();
        $total = 0;
        foreach($lessons as $lesson){
            $arrayHour = explode(':',$lesson->duration);
            $second = 3600 * $arrayHour[0] + 60 * $arrayHour[1] + $arrayHour[2];
            $total += $second;                        
        }        
        $totalSecond = $total / 60;
        return $totalSecond;

    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function response()
    {
         return $this->hasMany(Response::class);
    }

    public function classes()
    {
        return $this->belongsToMany(ClassSchool::class);
    }
    
    public function orderInstructor()
    {
        return $this->hasMany(InstructorPayout::class);
    }

    public function showClass($id)
    {
        if(ClassCourse::where('course_id',$id)->where('status',1)->count() > 0)
        {
            $classCourse = ClassCourse::where('course_id',$id)->where('status',1)->first();
            $class = ClassSchool::find($classCourse->class_id);
            return "Path: <a class='avatar-xs' href='".route('class.show',$class->id)."'> <small>".$class->name."</small></a>";
            // <img src='".$class->logo."' alt='' class='rounded-circle img-4by3-xs'>
            
        }
        else
            return null;
    }

}
