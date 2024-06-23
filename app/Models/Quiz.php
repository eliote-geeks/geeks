<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    public function quizMin($id)
    {
        $quiz = Quiz::find($id);
        $arrayHour = explode(':',$quiz->duration);
            $second = 3600 * $arrayHour[0] + 60 * $arrayHour[1] + $arrayHour[2];
            return $second.'s';
    }
}
