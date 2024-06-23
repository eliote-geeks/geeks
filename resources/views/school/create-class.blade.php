@extends('layouts.app')
@section('content')

@livewire('create-class',['school' => $school], key($school->id))

@endsection