<?php

namespace App\Models;

use App\Models\User;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    public function user()
    {
         return $this->belongsTo(User::class);
    }
    
    public function lesson()
    {
         return $this->belongsTo(Lesson::class);
    }
}
