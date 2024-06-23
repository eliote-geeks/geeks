@extends('layouts.app')
<base href="/public">
@section('content')

<div class="p-lg-5 py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12 mb-5">
          <div class="rounded-3 position-relative w-100 d-block overflow-hidden p-0" style="height: 600px;">
            {{-- <iframe class="position-absolute top-0 end-0 start-0 end-0 bottom-0 h-100 w-100" src="https://www.youtube.com/watch?v=GoSFD--I_hM"></iframe> --}}
                  <x-embed url="{{$videoActu}}"/>
          </div>
        </div>
      </div>
      <!-- Content -->
      <div class="row">
        <div class="col-xl-8 col-lg-12 col-md-12 col-12 mb-4 mb-xl-0">
          <!-- Card -->
          <div class="card mb-5">
            <!-- Card body -->
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <p class="fw-semi-bold mb-2">
                  {{$course->title}}
                </p>
                @auth
                                @if(App\Models\Enroll::where('course_id',$course->id)->where('user_id',auth()->user()->id)->get()->count() > 0 )                                
                                        <a href="{{route('courses.enroll',$course->id)}}" id="reset"  class="removeBookmark">
                                            <i class="fas fa-bookmark "></i>
                                        </a>
                            

                                @endif     
                                       @if(App\Models\Enroll::where('course_id',$course->id)->where('user_id',auth()->user()->id)->get()->count() == 0)
                                       <a href="{{route('courses.enroll',$course->id)}}" id="reset" wire:click.defer='enrolled({{$course->id}})' class="text-dark bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    @endif
                                    @endauth
                                 @guest
                                    <a href="{{route('login')}}" class="text-muted bookmark">
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    @endguest
                                    {{-- <a href="" class="btn-sm btn-dark">Terminate</a> --}}
              </div>
              <div class="d-flex align-items-center">
                            

                            <span class="text-black ms-3"><i class="fe fe-user text-black-50"></i> {{$buys->count()}} Enrolled </span><br><br>
                            <span class="ms-4">
                                                @for ($k = 1 ; $k <= round($student_review,0) ; $k++)
                                                <i class="mdi mdi-star me-n1 text-warning"></i>
                                                @endfor
                                             @for ($k = 1 ; $k <= 5 - round($student_review,0) ; $k++)
                                                <i class="mdi mdi-star me-n1 text-light"></i>
                                                @endfor
                <span class="text-black">({{number_format($s)}})</span>
                            </span>

                @if($course->level == 'Beginners')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px; color:black;">
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
                <span class="align-top" style="margin-top:-3px; color:black;">
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
                <span class="align-top" style="margin-top:-3px; color:black;">
                  {{$course->level}}
                </span>
                            </span>
                            
                        @elseif($course->level == 'Master')                            
                            <span class="text-black ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px; color:black;">
                  {{$course->level}}
                </span>
                            </span>

                @endif
                        </div>
              <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                  <img src="{{$course->user->profile_photo_url}}" class="rounded-circle avatar-md" alt="" />
                  <div class="ms-2 lh-1">
                    <h4 class="mb-1">{{$course->user->first_name.' '.$course->user->last_name}}</h4>
                    <p class="fs-6 mb-0">{{'@'.$course->user->name}}</p>
                  </div>
                </div>
                <div>
                  <a href="{{route('courses.resume',$course->id)}}" class="btn btn-outline-white btn-sm">Start Course</a>
                </div>
              </div>
            </div>
            <!-- Nav tabs -->
            <ul class="nav nav-lt-tab" id="tab" role="tablist">
               <!-- Nav item -->
              <li class="nav-item">
                <a class="nav-link active" id="description-tab" data-bs-toggle="pill" href="#description" role="tab"
                  aria-controls="description" aria-selected="false">Description</a>
              </li>
              <!-- Nav item -->

            </ul>
          </div>
          <!-- Card -->
          <div class="card rounded-3">
            <!-- Card body -->
            <div class="card-body">
              <div class="tab-content" id="tabContent">
                <!-- Tab pane -->
                <div class="tab-pane fade show active" id="description" role="tabpanel"
                  aria-labelledby="description-tab">
                      <div class="mb-4">
                    <h3 class="mb-2">Course Descriptions</h3>
                        {!! $course->description !!}                
                  </div>

                </div>
                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                  <div class="mb-3">
                    <!-- Content -->
                    <h3 class="mb-4">How students rated this courses</h3>
                                                            <div class="row align-items-center">
                                            <div class="col-auto text-center">
                                                <h3 class="display-2 fw-bold">{{$student_review}}</h3>
                                                @for ($k = 1 ; $k <= round($student_review,0) ; $k++)
                                                <i class="mdi mdi-star me-n1 text-warning"></i>
                                                @endfor
                                             @for ($k = 1 ; $k <= 5 - round($student_review,0) ; $k++)
                                                <i class="mdi mdi-star me-n1 text-light"></i>
                                                @endfor
                                                {{-- <i class="mdi mdi-star me-n1 text-warning"></i>
                                                <i class="mdi mdi-star me-n1 text-warning"></i>
                                                <i class="mdi mdi-star me-n1 text-warning"></i> --}}
                                                <p class="mb-0 fs-6">(Based on {{$s}} reviews)</p>
                                            </div>
                                            <!-- Progress bar -->
                                            <div class="col pt-3 order-3 order-md-2">
                                                <div class="progress mb-3" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{$star5}}%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-3" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{$star4}}%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-3" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{$star3}}%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-3" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{$star2}}%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-0" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{$star1}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-auto col-6 order-2 order-md-3">
                                                <!-- Rating -->
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <span class="ms-1">{{$star5}}%</span>
                                                </div>
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <span class="ms-1">{{$star4}}%</span>
                                                </div>
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <span class="ms-1">{{$star3}}%</span>
                                                </div>
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <span class="ms-1">{{$star2}}%</span>
                                                </div>
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <span class="ms-1">{{$star1}}%</span>
                                                </div>
                                            </div>
                                        </div>
                  </div>
                  <hr class="my-5" />
                  <div class="mb-3">
                                        <div class="d-lg-flex align-items-center justify-content-between mb-5">
                                            <!-- Reviews -->
                                            <div class="mb-3 mb-lg-0">
                                                <h3 class="mb-0">Reviews</h3>
                                            </div>
                                            <div>
                                                <!-- Form -->
                @livewire('best-review',['course' => $course], key($course->id))

                                    </div>

















                                </div>
                <div class="tab-pane fade" id="transcript" role="tabpanel" aria-labelledby="transcript-tab">
                  <!-- Description -->
                  <div>
                    <h3 class="mb-3">Transcript from the "Introduction" Lesson</h3>
                    <div class="mb-4">
                      <h4>
                        Course Overview
                        <a href="#" class="ms-2 h4 text-dark">[00:00:00]</a>
                      </h4>
                      <p class="mb-0">
                        My name is John Deo and I work as human duct tape at Gatsby, that means that I do a lot of
                        different things. Everything from dev roll to writing content to writing code. And I used to
                        work
                        as an architect at IBM. I live in Portland, Oregon.
                      </p>
                    </div>
                    <div class="mb-4">
                      <h4>
                        Introduction
                        <a href="#" class="ms-2 h4 text-dark">[00:00:16]</a>
                      </h4>
                      <p>
                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that
                        we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or
                        the language specifics. We're also gonna get into MDX. MDX is a way to write React components in
                        your markdown.
                      </p>
                    </div>
                    <div class="mb-4">
                      <h4>
                        Why Take This Course?
                        <a href="#" class="ms-2 h4 text-dark">[00:00:37]</a>
                      </h4>
                      <p>
                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that
                        we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or
                        the language specifics. We're also gonna get into MDX. MDX is a way to write React components in
                        your markdown.
                      </p>
                    </div>
                    <div class="mb-4">
                      <h4>
                        A Look at the Demo Application
                        <a href="#" class="ms-2 h4 text-dark">[00:00:54]</a>
                      </h4>
                      <p>
                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that
                        we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or
                        the language specifics. We're also gonna get into MDX. MDX is a way to write React components in
                        your markdown.
                      </p>
                      <p>
                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that
                        we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or
                        the language specifics. We're also gonna get into MDX. MDX is a way to write React components in
                        your markdown.
                      </p>
                    </div>
                    <div class="mb-4">
                      <h4>
                        Summary
                        <a href="#" class="ms-2 h4 text-dark">[00:01:31]</a>
                      </h4>
                      <p>
                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that
                        we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or
                        the language specifics. We're also gonna get into MDX. MDX is a way to write React components in
                        your markdown.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                  <!-- FAQ -->
                  <div>
                    <h3 class="mb-3">Course - Frequently Asked Questions</h3>
                    <div class="mb-4">
                      <h4>How this course help me to design layout?</h4>
                      <p>
                        My name is Jason Woo and I work as human duct tape at Gatsby, that means that I do a lot of
                        different things. Everything from dev roll to writing content to writing code. And I used to
                        work as an architect at IBM. I live in Portland, Oregon.
                      </p>
                    </div>
                    <div class="mb-4">
                      <h4>
                        What is important of this course?
                      </h4>
                      <p>
                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that
                        we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or
                        the language specifics. We're also gonna get into MDX. MDX is a way to write React components in
                        your markdown.
                      </p>
                    </div>
                    <div class="mb-4">
                      <h4>Why Take This Course?</h4>
                      <p>
                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that
                        we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or
                        the language specifics. We're also gonna get into MDX. MDX is a way to write React components in
                        your markdown.
                      </p>
                    </div>
                    <div class="mb-4">
                      <h4>
                        Is able to create application after this course?
                      </h4>
                      <p>
                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that
                        we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or
                        the language specifics. We're also gonna get into MDX. MDX is a way to write React components in
                        your markdown.
                      </p>
                      <p>
                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that
                        we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or
                        the language specifics. We're also gonna get into MDX. MDX is a way to write React components in
                        your markdown.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-12 col-md-12 col-12">
          <div class="card" id="courseAccordion">
            <div>
              <!-- List group -->
              <ul class="list-group list-group-flush">
                
                {{-- <li class="list-group-item p-0 bg-transparent">
                  <!-- Toggle -->
                  <a class="h4 mb-0 d-flex align-items-center text-inherit text-decoration-none py-3 px-4"
                    data-bs-toggle="collapse" href="#courseTwo" role="button" aria-expanded="false"
                    aria-controls="courseTwo">
                    <div class="me-auto">
                      Course Overview
                      <p class="mb-0 text-muted fs-6 mt-1 fw-normal">14 videos (1 hour and 17 minutes)
                      </p>
                    </div>
                    <!-- Chevron -->
                    <span class="chevron-arrow ms-4">
                      <i class="fe fe-chevron-down fs-4"></i>
                    </span>
                  </a>
                  <!-- Row -->
                  <!-- Collapse -->
                  <div class="collapse show" id="courseTwo" data-bs-parent="#courseAccordion">
                    <!-- List group item -->
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        <div>
                          <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 10%;"
                              aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small>5% Completed</small>
                        </div>
                      </li>

                      <!-- List group item -->
                      <li class="list-group-item">
                        <a href="#"
                          class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                          <div class="text-truncate">
                            <span class="icon-shape bg-success text-white icon-sm rounded-circle me-2"><i
                                class="mdi mdi-play fs-4"></i></span>
                            <span>Introduction</span>
                          </div>
                          <div class="text-truncate">
                            <span>1m 7s</span>
                          </div>
                        </a>
                      </li>
                      <!-- List group item -->
                      <li class="list-group-item list-group-item-action active">
                        <a href="#"
                          class="d-flex justify-content-between align-items-center text-white text-decoration-none">
                          <div class="text-truncate">
                            <span class="icon-shape bg-light text-dark icon-sm rounded-circle me-2"><i
                                class="mdi mdi-play fs-4"></i></span>
                            <span>Installing Development Software</span>
                          </div>
                          <div class="text-truncate">
                            <span>3m 11s</span>
                          </div>
                        </a>
                      </li>
                      <!-- List group item -->
                      <li class="list-group-item">
                        <a href="#"
                          class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                          <div class="text-truncate">
                            <span class="icon-shape bg-light text-dark icon-sm rounded-circle me-2"><i
                                class="mdi mdi-play fs-4"></i></span>
                            <span>Hello World Project from GitHub</span>
                          </div>
                          <div class="text-truncate">
                            <span>2m 33s</span>
                          </div>
                        </a>
                      </li>
                      <!-- List group item -->
                      <li class="list-group-item disabled" aria-disabled="true">
                        <a href="#"
                          class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                          <div class="text-truncate">
                            <span class="icon-shape bg-light text-muted icon-sm rounded-circle me-2"><i
                                class="fe fe-lock fs-4"></i></span>
                            <span>Our Sample Website</span>
                          </div>
                          <div class="text-truncate">
                            <span>2m 15s</span>
                          </div>
                        </a>
                      </li>

                    </ul>
                  </div>
                </li> --}}
              @forelse ($lectures as $lecture)          

                  <div hidden>                                
                     @if($lecture->id<$pp)
                        {{$pp=$lecture->id}}                                                    
                     @endif
                   </div>                 


                <li class="list-group-item p-0 @if($lecture->id == $pp) bg-transparent @else  @endif">
                  <!-- Toggle -->
                  <a class="h4 mb-0 d-flex align-items-center text-inherit text-decoration-none py-3 px-4 @if($lecture->id == $pp) collapsed @else '' @endif"
                    data-bs-toggle="collapse" href="#course{{$lecture->id}}" role="button" aria-expanded="@if($lecture->id == $pp) true @else false @endif"
                    aria-controls="course{{$lecture->id}}">
                    <div class="me-auto">
                      <!-- Title -->
                      {{$lecture->nameField}}
                      
                <p class="mb-0 text-dark fs-6 mt-1 fw-normal">{{App\Models\Lesson::where('lecture_id',$lecture->id)->where('user_id',$course->user->id)->where('course_title',$course->title)->get()->count()}}  @if(App\Models\Lesson::where('lecture_id',$lecture->id)->where('user_id',$course->user->id)->where('course_title',$course->title)->get()->count()>1) videos @else video @endif {{\App\Models\Course::minField($lecture->id)}} minutes</p>
                    </div>
                    <!-- Chevron -->
                    <span class="chevron-arrow ms-4">
                      <i class="fe fe-chevron-down fs-4"></i>
                    </span>
                  </a>
                  <!-- Row -->
                  <!-- Collapse -->
                  <div class="collapse @if($lecture->id == $pp) show @else '' @endif" id="course{{$lecture->id}}" data-bs-parent="#courseAccordion">
                    <!-- List group item -->
                    <ul class="list-group list-group-flush">
                                          <li class="list-group-item">
                        {{-- <div>
                          <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 10%;"
                              aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small>5% Completed</small>
                        </div> --}}
                      </li>
