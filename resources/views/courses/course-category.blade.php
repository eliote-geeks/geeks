@extends('layouts.app')
@section('content')

  <!-- Page header -->
  <div class="py-4 py-lg-6 bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
          <div>
            <h1 class="text-white mb-1 display-4">{{$category->name}}</h1>
            <p class="mb-0 text-white lead">{{$students->count()}} students are learning {{$category->name}}.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Content -->
  <div class="py-6">
    <div class="container">
      <div class="row mb-6">
        <div class="col-md-12">
          <!-- Nav -->
          <ul class="nav nav-lb-tab mb-6" id="tab" role="tablist">
            <li class="nav-item ms-0" role="presentation">
              <a class="nav-link active" id="most-popular-tab" data-bs-toggle="pill" href="#most-popular" role="tab"
                aria-controls="most-popular" aria-selected="true">Most Popular</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="trending-tab" data-bs-toggle="pill" href="#trending" role="tab"
                aria-controls="trending" aria-selected="false">Trending</a>
            </li>
          </ul>
          <!-- Tab Content -->
          <div class="tab-content" id="tabContent">
            <!-- Tab Pane -->
            <div class="tab-pane fade show active" id="most-popular" role="tabpanel" aria-labelledby="most-popular-tab">
              <div class="row">


@forelse($sales as $course)
@if($course->status == 1)
                <div class="col-lg-3 col-md-6 col-12">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="{{route('courses.show',App\Models\Course::find($course->id))}}" class="card-img-top"><img src="{{asset('storage/'.$course->photo)}}" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="{{route('courses.show',App\Models\Course::find($course->id))}}" class="text-inherit">{{$course->title}}</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>{{\App\Models\Course::hourCourse($course->title)}}</li>
                                    <li class="list-inline-item">
                          @if($course->level == 'Beginners')                            
                        <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;">
                  {{$course->level}}
                </span>
                            </span>
                            
                    @elseif($course->level == 'Intermediate')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;">
                  {{$course->level}}
                </span>
                            </span>
                    @elseif($course->level == 'Advance')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;">
                  {{$course->level}}
                </span>
                            </span>
                            
                        @elseif($course->level == 'Master')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;">
                  {{$course->level}}
                </span>
                            </span>

                @endif
                         <i style="margin-top:-3px;">{{$course->level}}</i>  
                                    </li>
                                </ul>
                                <div class="lh-1">
                  
<span>
                @for ($k = 1 ; $k <= round(\App\Models\Course::rating($course->id)[0],0) ; $k++)
                <i class="mdi mdi-star me-n1 text-warning"></i>
                @endfor
                @for ($k = 1 ; $k <= 5 - round(\App\Models\Course::rating($course->id)[0],0) ; $k++)
                <i class="mdi mdi-star me-n1 text-light"></i>
                @endfor
                  </span>
            <span class="text-warning">{{\App\Models\Course::rating($course->id)[0]}}</span>
                                    <span class="fs-6 text-muted">({{\App\Models\Course::rating($course->id)[1]}})</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="{{App\Models\Course::find($course->id)->user->profile_photo_url}}" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                    
                                        <span>{{App\Models\Course::find($course->id)->user->name}}</span>
                                    </div>
                                    <div class="col-auto">
                                @auth
                                @if(App\Models\Enroll::where('course_id',$course->id)->where('user_id',auth()->user()->id)->get()->count() > 0 )                                
                                        <a href="{{route('courses.enroll',App\Models\Course::find($course->id))}}" class="removeBookmark"><div wire:loading class="spinner-border"></div>
                                            <i class="fas fa-bookmark "></i>
                                        </a>
                                @endif     
                                       @if(App\Models\Enroll::where('course_id',$course->id)->where('user_id',auth()->user()->id)->get()->count() == 0)
                                       <a href="{{route('courses.enroll',App\Models\Course::find($course->id))}}"  class="text-dark bookmark"><div wire:loading class="spinner-border"></div>
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    @endif
                                    @endauth
                                    @guest
                                    <a href="{{route('login')}}" class="text-muted bookmark"><div wire:loading class="pinner-grow text-dark "></div>
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    @endguest
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              @endif
                    
@empty
<span>No popular courses</span>
@endforelse

                
              </div>
            </div>
                           
            <div class="tab-pane fade" id="trending" role="tabpanel" aria-labelledby="trending-tab">
              <!-- Tab pane -->
              <div class="row">

