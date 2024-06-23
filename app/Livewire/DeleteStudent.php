<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteStudent extends Component 
{
    public function deleted()
    {
        $user = User::find(auth()->user()->id);
        if(file_exists(auth()->user()->profile_photo_url))
        {
            unlink(auth()->user()->profile_photo_url);
        }
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        // $user->delete();
        $user->password = '';
        $user->save();
        return redirect()->route('dashboard');
        session()->flash('message','Deleted Successfully if you want to recovery your account contact admin with your login');
        
    }
    public function render()
    {
        return view('livewire.delete-student');
    }
}
