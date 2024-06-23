<?php

namespace App\Livewire;

use App\Models\School;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Schoolview extends Component
{
    public function render()
    {
        
        // \Illuminate\Support\Facades\DB::table('class_instructors')
        // ->leftJoin('class_schools','class_instructors.class_id','=','class_schools.id')
        // ->selectRaw('class_instructors.user_id')
        // ->distinct()
        // ->where('class_instructors.status','=',1)
        // ->where('class_schools.school_id','=',$school->id)
        // ->count();
        // $students = \Illuminate\Support\Facades\DB::table('schools')
        // ->leftJoin('user_school_classes','user_school_classes.entity_id','=','schools.id')
        // ->selectRaw('schools.id')
        // ->where('user_school_classes.entity_type','\App\Models\School')
        // ->where('user_school_classes.entity_id',$school->id)
        // ->count()
        
        return view('livewire.schoolview',[
            'schools' => School::latest()->take(5)->get(),
        ]);
    }
}
