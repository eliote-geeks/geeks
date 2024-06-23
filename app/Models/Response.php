<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Response extends Model
{
    use HasFactory;
    public function author()
    {
         return $this->belongsTo(\App\Models\User::class);
    }
    
    public function client()
    {
         return $this->belongsTo(\App\Models\User::class);
    }
}
