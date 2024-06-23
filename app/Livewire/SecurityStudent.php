<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class SecurityStudent extends Component
{
    public $email;
    public $user = [];
    public $currentPassword;
    public $newPassword;
    public $confirmPassword;

    public function mount()
    {
        $this->user = User::find(auth()->user()->id);
    }

    public function savEmail()
    {
        $this->validate([
            'email' => 'required|unique:users'
        ]);
        $this->user = User::find(auth()->user()->id);
        $this->user->email = $this->email;
        $this->user->save();
        $this->reset('email');
    }

    public function savePasseword()
    {
        $this->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required',
            'confirmPassword' => 'required'
        ]);
        $this->user = User::find(auth()->user()->id);
        if(Hash::check($this->currentPassword, $this->user->password) == true)
        {
            if($this->newPassword == $this->confirmPassword)
            {
                $this->user->forceFill([
                    'password' => Hash::make($this->confirmPassword),
                ])->save();
                $this->reset(['currentPassword','newPassword','confirmPassword']);
                session()->flash('message','saved Successfully');
            }        

        }
        else{
            session()->flash('message','Password unknow password');
        }

        
    }

    public function render()
    {
        return view('livewire.security-student');
    }
}