{{-- 
                <div class="col-lg-3 col-md-6 col-12">
                  <!-- Card -->
                  <div class="card  mb-4 card-hover">
                    <a href="#" class="card-img-top"><img src="../assets/images/course/course-react.jpg" alt=""
                        class="card-img-top rounded-top-md"></a>
                    <!-- Card body -->
                    <div class="card-body">
                      <h3 class="h4 mb-2 text-truncate-line-2 "><a href="#" class="text-inherit">How to easily create a
                          website with React</a>
                      </h3>
                      <ul class="mb-3  list-inline">
                        <li class="list-inline-item"><i class="far fa-clock me-1"></i>3h 56m
                        </li>
                        <li class="list-inline-item"><svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE">
                            </rect>
                            <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9">
                            </rect>
                            <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9">
                            </rect>
                          </svg>Beginner </li>
                      </ul>
                      <div class="lh-1">
                        <span>
                          <i class="mdi mdi-star text-warning me-n1"></i>
                          <i class="mdi mdi-star text-warning me-n1"></i>
                          <i class="mdi mdi-star text-warning me-n1"></i>
                          <i class="mdi mdi-star text-warning me-n1"></i>
                          <i class="mdi mdi-star text-warning"></i>
                        </span>
                        <span class="text-warning">4.5</span>
                        <span class="fs-6 text-muted">(6,300)</span>
                      </div>
                    </div>
                    <!-- Card Footer -->
                    <div class="card-footer">
                      <div class="row align-items-center g-0">
                        <div class="col-auto">
                          <img src="../assets/images/avatar/avatar-6.jpg" class="rounded-circle avatar-xs" alt="">
                        </div>
                        <div class="col ms-2">
                          <span>Morris Mccoy</span>
                        </div>
                        <div class="col-auto">
                        <a href="#" class="text-muted bookmark">
                    <i class="fe fe-bookmark  "></i>
                  </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> --}}
 
                                @forelse($coursesTren as $course)

                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="{{route('courses.show',$course)}}" class="card-img-top"><img src="{{asset('storage/'.$course->photo)}}" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                        <h4 class="mb-1 text-truncate-line-1 "><a href="{{route('courses.show',$course)}}" class="text-inherit">
                        {{$course->title}}</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>{{\App\Models\Course::hourCourse($course->title)}}</li>
                                     <li class="list-inline-item">
                                            @if($course->level == 'Beginners')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;">
                  {{$course->level}}
                </span>
                            </span>
                            
                    @elseif($course->level == 'Intermediate')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;">
                  {{$course->level}}
                </span>
                            </span>
                    @elseif($course->level == 'Advance')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;">
                  {{$course->level}}
                </span>
                            </span>
                            
                        @elseif($course->level == 'Master')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;">
                  {{$course->level}}
                </span>
                            </span>

                @endif
                         <i style="margin-top:-3px;">{{$course->level}}</i>  
                                    </li>
                                </ul>
                                                                <div class="lh-1">
                  
