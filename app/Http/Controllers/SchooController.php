<?php

namespace App\Http\Controllers;

use App\Models\AdminPayout;
use App\Models\User;
use App\Models\Photo;
use App\Models\School;
use App\Models\ClassCourse;
use App\Models\ClassSchool;
use App\Models\SchoolReview;
use Illuminate\Http\Request;    
use App\Models\ClassInstructor;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SchooController extends Controller
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
        if(auth()->user()->user_type == 'App\Models\Admin')
            return view('school.create-school');
        else
            return redirect()->back()->with('message','Oups we can\'t find this page!!');
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

    public function photo($id)
    {
        $school = School::find($id);
        $photos = Photo::latest()->where('school_id',$school->id)->paginate(16);
        return view('school.school-photos',compact('school','photos'));
    }

    public function photo_store(Request $request ,$id)
    {
        // $request->validate([
        //     'photos[]' => 'required|image'
        // ]);
        foreach($request->photos as $ph){
                        
            $photo = new Photo();
            $photo->path = 'storage/' .$ph->store('photoClass','public');
            // dd($photo->path);
            $photo->school_id = $id;
            $photo->save();
        }
        return redirect()->back()->with('message','success');
    }

    public function deletePhoto($id)
    {
        try{
            $photo = Photo::find($id);
            $photo->delete();
            return redirect()->back()->with('message','Photo removed!!');
        }
        catch(Exception $e)
        {
            return view('courses.404');
        }
    }

    public function reviews($id) 
    {   
        try{
            $school = School::find($id);
            $reviews = SchoolReview::where('school_id',$school->id)->orderByDesc('id')->paginate(6);     
            $rat1 = SchoolReview::where('school_id',$school->id)->where('rating','=','1')->get();
            $rat2 = SchoolReview::where('school_id',$school->id)->where('rating','=','2')->get();
            $rat3 = SchoolReview::where('school_id',$school->id)->where('rating','=','3')->get();
            $rat4 = SchoolReview::where('school_id',$school->id)->where('rating','=','4')->get();
            $rat5 = SchoolReview::where('school_id',$school->id)->where('rating','=','5')->get();
            $rat = SchoolReview::where('school_id',$school->id)->get();

            
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
            return view('school.school-reviews',compact([
                'school',
                'star1',
                'star2',
                'star3',
                'star4',
                'star5',
                'rat',
                'student_review',
                's',
                'reviews'
            ]));
        }catch(Exception $e)
        {
            return view('courses.404');
        }
    }

    public function comments(Request $request, $id)
    {
        $request->validate([
            'review' => 'required|max:501|min:3',
            'rating' => 'required'
        ]);
        
        $review = new SchoolReview();
        $review->user_id = auth()->user()->id;
        $review->school_id = School::findOrFail($id)->id;
        $review->rating = $request->rating;
        $review->review = $request->review;
        
        $review->save();        
        return  redirect()->back()->with('message','success');
    }

    public function deleteComment($id)
    {
        $review = SchoolReview::findOrFail($id);
        if($review->user_id == auth()->user()->id)
        {
            $review->delete();
            return redirect()->back()->with('message','comment deleted successfully!!');
        }
        else{
            return redirect()->back()->with('message','Comment no deleted!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        try{
            $school = School::find($id);
            return view('school.school-about',compact('school'));   
        }catch(Exception $e)
        {
            return view('courses.404');
        }

    }

    public function create_class($id)
    {
        try{
            $school = School::find($id);
            if(Auth::user()->id == $school->user_id){
                return view('school.create-class',compact('school'));
            }
            else{
                return redirect()->back();
            }
        }catch(Exception $e)
        {
            return view('courses.404');
        }
    }
    

    public function class_show($id)
    {
        try{
            $class = ClassSchool::find($id);
            $courses = ClassCourse::where('class_id',$id)->where('status',1)->get();
            return view('school.class-view',compact('class','courses'));
        }
        catch(Exception $e)
        {
            return view('courses.404');
        }
    }

    public function list_class($id)
    {
        try{
            $school = School::find($id);
            $classes = ClassSchool::where('school_id',$id)->paginate();
            return view('school.class-list',compact('school','classes'));
        }
        catch(Exception $e)
        {
            return view('courses.404');
        }
    }

    public function pending($id)
    {
        try{
            $school  = School::find($id);
            if(auth()->user()->id == $school->user_id){
                return view('school.class-pending',compact('school'));
            }
            else{
                return redirect()->back();
            }
        }
        catch(Exception $e)
        {
            return view('courses.404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        //
    }

    public function browseSchool()
    {
        try{
        $schools = School::paginate(8);
        return view('school.schools-list',compact('schools'));
        }
        catch(Exception $e){
            return view('courses.404');
        }
    }

    public function inviteToClass($id)
    {
        try{
            $class = ClassSchool::find($id);
            if($class->user_id == auth()->user()->id){
                return view('school.inviteInstructor',compact('class'));
            }
            else{
                return redirect()->back();
            }
        }
        catch(Exception $e){
            return view('courses.404');
        }
    }

    public function destroyClass($id)
    {
        try{
            $class = ClassSchool::find($id);
            if($class->user_id == auth()->user()->id)
            {
                $class->delete();
                return redirect()->back()->with('message','Operation successfully !! This class is removed');
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

    public function instructors($id)
    {
        
        try{
            $school = School::find($id);            
            $instructors = DB::table('class_instructors')
            ->leftJoin('class_schools','class_schools.id','=','class_instructors.class_id')
            ->leftJoin('users','users.id','class_instructors.user_id')
            ->selectRaw('distinct users.*')            
            ->where('users.user_type','=','App\Models\Instructor')
            ->where('class_schools.school_id','=',$school->id)
            ->paginate(8);            
            return view('school.school-instructor',compact('school','instructors'));
        }
        catch(Exception $e)
        {
            return view('courses.404');
        }
        
    }

    public function adminShowSchools()
    {
        $schools = School::where('user_id',auth()->user()->id)->latest()->paginate(4);
        return view('admin-schools.schools',compact('schools'));
    }

    public function adminOrdersSchool()
    {
        $orders = AdminPayout::where('user_id',auth()->user()->id)->get();
        return view('admin-schools.orders',compact('orders'));
    }

    public function adminInstructors()
    {
        $instructors = DB::table('class_instructors')
        ->leftJoin('class_schools','class_schools.id','=','class_instructors.class_id')
        ->leftJoin('users','users.id','=','class_instructors.user_id')
        ->selectRaw('distinct users.*')
        ->where('class_schools.user_id','=',auth()->user()->id)
        ->where('users.user_type','=','App\Models\Instructor')
        ->where('users.deleted_at','=',null)
        ->get();
        return view('admin-schools.instructors',compact('instructors'));
    }
    
    public function adminStudents()
    {
        $students = DB::table('user_school_classes')
        ->leftJoin('class_schools','class_schools.id','=','user_school_classes.entity_id')
        ->leftJoin('users','users.id','=','user_school_classes.user_id')
        ->selectRaw('distinct users.*')
        ->where('user_school_classes.entity_type','=','\App\Models\ClassCourse')
        ->where('class_schools.user_id','=',auth()->user()->id)
        ->where('users.user_type','=','App\Models\Student')
        ->where('users.deleted_at','=',null)
        ->get();
        return view('admin-schools.students',compact('students'));
    }

}
