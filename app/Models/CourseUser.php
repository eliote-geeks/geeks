<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CourseUser
 * @package App\Models
 * @version April 17, 2022, 5:18 am UTC
 *
 * @property \App\Models\Course $course
 * @property \App\Models\User $user
 * @property integer $user_id
 * @property integer $course_id
 * @property integer $user_account_id
 * @property string|\Carbon\Carbon $paid_date
 * @property string|\Carbon\Carbon $expiry_date
 * @property string $plan
 * @property number $paid_amount
 * @property boolean $status
 */
class CourseUser extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'courses_users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'course_id',
        'user_account_id',
        'paid_date',
        'expiry_date',
        'plan',
        'paid_amount',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'course_id' => 'integer',
        'user_account_id' => 'integer',
        'paid_date' => 'datetime',
        'expiry_date' => 'datetime',
        'plan' => 'string',
        'paid_amount' => 'float',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'course_id' => 'required',
        'user_account_id' => 'required|integer',
        'paid_date' => 'nullable',
        'expiry_date' => 'nullable',
        'plan' => 'nullable|string|max:255',
        'paid_amount' => 'nullable|numeric',
        'status' => 'required|boolean',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function course()
    {
        return $this->belongsTo(\App\Models\Course::class, 'course_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
