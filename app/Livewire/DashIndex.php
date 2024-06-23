<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Order;

use App\Models\Course;
use Livewire\Component;

class DashIndex extends Component
{
    public Float $amount = 0;
    public function render()
    {        
        $courses = Course::all();
        $pending = Course::where('status','0')->get();
        $sales = Order::where('status','SUCCESS..')->get();
        foreach($sales as $sale)
            $this->amount += $sale->amount;
        $students = User::where('user_type','App\Models\Student')->get();
        $instructors = User::where('user_type','App\Models\Instructor')->get();
        return view('livewire.dash-index',[
            'sales' => $sales,            
            'courses' => $courses,
            'instructors' => $instructors,
            'students' => $students,
            'pending' => $pending
        ]);
    }
}
