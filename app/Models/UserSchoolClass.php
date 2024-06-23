<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSchoolClass extends Model
{
    use HasFactory;
    public static function classes()
    {
        $classes = DB::table('class_schools')
                ->LeftJoin('user_school_classes','user_school_classes.entity_id','=','class_schools.id')
                ->selectRaw('class_schools.*')
                ->distinct()
                ->where('user_school_classes.user_id',auth()->user()->id)
                ->where('class_schools.deleted_at','=',null)
                ->get();
                return $classes;
    }
}
