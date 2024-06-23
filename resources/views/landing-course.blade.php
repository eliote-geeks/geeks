@extends('layouts.app')
@section('content')


  <div class="py-lg-18 py-10 bg-auto" style="background: url(../../assets/images/hero/hero-graphics.svg)no-repeat , linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, #FFFFFF 100%), rgba(221, 218, 255, 0.3) ; background-size: cover; background-position: top center">
    <div class="container">
      <!-- Hero Section -->
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-7 col-md-12">
          <div class="py-8 py-lg-0 text-center">
            <h1 class="display-2 fw-bold mb-3 text-primary"><span class="text-dark px-3 px-md-0">Build Better</span> <span class="headingTyped text-primary"></span>
            </h1>
            <p class="mb-6 h2 text-dark">
              Build skills with courses Join {{\App\Models\Site::first()->name }} to watch, play, learn, make, and discover, with programming languages.
            </p>
            <a href="{{route('courses.subscription')}}" class="btn btn-primary me-2">View Plans</a>
            <a href="{{route('login')}}" class="btn btn-outline-primary">Try for Free</a>
            <div class="mt-8 mb-0">
              <ul class="list-inline">
                <li class="list-inline-item text-dark fw-semi-bold lh-1 fs-4 me-3   mb-2 mb-md-0"><span class="icon-shape icon-xs rounded-circle bg-light-success text-center me-2"><i class="mdi mdi-check text-success "></i></span><span class="align-middle">{{\App\Models\Course::count()}} online courses</span></li>
                <li class="list-inline-item text-dark fw-semi-bold lh-1 fs-4  me-3    mb-2 mb-md-0"><span class="icon-shape icon-xs rounded-circle bg-light-success text-center me-2"><i class="mdi mdi-check text-success "></i></span><span class="align-middle">Expert instruction</span></li>
                <li class="list-inline-item text-dark fw-semi-bold lh-1 fs-4"><span class="icon-shape icon-xs rounded-circle bg-light-success text-center me-2"><i class="mdi mdi-check text-success "></i></span><span class="align-middle">Lifetime access</span></li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

    <!-- Features -->
    <div class="py-8 py-lg-18">
      <div class="container">
        <div class="row mb-10 justify-content-center">
          <div class="col-lg-8 col-md-12 col-12 text-center">
            <!-- caption -->
            <span class="text-primary mb-3 d-block text-uppercase fw-semi-bold ls-xl">Why Learn with {{\App\Models\Site::first()->name }}</span>
            <h2 class="mb-2 display-4 fw-bold ">The purpose of life is not the hope of becoming perfect, it is the will to be always better</h2>
            <p class="lead">Explore new skills, deepen existing passions, and get lost in creativity of news technologies. What you find just might surprise and inspire you.</p>
          </div>
        </div>
   <!-- row -->
        <div class="row">
          <div class="col-lg-3 col-md-6 col-12">
             <!-- features -->
            <div class="mb-4">
               <!-- icon -->
              <div class="display-4 text-primary">
                <i class="fe fe-settings"></i>
              </div>
               <!-- para -->
              <div class="mt-4">
                <h3>Learn the latest skills</h3>
                <p class="fs-4">You can't be that kid who stays at the top of the slide thinking. You have to slip.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
             <!-- features -->
            <div class="mb-4">
               <!-- icon -->
               <div class="display-4 text-primary">
                <i class="fe fe-user"></i>
              </div>
               <!-- para -->
              <div class="mt-4">
                <h3>Get ready for a career</h3>
                <p class="fs-4">One day you'll wake up and you won't have time to do what you wanted to do. So do it now.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
             <!-- features -->
            <div class="mb-4">
               <!-- icon -->
               <div class="display-4 text-primary">
                <i class="fe fe-award"></i>
              </div>
               <!-- para -->
              <div class="mt-4">
                <h3>Earn a Certificate</h3>
                <p class="fs-4">Believe in your dreams and maybe they will come true. Believe in yourself and they will surely come true.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
             <!-- features -->
            <div class="mb-4">
               <!-- icon -->
               <div class="display-4 text-primary">
                <i class="fe fe-users"></i>
              </div>
               <!-- para -->
              <div class="mt-4">
                <h3>Upskill your organization</h3>
                <p class="fs-4">There's only one way to fail is to give up before you succeed.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- Top courses-->
  <div class="py-8 py-lg-16 bg-light-gradient-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <span class="text-primary d-block text-uppercase fw-semi-bold ls-lg">Browse Categories</span>
          <h2 class=" display-4 fw-bold">The world's top courses</h2>
          <p class="lead">Choose from {{\App\Models\Course::count()}} online video courses with new additions published every month.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <!-- Nav tab -->
          <ul class="nav nav-lb-tab mb-6" id="pills-tab" role="tablist">
            <li class="nav-item ms-0" role="presentation">
              <a class="nav-link active" id="pills-allcategory-tab" data-bs-toggle="pill" href="#pills-allcategory"
                role="tab" aria-controls="pills-allcategory" aria-selected="true">Populars </a>
            </li>
            
          </ul>
          <!-- Tab content -->
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-allcategory" role="tabpanel"
              aria-labelledby="pills-allcategory-tab">
              <div class="position-relative">
                <ul class="controls " id="sliderFirstControls">
                    <li class="prev">
                        <i class="fe fe-chevron-left"></i>
                    </li>
                    <li class="next">
                        <i class="fe fe-chevron-right"></i>
                    </li>
                </ul>
                <div class="sliderFirst">


                    @forelse (\Illuminate\Support\Facades\DB::table('reviews')
            ->leftJoin('courses','courses.id','=','reviews.course_id')
            ->selectRaw('courses.*, sum(reviews.rating) total')       
            ->where('courses.status','=',1)     
            ->where('courses.deleted_at','=',null)     
            ->where('reviews.deleted_at','=',null)     
            ->groupBy('reviews.course_id')
            ->inRandomOrder()
            ->distinct()
            ->get() as $course)
                       
            
                    <div class="item">
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
                <span class="align-top" style="margin-top:-3px; color:#000;">
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
                <span class="align-top" style="margin-top:-3px; color:#000;">
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
                <span class="align-top" style="margin-top:-3px; color:#000;">
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
                <span class="align-top" style="margin-top:-3px; color:#000;">
                  {{$course->level}}
                </span>
                            </span>

                @endif
                         
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
<span>No popular courses</span>
@endforelse
                </div>
            </div>
            </div>

            </div>
           
            </div>
            <!-- Tab Pane -->
            
            </div>
            <div class="tab-pane fade" id="pills-development" role="tabpanel" aria-labelledby="pills-development-tab">
               
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




  <!-- Instructor -->
  <hr class="my-0">
  {{-- <div class="py-8 py-lg-16 bg-light-gradient-top "> --}}
    {{-- <div class="container"> --}}
      {{-- <div class="row mb-8 justify-content-center">
         <!-- caption -->
        <div class="col-lg-8 col-md-12 col-12 text-center">
          <span class="text-primary mb-3 d-block text-uppercase fw-semi-bold ls-xl">World-class Instructors</span>
          
          <p class="lead">Geeks teachers are icons, experts, and industry rock stars excited to share their
            experience, wisdom, and trusted tools with you.</p>
        </div>
      </div> --}}
 <!-- row -->
      {{-- <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
           <!-- card -->
          <div class="card mb-4 card-hover">
             <!-- img -->
            <div class="card-img-top">
              <img src="../../assets/images/instructor/instructor-img-1.jpg" alt="" class="rounded-top-md img-fluid">
            </div>
             <!-- card body -->
            <div class="card-body">
             <h3 class="mb-0 fw-semi-bold"> <a href="#" class="text-inherit">Mary Roberts</a></h3>
              <p class="mb-3">Professional Web Developer</p>
              <div class="lh-1  d-flex justify-content-between">
                <div>
                  <span class="fs-6">
                    <i class="mdi mdi-star text-warning"></i>
                    <span class="text-warning">4.5</span>
                  </span>
                </div>
                <div>
                  <span class="fs-6 text-muted"><span class="text-dark">9,692</span> Students</span></div>
                <div>
                  <span class="fs-6 text-muted"><span class="text-dark">3</span> Course</span></div>
              </div>
            </div>
          </div>
        </div>


      </div> --}}
    {{-- </div> --}}
  {{-- </div> --}}
  <!-- Instructor -->
  

  <div class="py-8 py-lg-16 ">
    <div class="container">

      <div class="row mb-4 justify-content-center">
        <div class="col-lg-11 col-md-12">
          <div class="row align-items-center">
            <div class="col-md-12 col-12 mb-4">
               <!-- avatar group -->
                      <h2 class="mb-2 display-4 fw-bold">Classes Taught by Industry Expert</h2>            
            </div>
              <!-- heading -->
            
          </div>
            <!-- row -->
          <div class="row">
            <div class="col-lg-4 col-md-4 col-12 mb-3">
                <!-- text -->
              <h3 class="fw-semi-bold mb-2">Earn money</h3>
              <p class="fs-4">Earn money every time a student purchases your course. Get paid monthly through <span
                  class="text-dark">Paypal .</p>
                  {{-- </span>or <span class="text-dark">Payoneer</span> --}}
            </div>
            <div class="col-lg-4 col-md-4 col-12 mb-3">
                <!-- text -->
              <h3 class="fw-semi-bold mb-2">Inspire students</h3>
              <p class="fs-4">Help people learn new skills, advance their careers, and explore their hobbies by sharing your
                knowledge.</p>
            </div>
            <div class="col-lg-4 col-md-4 col-12 mb-3">
                <!-- text -->
              <h3 class="fw-semi-bold mb-2">Join our community</h3>
              <p class="fs-4">Take advantage of our active community of instructors to help you through your course creation process.
              </p>
            </div>
              <!-- btn -->
            <div class="col-md-12 mt-3">
              <a href="{{route('register')}}" class="btn btn-primary"> Start Teaching Today</a><br>
              <p class="fs-4 text-dark">{{\App\Models\Site::first()->name}} is an online learning platform dedicated to programming languages.
 You have free will on how the platform can see you but once registered your fate is sealed. 
 As a Instructor you can create a course and earn money when a student subscribes to a course, offer questions to see the evolution of your learners. For the student, his role is simple: he can follow courses and respond to evaluations. all users can interact on the social network and many other modules. The administrator creates schools and classes, invites teachers to teach in their classes. The rest you will find out for yourself thank you :></p>
            </div>
          </div>
        </div>
      </div>

    </div>

      <!-- container -->

    <div class="container">
      <hr class="my-10 my-lg-16">
      {{-- <div class="row mb-8 justify-content-center">
        <div class="col-lg-8 col-md-12 col-12 text-center">
            <!-- caption -->
          <span class="text-primary mb-3 d-block text-uppercase fw-semi-bold ls-xl">Testimonials</span>
          <h2 class="mb-2 display-4 fw-bold">Don’t just take our word for it.</h2>
          <p class="lead">12+ million people are already learning on Geeks</p>

        </div>
      </div> --}}
        <!-- row -->
      
    </div>
  </div>
    <!-- call to action -->
<div class="py-lg-16 py-10 bg-dark" style="background: url(../../assets/images/background/course-graphics.svg)no-repeat; background-size: cover; background-position: top center">
  <div class="container">
      <!-- row -->
    <div class="row justify-content-center text-center">
      <div class="col-md-9 col-12">
          <!-- heading -->
        <h2 class="display-4 text-white">Join more than {{\App\Models\User::count()}}  learners worldwide</h2>
        <p class="lead text-white px-lg-12 mb-6">Effective learning starts with assessment. Learning a new skill is hard work—Signal makes it easier.</p>
          <!-- button -->
          <div class="d-grid d-md-block">
        <a href="{{route('login')}}" class="btn btn-primary mb-2 mb-md-0">Start Learning for Free</a>
        <a href="{{route('register')}}" class="btn btn-info">Geeks for Business</a><br><br><br>
        
      </div>
      </div>
    </div>
  </div>
</div>

@endsection