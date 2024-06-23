@extends('layouts.app')
@section('content')


 <div>
 <div class="container d-flex flex-column">
     <div class="row">
         <div class="offset-xl-1 col-xl-2 col-lg-3 col-md-12 col-12">
             <div class="mt-4">
             <a href="{{url('/')}}"><img src="{{\App\Models\Site::first()->logoPath}}" alt=""></a>
            </div>
         </div>
     </div>
  <div class="row align-items-center justify-content-center g-0 py-lg-22 py-10">
   <!-- Docs -->
   <div class="offset-xl-1 col-xl-5 col-lg-6 col-md-12 col-12 text-center text-lg-start">
    <h1 class="display-3 mb-2 fw-bold">Download our ressource.</h1>

    <p class="mb-4 fs-4">If you dont have ressource for create course download our ressource.</p>
    <div class="countdown">
    <ul class="list-inline">
        <li class="list-inline-item me-md-5">
            <span class="days display-4 fw-bold  text-primary">OO</span>
            <p class="fs-4 mb-0">Days</p>
        </li>
        <li class="list-inline-item me-md-5">
            <span class="hours display-4 fw-bold text-primary">OO</span>
            <p class="fs-4 mb-0">Hours</p>

        </li>
        <li class="list-inline-item me-md-5">
             <span class="minutes display-4 fw-bold text-primary ">OO</span>
            <p class="fs-4 mb-0">Minutes</p>

        </li>
        <li class="list-inline-item me-md-5">
            <span class="seconds display-4 fw-bold text-primary ">OO</span>
            <p class="fs-4 mb-0">Seconds</p>

        </li>
    </ul>
    </div>
    <hr class="my-4">
    <div>
        <h3 class="mb-3">Download ressource.</h3>
        <form class="d-inline-flex justify-content-center justify-content-lg-start">
            {{-- <label class="sr-only" for="subscribeInput">Email</label>
            <input type="email" class="form-control mb-2 me-2" id="subscribeInput" placeholder="Your e-mail..."> --}}
            <a href="{{asset(\App\Models\Site::first()->ressource)}}" download="camtesia_{{\App\Models\Site::first()->name}}" class="btn btn-primary mb-2">Download Camtesia !</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>Or</span> &nbsp;&nbsp;&nbsp;&nbsp; 
            
            <a href="{{route('courses.create')}}" class="btn btn-primary mb-2">Use Yours ressources create course !</a>
    </div>
    <p>{{\App\Models\Site::first()->name}} accept videos on Youtube, Vimeo, slideshare, miro, fallback and dailymotion. Upload yours lessons here and share links.</p>
       </form>
   </div>
   <!-- img -->
   <div class="offset-xl-1 col-xl-5 col-lg-6 col-md-12 col-12 mt-8 mt-lg-0">
    <img src="../assets/images/background/comingsoon.svg" alt="" class="w-100" />
   </div>
  </div>
  <div class="row">
    <div class="offset-xl-1 col-xl-10 col-lg-12 col-md-12 col-12">
        <div class="row align-items-center mt-6">
            <div class="col-md-6 col-8">
        <p class="mb-0">© {{\App\Models\Site::first()->name}}. {{date('Y, m d')}}</p>
    </div>
    <div class="col-md-6 col-4 d-flex justify-content-end">
        <a href="#" class="text-muted text-primary-hover me-3  "><i class="mdi mdi-facebook mdi-24px"></i></a>
        <a href="#" class="text-muted text-primary-hover me-3  "><i class="mdi mdi-twitter mdi-24px"></i></a>
        <a href="#" class="text-muted text-primary-hover"><i class="mdi mdi-github mdi-24px"></i></a>
    </div>
       </div>
    </div>
</div>
 </div>
</div>


@endsection