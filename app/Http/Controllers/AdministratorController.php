<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use App\Models\Order;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Administrator;
use App\Models\FrequentlyQuestion;
use App\Models\School;
use App\Models\Site;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

class AdministratorController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $courses = Course::latest()->take(5)->get();
        return view('admin.admin-dashboard',compact('courses'));
    }

    public function plans()
    {
        $plans = Plan::all();
        return view('admin.admin-plans',compact('plans'));
    }

    public function  instructors()
    {
      try{
        $users = User::all();
        foreach($users as $user)
        {
            $instructors = User::where('user_type','App\Models\Instructor')->paginate(16);    
        }

        return view('admin.admin-instructor',compact('instructors'));
    }
    catch(\Exception $e)
    {
        return redirect()->back()->with('message','Oups!! something Wrong !!:(');
    }
}

    public function orders()
    {
        $orders = Order::all();
        return view('admin.admin-orders',compact('orders'));
    }

    public function status($id)
    {        
        $order = Order::find($id);
        if($order->status == 'SUCCESS..'){
            $order->status = 'FAILED..';
            $order->save();
        }
        else{
            $order->status = 'SUCCESS..';
            $order->save();
        }

        $orders = Order::all();
        return view('admin.admin-orders',compact('orders'))->with('message','success');
    }

    public function delete($id)
    {
        $order = Order::find($id);
        $order->delete();
        $orders = Order::all();
        return view('admin.admin-orders',compact('orders'))->with('message','success');
    }

    public function payouts($id)
    {
        $user = User::find($id);
        $amount = DB::table('payments')
        ->leftJoin('courses','courses.id','=','payments.course_id')
        ->select(DB::raw("SUM(payments.amount) as count"), DB::raw("MONTHNAME(payments.created_at) as month_name"), DB::raw('courses.user_id'))
        ->whereYear('payments.created_at', date('Y'))
        ->where('courses.user_id','=',$id)
        ->where('courses.deleted_at','=',null)
        ->where('payments.status','SUCCESS..')
        ->groupBy(DB::raw("Month(payments.created_at)"))
        ->first();
        if($amount == null)
            $amount = 0;
        else
            $amount = $amount->count;
        return view('admin.admin-checkout',compact('user','amount'));
    }

    public function customers()
    {
        $instructors = User::where('user_type','App\Models\Instructor')->get();

        return view('admin.admin-customers',compact('instructors'));
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
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function show(Administrator $administrator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrator $administrator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrator $administrator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrator $administrator)
    {
        //
    }

    public function sendEmail($id)
    {
        return view('admin.admin-sendEmail',compact('id'));
    }

    public function sendEmailPost(Request $request,$id)
    {
        $request->validate([
            'greeting' => 'required',
            'body' => 'required|min:3',
            'actiontext' => 'required',
            'actionurl' => 'required',
            'endpart' => 'required',
        ]);

        $student = User::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart
        ];

        Notification::send($student,new SendEmailNotification($details));
        return redirect()->back()->with('message','Your message has been successfully send!!');

    }

    public function settings()
    {
        $site = Site::first();
        return view('admin.admin-setting',compact('site'));
    }

    public function saveSettings(Request $request)
    {
        // dd($request->all());

        if(Site::first()){
            $request->validate([
                'logoPath' => 'mimes:svg,png',
                'faviconPath' => 'mimes:ico',
                'ressource' => 'mimes:rar,zip'
            ]);
            $site = Site::first();
            $site->name = $request->name;            
            $site->description = $request->description;
            if($request->ressource != null)
            {                
                if(file_exists($site->ressource)){
                    unlink($site->ressource);
                }
                $site->ressource = 'storage/' . $request->ressource->store('ressources','public');

            }
            
            if($request->logoPath != null)
            {                
                if(file_exists($site->logoPath)){
                    unlink($site->logoPath);
                }
                $site->logoPath = 'storage/' . $request->logoPath->store('logoPaths','public');

            }
            if($request->faviconPath != null)
            {
                if(file_exists($site->faviconPath)){
                    unlink($site->faviconPath);
                }
                $site->faviconPath = 'storage/' . $request->faviconPath->store('faviconPaths','public');
            }
            $site->save();
            return redirect()->back()->with('message','saved!');
        }
        else{
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'logoPath' => 'required|mimes:svg',
                'faviconPath' => 'required|mimes:ico',
                'ressource' => 'required|mimes:zip,rar'
            ]);
            $site = new Site();
            $site->name = $request->name;
            $site->description = $request->description;
            $site->logoPath = 'storage/' . $request->logoPath->store('logoPaths','public');
            $site->faviconPath = 'storage/' . $request->faviconPath->store('faviconPaths','public');
            $site->save();
            return redirect()->back()->with('message','saved!');
        }
    }

    public function freqQuestions()
    {
        $questions = \App\Models\FrequentlyQuestion::latest()->take(6)->get();
        return view('admin.admin-questions',compact('questions'));
    }

    public function freqQuestionsStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'response' => 'required'
        ]);
        $question = new FrequentlyQuestion();
        $question->title = $request->title;
        $question->response = $request->response;
        $question->save();
        return redirect()->back()->with('message','saved');
    }

    public function frequentlyQuestionDelete($id)
    {
        $question = FrequentlyQuestion::findOrFail($id);
        $question->delete();
        return redirect()->back()->with('message','question removed!!');
    }

    public function trash() 
    {
        return view('admin.corbeille');
    }

    public function adminSchools()
    {
        $admins = User::where('user_type','App\Models\Admin')->paginate(5);
        return view('admin.admin-schools',compact('admins'));
    }

    public function adminlistschool()
    {
        $schools = School::all();
        return view('admin.admin-school-list',compact('schools'));
    }



}