<span>
                @for ($k = 1 ; $k <= round(\App\Models\Course::rating($course->id)[0],0) ; $k++)
                <i class="mdi mdi-star me-n1 text-warning"></i>
                @endfor
                @for ($k = 1 ; $k <= 5 - round(\App\Models\Course::rating($course->id)[0],0) ; $k++)
                <i class="mdi mdi-star me-n1 text-light"></i>
                @endfor
                  </span>
            <span class="text-warning">{{\App\Models\Course::rating($course->id)[0]}}</span>
                                    <span class="fs-6 text-muted">({{\App\Models\Course::rating($course->id)[1]}})</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="{{$course->user->profile_photo_url}}" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>{{$course->user->first_name}} {{$course->user->last_name}}</span>
                                    </div>
                                    
                                    <div class="col-auto">
                                    @auth
                                @if(App\Models\Enroll::where('course_id',$course->id)->where('user_id',auth()->user()->id)->get()->count() > 0 )                                
                                        <a href="{{route('courses.enroll',$course)}}"  class="removeBookmark"><div wire:loading class="spinner-border"></div>
                                            <i class="fas fa-bookmark "></i>
                                        </a>
                                @endif     
                                       @if(App\Models\Enroll::where('course_id',$course->id)->where('user_id',auth()->user()->id)->get()->count() == 0)
                                       <a href="{{route('courses.enroll',$course)}}"  class="text-dark bookmark"><div wire:loading class="spinner-border"></div>
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    @endif
                                    @endauth
                                 @guest
                                    <a  href="{{route('login')}}" class="text-muted bookmark"><div wire:loading class="spinner-border"></div>
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    @endguest
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    @empty
                    <span>No trending Course!!</span>
                    @endforelse


              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Content -->
      <div class="row ">
        <div class="col-lg-12 col-md-12 col-12">
          <div class="mb-5">
            <h2 class="mb-1">Popular Instructors</h2>
            <p class="mb-0">Popular instructor in {{$category->name}} Courses.</p>
          </div>
        </div>
      </div>
      <div class="row mb-6">


    @foreach ($popularInstructors as $popularInstructor)
        
    
        <div class="col-lg-3 col-md-6 col-12">
          <!-- Card -->
          <div class="card mb-4 ">
            <!-- Card body -->
            <div class="card-body">
              <div class="text-center">
                <img src="{{\App\Models\User::find($popularInstructor->id)->profile_photo_url}}" class="rounded-circle avatar-xl mb-3" alt="">
                <h4 class="mb-0">{{$popularInstructor->first_name.' '.$popularInstructor->last_name}}</h4>
                {{-- <p class="mb-0 fs-6 text-muted">Web Developer, Designer</p> --}}
              </div>
              <div class="d-flex justify-content-between border-bottom py-2 mt-4">
                <span>Students</span>
                <span class="text-dark">{{\App\Models\Instructor::students($popularInstructor->id)}}</span>
              </div>
              <div class="d-flex justify-content-between border-bottom py-2">
                <span>Instructor Rating</span>
                <span class="text-warning">
                  {{\App\Models\Instructor::rating($popularInstructor->id)}} <i class="mdi mdi-star"></i>
                </span>
              </div>
              <div class="d-flex justify-content-between pt-2">
                <span>Courses</span>
                <span class="text-dark"> {{\App\Models\User::find($popularInstructor->id)->courses->count()}} </span>
              </div>
            </div>
          </div>
        </div>

@endforeach
      </div>
      <!-- Content -->
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
          <div class="mb-5">
            <h2 class="mb-1">Free {{$category->name}} lessons</h2>
            <p class="mb-0">Bite-sized learning in minutes</p>
          </div>
        </div>
      </div>
      <div class="row mb-6">


    @forelse ($freeCourses as $freeCourse)
        
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="{{route('courses.show',$freeCourse)}}" class="card-img-top"><img src="{{asset('storage/'.$freeCourse->photo)}}" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                        <h4 class="mb-1 text-truncate-line-1 "><a href="{{route('courses.show',$freeCourse)}}" class="text-inherit">
                        {{$freeCourse->title}}</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>{{\App\Models\Course::hourCourse($freeCourse->title)}}</li>
                                     <li class="list-inline-item">
                                            @if($freeCourse->level == 'Beginners')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;">
                  {{$freeCourse->level}}
                </span>
                            </span>
                            
                    @elseif($freeCourse->level == 'Intermediate')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;">
                  {{$freeCourse->level}}
                </span>
                            </span>
                    @elseif($freeCourse->level == 'Advance')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;">
                  {{$freeCourse->level}}
                </span>
                            </span>
                            
                        @elseif($freeCourse->level == 'Master')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;">
                  {{$freeCourse->level}}
                </span>
                            </span>

                @endif
                         <i style="margin-top:-3px;">{{$freeCourse->level}}</i>  
                                    </li>
                                </ul>
                                                                <div class="lh-1">
                  
