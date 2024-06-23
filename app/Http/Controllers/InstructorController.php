<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;
use App\Actions\Fortify\PasswordValidationRules;
use App\Models\InstructorPayout;
use App\Models\Order;
use App\Models\Quiz;
use App\Models\StudentQuiz;
use App\Models\Subscription;
use Exception;

use function PHPUnit\Framework\returnSelf;

class InstructorController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function orders()
    {
        $orders = InstructorPayout::where('user_id',auth()->user()->id)->get();
        return view('instructor.instructor-orders',compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','integer'],           
            'password' => ['required', 'string','min:8']
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->number = $request->phone;
        $user->password = Hash::make($request->password);
        $user->type = 'App\Models\Instructor';
        $user->save();

        $instructor = new Instructor();
        $instructor_about_instructor = $request->about;
        $instructor->instructor_id = $user->id;
        $instructor->save();
        Auth($user);
        
        
        // $user =  User::create([
        //     'name' => $input['name'],
        //     'email' => $input['email'],
        //     'email' => $input['email'],
        //     'password' => Hash::make($input['password']),
        // ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instructor $instructor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
        //
    }

    public function profile($id)
    {
        if(auth()->user()->id == $id)
            return redirect()->route('dashboard');
        $cour = 0;
        if((User::find($id)) && (User::find($id)->user_type == 'App\Models\Instructor'))
        {
            $user = User::find($id); 
            $cours = Course::first()->where('user_id',$id)->take(1)->get();
            
            foreach($cours as $course){
                $cour = $course->id;
                break;
            }

            return view('instructor.instructor-profile',compact('user','cour'));
        }else{
            return view('courses.404');
        }
    }

    public function register()
    {
        return view('instructor.register');
    }

    public function courses()
    {
        $courses = Course::InRandomOrder()->where('user_id',Auth::user()->id)->get();
        return view('instructor.instructor-courses',compact('courses'));
    }

    public function studentsCourses($id)
    {        
        try{
            $course = Course::find($id);
            $orders = Order::where('course_id',$course->id)->where('status','SUCCESS..')->paginate(6);                   
            if($course->user->id == auth()->user()->id)
                return view('instructor.students-courses',compact('course','orders'));
            else
                return redirect()->back();

        }catch(\Exception $e)
        {
            return view('courses.404');
        }
    }


    public function reviews()
    {
        return view('instructor.instructor-reviews');
    }

    public function students()
    {
        if(auth()->user()->user_type == 'App\Models\Instructor')
        {
          $students = DB::table('courses')
          ->leftJoin('subscriptions','courses.id','=','subscriptions.course_id')
          ->leftJoin('users','subscriptions.user_id','=','users.id')
          ->selectRaw('distinct subscriptions.user_id')
          ->where('courses.user_id','=',auth()->user()->id)
          ->where('subscriptions.type','=','buy')
          ->where('users.user_type','=','App\Models\Student')
          ->where('courses.deleted_at','=',null)
          ->where('subscriptions.deleted_at','=',null)
          ->get();
            return view('instructor.instructor-students',compact('students'));        
        
        }
    }

    public function invitation()
    {
        if(auth()->user()->user_type == 'App\Models\Instructor'){
            $classes = DB::table('class_instructors')
            ->leftJoin('class_schools','class_instructors.class_id','=','class_schools.id')
            ->selectRaw('class_schools.*')
            ->where('class_instructors.user_id','=',auth()->user()->id)
            ->paginate();
            return view('instructor.invitations',compact('classes'));
        }
        else
            return redirect()->route('dashboard');
    }

    public function instructorsQuiz()
    {        
        return view('instructor.instructor-quiz');
    }

    public function quizDetail($id)
    {
        try{
            $quiz = Quiz::find($id);
            if($quiz->user_id == auth()->user()->id)
            {
                return view('instructor.instructor-quiz-detail',compact('quiz'));
            }
            else{
                return view('courses.404');
            }
        }
        catch(Exception $e)
        {
             return view('courses.404');
        }
    }

    public function camtesia()
    {
        if(auth()->user()->user_type == 'App\Models\Instructor')
            return view('pages.camtesia');
        else
            return redirect()->back()->with('message','Sorry you are not authorized to access at this page!');
    }

    public function resultQuiz($id)
    {
        try{
            $quiz = Quiz::findOrFail($id);
            $results = StudentQuiz::where('quizze_id',$quiz->id)->get();
            $averages = StudentQuiz::where('quizze_id',$quiz->id)->get();
            $t = 0;
            foreach($averages as $av)
            {
                $t += $av->result;
            }
            $average = $t / $averages->count();
            if($quiz->user_id == auth()->user()->id)
            {
                return view('instructor.student-quiz-result',compact('quiz','results','average'));
            }else{
                return redirect()->back()->with('message','aie Aie We can\'t find this page!!');
            }
        }catch(\Exception $e)
        {
            return redirect()->back()->with('message','Please try later!! nobody pass this exam!');
        }

    }
}
