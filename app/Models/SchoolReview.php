<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolReview extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
    public function rating($id)
    {
        $student_review=0;
        $s=0;
        $rat1 = \App\Models\SchoolReview::where('school_id',$id)->where('rating','=','1')->get();
        $rat2 = \App\Models\SchoolReview::where('school_id',$id)->where('rating','=','2')->get();
        $rat3 = \App\Models\SchoolReview::where('school_id',$id)->where('rating','=','3')->get();
        $rat4 = \App\Models\SchoolReview::where('school_id',$id)->where('rating','=','4')->get();
        $rat5 = \App\Models\SchoolReview::where('school_id',$id)->where('rating','=','5')->get();
        $rat = \App\Models\SchoolReview::where('school_id',$id)->get();
        if($rat->count() == 0){    
            $student_review=0;
            $s=0;
        }
        else{
            $student_review = round((($rat1->count() * 1) + ($rat2->count() * 2) + ($rat3->count() * 3) + ($rat4->count() * 4) + ($rat5->count() * 5)) / $rat->count(),1);
            $s = $rat->count();
        }    
        return ['0' => $student_review,
                '1' => $s
               ];
    }
}
