<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class School extends Model
{
    use SoftDeletes;
    use HasFactory;    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classes()
    {
        return $this->hasMany(ClassSchool::class);
    }

    public function students($id)
    {
        $students = DB::table('user_school_classes')
        ->leftJoin('class_schools','class_schools.id','=','user_school_classes.entity_id')
        ->selectRaw('user_school_classes.user_id as students')
        ->where('user_school_classes.entity_type','=','\App\Models\ClassCourse')
        ->where('class_schools.school_id',$id)
        ->count();
        return $students;
    }

    public function instructors($id)
    {
        $instructors = DB::table('class_schools')
        ->leftJoin('schools','schools.id','=','class_schools.school_id')
        ->leftJoin('class_instructors','class_instructors.class_id','=','class_schools.id')
        ->select(DB::raw('distinct class_instructors.id'))
        ->where('schools.id','=',$id)
        ->count();
        return $instructors;
    }

    public function reviews($id)
    {
        $school = School::find($id);
        $reviews = SchoolReview::where('school_id',$school->id)->orderByDesc('id')->paginate(6);     
        $rat1 = SchoolReview::where('school_id',$school->id)->where('rating','=','1')->get();
        $rat2 = SchoolReview::where('school_id',$school->id)->where('rating','=','2')->get();
        $rat3 = SchoolReview::where('school_id',$school->id)->where('rating','=','3')->get();
        $rat4 = SchoolReview::where('school_id',$school->id)->where('rating','=','4')->get();
        $rat5 = SchoolReview::where('school_id',$school->id)->where('rating','=','5')->get();
        $rat = SchoolReview::where('school_id',$school->id)->get();

        
        if($rat->count() == 0){
            $student_review=0;
            $s=0;
        }
        else{
            $student_review = round((($rat1->count() * 1) + ($rat2->count() * 2) + ($rat3->count() * 3) + ($rat4->count() * 4) + ($rat5->count() * 5)) / $rat->count(),1);
            $s = $rat->count();
        }
        
        
        if($rat1->count() > 0)
            $star1 = round(($rat1->count() * 100) / $rat->count(),0);
        else
            $star1 = 0;
        
        if($rat2->count() > 0)
            $star2 = round(($rat2->count() * 100) / $rat->count(),0);
        else
            $star2 = 0;
        
        if($rat3->count() > 0)
            $star3 = round(($rat3->count() * 100) / $rat->count(),0);
        else
            $star3 = 0;
        
        if($rat4->count() > 0)            
            $star4 = round(($rat4->count() * 100) / $rat->count(),0);
        else
            $star4 = 0;
        
        if($rat5->count() > 0)
            $star5 = round(($rat5->count() * 100) / $rat->count(),0);
        else
            $star5 = 0;
        return [
            '1' => $star1,
            '2' => $star2,
            '3' => $star3,
            '4' => $star4,
            '5' => $star5,
            '6' => $rat->count(),
            '7' => $student_review,
            '8' => $s,
            '9' => $reviews
        ];
    }
}
