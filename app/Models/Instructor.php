<?php

namespace App\Models;

use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Instructor extends Model
{
    use HasFactory;
    public function user() 
    { 
      return $this->morphOne('App\Model\User', 'profile');
    }

    public function courseByStudent($id)
    {
      $course = Course::findOrFail($id);
      $students = Order::where('course_id',$course->id)->where('status','SUCCESS..')->count();
      return $students;

      
    }

    public static function students($id)
    {
        $user = User::findOrFail($id);
        if($user->user_type == 'App\Models\Instructor')
        {
          $course = DB::table('courses')
          ->leftJoin('subscriptions','courses.id','=','subscriptions.course_id')
          ->leftJoin('users','subscriptions.user_id','=','users.id')
          ->selectRaw('distinct subscriptions.user_id')
          ->where('courses.user_id','=',$id)
          ->where('subscriptions.type','=','buy')
          ->where('users.user_type','=','App\Models\Student')
          ->where('courses.deleted_at','=',null)
          ->where('subscriptions.deleted_at','=',null)
          ->get();
          return $course->count();
        }
        else{
          return null;
        }
    }

    public static function rating($id)
    {
      $user = User::find($id);
      if($user->user_type == 'App\Models\Instructor')
      {
        $student_review=0;
        $s=0;

        $rat1 = DB::table('reviews')
        ->leftJoin('courses','courses.id','=','reviews.course_id')
        ->selectRaw('reviews.*')
        ->where('courses.user_id',$id)
        ->where('reviews.rating','=','1')
        ->where('courses.deleted_at','=',null)
        ->where('reviews.deleted_at','=',null)
        ->get();
        

        $rat2 = DB::table('reviews')
        ->leftJoin('courses','courses.id','=','reviews.course_id')
        ->selectRaw('reviews.*')
        ->where('courses.user_id',$id)
        ->where('reviews.rating','=','2')
        ->where('courses.deleted_at','=',null)
        ->where('reviews.deleted_at','=',null)
        ->get();

        $rat3 = DB::table('reviews')
        ->leftJoin('courses','courses.id','=','reviews.course_id')
        ->selectRaw('reviews.*')
        ->where('courses.user_id',$id)
        ->where('reviews.rating','=','3')
        ->where('courses.deleted_at','=',null)
        ->where('reviews.deleted_at','=',null)
        ->get();

        $rat4 = DB::table('reviews')
        ->leftJoin('courses','courses.id','=','reviews.course_id')
        ->selectRaw('reviews.*')
        ->where('courses.user_id',$id)
        ->where('reviews.rating','=','4')
        ->where('courses.deleted_at','=',null)
        ->where('reviews.deleted_at','=',null)
        ->get();

        $rat5 = DB::table('reviews')
        ->leftJoin('courses','courses.id','=','reviews.course_id')
        ->selectRaw('reviews.*')
        ->where('courses.user_id',$id)
        ->where('reviews.rating','=','5')
        ->where('reviews.deleted_at','=',null)
        ->where('courses.deleted_at','=',null)
        ->get();
        
        $rat = Course::where('user_id',$id)->get();
        $student = DB::table('reviews')
        ->leftJoin('courses','courses.id','=','reviews.course_id')
        ->selectRaw('reviews.*')
        ->where('courses.user_id',$id)
        ->where('reviews.deleted_at','=',null)
        ->where('courses.deleted_at','=',null)
        ->count();
        if($student <= 0)
          $student = 1;
         
        if($rat->count() == 0){    
            $student_review=0;
            $s=0;
        }
        else{
            $student_review = round((($rat1->count() * 1) + ($rat2->count() * 2) + ($rat3->count() * 3) + ($rat4->count() * 4) + ($rat5->count() * 5)) / $student,1);
            $s = $rat->count();
        }    
        return  $student_review;
      }
      else{
        return null;
      }
    }

    public function earns($id)
    {
      $som = 0;
        $amounts = DB::table('payments')
            ->leftJoin('courses','courses.id','=','payments.course_id')
            ->select(DB::raw("SUM(payments.amount) as som"))
            ->whereYear('payments.created_at', date('Y'))
            ->where('courses.user_id','=',$id)
            ->where('courses.deleted_at','=',null)
            ->where('payments.status','SUCCESS..')
            ->groupBy(DB::raw("Month(payments.created_at)"))
            ->first();                     
            // dd($amounts->som);
    }

    public function instructor($id)
    {
        $instructor = Instructor::where('instructor_id',$id)->first();
        if($instructor!=null)
          return $instructor->about_instructor;
          else
          return 'im\'  just a cigaret';
    }

    public function studentRate($id)
    {
      $student = DB::table('reviews')
      ->leftJoin('courses','courses.id','reviews.course_id')
      ->leftJoin('users','reviews.user_id','=','users.id')
      ->selectRaw('count(reviews.id) total')
      ->where('courses.user_id',$id)
      ->where('reviews.deleted_at','=',null)
      ->first();
       return $student->total;
    }

    public function classes()
    {
       return $this->belongsToMany(ClassSchool::class,'user_id');
    }

    public static function amount($id)
    {
        $instructor = User::findOrFail($id);
        if($instructor->user_type != 'App\Models\Instructor'){
            return 0;
        }

        $payments = DB::table('courses')
        ->leftJoin('payments','payments.course_id','=','courses.id')
        ->select(DB::raw('SUM(amount) as amount'))
        ->where('courses.deleted_at','=',null)
        ->where('payments.deleted_at','=',null)
        ->where('courses.user_id','=',$instructor->id)
        ->where('payments.status','=','SUCCESS..')
        ->first();

        return $payments->amount;
    }

    
}
