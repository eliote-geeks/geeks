<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Quiz;
use Livewire\Component;
use Livewire\WithPagination;
use Symfony\Contracts\Service\Attribute\Required;

class InstructorQuiz extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $course_id;
    public $title;
    public $duration;
    public $edit = 0;
    public $editId;
    protected $listeners = [
        'refreshField' => '$refresh',
    ];

    public function saveQuiz()
    {        
        $this->validate([
            'title' => 'required|min:4',
            'course_id' => 'required',
            'duration' => 'required'
        ]);
        if($this->edit == 1){
            $quiz = Quiz::findOrFail($this->editId);            
        }
        else{
             $quiz = new Quiz();
         }
        $course = Course::findOrFail($this->course_id);
        if(Course::where('id',$course->id)->where('user_id',auth()->user()->id)->count() > 0){
        $quiz->title = $this->title;
        $quiz->course_id = $course->id;
        $quiz->duration = $this->duration;
        $quiz->user_id = auth()->user()->id;
        $quiz->save();
        $this->reset();
        $this->emit('refresh');
    }
    
    }

    public function deleteQuiz($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();
        $this->emit('refresh');
    }

    public function editQuiz($id)
    {
        $quiz = Quiz::findOrFail($id);
        $this->course_id = $quiz->course_id;
        $this->duration = $quiz->duration;
        $this->title = $quiz->title;
        $this->edit = 1;
        $this->editId = $id;
    }

    public function resetField()
    {
        $this->edit = 1;
        $this->reset();
        $this->emit('refresh');
    }

    public function render()
    {
        return view('livewire.instructor-quiz',[
            'courses' => Course::where('user_id',auth()->user()->id)->latest()->get(),
            'quizzes' => Quiz::where('user_id',auth()->user()->id)->paginate(8)
        ]);
    }
}
