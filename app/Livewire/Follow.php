<?php

namespace App\Livewire;

use App\Models\School;
use App\Models\UserSchoolClass;
use Livewire\Component;

class Follow extends Component
{
    public $school;
    public $price;     
    public function follow()
    {
        $id = $this->school->id;
        if(UserSchoolClass::where('user_id',auth()->user()->id)->where('entity_id',$id)->where('entity_type','\App\Models\School')->count() == 0){
            $follow = new UserSchoolClass();
            $follow->user_id = auth()->user()->id;
            $follow->entity_id = $id;
            $follow->entity_type = '\App\Models\School';
            $follow->save();
            session()->flash('message','Saved');
        }
        else{
            $entity = UserSchoolClass::where('user_id',auth()->user()->id)->where('entity_id',$id)->where('entity_type','\App\Models\School')->first();
            $entity->delete();
            session()->flash('message','Change saved');
        }
    }

    public function number()
    {
        $this->validate([
            'price' => 'required|integer|max:1000'
        ]);
        $this->school->price = $this->price;
        $this->school->save();
        $this->reset('price');        
    }
    public function render()
    {
        return view('livewire.follow',[
            'students' => UserSchoolClass::where('entity_type','\App\Models\School')->where('entity_id',$this->school->id)->count()
        ]);
    }
}
