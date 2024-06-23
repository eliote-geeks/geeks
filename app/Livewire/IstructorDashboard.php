<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IstructorDashboard extends Component
{
    public function render()
    {
        // SELECT COUNT(*) count FROM payments LEFT JOIN courses ON courses.id = payments.course_id LEFT JOIN users ON users.id = courses.user_id WHERE users.id = 1 AND payments.`status` = 'FAILED..' AND courses.id = 1;
        $amounts = DB::table('payments')
        ->leftJoin('courses','courses.id','=','payments.course_id')
        //->leftJoin('users','users.id','=','courses.user_id')
        ->select(DB::raw("SUM(payments.amount) as count"), DB::raw("MONTHNAME(payments.created_at) as month_name"))
        ->whereYear('payments.created_at', date('Y'))
        ->where('courses.user_id',Auth::user()->id)
        ->where('courses.deleted_at','=',null)
        ->where('payments.status','SUCCESS..')
        ->groupBy(DB::raw("Month(payments.created_at)"))
        ->pluck('count', 'month_name');

        

        $orders = DB::table('payments')
        ->leftJoin('courses','courses.id','=','payments.course_id')
        //->leftJoin('users','users.id','=','courses.user_id')
        ->select(DB::raw("COUNT(payments.id) as count"), DB::raw("MONTHNAME(payments.created_at) as month_name"))
        ->whereYear('payments.created_at', date('Y'))
        ->where('courses.user_id',Auth::user()->id)
        ->where('courses.deleted_at','=',null)
        ->groupBy(DB::raw("Month(payments.created_at)"))
        ->pluck('count', 'month_name');

        
        
        $orders_month = DB::table('payments')
        ->leftJoin('courses','courses.id','=','payments.course_id')
        //->leftJoin('users','users.id','=','courses.user_id')
        ->select(DB::raw("SUM(payments.amount) as count"), DB::raw("MONTHNAME(payments.created_at) as month_name"))
        ->whereYear('payments.created_at', date('Y'))
        ->where('courses.user_id',Auth::user()->id)
        ->where('courses.deleted_at','=',null)
        ->where('payments.status','SUCCESS..')
        ->groupBy(DB::raw("Month(payments.created_at)"))
        ->pluck('count', 'month_name')
        ->first();
        

        $courses = DB::table('payments')
        ->leftJoin('courses','courses.id','=','payments.course_id')
        ->selectRaw('courses.*, sum(payments.amount) total, count(payments.id) count')
        ->where('courses.user_id',Auth::user()->id)
        ->where('payments.status','SUCCESS..')
        ->where('courses.deleted_at','=',null)
        ->where('payments.deleted_at','=',null)  
        ->groupBy('payments.course_id')
        ->orderBy('total','desc')
        ->take(5)
        ->get();
        
        $earnings = DB::table('payments')
        ->leftJoin('courses','courses.id','=','payments.course_id')
        ->selectRaw('sum(payments.amount) total')
        ->where('courses.user_id',Auth::user()->id)
        ->where('payments.status','SUCCESS..')
        ->where('courses.deleted_at','=',null)
        ->where('payments.deleted_at','=',null)  
        ->groupBy('payments.course_id')
        ->get();

        $earning = 0;
        foreach($earnings as $earn)
        {
            $earning += $earn->total;
        }
        $enrolls =  DB::table('payments')
        ->leftJoin('courses','courses.id','=','payments.course_id')
        ->selectRaw('courses.*, sum(payments.amount) total, count(payments.id) count')
        ->where('courses.user_id',Auth::user()->id)
        ->where('payments.status','SUCCESS..')
        ->where('courses.deleted_at','=',null)
        ->where('payments.deleted_at','=',null)  
        ->groupBy('payments.course_id')
        ->orderBy('total','desc')
        ->get();
        $enroll = 0;
        foreach($enrolls as $course)
        {
            $enroll += $course->count;
        }

        return view('livewire.istructor-dashboard',[    
            'amounts' => $amounts,
            'orders' => $orders,
            'courses' => $courses,
            'orders_month' => $orders_month,
            'earning' => $earning,
            'enroll' => $enroll
        ]);
    }
}
