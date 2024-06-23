<div class="container col-6 ">
    {{-- Success is as dangerous as failure. --}}

    <div class="input-group">
  <input wire:model.debounce='search' type="text" class="form-control" placeholder="Search instructor">
    <span class="input-group-text"><i class="fe fe-search"></i></span>
  <div class="input-group-append">
  </div>
</div>
 <!-- border spinner --><br>
<div wire:loading class="spinner-border" role="status">
  <span class="sr-only">Loading...</span>
</div>
@if($search != '')
@forelse ($instructors as $instructor)
<div class="card" style="width: 20rem;">
  <div class="card-body">
    <img class="avatar avatar-sm" src="{{$instructor->profile_photo_url}}">
    <h6 class="card-title mb-2 text-muted">{{$instructor->name}}</h6>
    <h6 class="card-subtitle mb-2 text-muted">{{$instructor->courses->count()}} courses</h6>
    <p class="card-text">{{$instructor->first_name.' '.$instructor->last_name}}.</p>
    <a href="javascript:;" wire:loading.attr='disabled' wire:click='invitation({{$instructor->id}})' class="btn-sm btn-primary">{{\App\Models\ClassInstructor::where('user_id',$instructor->id)->where('class_id',$class->id)->count() == 0 ? 'Invite' : 'pending..' }}</a>
    <a href="{{route('instructor.profile',$instructor->id)}}" class="btn-sm btn-success">View profile</a>
  </div>
</div>
@empty
<span>No result</span>
@endforelse
@endif

</div>
