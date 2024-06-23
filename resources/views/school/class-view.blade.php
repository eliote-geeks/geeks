@extends('layouts.app')
@section('content')

  <!-- Bg cover -->
  {{-- <div class="py-6" style="background: linear-gradient(270deg, #9D4EFF 0%, #782AF4 100%);"> --}}
  <a href="{{route('schools.show',\App\Models\School::findOrFail($class->school_id)->id)}}">
  <div class="py-12" style="background: url({{\App\Models\School::findOrFail($class->school_id)->logo}});">
  </div>
  </a>
  <!-- Page header -->
  <div class="bg-white shadow-sm">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
          <div class="d-md-flex align-items-center justify-content-between bg-white  pt-3 pb-3 pb-lg-5">
            <div class="d-md-flex align-items-center text-lg-start text-center ">
              <div class="me-3  mt-n8">
                <img src="{{$class->logo}}" class="avatar-xxl rounded border p-4 bg-white " alt="">
              </div>
              <div class="mt-3 mt-md-0">
                <h1 class="mb-0 fw-bold me-3  ">{{$class->name}}</h1>
              </div>
              <div>
            </div>
            
            @livewire('follow-classe',['class' => $class], key($class->id))
            
            </div>
            <!-- Dropdown -->
          </div>
          <!-- Nav tab -->
          <ul class="nav nav-lt-tab" id="pills-tab" role="tablist">
            <li class="nav-item ms-0" role="presentation">
              <a class="nav-link active" id="pills-course-tab" data-bs-toggle="pill" href="#pills-course" role="tab"
                aria-controls="pills-course" aria-selected="true">Courses </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-about-tab" data-bs-toggle="pill" href="#pills-about" role="tab"
                aria-controls="pills-about" aria-selected="false">About</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-author-tab" data-bs-toggle="pill" href="#pills-author" role="tab"
                aria-controls="pills-author" aria-selected="false">Author</a>
            </li>
            @if($class->user_id == auth()->user()->id)
              <li class="nav-item" role="presentation">
              <a class="nav-link"   href="{{route('inviteToClass',$class->id)}}" 
                >Invite Instructor</a>
            </li>
            @endif
            <li class="nav-item" role="presentation">
                       {{-- @livewire('follow',['school' => $school], key($school->id)) --}}
                    <a class="nav-link" href="javascript:;" 
                >Statut: <b>{{$class->type}}</b></a>

            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  
  	<!-- Content  -->
  <div class="py-6">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- Tab content -->
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-course" role="tabpanel" aria-labelledby="pills-course-tab">
              <!-- Tab pane -->
              <div class="row">
                <div class="col-lg-12">
                  <div class="mb-5">
                    <h2 class="mb-1">All Level</h2>
                    <p>Learn {{$class->name}} for with there easy components and
                      utility.</p>
                  </div>
                </div>
              </div>
              <div class="row">
            @forelse ($courses as $course)
                <div class="col-lg-3 col-md-6 col-12">
                  <!-- Card -->
                  <div class="card  mb-4 card-hover">
                    <a href="{{route('courses.show',\App\Models\Course::findOrFail($course->course_id)->id)}}" class="card-img-top"><img src="{{asset('storage/'.\App\Models\Course::findOrFail($course->course_id)->photo)}}" alt=""
                        class="card-img-top rounded-top-md"></a>
                    <!-- Card body -->
                    <div class="card-body">
                      <h3 class="h4 mb-2 text-truncate-line-2 "><a href="{{route('courses.show',\App\Models\Course::findOrFail($course->course_id)->id)}}" class="text-inherit">{{\Str::title(\App\Models\Course::findOrFail($course->course_id)->title)}}</a>
                      </h3>
                       <!-- List inline -->
                      <ul class="mb-3 list-inline">
                        <li class="list-inline-item"><i class="mdi mdi-clock-time-four-outline text-muted me-1"></i>{{\App\Models\Course::hourCourse(\App\Models\Course::findOrFail($course->course_id)->title)}}
                        </li>
                                                 <li class="list-inline-item">
                                            @if(\App\Models\Course::findOrFail($course->course_id)->level == 'Beginners')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px; color:#000;">
                  {{\App\Models\Course::findOrFail($course->course_id)->level}}
                </span>
                            </span>
                            
                    @elseif(\App\Models\Course::findOrFail($course->course_id)->level == 'Intermediate')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px; color:#000;">
                  {{\App\Models\Course::findOrFail($course->course_id)->level}}
                </span>
                            </span>
                    @elseif(\App\Models\Course::findOrFail($course->course_id)->level == 'Advance')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px; color:#000;">
                  {{\App\Models\Course::findOrFail($course->course_id)->level}}
                </span>
                            </span>
                            
                        @elseif(\App\Models\Course::findOrFail($course->course_id)->level == 'Master')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px; color:#000;">
                  {{\App\Models\Course::findOrFail($course->course_id)->level}}
                </span>
                            </span>

                @endif
                         
                                    </li>
                      </ul>
                                           <div class="lh-1">
                  
