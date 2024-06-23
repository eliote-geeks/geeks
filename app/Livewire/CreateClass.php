<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\School;
use Livewire\Component;
use App\Models\Instructor;
use App\Models\ClassSchool;
use Livewire\WithFileUploads;
use App\Models\ClassInstructor;
use App\Notifications\ClassNotification;
use Illuminate\Support\Facades\Notification;
use Symfony\Contracts\Service\Attribute\Required;

class CreateClass extends Component
{
    use WithFileUploads;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $school;
    
    public $type; 
    public $id_class;
    public $school_id;

    public $name;
    public $logo;
    public $description;
    public $terms;


    public $edit;

    public function mount()
    {
            $this->first_name = auth()->user()->first_name;
            $this->last_name = auth()->user()->last_name;
            $this->email = auth()->user()->email;
            $this->phone = auth()->user()->number;
    }
    
    public function invitation($id)
    {
        $class = ClassInstructor::where('user_id',$id)->where('class_id',$this->id_class)->count();
        if($class == 0){
            $classInstructor = new ClassInstructor();
            $classInstructor->user_id = $id;
            $classInstructor->class_id = $this->id_class;
            $classInstructor->save();
            session()->flash('message','saved');
        }
        else{
            $class = ClassInstructor::where('class_id',$this->id_class)->where('user_id',$id)->first();
            $class->delete();
            session()->flash('message','deleted');
        }
    }

    public function edit($id)
    {
        $this->edit = $id;
        $class = ClassSchool::findOrFail($id);
        $this->school->id = $class->school_id  ;
        $this->name = $class->name ;
        $this->type = $class->type;
        // $class->logo = 'storage/' . $this->logo->store('logos','public');
        $this->description = $class->description;
    }

    public function save()
    {
       if($this->edit == null){
        $this->validate([
            'name' => 'required|unique:class_schools|max:90|min:3',
            'logo' =>'required|image|mimes:jpg,png',
            'type' => 'required|string|max:30',
            'description' => 'required|min:10' ,
            'terms' => 'required'
        ]);
     
    }

     if($this->edit == null)   
        $class = new ClassSchool();
    else
        $class = ClassSchool::findOrFail($this->edit);


        $class->school_id = $this->school->id;
        $class->name = $this->name;
        $class->type = $this->type;    
        if($this->logo != null){
            $class->logo = 'storage/' . $this->logo->store('logos','public');
        }
        $class->description = $this->description;
        $class->user_id = auth()->user()->id;
        $class->save();
        if($this->edit == null){
            Notification::send(\App\Models\User::all(), new ClassNotification($class->id));         
        }
        $this->id_class = $class->id;
        $this->reset(['name','logo','description','school_id']);
    }

    public function render()
    {        
        if($this->edit!=null)
        {
            $this->id_class = $this->edit;
        }
        elseif(\App\Models\ClassSchool::where('user_id',auth()->user()->id)->count() > 0)
        {
            $this->id_class = ClassSchool::inRandomOrder()->where('user_id',auth()->user()->id)->first()->id;
        } 
        $schools = School::where('user_id',auth()->user()->id)->get();
        return view('livewire.create-class',[
            'schools' => $schools
        ]);
    }
}
