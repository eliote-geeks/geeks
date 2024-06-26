@extends('layouts.app')
@section('content')
 <div>
 <div class="container d-flex flex-column">
     <div class="row">
         <div class="offset-xl-1 col-xl-2 col-lg-12 col-md-12 col-12">
             <div class="mt-4">
             <a href="{{url('/')}}"><img src="{{asset(\App\Models\Site::first()->logoPath)}}" alt=""></a>
            </div>
         </div>
     </div>
  <div class="row align-items-center justify-content-center g-0 py-lg-22 py-10">
   <!-- Docs -->
   <div class="offset-xl-1 col-xl-4 col-lg-6 col-md-12 col-12 text-center text-lg-start">
    <h1 class="display-1 mb-3">404</h1>

    <p class="mb-5 lead">Oops! Sorry, we couldn’t find the page you were looking for. If you think this is a problem with us, please <a href="#" class="btn-link">Contact us</a></p>
    <a href="{{url('/')}}" class="btn btn-primary me-2">Back to Safety</a>
   </div>
   <!-- img -->
   <div class="offset-xl-1 col-xl-6 col-lg-6 col-md-12 col-12 mt-8 mt-lg-0">
    <img src="{{asset(\App\Models\Site::first()->logoPath)}}" alt="" class="w-100" />
   </div>
  </div>
  <div class="row">
    <div class="offset-xl-1 col-xl-10 col-lg-12 col-md-12 col-12">
        <div class="row align-items-center mt-6">
            <div class="col-md-6 col-8">
        <p class="mb-0">© Geeks. {{date('d, M Y')}}.</p>
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