<?php

namespace App\Models;

use App\Models\BlogUser;
use App\Models\Question;
use App\Models\Response;
use App\Models\Subscription;
use App\Models\CommentBlogUser;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use tizis\laraComments\Traits\Commenter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable  implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;
    use Commenter;
    use HasFactory;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'role_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'date_of_birth',
        'is_subscribed',
        'email_verified_at',
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'role_id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'gender' => 'string',
        'email' => 'string',
        'date_of_birth' => 'string',
        'is_subscribed' => 'boolean',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'role_id' => 'required',
        'first_name' => 'nullable|string|max:255',
        'last_name' => 'nullable|string|max:255',
        'gender' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'date_of_birth' => 'nullable|string|max:255',
        'is_subscribed' => 'nullable|boolean',
        'email_verified_at' => 'nullable',
        'password' => 'required|string|max:255',
        'remember_token' => 'nullable|string|max:100',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class, 'role_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    
    public function comments()
    {
        return $this->hasMany(CommentBlogUser::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function courses()
    {
        return $this->hasMany(\App\Models\Course::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function coursesUsers()
    {
        return $this->hasMany(\App\Models\CoursesUser::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function enrolls()
    {
        return $this->hasMany(\App\Models\Enroll::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function items()
    {
        return $this->hasMany(\App\Models\Item::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function reviews()
    {
        return $this->hasMany(\App\Models\Review::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function views()
    {
        return $this->hasMany(\App\Models\View::class, 'user_id');
    }
    
    public function userable()
    {
      return $this->morphTo();
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function response()
    {
        return $this->hasMany(Response::class);
    }

    public function school_reviews()
    {
        return $this->hasMany(\App\Models\Review::class, 'user_id');
    }


    public function schools()
    {
        return $this->hasMany(School::class);
    }
    
    public function classes()
    {
        return $this->hasMany(ClassSchool::class);
    }

    public function bloggers()
    {
        return $this->hasMany(\App\Models\BlogUser::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getLocation()
    {
        $ip = request()->ip();
        $url = "http://ip-api.com/json/$ip";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $location = json_decode($response);

        return $location;
    }   

}