<span>
                @for ($k = 1 ; $k <= round(\App\Models\Course::rating($freeCourse->id)[0],0) ; $k++)
                <i class="mdi mdi-star me-n1 text-warning"></i>
                @endfor
                @for ($k = 1 ; $k <= 5 - round(\App\Models\Course::rating($freeCourse->id)[0],0) ; $k++)
                <i class="mdi mdi-star me-n1 text-light"></i>
                @endfor
                  </span>
            <span class="text-warning">{{\App\Models\Course::rating($freeCourse->id)[0]}}</span>
                                    <span class="fs-6 text-muted">({{\App\Models\Course::rating($freeCourse->id)[1]}})</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="{{$freeCourse->user->profile_photo_url}}" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>{{$freeCourse->user->first_name}} {{$freeCourse->user->last_name}}</span>
                                    </div>
                                    
                                    <div class="col-auto">
                                    @auth
                                @if(App\Models\Enroll::where('course_id',$freeCourse->id)->where('user_id',auth()->user()->id)->get()->count() > 0 )                                
                                        <a href="{{route('courses.enroll',$freeCourse)}}"  class="removeBookmark"><div wire:loading class="spinner-border"></div>
                                            <i class="fas fa-bookmark "></i>
                                        </a>
                                @endif     
                                       @if(App\Models\Enroll::where('course_id',$freeCourse->id)->where('user_id',auth()->user()->id)->get()->count() == 0)
                                       <a href="{{route('courses.enroll',$freeCourse)}}"  class="text-dark bookmark"><div wire:loading class="spinner-border"></div>
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    @endif
                                    @endauth
                                 @guest
                                    <a  href="{{route('login')}}" class="text-muted bookmark"><div wire:loading class="spinner-border"></div>
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    @endguest
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    @empty
                    <span>No free Course!!</span>
                    @endforelse



      </div>
      <!-- Content -->
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
          <div class="mb-5">
            <h2 class="mb-1">All {{$category->name}} courses</h2>
            <p class="mb-0">{{$category->description}}.</p>
          </div>
        </div>
      </div>
      <div class="row">




@forelse($courses as $course)
                <div class="col-lg-3 col-md-6 col-12">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="{{route('courses.show',App\Models\Course::find($course->id))}}" class="card-img-top"><img src="{{asset('storage/'.$course->photo)}}" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="{{route('courses.show',App\Models\Course::find($course->id))}}" class="text-inherit">{{$course->title}}</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>{{\App\Models\Course::hourCourse($course->title)}}</li>
                                    <li class="list-inline-item">
                          @if($course->level == 'Beginners')                            
                        <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;">
                  {{$course->level}}
                </span>
                            </span>
                            
                    @elseif($course->level == 'Intermediate')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;">
                  {{$course->level}}
                </span>
                            </span>
                    @elseif($course->level == 'Advance')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;">
                  {{$course->level}}
                </span>
                            </span>
                            
                        @elseif($course->level == 'Master')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;">
                  {{$course->level}}
                </span>
                            </span>

                @endif
                         <i style="margin-top:-3px;">{{$course->level}}</i>  
                                    </li>
                                </ul>
                                <div class="lh-1">
                  
<span>
                @for ($k = 1 ; $k <= round(\App\Models\Course::rating($course->id)[0],0) ; $k++)
                <i class="mdi mdi-star me-n1 text-warning"></i>
                @endfor
                @for ($k = 1 ; $k <= 5 - round(\App\Models\Course::rating($course->id)[0],0) ; $k++)
                <i class="mdi mdi-star me-n1 text-light"></i>
                @endfor
                  </span>
            <span class="text-warning">{{\App\Models\Course::rating($course->id)[0]}}</span>
                                    <span class="fs-6 text-muted">({{\App\Models\Course::rating($course->id)[1]}})</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="{{App\Models\Course::find($course->id)->user->profile_photo_url}}" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                    
                                        <span>{{App\Models\Course::find($course->id)->user->name}}</span>
                                    </div>
                                    <div class="col-auto">
                                @auth
                                @if(App\Models\Enroll::where('course_id',$course->id)->where('user_id',auth()->user()->id)->get()->count() > 0 )                                
                                        <a href="{{route('courses.enroll',App\Models\Course::find($course->id))}}" class="removeBookmark"><div wire:loading class="spinner-border"></div>
                                            <i class="fas fa-bookmark "></i>
                                        </a>
                                @endif     
                                       @if(App\Models\Enroll::where('course_id',$course->id)->where('user_id',auth()->user()->id)->get()->count() == 0)
                                       <a href="{{route('courses.enroll',App\Models\Course::find($course->id))}}"  class="text-dark bookmark"><div wire:loading class="spinner-border"></div>
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    @endif
                                    @endauth
                                    @guest
                                    <a href="{{route('login')}}" class="text-muted bookmark"><div wire:loading class="pinner-grow text-dark "></div>
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    @endguest
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
@empty
<span>No {{$category->name}} courses</span>
@endforelse



      </div>
    </div>
  </div>



@endsection