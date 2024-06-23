<?php

namespace App\Livewire;
Use \App\Models\User;
use Livewire\Component;
use App\Models\ClassInstructor;

class InviteInstructorToClass extends Component
{
    public $search = '';
    public $class;

    public function invitation($id)
    {
        $class = ClassInstructor::where('user_id',$id)->where('class_id',$this->class->id)->count();
        if($class == 0){
            $classInstructor = new ClassInstructor();
            $classInstructor->user_id = $id;
            $classInstructor->class_id = $this->class->id;
            $classInstructor->save();
            session()->flash('message','saved');
        }
        else{
            $class = ClassInstructor::where('class_id',$this->class->id)->where('user_id',$id)->first();
            $class->delete();
            session()->flash('message','Changes Saved');
        }
    }
    public function render()
    {
        if($this->search != ''){
            return view('livewire.invite-instructor-to-class',[
                'instructors' => User::where('user_type','App\Models\Instructor')->where('name','like','%'.$this->search.'%')->get()
            ]);
        }
        else{
            return view('livewire.invite-instructor-to-class');
        }
    }
}
