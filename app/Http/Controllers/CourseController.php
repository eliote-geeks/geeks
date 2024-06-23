<?php

namespace App\Http\Controllers;

use Exception;
use Throwable;
use App\Models\User;
use App\Models\Order;
use App\Models\Course;
use App\Models\Enroll;
use App\Models\Lesson;
use App\Models\Review;
use App\Models\School;
use App\Models\Lecture;
use App\Models\Category;
use App\Models\YahooMail;
use App\Models\ClassCourse;
use App\Models\ClassSchool;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\UserSchoolClass;
use PhpParser\Node\Expr\Throw_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SubscriptionController;
use Google\Service\ShoppingContent\OrdersReturnRefundLineItemRequest;

class CourseController extends Controller
{

    public function courseVerify($id)
    {
        $c = Course::findOrFail($id);
        $c->status = 1;
        $c->save;
        return redirect()->route('courses.resume',[
            'id' => $c->id
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $courses = Course::all();
            return view('admin.admin-course-overview',compact('courses'));
        }
        catch (Exception $e)
        {
            return redirect()->route('dashboard')->with('message','Oups!! something Wrong !!:(');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $categories = Category::all();
            if(Auth::user()->user_type == 'App\Models\Instructor'){
                return view('instructor.add-course',compact('categories'));
            }
            else
                return view('courses.404');
        }
        catch (Exception $e)
        {
            return redirect()->back()->with('message',$e->getMessage());
        }
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
        $course = Course::findOrFAil($id);        
        $zoneFoundator = 0;
        
        try{
        if(Course::findOrFail($course->id)->status != 1)
            return view('courses.404');
            
                

         $s = 0;         
         $buys = Order::where('course_id',$course->id)->where('status','SUCCESS..')->get();         
        $lectures = Lecture::where('course_title',$course->title)->where('user_id',$course->user->id)->get();        
        $pps =  Lecture::first()->where('course_title',$course->title)->where('user_id',$course->user->id)->take(1)->get();        
              foreach($pps as $p)  
                    $pp = $p->id;

        
        $relates = Course::inRandomOrder()->where('status',1)->where('category_id',$course->category->id)->where('id','!=',$course->id)->get()->take(8);            

        $rat1 = Review::where('course_id',$course->id)->where('rating','=','1')->get();
        $rat2 = Review::where('course_id',$course->id)->where('rating','=','2')->get();
        $rat3 = Review::where('course_id',$course->id)->where('rating','=','3')->get();
        $rat4 = Review::where('course_id',$course->id)->where('rating','=','4')->get();
        $rat5 = Review::where('course_id',$course->id)->where('rating','=','5')->get();
        $rat = Review::where('course_id',$course->id)->get();

        
        if($rat->count() == 0){
            $student_review=0;
            $s=0;
        }
        else{
            $student_review = round((($rat1->count() * 1) + ($rat2->count() * 2) + ($rat3->count() * 3) + ($rat4->count() * 4) + ($rat5->count() * 5)) / $rat->count(),1);
            $s = $rat->count();
        }
        
        
        if($rat1->count() > 0)
            $star1 = round(($rat1->count() * 100) / $rat->count(),0);
        else
            $star1 = 0;
        
        if($rat2->count() > 0)
            $star2 = round(($rat2->count() * 100) / $rat->count(),0);
        else
            $star2 = 0;
        
        if($rat3->count() > 0)
            $star3 = round(($rat3->count() * 100) / $rat->count(),0);
        else
            $star3 = 0;
        
        if($rat4->count() > 0)            
            $star4 = round(($rat4->count() * 100) / $rat->count(),0);
        else
            $star4 = 0;
        
        if($rat5->count() > 0)
            $star5 = round(($rat5->count() * 100) / $rat->count(),0);
        else
            $star5 = 0;


        // if(auth()->user()->id != null)
        // {
        //    dd(auth()->check());
        // }

        if(ClassCourse::where('course_id',$course->id)->where('status',1)->count() > 0)
        {
            $classCourse = ClassCourse::where('course_id',$course->id)->where('status',1)->first();
            $class = ClassSchool::find($classCourse->class_id);            

            $zoneFoundator = 0;
            if(ClassCourse::where('course_id',$course->id)->count() > 0)
            {
                $classCourse = ClassCourse::where('course_id',$course->id)->first();                
                if(ClassSchool::where('id',$classCourse->class_id)->count() > 0)
                {
                    if(ClassSchool::where('id',$classCourse->class_id)->first()->user_id == auth()->user()->id)
                    {
                        $zoneFoundator = 1;                        
                    }
                }
            }        
            
            if($class->type == 'public' || (auth()->user()->user_type == 'App\Models\Admin') || (auth()->user()->user_type == 'App\Models\Instructor'))
            {
                return view('courses.course-single',compact([
                    'course',
                    'lectures',
                    'relates',
                    'star1',
                    'star2',
                    'star3',
                    'star4',
                    'star5',
                    'student_review',
                    's',
                    'pp',
                    'buys',
                    'zoneFoundator'            
                ]));                
            }

            else{
                
                 if(UserSchoolClass::where('user_id',auth()->user()->id)->where('entity_type','\App\Models\ClassCourse')->where('entity_id',$class->id)->count() > 0)
                 {
                    return view('courses.course-single',compact([
                        'course',
                        'lectures',
                        'relates',
                        'star1',
                        'star2',
                        'star3',
                        'star4',
                        'star5',
                        'student_review',
                        's',
                        'pp',
                        'buys',
                        'zoneFoundator'            
                    ]));                      
                 }
                 else{
                    return redirect()->back()->with('message','this course is private please join the class for subscribe!!');
                 }
            }
        }
        
            
        return view('courses.course-single',compact([
            'course',
            'lectures',
            'relates',
            'star1',
            'star2',
            'star3',
            'star4',
            'star5',
            'student_review',
            's',
            'pp',
            'buys',
            'zoneFoundator'            
        ]));
    }catch( Exception $e){
        return redirect()->back()->with('message',$e->getMessage());
    }

    }

    public function enroll($id)
    {        
        try{
            if(Enroll::where('course_id',$id)->where('user_id',auth()->user()->id)->get()->count() == 0)
            {   
                if(auth()->user()->user_type == 'App\Models\Instructor'){
                    return redirect()->back()->with('message','Oups !! This action is prohibihed for instructors!!');
                }

                $enroll = new Enroll();
                $enroll->course_id = $id;
                $enroll->user_id = auth()->user()->id;
                $enroll->save();            
            return redirect()->back()->with('message','success');
            }
            else{                              
                $enroll = Enroll::where('course_id',$id)->where('user_id',auth()->user()->id)->get()->first();
                $enroll->delete();
                return redirect()->back()->with('message','Course removed in your favorite!!');
            }
        }catch(Exception $e)
        {
            return redirect()->back()->with('message',$e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $course = Course::fondOrFail($id);
            $course->delete();
            Course::withTrashed()->where('id',$id)->firstOrFail()->forceDelete();
            return redirect()->route('dashboard')->with('message','course removed successfully!');
        }catch(Exception $e)
        {
            return view('courses.404');
        }
    }

    public function subscribe($id)
    {       
        $zoneFoundator = 0; 
        $active=0;
      try{
        $course = Course::findOrFail($id);
        if($course->status != 1)
            return view('courses.404');

         $s = 0;
         $buys = Order::where('course_id',$course->id)->where('status','SUCCESS..')->get();         
         $lectures = Lecture::where('course_title',$course->title)->where('user_id',$course->user->id)->get();        
         
       
        if($active == 1)
            return redirect()->back()->with('message','This course not have lessons for moment');

        $rat1 = Review::where('course_id',$course->id)->where('rating','=','1')->get();
        $rat2 = Review::where('course_id',$course->id)->where('rating','=','2')->get();
        $rat3 = Review::where('course_id',$course->id)->where('rating','=','3')->get();
        $rat4 = Review::where('course_id',$course->id)->where('rating','=','4')->get();
        $rat5 = Review::where('course_id',$course->id)->where('rating','=','5')->get();
        $rat = Review::where('course_id',$course->id)->get();

        
        if($rat->count() == 0){
            $student_review=0;
            $s=0;
        }
        else{
            $student_review = round((($rat1->count() * 1) + ($rat2->count() * 2) + ($rat3->count() * 3) + ($rat4->count() * 4) + ($rat5->count() * 5)) / $rat->count(),1);
            $s = $rat->count();
        }
        
        
        if($rat1->count() > 0)
            $star1 = round(($rat1->count() * 100) / $rat->count(),0);
        else
            $star1 = 0;
        
        if($rat2->count() > 0)
            $star2 = round(($rat2->count() * 100) / $rat->count(),0);
        else
            $star2 = 0;
        
        if($rat3->count() > 0)
            $star3 = round(($rat3->count() * 100) / $rat->count(),0);
        else
            $star3 = 0;
        
        if($rat4->count() > 0)            
            $star4 = round(($rat4->count() * 100) / $rat->count(),0);
        else
            $star4 = 0;
        
        if($rat5->count() > 0)
            $star5 = round(($rat5->count() * 100) / $rat->count(),0);
        else
            $star5 = 0;

       

        if(Subscription::where('course_id',$course->id)->where('user_id',auth()->user()->id)->where('type','buy')->get()->count() > 0 && Subscription::where('course_id',$course->id)->where('user_id',auth()->user()->id)->where('type','buy')->count() > 0)
        {
            return redirect()->route('courses.resume',[
                'id' => $course->id
            ]);
        }
        else
        {
            if(ClassCourse::where('course_id',$course->id)->where('status',1)->count() > 0 || (auth()->user()->user_type == 'App\Models\Admin') || (auth()->user()->user_type == 'App\Models\Instructor'))
            {
                $classCourse = ClassCourse::where('course_id',$course->id)->where('status',1)->first();
                $class = ClassSchool::find($classCourse->class_id);
                
                if(($class->type == 'public')  )
                {
                    return view('courses.course-paypal',compact('course'));
                }
    
                else{
                    
                     if((UserSchoolClass::where('user_id',auth()->user()->id)->where('entity_type','\App\Models\ClassCourse')->where('entity_id',$class->id)->count() > 0) )
                     {
                        return view('courses.course-paypal',compact('course'));
                     }
                     else{
                        return redirect()->back()->with('message','this course is private please join the class for subscribe!!');
                     }
                }
            }
    
            return view('courses.course-paypal',compact('course'));
        }
    }
    catch( Exception $e){
        return redirect()->back()->with('message',$e->getMessage());
    }
}

    public function preview($id)
    {        
        $zoneFoundator = 0;
        $active=0;        
      try{        
        $lesson = Lesson::where('id',$id)->firstOrFail();
        $course = Course::where('title',$lesson->course_title)->firstOrFail();
        if($course->status != 1)
            return view('courses.404');

         $s = 0;
         $buys = Order::where('course_id',$course->id)->where('status','SUCCESS..')->get();         
         $lectures = Lecture::where('course_title',$course->title)->where('user_id',$course->user->id)->get();        
         $pp =  Lecture::where('course_title',$course->title)->where('user_id',$course->user->id)->orderBy('id','asc')->first()->id;        
        
            
        // $videos = Lesson::where('lecture_id',$pp->id)->take(1)->orderBy('id','asc')->count();                        
        $videoActu = $lesson->video;            
                        

        $rat1 = Review::where('course_id',$course->id)->where('rating','=','1')->get();
        $rat2 = Review::where('course_id',$course->id)->where('rating','=','2')->get();
        $rat3 = Review::where('course_id',$course->id)->where('rating','=','3')->get();
        $rat4 = Review::where('course_id',$course->id)->where('rating','=','4')->get();
        $rat5 = Review::where('course_id',$course->id)->where('rating','=','5')->get();
        $rat = Review::where('course_id',$course->id)->get();

        
        if($rat->count() == 0){
            $student_review=0;
            $s=0;
        }
        else{
            $student_review = round((($rat1->count() * 1) + ($rat2->count() * 2) + ($rat3->count() * 3) + ($rat4->count() * 4) + ($rat5->count() * 5)) / $rat->count(),1);
            $s = $rat->count();
        }
        
        
        if($rat1->count() > 0)
            $star1 = round(($rat1->count() * 100) / $rat->count(),0);
        else
            $star1 = 0;
        
        if($rat2->count() > 0)
            $star2 = round(($rat2->count() * 100) / $rat->count(),0);
        else
            $star2 = 0;
        
        if($rat3->count() > 0)
            $star3 = round(($rat3->count() * 100) / $rat->count(),0);
        else
            $star3 = 0;
        
        if($rat4->count() > 0)            
            $star4 = round(($rat4->count() * 100) / $rat->count(),0);
        else
            $star4 = 0;
        
        if($rat5->count() > 0)
            $star5 = round(($rat5->count() * 100) / $rat->count(),0);
        else
            $star5 = 0;

            return view('courses/course-v2',compact([
                'course',
                'lectures',
                'star1',
                'star2',
                'star3',
                'star4',
                'star5',
                'student_review',
                's',
                'pp',
                'videoActu',
                'buys'
            ]));
        
    }
    catch( Exception $e){
        return redirect()->back()->with('message',$e->getMessage());
    }

    }

    public function lecture($id)
    {
        $lesson = Lesson::findOrFail(\Illuminate\Support\Facades\Crypt::decryptString($id));
        $course = Course::where('title',$lesson->course_title)->firstOrFail();        
        return redirect()->route('courses.preview',[
            'id' => $lesson->id,
        ]);
        // ->with([
        //     'videoActu' => $lesson->video 
        // ])
    }

    public function pricing()
    {
        return view('courses.pricing');
    }

    public function categoryCourse($id)
    {        
        try{
            $category = Category::find($id);
            $sales = DB::table('reviews')
            ->leftJoin('courses','courses.id','=','reviews.course_id')
            ->selectRaw('courses.*, sum(reviews.rating) total')            
            ->where('courses.category_id','=',$category->id)
            ->where('courses.deleted_at','=',null)
            ->where('reviews.deleted_at','=',null)
            ->groupBy('reviews.course_id')
            ->inRandomOrder()
            ->distinct()
            ->get();

            $students = DB::table('users')
            ->leftJoin('subscriptions','users.id','=','subscriptions.user_id')
            ->leftJoin('courses','courses.id','subscriptions.course_id')
            ->selectRaw('distinct users.id total')
            ->where('type','=','buy')
            ->where('courses.category_id','=',$id)
            ->where('users.user_type','App\Models\Student')
            ->get();
            
            
            $popularInstructors = DB::table('users')
            ->leftJoin('courses','courses.user_id','users.id')
            ->selectRaw('distinct users.*')
            ->where('courses.category_id','=',$id)
            ->where('courses.deleted_at','=',null)
            ->where('users.deleted_at','=',null)
            ->where('users.user_type','=','App\Models\Instructor')
            ->get();
            

            
            // \App\Models\Instructor::rating($popularInstructor->id);
            
            
            $freeCourses  = Course::where('discount_price','=','0')
            ->where('actual_price','=','0')
            ->where('category_id',$id)
            ->get();

            $courses = Course::InRandomOrder()->where('category_id','=',$category->id)
            ->get();
            $coursesTren = Course::InRandomOrder()->where('trending','trending')->where('category_id','=',$category->id)->where('status',1)->get();
            return view('courses.course-category',compact('category','sales','coursesTren','popularInstructors','freeCourses','courses','students'));
        }catch(Exception $e)
        {
            return redirect()->back()->with('message',$e->getMessage());
        }
    }

    public function filter()
    {
        return view('courses.course-filter-list');   
    }

    public function resume($id)
    {
        $zoneFoundator = 0;
        try{
            $course = Course::findOrFail($id);
            $zoneFoundator = 0;
            if(ClassCourse::where('course_id',$course->id)->count() > 0)
            {
                $classCourse = ClassCourse::where('course_id',$course->id)->first();                
                if(ClassSchool::where('id',$classCourse->class_id)->count() > 0)
                {
                    if(ClassSchool::where('id',$classCourse->class_id)->first()->user_id == auth()->user()->id)
                    {
                        $zoneFoundator = 1;                        
                    }
                }
            }    
            
            if((Subscription::where('course_id',$course->id)->where('user_id',auth()->user()->id)->where('type','buy')->get()->count() > 0 ) || (auth()->user()->is_subscribed == 1 && auth()->user()->subscription_id != null) || ($course->user->id == auth()->user()->id) || ($course->discount_price == 0 && $course->actual_price == 0) || ($zoneFoundator == 1))
            {
                // if((SubscriptionController::showSubscription(auth()->user()->subscription_id)->status =='ACTIVE') || (Subscription::where('course_id',$course->id)->where('user_id',auth()->user()->id)->where('type','buy')->get()->count() > 0 ))
                if((auth()->user()->is_subscribed == 1) || (Subscription::where('course_id',$course->id)->where('user_id',auth()->user()->id)->where('type','buy')->count() > 0 ) || ($course->user->id == auth()->user()->id) || ($course->discount_price == 0 && $course->actual_price == 0) || ($zoneFoundator == 1)){
                    if((auth()->user()->is_subscribed == 1) && (auth()->user()->subscription_id != null) )
                    {
                        if((!SubscriptionController::showSubscription(auth()->user()->subscription_id)->status =='ACTIVE')){
                            return redirect()->route('courses.subscribe',[
                                'id'  => $course->id     
                            ]);        
                        }
                    }
                    return view('courses.course-resume',compact('course'));
                }
                else{
                    $user = User::find(auth()->user()->id);
                    $user->is_subscribed = 0;
                    $user->save();
                    return redirect()->route('courses.subscribe',[
                        'id'  => $course->id     
                    ]);
                }
            }
            else{            
                return redirect()->route('courses.subscribe',[
                    'id' => $course->id
                ]);
            }
        }catch(Exception $e)
        {
            return redirect()->back()->with('message',$e->getMessage());
        }
    }

    public function activeCourse($id)
    {
        try{
            $course = Course::findOrFail($id);
            if($course->status == 1){
                $course->status = 0;
                $course->save();
            }
            else{
                $course->status = 1;
                $course->save();
            }

            return redirect()->back()->with('message','Course status changed!!');
        }
        catch(Exception $e){
            return redirect()->back()->with('message',$e->getMessage());
        }
    }

    public function register($id)
    {
        $course = Course::findOrFail($id);

        $pay = new Order();                        
        $pay->user_id = auth()->user()->id;
        $pay->category_id = $course->category_id;
        $pay->amount = 0;
        $pay->course_id = $course->id;
        $pay->status = 'SUCCESS..';
        $pay->mode_of_payment = 'PAYPAL';
        $pay->payment_id = '#MonthSubscription';
        $pay->payment_processor = 'NONE';
        $pay->save();
            
        // $mail = new YahooMail();
        // $mail->author_id = User::where('email','mashashie@yahoo.com')->first()->id;
        // $mail->email_to = auth()->user()->id;
        // $mail->subject = 'Notifications';
        // $mail->body = 'Hello Dear <b>'.User::find(auth()->user()->id).'</b> You have a successfull payment for course <b>'.Course::find($course->id)->title.'</b> <b> contact mashashie@yahoo.com for any problems </b>';
        // $mail->save();

        $subscription = new Subscription();
        $subscription->user_id = auth()->user()->id;
        $subscription->course_id = $course->id;
        $subscription->type = 'buy';
        $subscription->save();
        
        $mail = new YahooMail();
        $mail->author_id = User::where('email','mashashie@yahoo.com')->first()->id;
        $mail->email_to = Course::find($course->id)->user->id;
        $mail->subject = 'Notifications';
        $mail->body = 'you have a successful new subscription for your free course '.$course->title;
        $mail->save();
        return redirect()->back()->with('message','successful registration!!');
    }
}
