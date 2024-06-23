<div class="col-lg-9 col-md-8 col-12">
{{-- <button wire:click='pending' wire:loading.attr='disabled' class="btn btn-outline-primary">@if($pending ==  0) Invitations pending @else Friends @endif</button><br><br> --}}
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}


    @foreach (\App\Models\User::all() as $user)
         <!-- Horizontal -->
         @if((\App\Models\FriendInvitation::where('user_id',auth()->user()->id)->where('invite_id',$user->id)->where('status',1)->count() > 0) || (\App\Models\FriendInvitation::where('user_id',$user->id)->where('invite_id',auth()->user()->id)->where('status',1)->count() > 0))
 <div class="card mb-3" style="max-width: 540px;">
   <div class="row g-0">
     <div class="col-md-2">
       <img src="{{$user->profile_photo_url}}" class="img-fluid rounded-start h-100" alt="...">
     </div>
     <div class="col-md-8">
       <div class="card-body">
         <h5 class="card-title"><a href="{{route('student.profile',$user->id)}}">{{$user->first_name.' '.$user->last_name}} </a></h5>
         @if ((\App\Models\FriendInvitation::where('user_id',auth()->user()->id)->where('invite_id',$user->id)->where('status',1)->count() > 0))
         <p class="card-text"><small class="text-muted">Friend {{(\App\Models\FriendInvitation::where('user_id',auth()->user()->id)->where('invite_id',$user->id))->first()->updated_at->diffForHumans()}}</small></p>
         @elseif((\App\Models\FriendInvitation::where('user_id',$user->id)->where('invite_id',auth()->user()->id)->where('status',1)->count() > 0))             
         <p class="card-text"><small class="text-muted">Friend {{(\App\Models\FriendInvitation::where('user_id',$user->id)->where('invite_id',auth()->user()->id))->first()->updated_at->diffForHumans()}}</small></p>
         @else
         @endif

@if ((\App\Models\FriendInvitation::where('user_id',auth()->user()->id)->where('invite_id',$user->id)->where('status',1)->count() > 0))
         <button wire:click='remove({{\App\Models\FriendInvitation::where('user_id',auth()->user()->id)->where('invite_id',$user->id)->first()->id}})' wire:loading.attr='disabled' class="btn btn-outline-danger"><i class="fe fe-trash"></i></button>          
  @elseif((\App\Models\FriendInvitation::where('user_id',$user->id)->where('invite_id',auth()->user()->id)->where('status',1)->count() > 0))             
         <button wire:click='remove({{\App\Models\FriendInvitation::where('user_id',$user->id)->where('invite_id',auth()->user()->id)->first()->id}})' wire:loading.attr='disabled' class="btn btn-outline-danger"><i class="fe fe-trash"></i></button>          
         @else
         @endif
       </div>
     </div>
   </div>
 </div>
 @endif
    @endforeach
    {{-- {{$users->links()}} --}}
 @if($pending == 0)

        @foreach ($invitations as $user)
         <!-- Horizontal -->
 <div class="card mb-3" style="max-width: 540px;">
   <div class="row g-0">
     <div class="col-md-2">
       <img src="{{\App\Models\User::find($user->user_id)->profile_photo_url}}" class="img-fluid rounded-start h-100" alt="...">
     </div>
     <div class="col-md-8">
       <div class="card-body">
         <h5 class="card-title"><a href="{{route('student.profile',\App\Models\User::find($user->invite_id)->id)}}">{{\App\Models\User::find($user->user_id)->first_name.' '.\App\Models\User::find($user->user_id)->last_name}} </a></h5>
         <p class="card-text"><small class="text-muted">Friend {{$user->updated_at->diffForHumans()}}</small></p>
         <button wire:click='remove({{$user->id}})' wire:loading.attr='disabled' class="btn btn-outline-danger"><i class="fe fe-trash"></i></button>
          @if(($pending ==  0))<button wire:click='approved({{$user->id}})' wire:loading.attr='disabled' class="btn btn-outline-success"><i class="fe fe-user-check"></i></button>@endif
       </div>
     </div>
   </div>
 </div>
    @endforeach
    {{$invitations->links()}}
    @endif
</div>
