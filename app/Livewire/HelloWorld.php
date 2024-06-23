<?php

namespace App\Livewire;



use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;

class HelloWorld 
{
    public $showDropdown = false;
 
    public function archive()
    {
     
        $this->showDropdown = false;
    }
 
    public function delete()
    {
     
        $this->showDropdown = false;
    }
    
    public function render()
    {
        return view('livewire.hello-world', [
            'galaxies' => [
                1 => 'Milky Way',
                2 => 'Andromeda',
                3 => 'Triangulum',
            ]
        ]);
    }
}
