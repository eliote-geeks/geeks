<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Plan;
use App\Models\Quiz;
use App\Models\User;
use App\Mail\Contact;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Student;
use App\Models\SpamMail;
use App\Models\StarMail;
use App\Models\YahooMail;
use App\Models\Instructor;
use App\Models\ArchiveMail;
use App\Models\StudentQcm;
use App\Models\StudentQuiz;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {   
        return view('profile.profile-edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
     try{
        $request->validate([
            'first_name' => 'required|string|max:50|min:3',
            'last_name' => 'required|string|max:50|min:3',
            'date_of_birth' => 'required|date',
            'number' => 'required|numeric',
            'address1' => 'required|alpha_num',
            'address2' => 'required|alpha_num',
            'state' => 'required|string',
            'country' => 'required|string'
        ]);
        $user = User::find(Auth::user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->date_of_birth = $request->date_of_birth;
        // $user->profile_photo_url = 'storage/' . $request->profile_photo_url->store('users','public');
        $user->number = $request->number;
        $user->address1 = $request->address1;
        $user->address2 = $request->address2;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->user_id = auth()->user()->id;
        if(User::find(Auth::user()->id)->user_type == 'App\Models\Instructor'){
            $user->user_type = 'App\Models\Instructor';
            $user->updated_at = now();
            $user->save();

            if($request->has('paypal_email') && $request->paypal_email != null){                
                $i = Instructor::where('instructor_id',auth()->user()->id)->first();
                if($i)
                    $i->paypal_email = $request->paypal_email;
                    $i->save();
            }
            $instructor = Instructor::where('instructor_id',auth()->user()->id)->first();
            if($instructor)
            {            
                if($request->has('about_instructor') && $request->about_instructor != null){                
                    $instructor->about_instructor = $request->about_instructor;
                }
                else{
                    $instructor->about_instructor = "i'm just a cigaret";
                }
                $instructor->save();
            

               return redirect()->back()->with('message','Saved!');
            }
            else{
                
                $instructor = new Instructor();        
                $instructor->instructor_id = auth()->user()->id;                
                if($request->has('about_instructor') && $request->about_instructor != null){                
                    $instructor->about_instructor = $request->about_instructor;
                }
                else{
                    $instructor->about_instructor = "i'm just a cigaret";
                }

                $instructor->save();
                return redirect()->back()->with('message','Saved Instructor successfully!');
            }

        }
        elseif(User::find(Auth::user()->id)->user_type == 'App\Models\Student'){
            $user->user_type = 'App\Models\Student';
            $user->updated_at = now();
            $user->save();
            $student = Student::where('student_id',auth()->user()->id)->get();
            if($student->count() > 0)
            {
                return redirect()->back()->with('message','Saved!');
            }
            else{
                //dd($student);
                $student = new Student();        
                $student->student_id = auth()->user()->id;
                $student->save();
                return redirect()->back()->with('message','Saved!');
            }
        }        
        elseif(User::find(Auth::user()->id)->user_type == 'App\Models\Admin')
        {
            $user->user_type = 'App\Models\Admin';
            $user->user_id = auth()->user()->id;
            $user->updated_at = now();
            $user->save();

            if($request->has('paypal_email') && $request->paypal_email != null){                
                $i = Admin::where('admin_id',auth()->user()->id)->first();
                if($i)
                    $i->paypal_email = $request->paypal_email;
                    $i->save();
                }           
         return redirect()->back()->with('message','Personals informations updated successfully');
        }
        else{
            $user->user_type = 'App\Models\Student';
            $user->updated_at = now();
            $user->save();   
            return redirect()->back()->with('message','Informations saved!!');
        }
}
    catch(Exception $e)
    {
        return redirect()->back()->with('message','Oups!! something Wrong !!:(');
    }
}

    public function security()
    {
        return view('profile.security');
    }

    public function deleted()
    {
        return view('profile.delete-student');
    }

    /**
     * List of all student from admin dashboard
     */
    public function  students()
    {
      try{
        $users = User::all();
        foreach($users as $user)
        {
            $students = User::where('user_type','App\Models\Student')->paginate(16);    
        }

        return view('admin.admin-students',compact('students'));
    }
    catch(\Exception $e)
    {
        return redirect()->back()->with('message','Oups!! something Wrong !!:(');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function social()
    {
        return view('profile.social-profile');
    }

    public function invoice()
    {
        $payments = Order::latest()->where('user_id',auth()->user()->id)->get();
        return view('profile.invoice',compact('payments'));
    }

    public function payment()
    {
      try{
        $subscription = [];
        $plan = [];
         if((User::find(auth()->user()->id)->subscription_id != null) && (User::find(auth()->user()->id)->is_subscribed == 1)){
            $subscription_id = User::find(auth()->user()->id)->subscription_id;
            $subscription = Subscription::where('subscription_id',$subscription_id)->first();
            $plan = Plan::where('plan_id',$subscription->plan_id)->first();            
            return view('profile.payment-method',compact('plan','subscription'));
         }      
        
    }
        catch (Exception $e)
        {
            return redirect()->back()->with('message','Oups!! something Wrong !!:(');
        }
    }

    public function subscription()
    {
        $subscriptions = Subscription:: where('user_id',auth()->user()->id)->where('type','APPROVAL_PENDING')->orderBy('id','desc')->take(2)->get();
        return view('profile.subscription',compact('subscriptions'));
    }

    public function linked()
    {
        return view('profile.linked-accounts');
    }


    public function profile($id)
    {
        if(auth()->user()->id == $id)        
            return redirect()->route('dashboard');
        if(User::findOrFail($id)->user_type == 'App\Models\Student')
        {
            $user = User::find($id); 
            $courses = DB::table('payments')
            ->leftJoin('courses','courses.id','=','payments.course_id')
            ->select('courses.*')
            ->distinct()
            ->where('payments.user_id','=',$id)
            ->where('courses.deleted_at','=',null)
            ->where('payments.deleted_at','=',null)
            ->get();
            return view('profile.student-profile',compact('user','courses'));
        }else{
            return view('courses.404');
        }
    }

    public function invitation()
    {
        return view('profile.invitations');
    }

    public function friends()
    {
        return view('profile.friends');
    }

    public function socialMedia()
    {
        return view('profile.social');
    }

    public function mail()
    {
        $mails = YahooMail::where('email_to',auth()->user()->id)->latest()->cursorPaginate(10);
         return view('profile.mail',compact('mails'));
    }
    
    public function sendMail()
    {
        $mails = YahooMail::where('author_id',auth()->user()->id)->latest()->cursorPaginate(10);
         return view('profile.mail-send',compact('mails'));
    }
    
    public function listEmailSpam()
    {
        $mails = SpamMail::where('user_id',auth()->user()->id)->latest()->cursorPaginate(10);
         return view('profile.spamEmail',compact('mails'));
    }
    
    public function listEmailArchive()
    {
        $mails = ArchiveMail::where('user_id',auth()->user()->id)->latest()->cursorPaginate(10);
         return view('profile.archiveEmail',compact('mails'));
    }
    
    public function listEmailStar()
    {
        $mails = StarMail::where('user_id',auth()->user()->id)->latest()->cursorPaginate(10);
         return view('profile.archiveEmail',compact('mails'));
    }

    public function storeEmail(Request $request)
    {
        $pathFile = $request->path_file;
        
        $request->validate([
            'email_to' => 'required|email',
            'subject' => 'required|string',
            'body' => 'required'
        ]);        
        if(User::where('email',$request->email_to)->count() == 0)
            return redirect()->back()->with('message','Unknow User!!');            
        else
            $user = User::where('email',$request->email_to)->first();

        $yahooMail = new YahooMail();
        $yahooMail->author_id = auth()->user()->id;
        $yahooMail->email_to = $user->id;
        if($request->path_file != null){            
            $yahooMail->path_file = 'storage/' . $request->path_file->store('email-file','public');
        }
        $yahooMail->subject = $request->subject;
        $yahooMail->body = $request->body;
        $yahooMail->save();
        return redirect()->back()->with('message','Your Email Successfull Send!!');        
        
    }

    public function mailDetails($id)
    {
        if(YahooMail::findOrFail($id) != null){
            $mail = YahooMail::findOrFail($id);
            if($mail->email_to == auth()->user()->id){
                $mail->read = 1;
                $mail->save();
            }
            if($mail->email_to == auth()->user()->id || $mail->author_id == auth()->user()->id)
                return view('profile.mail-detail',compact('mail'));
            else
                return redirect()->back()->with('message','Aie Aie!! We can\'t find this page :( ');


        }
        else{
            return redirect()->back();
        }
    }

    public function readMail($id)
    {
        if(YahooMail::find($id) != null){
            $mail = YahooMail::find($id);
            $mail->read = 0;
            $mail->save();
        if($mail->email_to == auth()->user()->id || $mail->author_id == auth()->user()->id)
                return redirect()->route('mail')->with('message','unread');
        else
            return redirect()->back()->with('message','Aie Aie!! We can\'t find this page :( ');
            
        }
        else{
            return redirect()->back();
        }
    }

    public function deleteMail($id)
    {
        $mail = YahooMail::findOrFail($id);
        if($mail->email_to == auth()->user()->id || $mail->author_id == auth()->user()->id)
        {
            $mail->delete();
            return redirect()->route('mail')->with('message','success delete message');
        }
        else
            return redirect()->back()->with('message','Aie Aie!! We can\'t find this page :( ');
        
    }

    public function spamEmail($id)
    {
        $mail = YahooMail::findOrFail($id);        

        if($mail->email_to == auth()->user()->id || $mail->author_id == auth()->user()->id)
        {
            if(SpamMail::where('mail_id',$mail->id)->count() == 0){
                $spam = new SpamMail();
                $spam->mail_id = $mail->id;
                $spam->user_id = auth()->user()->id;
                $spam->save();            
                return redirect()->back()->with('message','This mail is add for spam!!');
            }
            else{
                SpamMail::where('mail_id',$mail->id)->first()->delete();
                return redirect()->back();
            }
        }
        else
            return redirect()->back()->with('message','Aie Aie!! We can\'t find this page :( ');        
    }
    
    public function archiveEmail($id)
    {
        $mail = YahooMail::findOrFail($id);        
    if($mail->email_to == auth()->user()->id || $mail->author_id == auth()->user()->id){
        if(ArchiveMail::where('mail_id',$mail->id)->count() == 0){
            $spam = new ArchiveMail();
            $spam->mail_id = $mail->id;
            $spam->user_id = auth()->user()->id;
            $spam->save();
            return redirect()->back()->with('message','This mail is add for archive!!');
        }
        else{
            ArchiveMail::where('mail_id',$mail->id)->first()->delete();
            return redirect()->back();
        }
    }
    else{
        return redirect()->back()->with('message','Aie Aie!! We can\'t find this page :( ');        
    }
    }

    public function starEmail($id)
    {
        $mail = YahooMail::findOrFail($id);        
     if($mail->email_to == auth()->user()->id || $mail->author_id == auth()->user()->id){
        if(StarMail::where('mail_id',$mail->id)->count() == 0){
            $spam = new StarMail();
            $spam->mail_id = $mail->id;
            $spam->user_id = auth()->user()->id;
            $spam->save();
            return redirect()->back()->with('message','This mail is star!!');
        }
        else{
            StarMail::where('mail_id',$mail->id)->first()->delete();
            return redirect()->back();
        }
    }
    else{
        return redirect()->back()->with('message','Aie Aie!! We can\'t find this page :( ');        
    }
    }

    public function myQuiz()
    {
        $quizzes = Quiz::paginate(5);        
        $payments = Order::where('user_id',auth()->user()->id)->get();
        return view('profile.quiz-student',compact('quizzes','payments'));
    }

    public function quizDetailStudent($id)
    {
        try{
            $quiz = Quiz::find($id);            
            return view('profile.student-quiz-start',compact('quiz'));

        }catch(Exception $e)
        {
            return view('courses.404');
        }
    }

    public function  contact()
    {
        return view('pages.contact');
    }

    public function form(Request $request)
    {
        $data = $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required'
        ]);
        Mail::to('pauleliote97@gmail.com')->send(new Contact($data));

        return redirect()->back()->with('message','Thank you,we\'ll be in touch soon');
    }

    public function search()
    {
        return view('pages.search');
    }

    public function notifications()
    {
        $notifications = auth()->user()->notifications;
        return view('notifications.notification',compact('notifications'));
    }


    public function deleteAllNotif()
    {
        $user = User::findOrFail(auth()->user()->id);
        $user->notifications()->delete();
        return redirect()->back()->with('message','Notifications cleared');
    }

    public function quizResult()
    {
        $results = StudentQuiz::where('user_id',auth()->user()->id)->get();
        return view('profile.quiz-attempt-result',compact('results'));
    }

    public function restartQuiz($id)
    {
        $quiz = Quiz::findOrFail($id);
        

        foreach(StudentQcm::where([
            'user_id' => auth()->user()->id,
            'quiz_id' => $quiz->id,
        ])->get() as $q)
            $q->delete();
        
        StudentQuiz::where([
            'quizze_id' => $quiz->id,
            'user_id' => auth()->user()->id
        ])->first()->delete();

        return redirect()->back()->with('message','Quiz Restart SuccessFull!!');
    }

    public function social_group()
    {
        return view('profile.social-groups');        
    }

}

