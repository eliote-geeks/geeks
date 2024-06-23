<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;


class ProfileEdit extends Component
{
    use WithFileUploads;
    public $user = [];
    public $profile_photo_path;

    public function mount()
    {
        $user = User::find(auth()->user()->id);
        // $this->name = $user->name;
        // $this->email = $user->email;
    }

    public function photoUpdate()
    {
        $photo = User::find(auth()->user()->id);
        if($this->profile_photo_path != null)             
        {            
            if(file_exists(auth()->user()->profile_photo_url))
            {
                unlink(auth()->user()->profile_photo_url);
            }
            $photo->updateProfilePhoto($this->profile_photo_path);
            $this->reset();
        }
        session()->flash('message','Updated profile Successfully');
    }

    public function deleteProfilePhoto()
    {
            $photo = User::find(auth()->user()->id);
            $photo->deleteProfilePhoto();
            $this->reset();        
            session()->flash('message','Deleted Successfully');
    }
    public function render()
    {
        return view('livewire.profile-edit');
    }
}
