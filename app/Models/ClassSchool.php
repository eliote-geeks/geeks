<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassSchool extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function instructors()
    {
       return $this->belongsToMany(Instructor::class,'class_id');
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function students($id)
    {
        $students = DB::table('class_schools')
        ->leftJoin('user_school_classes','user_school_classes.entity_id','=','class_schools.id')
        ->selectRaw('user_school_classes.user_id')
        ->where('class_schools.id',$id)
        ->count();
        return $students;
    }
}
