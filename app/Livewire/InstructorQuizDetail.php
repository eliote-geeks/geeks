<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
use App\Models\YahooMail;
use App\Models\QuestionQuiz;
use App\Models\ResponseQuiz;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class InstructorQuizDetail extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $quiz;
    public $question;
    public $response1;
    public $response2;
    public $response3;
    public $response4;
    public $response;
    protected $listeners = [
        'refreshField' => '$refresh',
    ];

    public function deleteQuiz($id)
    {
        $question = QuestionQuiz::findOrFail($id);
        $question->delete();
        $this->emit('refresh');
    }

    public function saveQuiz()
    {
        $this->validate([
            'question' => 'required',
            'response1' => 'required',
            'response2' => 'required',
            'response3' => 'required',
            'response4' => 'required'
        ]);
        $qui = new QuestionQuiz();
        $qui->question = $this->question;
        // $qui->response1 = $this->response1;
        // $qui->response2 = $this->response2;
        // $qui->response3 = $this->response3;
        // $qui->response4 = $this->response4;
        $qui->response = $this->response1;
        $qui->quizze_id = $this->quiz->id;
        $qui->save();
        
            $responseQuiz = new ResponseQuiz();            
            $responseQuiz->response = $this->response1;
            $responseQuiz->question_quizze_id = $qui->id;
            $responseQuiz->save();
            
            $responseQuiz = new ResponseQuiz();            
            $responseQuiz->response = $this->response2;
            $responseQuiz->question_quizze_id = $qui->id;
            $responseQuiz->save();
            
            $responseQuiz = new ResponseQuiz();            
            $responseQuiz->response = $this->response3;
            $responseQuiz->question_quizze_id = $qui->id;
            $responseQuiz->save();
            
            $responseQuiz = new ResponseQuiz();            
            $responseQuiz->response = $this->response4;
            $responseQuiz->question_quizze_id = $qui->id;
            $responseQuiz->save();

            $course = Course::findOrFail($this->quiz->course_id);
            
            foreach(\App\Models\Subscription::where('course_id',$course->id)->where('type','buy')->get() as $sb)
         {
             $mail = new YahooMail();
             $mail->author_id = auth()->user()->id;
             $mail->email_to = $sb->user_id;
             $mail->subject = 'new question on evaluation for your course ';
             $mail->body = Auth::user()->name. ' Just add new question evaluation on course <b>'.$course->title.'</b>'. 'follow  <a href="'.route('quizDetailStudent',$this->quiz->id).'"> '.$this->quiz->title.'</a> for more details';
             $mail->save();
         }

        $this->emit('refresh');
        $this->reset('response','response1','response2','response3','response4','question');
    }
    public function render()
    {
        return view('livewire.instructor-quiz-detail',[
            'questions' =>QuestionQuiz::latest()->where('quizze_id',$this->quiz->id)->paginate(3)
        ]);
    }
}
