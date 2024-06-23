@extends('layouts.app')
<base href="/public">
@section('content')


    <!-- Page Content -->




  <section class="py-lg-16 py-8">
     <!-- container -->
    <div class="container">
       <!-- row -->
      <div class="row align-items-center">
         <!-- col -->
        <div class="col-lg-6 mb-6 mb-lg-0">
          <div class="">
             <!-- heading -->
            <h5 class="text-dark mb-4"><i
                class="fe fe-check icon-xxs icon-shape bg-light-success text-success rounded-circle me-2"></i>Most
              trusted education platform</h5>
               <!-- heading -->
            <h1 class="display-3 fw-bold mb-3">Grow your skills and advance career</h1>
             <!-- para -->
            <p class="pe-lg-10 mb-5">Parfois on touche la vie des gens rien qu'en existant.</p>
               <!-- btn -->
            <a href="{{route('courses.filter')}}" class="btn btn-primary">Browse Courses</a>  
            <a href="https://www.youtube.com/watch?v=JRzWRZahOVU" class="popup-youtube fs-4 text-inherit ms-3"><img
                src="https://codescandy.com/geeks-bootstrap-5/assets/images/svg/play-btn.svg" alt="" class="me-2">Watch Demo</a>


          </div>
        </div>
         <!-- col -->
        <div class="col-lg-6 d-flex justify-content-center">
           <!-- images -->
         <div class="position-relative">
          <img src="https://codescandy.com/geeks-bootstrap-5/assets/images/background/acedamy-img/bg-thumb.svg" alt="" class=" ">
          <img src="../../assets/images/background/girl-image.png" alt="" class=" position-absolute end-0 bottom-0">
          <img src="https://codescandy.com/geeks-bootstrap-5/assets/images/background/acedamy-img/frame-1.svg" alt="" class=" position-absolute top-0 ms-lg-n10 ms-n19">
          <img src="https://codescandy.com/geeks-bootstrap-5/assets/images/background/acedamy-img/frame-2.svg" alt="" class=" position-absolute bottom-0 start-0 ms-lg-n14 ms-n6 mb-n7">
          <img src="https://codescandy.com/geeks-bootstrap-5/assets/images/background/acedamy-img/target.svg" alt="" class=" position-absolute bottom-0 mb-10 ms-n10 ms-lg-n1 ">
          <img src="https://codescandy.com/geeks-bootstrap-5/assets/images/background/acedamy-img/sound.svg" alt="" class=" position-absolute top-0  start-0 mt-18 ms-lg-n19 ms-n8" >
          <img src="https://codescandy.com/geeks-bootstrap-5/assets/images/background/acedamy-img/trophy.svg" alt="" class=" position-absolute top-0  start-0 ms-lg-n14 ms-n5" >
         
         </div>
        </div>
      </div>
    </div>
  </section>

    {{-- <div class="bg-dark">
        <div class="container">
        <!-- Hero Section -->
            <div class="row align-items-center g-0">
                <div class="col-xl-5 col-lg-6 col-md-12">
                    <div class="py-5 py-lg-0">
                        <h1 class="text-white display-4 fw-bold">Welcome to Geeks UI Learning Application
                        </h1>
       
                        <p class="text-white-50 mb-4 lead">
                            It's never too late to be what you might have been.
                        </p>
                        <a href="{{route('courses.filter')}}" class="btn btn-success">Browse Courses</a>
                        <a href="{{route('dashboard')}}" class="btn btn-white">Are You Instructor?</a>
                    </div>
                </div>
                <div class=" col-xl-7 col-lg-6 col-md-12 text-lg-end text-center">
                    <img src="assets/images/hero/hero-img.png" alt="" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>  --}}
{{-- 
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="assets/images/hero/hero-img.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/images/hero/hero-img.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/images/hero/hero-img.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> --}}
    {{-- <div class="bg-white py-4 shadow-sm">
        <div class="container">
            <div class="row align-items-center g-0">
                <!-- Features -->
                <div class="col-xl-4 col-lg-4 col-md-6 mb-lg-0 mb-4">
                    <div class="d-flex align-items-center">
                        <span class="icon-sahpe icon-lg bg-light-warning rounded-circle text-center text-dark-warning fs-4 "> <i
                class="fe fe-video"> </i></span>
                        <div class="ms-3">
                            <h4 class="mb-0 fw-semi-bold">30,000 online courses</h4>
                            <p class="mb-0">Enjoy a variety of fresh topics</p>
                        </div>
                    </div>
                </div>
                <!-- Features -->
                <div class="col-xl-4 col-lg-4 col-md-6 mb-lg-0 mb-4">
                    <div class="d-flex align-items-center">
                        <span class="icon-sahpe icon-lg bg-light-warning rounded-circle text-center text-dark-warning fs-4 "> <i
                class="fe fe-users"> </i></span>
                        <div class="ms-3">
                            <h4 class="mb-0 fw-semi-bold">Expert instruction</h4>
                            <p class="mb-0">Find the right instructor for you</p>
                        </div>
                    </div>
                </div>
                <!-- Features -->
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="d-flex align-items-center">
                        <span class="icon-sahpe icon-lg bg-light-warning rounded-circle text-center text-dark-warning fs-4 "> <i
                class="fe fe-clock"> </i></span>
                        <div class="ms-3">
                            <h4 class="mb-0 fw-semi-bold">Lifetime access</h4>
                            <p class="mb-0">Learn on your schedule</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <section class="pb-14">
    <div class="container">
       <!-- row -->
      <div class="row">
        <div class="col-md-6 col-lg-3 border-top-md border-bottom border-end-md ">
           <!-- text -->
          <div class="py-7 text-center">
            <div class="mb-3">
              <i class="fe fe-award fs-2 text-info"> </i>
            </div>
            <div class="lh-1">
              <h2 class="mb-1">316,000+</h2>
              <span>Qualified Instructor</span>
            </div>
          </div>

        </div>
        <div class="col-md-6 col-lg-3 border-top-md border-bottom border-end-lg ">
           <!-- icon -->
          <div class="py-7 text-center">
            <div class="mb-3">
              <i class="fe fe-users fs-2 text-warning"> </i>
            </div>
             <!-- text -->
            <div class="lh-1">
              <h2 class="mb-1">1.8 Billion+</h2>
              <span>Course enrolments</span>
            </div>
          </div>

        </div>
        <div class="col-md-6 col-lg-3 border-top-lg border-bottom border-end-md ">
           <!-- icon -->
          <div class="py-7 text-center">
            <div class="mb-3">
              <i class="fe fe-tv fs-2 text-primary"> </i>
            </div>
             <!-- text -->
            <div class="lh-1">
              <h2 class="mb-1">41,000+</h2>
              <span>Courses in 42 languages</span>
            </div>
          </div>

        </div>
        <div class="col-md-6 col-lg-3 border-top-lg border-bottom ">
           <!-- icon -->
          <div class="py-7 text-center">
            <div class="mb-3">
              <i class="fe fe-film fs-2 text-success"> </i>
            </div>
             <!-- text -->
            <div class="lh-1">
              <h2 class="mb-1">179,000+</h2>
              <span>Online Videos</span>
            </div>
          </div>

        </div>

      </div>
    </div>
    </div>
  </section>


    
 @livewire('recommended')
@livewire('most-popular')
@livewire('trending-posts')
@if(\App\Models\School::count() > 0) 
  @livewire('schoolview')    
@endif

 {{-- <div wire:loading class="spinner-border"></div>
 <div class="spinner-grow text-dark "></div>

 --}}
{{-- https://merehead.com/blog/create-e-learning-platform-like-udemy/ --}}

 {{-- @livewire('real-times', ['undefined' => '']) --}}


@endsection