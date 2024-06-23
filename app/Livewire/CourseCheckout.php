<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class CourseCheckout extends Component
{
    public $plan;
    public $first_name;
    public $last_name;
    public $address1;
    public $address2;
    public $number;
    public $paypalemail; 
    public $country;
    public $state;
    public $zip;

    public function render()
    {
        return view('livewire.course-checkout');
    }

    public function mount()
    {
        $user = User::find(auth()->user()->id);
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name ;
        $this->address1 = $user->address1;
        $this->address2 = $user->address2;
        $this->number = $user->number;
        $this->country = $user->country;
        $this->state = $user->state;        
    }

    public function save()
    {
        
        // $this->validate([
        //     'first_name' => 'required|max:25|min:3|string',
        //     'last_name' => 'required|max:25|min:3|string',
        //     'number' => 'required|numeric',
        //     'address1' => 'required|alpha_num',
        //     'country' => 'required|string',
        //     'state' => 'required|string',
        //     'zip' => 'required|numeric',
        
        // ]);
        $this->validate([
             'paypalemail' => 'required|email'
        ]);
        
        $user = User::find(auth()->user()->id);
        // $user->first_name = $this->first_name;
        // $user->last_name = $this->last_name;
        // $user->address1 = $this->address1;
        // $user->address2 = $this->address2;
        // $user->number = $this->number;
        // $user->country = $this->country;
        // $user->state = $this->state;
        // $user->save();        
        return redirect()->route('courses.checkout',[
            'user' => $user,
            'paypalEmail' => $this->paypalemail,
            'plan' => $this->plan
        ]);

    }
}
