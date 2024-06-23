<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    use HasFactory;

    public function students($id)
    {
        $admin = User::findOrFail($id);
        if($admin->user_type != 'App\Models\Admin')
        {
            return 0;
        }

        $count = DB::table('schools')
        ->leftJoin('user_school_classes','user_school_classes.entity_id','=','schools.id')
        ->select(DB::raw('COUNT(user_school_classes.id) as users'))
        ->where('user_school_classes.entity_type','=','\App\Models\ClassCourse')
        ->where('schools.deleted_at','=',null)
        ->where('schools.user_id','=',$admin->id)
        ->first();

        return $count->users;
    }

    public function instructors($id)
    {
        $admin = User::findOrFail($id);
        if($admin->user_type != 'App\Models\Admin')
        {
            return 0;
        }

        $count = DB::table('class_instructors')
        ->leftJoin('class_schools','class_schools.id','=','class_instructors.class_id')
        ->leftJoin('schools','schools.id','=','class_schools.school_id')
        ->select(DB::raw('COUNT(class_instructors.id) as users'))
        ->where('schools.deleted_at','=',null)
        ->where('schools.user_id','=',$admin->id)
        ->where('class_instructors.status','=',1)
        ->first();

        return $count->users;
    }

    public function classes($id)
    {
        $admin = User::findOrFail($id);
        if($admin->user_type != 'App\Models\Admin')
        {
            return 0;
        }

        $count = DB::table('schools')
        ->leftJoin('class_schools','class_schools.school_id','=','schools.id')
        ->select(DB::raw('COUNT(class_schools.id) as class'))
        ->where('schools.deleted_at','=',null)
        ->where('schools.user_id','=',$admin->id)
        ->first();

        return $count->class;
    }


    public function payouts($id)
    {
        $admin = User::findOrFail($id);
        if($admin->user_type != 'App\Models\Admin')
        {
            return 0;
        }

        $amount = DB::table('admin_payouts')
        ->select(DB::raw('SUM(admin_payouts.amount) as amount'))
        ->where('user_id',$admin->id)
        ->first();
        return $amount->amount;
    }
}
