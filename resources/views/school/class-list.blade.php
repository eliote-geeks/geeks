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
                <a href="{{route('schools.show',$school->id)}}" class="nav-link">About Us</a>
              </li>
              <li class="nav-item">
              
                <a href="{{route('schools.reviews',$school->id)}}" class="nav-link ">Review <span class="text-inherit">({{\App\Models\SchoolReview::where('school_id',$school->id)->count()}})</span></a>
              </li>
              <li class="nav-item">
<a href="{{route('class.list',$school->id)}}" class="nav-link active">Classes <span class="text-inherit ">({{\App\Models\ClassSchool::where('school_id',$school->id)->count()}})</span></a>
              </li>
              <li class="nav-item">
                <a href="{{route('schools.photo',$school->id)}}" class="nav-link ">Photos</a>
              </li>
                           <li class="nav-item">
                <a href="{{route('schools.instructors',$school->id)}}" class="nav-link">Instructors</a>
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
        <div class="col-md-12 ">
          <!-- title -->
          <h2 class="mb-4">{{$classes->count()}} classes
          </h2>

@forelse($classes as $class)
          <!-- card -->
          <div class="card card-bordered  mb-4 card-hover cursor-pointer">
            <!-- card body -->
            <div class="card-body">
              <div>
                <div class="d-xl-flex">
                  <div class="mb-3 mb-md-0">
                    <!-- Img -->

                    <img src="{{$class->logo}}" alt=""
                      class="icon-shape border rounded-circle">
                  </div>
                  <!-- text -->
                  <div class="ms-xl-3  w-100 mt-3 mt-xl-1">
                    <div class="d-flex justify-content-between mb-4">
                      <div>
                        <h3 class="mb-1 fs-4"><a href="{{route('class.show',$class->id)}}" class="text-inherit">{{$class->name}}</a> </h3>
                        <div>
                          <span>at {{$class->school->title}} </span>
                          <span class="text-dark ms-2 fw-medium">({{\App\Models\SchoolReview::rating($class->school->id)[0]}}) <svg xmlns="http://www.w3.org/2000/svg" width="10"
                              height="10" fill="currentColor" class="bi bi-star-fill text-warning align-baseline"
                              viewBox="0 0 16 16">
                              <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>

                          </span><span class="ms-0">({{\App\Models\UserSchoolClass::where('entity_id',$class->id)->where('entity_type','\App\Models\ClassCourse')->count()}} Students)</span>
                        </div>
                      </div>
                      <div>
                      @if(auth()->user()->id == $class->user_id)
            <i class="text-danger fe fe-trash" title="delete {{$class->name}}" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{$class->id}}"></i>


<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter{{$class->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Confirmation delete class</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you  want to delete this class. All courses has been deleted..
        This action is irreversible
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="{{route('class.destroyClass',$class->id)}}" class="btn btn-danger">Confirm, I want to delete this class</a>
      </div>
    </div>
  </div>
</div>




            @endif
                      </div>

                    </div>
                    <div>
                      <div class="d-md-flex justify-content-between ">
                        <div class="mb-2 mb-md-0">
                          <span class="me-2"> <i class="fe fe-briefcase text-muted"></i><span class="ms-1 "> {{\App\Models\ClassInstructor::where('class_id',$class->id)->where('status',1)->count()}}
                              Instructors</span></span>
                          <span class="me-2">
                            <i class="fe fe-dollar-sign text-muted"></i><span class="ms-1 ">{{$class->type}}</span></span>
                          <span class="me-2">
                            <i class="fe fe-map-pin text-muted"></i><span class="ms-1 ">{{$class->user->name}}</span></span>
                        </div>
                        <div>
                          <i class="fe fe-clock text-muted"></i> <span>{{$class->created_at->diffForHumans()}}</span>
                        </div>
                      </div>
                    </div>
                  </div>


                </div>

              </div>
            </div>
          </div>
@empty
@endforelse
          <!-- pagination -->
         
            {{$classes->links()}}


        </div>
      </div>
    </div>
  </div>


@endsection