<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class SocialProfiles extends Component
{
    public $twitter;
    public $facebook;
    public $instagram;
    public $google;
    public $youtube;
    public function render()
    {
        $user = User::find(auth()->user()->id);
        $this->facebook = $user->link_facebook;
        $this->google = $user->link_google;
        $this->youtube = $user->link_youtube;
        $this->twitter = $user->link_twitter;
        $this->instagram = $user->link_instagram;
        return view('livewire.social-profiles');
    }

    public function save()
    {
        $user = User::find(auth()->user()->id);
        $user->link_facebook = $this->facebook;
        $user->link_google = $this->google;
        $user->link_youtube = $this->youtube;
        $user->link_twitter = $this->twitter;
        $user->link_instagram = $this->instagram;
        $user->save();
        $this->reset();
        session()->flash('message','Saved successfully!!');
    }
}
