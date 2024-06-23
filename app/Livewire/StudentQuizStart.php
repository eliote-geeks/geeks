<?php

namespace App\Livewire;

use Exception;
use App\Models\Quiz;
use App\Models\Course;
use Livewire\Component;
use App\Models\Response;
use App\Models\YahooMail;
use App\Models\StudentQcm;
use App\Models\StudentQuiz;
use App\Models\QuestionQuiz;
use App\Models\ResponseQuiz;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class StudentQuizStart extends Component
{
    use WithPagination;    
    protected $paginationTheme = 'bootstrap';
    public $quiz;
    // public $questions;
    // public $responses = [];
    public $status; 
    public $result = 0; 
    public $q = [];
    public $yes= '';
    public $no= '';
    public $som = 0;

    // public function mount()
    // {        
    //        $this->questions = QuestionQuiz::where('quizze_id',$this->quiz->id)->paginate();   
    // }

    public function response($id)
    {
        $response = ResponseQuiz::findOrFail($id);
        $question = QuestionQuiz::where('id',$response->question_quizze_id)->firstOrFail();
        if(StudentQcm::where([
            'user_id' => auth()->user()->id,
            'quiz_id' => $question->quizze_id,
            'question_id' => $question->id
        ])->count() == 0)
        {
            if($question->response == $response->response)
            {
                $stq = new StudentQcm();
                $stq->user_id = auth()->user()->id;
                $stq->quiz_id = $question->quizze_id;
                $stq->question_id =  $question->id;
                $stq->points = 1;
                $stq->save();
                $this->yes = 1;
                session()->flash('yes','congratulations!! you gave the correct answer');
            }
            else{
                $stq = new StudentQcm();
                $stq->user_id = auth()->user()->id;
                $stq->quiz_id = $question->quizze_id;
                $stq->question_id =  $question->id;
                $stq->points = 0;
                $stq->save();
                session()->flash('no','Oh no :(! you gave the wrong answer ');
            }
            session()->flash('message','saved!!');
        }
        else{
            session()->flash('message','you have already answered this question now move on to the next one!!');
        }

        
        $this->yes = $question->response;
        $this->no = $response->response;


        
        
    }

    public function save()
    {   

        if(StudentQuiz::where([
            'quizze_id' => $this->quiz->id,
            'user_id' => auth()->user()->id,            
        ])->count() == 0)
        {
            $student_quiz = new StudentQuiz();
        }
        else{
            $student_quiz = StudentQuiz::where([
                'quizze_id' => $this->quiz->id,
                'user_id' => auth()->user()->id,            
            ])->firstOrFail();
        }
        
        $student_quiz->quizze_id = $this->quiz->id;
        $student_quiz->user_id = auth()->user()->id;
        $student_quiz->result = (\App\Models\StudentQcm::where([
            'user_id' => auth()->user()->id,
            'quiz_id' => $this->quiz->id,
            'points' => 1
        ])->count() * 100) / (\App\Models\StudentQcm::where([
            'user_id' => auth()->user()->id,
            'quiz_id' => $this->quiz->id,
        ])->count());
        $student_quiz->save();
        session()->flash('message','Great!!');

        if(StudentQuiz::where([
            'quizze_id' => $this->quiz->id,
            'user_id' => auth()->user()->id,            
        ])->count() == 0){
            $mail = new YahooMail();
                $mail->author_id = auth()->user()->id;
                $mail->email_to = Course::findOrFail($this->quiz->course_id)->user->id;
                $mail->subject = 'Examination Pass';
                $mail->body = Auth::user()->name.' just pass the exam on <b>'.$this->quiz->title.'</b> . Score: '.$student_quiz->result ;
                $mail->save();
        }
        return redirect()->back()->with('message','Great Adventure!!');
    }


    public function render()
    {
            return view('livewire.student-quiz-start',[
                'questions' => QuestionQuiz::where('quizze_id',$this->quiz->id)->cursorPaginate(1),
                'yes' => $this->yes,
                'no' => $this->no,
                'no' => $this->result,
            ]);
    }
}
