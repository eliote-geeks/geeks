@extends('layouts.app')
@section('title','quiz detail')
@section('content')

@livewire('instructor-quiz-detail',['quiz' => $quiz], key($quiz->id))

@endsection