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
                <a href="{{route('schools.show',$school->id)}}" class="nav-link active">About Us</a>
              </li>
              <li class="nav-item">
              
                <a href="{{route('schools.reviews',$school->id)}}" class="nav-link ">Review <span class="text-inherit">({{\App\Models\SchoolReview::where('school_id',$school->id)->count()}})</span></a>
              </li>
              <li class="nav-item">
                <a href="{{route('class.list',$school->id)}}" class="nav-link">Classes <span class="text-inherit">({{\App\Models\ClassSchool::where('school_id',$school->id)->count()}})</span></a>
              </li>
              <li class="nav-item">
                <a href="{{route('schools.photo',$school->id)}}" class="nav-link">Photos</a>
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
        <div class="col-12">
          <div class="mb-6">
            <!-- text -->
            <h2 class="mb-3">About the School</h2>
                        {{$school->description}}
          </div>
          <!-- text -->
          {{-- <div class="mb-6">
            <h2 class="mb-3">Mission</h2>
            <p>Aliquam pellentesque mollis interdum. Proin ligula lacus, maximus quis ante a, luctus sodales
              sapien. Donec ut tristique nisi. Nulla a quam sit amet
              turpis convallis porttitor vel sed quam. Ut in odio enim. Maecenas eu tellus erat. Maecenas
              nec maximus elit, ac suscipit justo. Maecenas nisl
              tellus, sodales non gravida eget, placerat sit amet erat. </p>
          </div> --}}
          <!-- text -->
          {{-- <div class="mb-6">
            <h2 class="mb-3">Vision</h2>
            <p>Proin ligula lacus, maximus quis ante a, luctus sodales sapien. Aliquam pellentesque mollis
              interdum. Nulla a quam sit amet turpis convallis port
              titor vel sed quam. Donec ut tristique nisi. </p>
          </div> --}}
          <div>
            <!-- table -->

            <table class="table table-borderless w-lg-40 w-md-50">

              <tr>
                <td class="ps-0 pb-0"><span class="text-dark fw-semi-bold">Founded:</span></td>
                <td class="ps-0 pb-0"><span>{{\Carbon\Carbon::parse($school->created_at )->format('Y')}}</span></td>
              </tr>
              <tr>
                <td class="ps-0 pb-0"><span class="text-dark fw-semi-bold">School Fondator:</span></td>
                <td class="ps-0 pb-0"><span>{{$school->first_name.' '.$school->last_name}}</span></td>
              </tr>
              <tr>
                <td class="ps-0 pb-0"><span class="text-dark fw-semi-bold">Website:</span></td>
                <td class="ps-0 pb-0"><a href="{{$school->website}}">{{$school->title}}</a></td>
              </tr>
              <tr>
                <td class="ps-0 pb-0"><span class="text-dark fw-semi-bold">Industry:</span></td>
                <td class="ps-0 pb-0">{{$school->departement}}</td>
              </tr>
              <tr>
                <td class="ps-0 pb-0"><span class="text-dark fw-semi-bold">Social Presence:</span></td>
                <td class="ps-0 pb-0"> <a href="#" class="mdi mdi-facebook fs-4 text-muted me-2"></a>
                  <a href="#" class="mdi mdi-twitter text-muted me-2"></a>
                  <a href="#" class="mdi mdi-linkedin text-muted "></a>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection     