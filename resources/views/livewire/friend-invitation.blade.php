<div class="col-lg-9 col-md-8 col-12">
    {{-- The Master doesn't talk, he acts. --}}
<!-- Search input -->
 <div class="mb-3">
   <label for="search-input" class="form-label">Search Users ({{$users->count()}})</label>
   <input wire:model='search' class="form-control" type="search" id="search-input" >
 </div>


    @forelse($users as $user)
    <!-- Horizontal -->
    @if(\App\Models\FriendInvitation::where('user_id',auth()->user()->id)->where('invite_id',$user->id)->where('status',1)->count() == 0)
 <div class="card mb-3" style="max-width: 540px;">
   <div class="row g-0">
     <div class="col-md-4">
       <img src="{{$user->profile_photo_url}}" class="img-fluid rounded-start h-100" alt="...">
     </div>
     <div class="col-md-3">
       <div class="card-body">
         <h5 class="card-title"> {{$user->first_name.' '.$user->last_name}}</h5>         
         <p class="card-subtitle"><a href="{{route('student.profile',$user->id)}}">{{$user->name}}</a></p>
         <p class="card-text"><small class="text-muted">Joined at {{\Carbon\Carbon::parse($user->created_at)->format('d, M Y')}}</small></p>
         <button wire:loading.attr='disabled' wire:click='addFriend({{$user->id}})'  class="btn-sm btn{{\App\Models\FriendInvitation::where('user_id',auth()->user()->id)->where('invite_id',$user->id)->where('status',0)->count() == 0 ? '-outline-primary' : '-danger' }}"><i class=" fe fe-user-plus"></i></button>
         
       </div>
     </div>
   </div>
 </div>
 @endif
    @empty
    @endforelse
    <a class="text-center" href="javascript:;" role="button"  data-bs-toggle="button" aria-pressed="true">
            <span class="load-text"> </span>
            <div class="load-icon">
              <div  wire:loading class="spinner-grow spinner-grow-sm" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>
          </a>
{{-- {{$users->links()}} --}}
<script type="text/javascript">
      window.onscroll = function(ev) {
         if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
             window.livewire.emit('load-more');
          }
      };
      </script>
</div>