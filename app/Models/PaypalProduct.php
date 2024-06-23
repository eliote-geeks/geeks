<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaypalProduct extends Model
{
    use HasFactory;
    public $table = 'paypal_products';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

}
