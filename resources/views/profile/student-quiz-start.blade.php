@extends('layouts.layouts.layouts.app')
<base href="/public">
@section('content')

@livewire('student-quiz-start',['quiz' => $quiz], key($quiz->id))

@endsection