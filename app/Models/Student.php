<?php

namespace App\Models;

use App\Models\User;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
        /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'number' => 'required|unique:students',
        'address1' => 'address1',
        'address2' => 'address2',
        'state' => 'state',
        'country' => 'country',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public $fillable = [
        'student_id'
    ];

    use HasFactory;
    public function user() 
    { 
      return $this->morphOne('App\Model\User', 'userable');
    }

    public function payments($id)
    {
        $payment = DB::table('payments')
        ->selectRaw('sum(amount) total')
        ->where('status','SUCCESS..')
        ->where('user_id',$id)
        ->first();
        return $payment->total == null  ? 0 : $payment->total;   
            
    }
    
    public function courseUsers($id)
    {
        $course = Order::where('user_id',$id)->get();
        return $course->count();
    }
    
}
