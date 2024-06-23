<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class CoursePaypal extends Component
{
    public $course;
    public $first_name;
    public $last_name;
    public $address1;
    public $address2;
    public $number;
    public $state;
    public $country;
    public $zip;
    public $process = 0;
    public function mount()
    {
        $user = User::find(auth()->user()->id);
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->address1 = $user->address1;
        $this->address2 = $user->address2;
        $this->number = $user->number;
        $this->zip = $user->zip;
        $this->state = $user->state;
        $this->country = $user->country;
    }

    public function save()
    {
        $this->validate([
            'first_name' => 'required|string|max:40|min:3',
            'last_name' => 'required|string|max:40|min:3',
            'address1' => 'required|alpha_num',
            'address2' => 'required|alpha_num',
            'number' => 'required|numeric',
            'zip' => 'required|numeric',            
            'country' => 'required',
        ]);
        
        
        $user = User::findOrFail(auth()->user()->id);
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->address1 = $this->address1;
        $user->address2 = $this->address2 ;
        $user->number = $this->number ;
        $user->zip = $this->zip;
        $user->country = $this->country ;
        $user->save();    
        $this->reset(['country','zip','number','address2','address1','first_name','last_name']);
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->address1 = $user->address1;
        $this->address2 = $user->address2;
        $this->number = $user->number;
        $this->zip = $user->zip;
        $this->state = $user->state;
        $this->country = $user->country;
        session()->flash('message','Information saved now process to payment');        
        $this->process = 1;     
        
    }
    public function render()
    {
        return view('livewire.course-paypal');
    }
}
