<h4>I want to pay 768 USD</h4>
<form method="post" action="{!! URL::to('paypal') !!}" >
    @csrf
   <input type="hidden" name="amount" value="768"> 
   <input type="hidden" name="title" value="course name"> 
   <input type="submit" name="paynow" value="Pay Now">
</form>


{{$now = now()}}<br>
{{$trialexpiry = $now->addDays(30)}}<br>
{{$trialexpiry = $now->addDays(365)}}
jamesmills/laravel timezone.
{{today()}}
{{-- {{tommorrow()}} --}}
{{-- {{yesterday()}} --}}
{{-- {{Timezone::convertToLocal(now(), 'Y-m-d g:i', true);}} --}}
{{now()->addDays(3)}}
{{now()->subWeekDays(3)}}

$date1 = now();
$date2 = now()->addDay();
diffInHours InDays InMinutes
$difference = $date1->diff($date2);