@extends('layouts.app')
@section('content')


<!-- Center alignment -->
<div class="card text-center">
  <div class="card-header">
    Invite Instructor
  </div>
  <div class="card-body">
  <h5 class="title">Invite Instructors to {{$class->name}}</h5>    
    <div class="mb-3">

@livewire('invite-instructor-to-class',['class' => $class], key($class->id))
</div>
  </div>

</div>

@endsection