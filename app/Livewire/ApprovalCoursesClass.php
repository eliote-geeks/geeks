<?php

namespace App\Livewire;

use App\Models\ClassCourse;
use App\Models\ClassSchool;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ApprovalCoursesClass extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $school;
    
    public function approved($id)
    {
        $course = ClassCourse::find($id);          
            if($course->status == 0){
                $course->status = 1;
                $course->save();
            }
            else{
                $course->status = 0;
                $course->save();
            }

    }

    public function trash($id)
    {
        if(ClassCourse::where('course_id',$id)->count() > 0){
            $course = ClassCourse::where('course_id',$id)->first();            
            $course->delete();
        }
    }
    public function render()
    {
        return view('livewire.approval-courses-class',[
            'courses' => DB::table('class_courses')
            ->leftJoin('courses','courses.id','=','class_courses.course_id')
            ->leftJoin('class_schools','class_schools.id','=','class_courses.class_id')
            ->selectRaw('courses.*, class_schools.name, class_courses.status as pending, class_courses.class_id as class, class_courses.id as de ')
            ->where('courses.deleted_at',null)
            ->where('courses.status',1)
            ->where('class_schools.school_id','=',$this->school->id)
            ->orderByDesc('de')
            ->paginate(8)
        ]);
    }
}