<span>
                @for ($k = 1 ; $k <= round(\App\Models\Course::rating(\App\Models\Course::findOrFail($course->course_id)->id)[0],0) ; $k++)
                <i class="mdi mdi-star me-n1 text-warning"></i>
                @endfor
                @for ($k = 1 ; $k <= 5 - round(\App\Models\Course::rating(\App\Models\Course::findOrFail($course->course_id)->id)[0],0) ; $k++)
                <i class="mdi mdi-star me-n1 text-light"></i>
                @endfor
                  </span>
            <span class="text-warning">{{\App\Models\Course::rating(\App\Models\Course::findOrFail($course->course_id)->id)[0]}}</span>
                                    <span class="fs-6 text-muted">({{\App\Models\Course::rating(\App\Models\Course::findOrFail($course->course_id)->id)[1]}})</span>
                                </div>
                            </div>
                    <!-- Card footer -->
                                                <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="{{\App\Models\Course::findOrFail($course->course_id)->user->profile_photo_url}}" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                    <span>{{\App\Models\Course::findOrFail($course->course_id)->user->first_name.' '.\App\Models\Course::findOrFail($course->course_id)->user->last_name}}</span>
                                    </div>
                                    <div class="col-auto">
            @auth
                                @if(App\Models\Enroll::where('course_id',\App\Models\Course::findOrFail($course->course_id)->id)->where('user_id',auth()->user()->id)->get()->count() > 0 )                                
                                        <a href="{{route('courses.enroll',\App\Models\Course::findOrFail($course->course_id))}}" id="reset"  class="removeBookmark"><div wire:loading class="spinner-border"></div>
                                            <i class="fas fa-bookmark "></i>
                                        </a>
                            

                                @endif     
                                       @if(App\Models\Enroll::where('course_id',\App\Models\Course::findOrFail($course->course_id)->id)->where('user_id',auth()->user()->id)->get()->count() == 0)
                                       <a id="reset"  href="{{route('courses.enroll',\App\Models\Course::findOrFail($course->course_id))}}" class="text-dark bookmark"><div wire:loading class="spinner-border"></div>
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                            

                                    @endif
                                    @endauth
                                 @guest
                                    <a href="{{route('login')}}" class="text-muted bookmark"><div wire:loading class="spinner-border"></div>
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    @endguest
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                empty!!
            @endforelse
              </div>
              <hr class="my-5">
              <!-- Content -->


              <!-- Content -->
            
            </div>
            <div class="tab-pane fade" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                  <!-- Card -->
                  <div class="card ">
                    <div class="card-header">
                      <h3 class="mb-0">About Class</h3>
                    </div>
                    <!-- Card body -->
                        <div class="card-body">
                    {{$class->description}}
                        </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Tab Pane -->
            <div class="tab-pane fade" id="pills-author" role="tabpanel" aria-labelledby="pills-author-tab">
              <div class="row">

            @foreach (\App\Models\ClassInstructor::where('class_id',$class->id)->where('status',1)->get() as $instructor)
                <div class="col-lg-6 col-md-6 col-12">
                  <!-- Card -->
                  <div class="card  mb-4 ">
                    <!-- Card body -->
                    <div class="card-body">
                      <div class="d-lg-flex">
                        <div class="position-absolute ">
                          <img src="{{\App\Models\User::findOrFail($instructor->user_id)->profile_photo_url}}" alt=""
                            class="rounded-circle avatar">

                        </div>
                        <div class="ms-lg-9">
                          <h4 class="mb-0">{{\App\Models\User::findOrFail($instructor->user_id)->first_name.' '.\App\Models\User::findOrFail($instructor->user_id)->last_name}}</h4>
                          <p class="fs-6 mb-1 text-warning"><span>{{\App\Models\Instructor::rating(\App\Models\User::findOrFail($instructor->user_id)->id)}}</span><span
                              class="mdi mdi-star text-warning me-2"></span>Instructor Rating</p>
                          <p class="fs-6 text-muted"><span class="me-2"><span
                                class="text-dark fw-medium">{{\App\Models\User::findOrFail($instructor->user_id)->courses->count()}}</span>
                              Courses</span><span class="ms-2"><span class="text-dark fw-medium">{{\App\Models\Instructor::students(\App\Models\User::findOrFail($instructor->user_id)->id)}}
                              </span>
                              Students</span>
                          </p>
                          <p>{{\App\Models\Instructor::where('instructor_id',$instructor->user_id)->first()->about_instructor}}. </p>
                          <a href="{{route('instructor.profile',\App\Models\User::findOrFail($instructor->user_id))}}" class="btn btn-outline-white btn-sm">
                            View Details
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach  
                
                

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection