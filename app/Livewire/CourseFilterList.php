<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CourseFilterList extends Component
{
    public $categories = [];
    public $course = [];
    public $cat = [];
    public $category_id;
    public $rating;
    public $Beginners;
    public $Intermediate;
    public $Advance;
    public $Master;    
    

    public function mount()
    {           
        $this->level = '';
        $this->rating = 1;
        $this->level = 'Intermediate';
        $this->category_id = 1;
        $this->categories = Category::where('view',1)->get();
    }

    public function category($id)
    {        
        $this->category_id = $id;
        if(in_array($id,$this->cat)){
            array_diff($this->cat,[$id]);    
        }
        else{
            array_push($this->cat,$id);
        }

        $this->courses = DB::table('courses')
        ->whereIn('category_id',$this->cat)
        ->whereNull('deleted_at')
        ->where('status',1)
        ->get();
    }

    public function rating($id)
    {
        $this->rating = $id;   
    }

    public function level($id)
    {
        
        if($id == 0)
            $this->level = '';
            
        elseif($id == 1)
            $this->level = 'Beginners';
                
        elseif($id == 2)
            $this->level = 'Intermediate';
            
        elseif($id == 3)
            $this->level = 'Advance';
            
        elseif($id == 4)
            $this->level = 'Master';


    }

    public function render()
    {
        // if($this->level == '')
        // {
        //     $this->courses = DB::table('courses')
        //     ->select('*')
        //     ->where('status','=','1')
        //     ->where('deleted_at','=',null)
        //     ->OrWhere('category_id','=',$this->category_id)
        //     ->get();            
        // }
    
        $this->courses = DB::table('courses')
        ->leftJoin('reviews','courses.id','=','reviews.course_id')
        ->selectRaw('distinct courses.*')
        ->where('courses.status','=',1)
        ->where('courses.deleted_at','=',null)    
        ->get();
        return view('livewire.course-filter-list');
    }
}
