@extends('layouts.app')
@section('content')

@livewire('approval-courses-class',['school' => $school], key($school->id))


@endsection