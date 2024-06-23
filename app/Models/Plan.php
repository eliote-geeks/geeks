<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    public function plan($id)
    {
        $subscription = Subscription::where('subscription_id',$id)->first()->plan_id;
        $plan = Plan::where('plan_id',$subscription)->first();
        if($plan == 'null')
            return 0;
        else
            return $plan->type;
    }
}
