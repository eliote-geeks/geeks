<?php

namespace App\Livewire;

use App\Models\School;
use App\Notifications\SchoolNotification;
use Livewire\Component;
use Livewire\WithFileUploads;       
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage as store;

class CreateShool extends Component
{
    use WithFileUploads;
    protected $listeners = [
        'refreshField' => '$refresh',
    ];
    public $first_name;
    public $last_name;
    public $email;
    public $phone;

    public $location;
    public $departement; 

    public $school_id;
    public $title;
    public $compagny;
    public $website;
    public $industry;
    public $logo;
    public $description;
    public $terms;

    public function edit($id)
    {
        $this->school_id = $id;       
        $school = School::find($this->school_id);
        $this->first_name = $school->first_name ;
        $this->last_name = $school->last_name  ;
        $this->email = $school->email ;
        auth()->user()->id = $school->user_id ;
        $this->phone = $school->phone ;
        $this->location = $school->location ;
        $this->departement = $school->departement ;
            $this->title = $school->title ;  
            $this->website = $school->website ;
            $this->industry = $school->industry ;
            // $this->logo = $school->logo;
            $this->description = $school->description;        
            $this->emit('refreshField');    
            session()->flash('message','saved');
        
    }
    public function mount()
    {
        $this->first_name = auth()->user()->first_name;
        $this->last_name = auth()->user()->last_name;
        $this->email = auth()->user()->email;
        $this->phone = auth()->user()->number;
    }

    public function save()
    {
        if($this->school_id == null){
        
        $this->validate([
            'first_name' => 'required|string|max:90|min:3',
            'last_name' => 'required|string|max:90|min:3',
            'email' => 'required|email',
            'phone' => 'required|integer',
            'location' => 'required',
            'departement' => 'required',
            'title' => 'required|max:90|min:3|unique:schools',
            'website' => 'required|url',
            'industry' => 'required',
            'logo' => 'required|mimes:png,jpg',
            'description' => 'required|min:10',
            'terms' => 'required'
        ]);
    }
        if($this->school_id == null)
            $school = new School;
        else
            $school = School::find($this->school_id);
        $school->first_name = $this->first_name;
        $school->last_name = $this->last_name;
        $school->email = $this->email;
        $school->user_id = auth()->user()->id;
        $school->phone = $this->phone;
        $school->location = $this->location;
        $school->departement = $this->departement;
        $school->title = $this->title;  
        $school->website = $this->website;
        $school->industry = $this->industry;
        if($this->logo != null)
            $school->logo = 'storage/' . $this->logo->store('logos','public');

        $school->description = $this->description;        
        $school->save();        
        if($this->school_id == null){
            Notification::send(\App\Models\User::all(), new SchoolNotification($school->id));         
        }
        $this->reset();
        session()->flash('message','Saved');
    }
    public function render()
    {
        return view('livewire.create-shool');
    }
}