@foreach (App\Models\Lesson::where('lecture_id',$lecture->id)->where('user_id',$course->user->id)->where('course_title',$course->title)->get() as $lesson)
                      <!-- List group item -->
                      {{-- <li class="list-group-item disabled" aria-disabled="true"> --}}
                      <li class="list-group-item " >
                        <a href="@if($lecture->id == $pp) 
                        {{route('lessons.lecture',\Illuminate\Support\Facades\Crypt::encryptString($lesson->id))}}
                                @else
                            javascript:;
                                @endif   
                                "
                          class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                          <div class="text-truncate">
                          {{-- success <span class="icon-shape bg-success text-white icon-sm rounded-circle me-2"> --}}
                            <span class="icon-shape bg-light text-dark icon-sm rounded-circle me-2">
                                         @if($lecture->id != $pp) <i
                                      class="fe fe-lock fs-4"></i>@else
                                                                    <i
                                      class="mdi mdi-play fs-4"></i>
                                      @endif 
                              </span> {{\Str::title(\Str::limit($lesson->title,30))}}
                          </div>
                          <div class="text-truncate">
                            <span>{{\App\Models\Course::lessonMin($lesson->id)}}</span>
                          </div>
                        </a>
                      </li>
@endforeach

                    </ul>
                  </div>
                </li>
                @empty
                <i>Sorry no course on this section!!</i>
@endforelse

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection