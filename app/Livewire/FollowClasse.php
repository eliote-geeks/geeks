<?php

namespace App\Livewire;

use App\Models\ClassCourse;
use Livewire\Component;
use App\Models\UserSchoolClass;

class FollowClasse extends Component
{
    public $class;
    public function follow()
    {        
        $id = $this->class->id;
        if(UserSchoolClass::where('user_id',auth()->user()->id)->where('entity_id',$id)->where('entity_type','\App\Models\ClassCourse')->count() == 0){
            $follow = new UserSchoolClass();
            $follow->user_id = auth()->user()->id;
            $follow->entity_id = $id;
            $follow->entity_type = '\App\Models\ClassCourse';
            $follow->save();
        }
        else{
            $entity = UserSchoolClass::where('user_id',auth()->user()->id)->where('entity_id',$id)->where('entity_type','\App\Models\ClassCourse')->first();
            $entity->delete();
        }
    }
    public function render()
    {
        return view('livewire.follow-classe',[
            'students' => UserSchoolClass::where('entity_type','\App\Models\ClassCourse')->where('entity_id',$this->class->id)->count(),
            'courses' => ClassCourse::where('class_id',$this->class->id)->where('status',1)->count()
        ]);
    }
}
