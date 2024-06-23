@extends('layouts.app')
@section('content')

  @livewire('course-paypal',['course' => $course], key($course->id))
@endsection