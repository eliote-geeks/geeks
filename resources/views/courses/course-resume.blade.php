@extends('layouts.app')
<base href="/public">
@section('content')

@livewire('course-resume',['course' => $course], key($course->id))

@endsection