@extends('layouts.app')
@section('content')

  @include('navbar.navbar-school')
  <div class="py-6">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- nav -->
          <div>
            <ul class="nav nav-line-bottom">
              <li class="nav-item">
                <a href="{{route('schools.show',$school->id)}}" class="nav-link ">About Us</a>
              </li>
              <li class="nav-item">
              
                <a href="{{route('schools.reviews',$school->id)}}" class="nav-link ">Review <span class="text-inherit">({{\App\Models\SchoolReview::where('school_id',$school->id)->count()}})</span></a>
              </li>
              <li class="nav-item">
                <a href="{{route('class.list',$school->id)}}" class="nav-link">Classes <span class="text-inherit">({{\App\Models\ClassSchool::where('school_id',$school->id)->count()}})</span></a>
              </li>
              <li class="nav-item">
                <a href="{{route('schools.photo',$school->id)}}" class="nav-link">Photos</a>
              </li>
             <li class="nav-item">
                <a href="{{route('schools.instructors',$school->id)}}" class="nav-link active">Instructors</a>
              </li>
              @if($school->user_id == auth()->user()->id)
               <li class="nav-item">
                <a href="{{route('class.create',$school->id)}}" class="nav-link ">Create Class</a>
              </li>
                            <li class="nav-item">
                <a href="{{route('class.pending',$school->id)}}" class="nav-link ">Pending <span class="badge bg-secondary">{{
              \Illuminate\Support\Facades\DB::table('class_courses')
            ->leftJoin('courses','courses.id','=','class_courses.course_id')
            ->leftJoin('class_schools','class_schools.id','=','class_courses.class_id')
            ->selectRaw('courses.*, class_schools.name, class_courses.status as pending, class_courses.class_id as class, class_courses.id as de ')
            ->where('courses.deleted_at',null)
            ->where('courses.status',1)
            ->where('class_courses.status','=',0)
            ->where('class_schools.school_id','=',$school->id)
            ->orderByDesc('de')
            ->count()
                }}</span></a>
              </li>
              @endif
            </ul>
          </div>
        </div>
      </div>
      <div class="row mt-6">
        <div class="col-12">
          
          <div class="py-8  bg-light-gradient-top ">
    <div class="container">
      <div class="row mb-8 justify-content-center">
         <!-- caption -->
        <div class="col-lg-8 col-md-12 col-12 text-center">
          <span class="text-primary mb-3 d-block text-uppercase fw-semi-bold ls-xl">College-class Instructors</span>
          <h2 class="mb-2 display-4 fw-bold">Classes Taught by Industry Expert</h2>
          
        </div>
      </div>
 <!-- row -->
 
      <div class="row">
      @forelse ($instructors as $instructor)
          
        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
           <!-- card -->
          <div class="card mb-4 card-hover">
             <!-- img -->
            <div class="card-img-top">
              <img style="width:100%;" src="{{\App\Models\User::find($instructor->id)->profile_photo_url}}" alt="" class="rounded-top-md img-fluid">
            </div>
             <!-- card body -->
            <div class="card-body">
             <h3 class="mb-0 fw-semi-bold"> <a href="{{route('instructor.profile',$instructor->id)}}" class="text-inherit">{{$instructor->first_name.' '.$instructor->last_name}}</a></h3>
              <p class="mb-3">{{\App\Models\Instructor::instructor($instructor->id)}}</p>
              <div class="lh-1  d-flex justify-content-between">
                <div>
                  <span class="fs-6">
                    <i class="mdi mdi-star text-warning"></i>
                    <span class="text-warning">{{\App\Models\Instructor::rating($instructor->id)}}</span>
                  </span>
                </div>
                <div>
                  <span class="fs-6 text-muted"><span class="text-dark">{{\App\Models\Instructor::students($instructor->id)}}</span> Students</span></div>
                <div>
                  <span class="fs-6 text-muted"><span class="text-dark">{{\App\Models\User::find($instructor->id)->courses->count()}}</span> Course</span></div>
              </div>
            </div>
          </div>
        </div>
@empty
      @endforelse

      </div>
      {{$instructors->links()}}
    </div>
  </div>
          
          




        </div>
      </div>
    </div>
  </div>



@endsection     