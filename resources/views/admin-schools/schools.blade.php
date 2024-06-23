@extends('layouts.layouts.layouts.app')
<base href="/public">
@section('content')



     		<div class="col-lg-9 col-md-8 col-12">
    <!-- container -->

    <div class="container">
      <!-- row -->

      <div class="row">
        <div class="offset-xl-2 col-xl-8 col-md-12 col-12">
          <div class=" text-center mb-8">
            <!-- col -->


            <!-- text -->

            <span class="text-uppercase text-primary fw-semi-bold ls-md">MY SCHOOLS</span>
            <!-- heading -->

            {{-- <h2 class="h1 fw-bold mt-3">Explore remote friendly, flexible
              Schools opportunities.
            </h2> --}}


          </div>
          <!-- row -->
@forelse($schools as $school)
          <div class="card card-bordered mb-4 card-hover cursor-pointer">

            <!-- card body -->
            <div class="card-body">
              <div>
                <div class="d-md-flex">
                  <div class="mb-3 mb-md-0">
                    <!-- Img -->
                    <img src="{{$school->logo}}"
                      alt="PAul" class="icon-shape border rounded-circle">
                  </div>
                  <!-- text -->
                  <div class="ms-md-3 w-100 mt-3 mt-xl-1">
                    <div class="d-flex justify-content-between mb-5">
                      <div>
                        <!-- heading -->
                        <h3 class="mb-1 fs-4"><a href="{{route('schools.show',$school)}}" class="text-inherit">{{$school->title}}</a>
                          
                        </h3>

                        <div>
                          
                          <!-- star -->
                          <span class="text-dark ms-2 fw-medium">{{\App\Models\School::reviews($school->id)[7]}} <svg xmlns="http://www.w3.org/2000/svg" width="10"
                              height="10" fill="currentColor" class="bi bi-star-fill text-warning align-baseline"
                              viewBox="0 0 16 16">
                              <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>

                          </span><span class="ms-0">({{\App\Models\School::reviews($school->id)[6]}} Reviews)</span>
                        </div>

<span>{{\Str::limit($school->description,40)}}</span>
                      </div>
                      <div>

                      </div>

                    </div>

                    <div class="d-md-flex justify-content-between ">
                      <div class="mb-2 mb-md-0">
                        <!-- year -->
                        <span class="me-2"> <i class="fe fe-briefcase text-muted"></i><span class="ms-1 ">({{$school->classes->count()}}) classes</span></span>
                        <!-- salary -->

                        <span class="me-2">
                          <i class="fe fe-users text-muted"></i><span class="ms-1 ">{{\App\Models\School::students($school->id)}} Students</span></span>
                        <!-- location -->
                        <span class="me-2">
                          <i class="fe fe-map-pin text-muted"></i><span class="ms-1 ">{{$school->location}}</span></span>
                      </div>
                      <!-- time -->
                      <div>
                        <i class="fe fe-clock text-muted"></i> <span>{{$school->created_at->diffForHumans()}}</span>
                      </div>
                    </div>

                  </div>
                </div>

              </div>
            </div>
          </div>
@empty
<span>Empty</span>
@endforelse


        </div>
      </div>

    </div>
  </div>





@endsection