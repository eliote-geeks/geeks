<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Course;
use App\Models\School;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Trash extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'refreshField' => '$refresh'
    ];
    // public $courses;
    // public $users;
    // public $schools;
    // public $categories;

    public function deleteCourse($id)
    {
        $course = Course::withTrashed()->where('id',$id)->firstOrFail();
        $course->forceDelete();
        $this->emit('refreshField');
    }

    public function restoreCourse($id)
    {
        $course = Course::withTrashed()->where('id',$id)->firstOrFail();
        $course->restore();
        $this->emit('refreshField');
    }
        public function deleteCategory($id)
    {
        $course = Course::withTrashed()->where('id',$id)->firstOrFail();
        $course->forceDelete();
        $this->emit('refreshField');
    }

    public function restoreCategory($id)
    {
        $course = Course::withTrashed()->where('id',$id)->firstOrFail();
        $course->restore();
        $this->emit('refreshField');
    }
    
    public function deleteUser($id)
    {
        $course = Course::withTrashed()->where('id',$id)->firstOrFail();
        $course->forceDelete();
        $this->emit('refreshField');
    }

    public function restoreUser($id)
    {
        $course = Course::withTrashed()->where('id',$id)->firstOrFail();
        $course->restore();
        $this->emit('refreshField');
    }
    
    public function deleteSchool($id)
    {
        $course = Course::withTrashed()->where('id',$id)->firstOrFail();
        $course->forceDelete();
        $this->emit('refreshField');
    }

    public function restoreSchool($id)
    {
        $course = Course::withTrashed()->where('id',$id)->firstOrFail();
        $course->restore();
        $this->emit('refreshField');
    }

    public function render()
    {
        return view('livewire.trash',[
            'courses' => Course::withTrashed()->where('deleted_at','!=',null)->get(),
            'schools' => School::withTrashed()->where('deleted_at','!=',null)->get(),
            'users' => User::withTrashed()->where('deleted_at','!=',null)->get(),
            'categories' => Category::withTrashed()->where('deleted_at','!=',null)->get(),
        ]);
    }
}
