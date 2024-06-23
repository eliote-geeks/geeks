@extends('layouts.app')
@section('content')



  <div class="bg-primary">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
          <div class="py-4 py-lg-6">
            <h1 class="mb-0 text-white display-4">Browse College</h1>
            <p class="text-white mb-0 lead">
              Get started by learning from a College below
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Content -->
  <div class="py-6">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="row justify-content-between align-items-center">
            <div class="col-xl-8 col-md-6 col-12">
              <h4 class="mb-3 mb-md-0">Total {{$schools->count()}} College</h4>
            </div>
            <div class="col-xl-2 col-md-3 col-6 pe-0">
              <!-- Custom select -->
              <select class="selectpicker" data-width="100%" >
                <option value="">Category</option>
                <option value="2">Design</option>
                <option value="3">Development</option>
                <option value="3">Program</option>
              </select>
            </div>
             <!-- Custom select -->
            <div class="col-xl-2 col-md-3 col-6">
              <select class="selectpicker" data-width="100%">
                <option value="">Sort by</option>
                <option value="1">Newest</option>
                <option value="2">Popularity</option>
                <option value="3">Rated</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="py-8 py-lg-18 bg-light">
     <div class="container">
       <div class="row mb-8 justify-content-center">
         <div class="col-lg-6 col-md-12 col-12 text-center">
           <!-- caption -->
           <span class="text-primary mb-3 d-block text-uppercase fw-semi-bold ls-xl">College</span>
           <h2 class="mb-2 display-4 fw-bold ">Perceived end knowledge certainly day sweetness why cordially. </h2>
           <p class="lead">Top listed college</p>
         </div>
       </div>
       <div class="row">

@forelse($schools as $school)       
         <div class="col-md-6 col-12 mb-4 mb-lg-0">
             <!-- Card -->
           <div class="card shadow-lg">
               <!-- Card body -->
             <div class="card-body p-8 text-center">
               <i class="mdi mdi-48px mdi-format-quote-open text-light-primary lh-1"></i>
               <p class="lead text-dark mt-3">{{\Str::limit($school->description,200)}}</p>
             </div>
               <!-- Card Footer -->
             <div class="card-footer bg-primary text-center border-top-0">
               <div class="mt-n8"><img src="{{$school->logo}}" alt="" class="rounded-circle border-primary avatar-xl border border-4"></div>
               <div class="mt-2 text-white">
                                         <span class="text-dark ms-2 fw-medium">{{\App\Models\School::reviews($school->id)[7]}}
                           <svg xmlns="http://www.w3.org/2000/svg" width="10"
                              height="10" fill="currentColor" class="bi bi-star-fill text-warning align-baseline"
                              viewBox="0 0 16 16">
                              <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>

                          </span><span class="ms-0">({{\App\Models\School::reviews($school->id)[6]}} Reviews)</span>
                 <h3 ><a class="text-white mb-0" href="{{route('schools.show',$school->id)}}"> {{$school->title}} </a></h3>
                 <p class="text-white-50 mb-1">{{$school->departement}} at {{$school->location}}</p>
                 <a href="{{$school->website}}" class="text-success">Website: {{$school->title}}</a>
               </div>
             </div>
           </div>
         </div>
         @empty
<span>Empty</span>
         @endforelse

       </div>
{{$schools->links()}}
     </div>
   </div>
  <!-- Content -->
  




@endsection