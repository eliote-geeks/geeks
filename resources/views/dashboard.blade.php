@extends('layouts.app')
<base href="/public">
@section('content')
	<div class="pt-5 pb-5">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-12 col-lg-12 col-md-12 col-12">
					<!-- Bg -->
					<div class="pt-16 rounded-top-md" style="
								background: url(../assets/images/background/profile-bg.jpg) no-repeat;
								background-size: cover;
							"></div>
					<div
						class="d-flex align-items-end justify-content-between bg-white px-4 pt-2 pb-4 rounded-none rounded-bottom-md shadow-sm">
						<div class="d-flex align-items-center">
							<div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
								<img src="{{auth()->user()->profile_photo_url}}" class="avatar-xl rounded-circle border border-4 border-white"
									alt="" />
							</div>
							<div class="lh-1">
								<h5 class="mb-0">
									{{auth()->user()->first_name}} {{auth()->user()->last_name}}
									<a href="#" class="text-decoration-none" data-bs-toggle="tooltip" data-placement="top" title="Beginner">
										<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>
											<rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
											<rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
										</svg>
									</a>
								</h5>
								<p class="mb-0 d-block"><a href="javascript:void(0)">{{'@'.auth()->user()->name}}</a></p>
							</div>
						</div>
						<div>
							<a  wire:loading.attr='hidden' href="{{route('students.edit',auth()->user())}}" class="btn btn-outline-primary btn-sm d-none d-md-block">Account Setting</a>
              <button wire:loading class="btn btn-primary" type="button" disabled>
    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
    Loading...
  </button>
						</div>
					</div>
				</div>
			</div>
  <div class="pb-5 py-md-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- Side Navbar -->
          <ul class="nav nav-lb-tab mb-6" id="tab" role="tablist">
            <li class="nav-item ms-0" role="presentation">
              <a class="nav-link active " id="bookmarked-tab" data-bs-toggle="pill" href="#bookmarked" role="tab"
                aria-controls="bookmarked" aria-selected="true"> @if(auth()->user()->user_type == 'App\Models\Student')Bookmarked @elseif(auth()->user()->user_type == 'App\Models\Admin') Schools @else @endif</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="currentlyLearning-tab" data-bs-toggle="pill" href="#currentlyLearning" role="tab"
                aria-controls="currentlyLearning" aria-selected="false"> @if(auth()->user()->user_type == 'App\Models\Student') Learning @elseif(auth()->user()->user_type == 'App\Models\Admin') Students @else @endif</a>
            </li>
            @if(auth()->user()->user_type == 'App\Models\Student')
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="path-tab" data-bs-toggle="pill" href="#path" role="tab" aria-controls="path"
                aria-selected="false">
                Class</a>
            </li>
            @endif
          </ul>
          <!-- Tab content -->
          <div class="tab-content" id="tabContent">
            <div class="tab-pane fade show active" id="bookmarked" role="tabpanel" aria-labelledby="bookmarked-tab">
            @if(auth()->user()->user_type == 'App\Models\Student')
@livewire('enrolled-courses-user')
@elseif(auth()->user()->user_type == 'App\Models\Admin')

@forelse(\App\Models\School::where('user_id',auth()->user()->id)->get() as $school)
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



@endif
              <div class="row">
                <div class="offset-lg-3 col-lg-6 col-md-12 col-12 text-center mt-5">
                  <p>You’ve reached the end of the list</p>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="currentlyLearning" role="tabpanel" aria-labelledby="currentlyLearning-tab">
            @if(auth()->user()->user_type == 'App\Models\Student')
                <div class="row">
    @foreach(\App\Models\Subscription::where('user_id',auth()->user()->id)->distinct()->where('type','buy')->get() as $subscription)
        @if($subscription->course->status == 1)
                <div class="col-lg-3 col-md-6 col-12">
                  <!-- Card -->
                  <div class="card  mb-4 card-hover">
                    <a href="{{route('courses.show',$subscription->course)}}" class="card-img-top"><img src="{{asset('storage/'.$subscription->course->photo)}}" alt=""
                        class="card-img-top rounded-top-md"></a>
                    <!-- Card body -->
                    <div class="card-body">
                      <h3 class="h4 mb-2 text-truncate-line-2 "><a href="{{route('courses.show',$subscription->course)}}" class="text-inherit">{{$subscription->course->title}}</a>
                      </h3>
                      <!-- List inline -->
                      <ul class="mb-3  list-inline">
                        <li class="list-inline-item"><i class="far fa-clock me-1"></i>{{\App\Models\Course::hourCourse($subscription->course->title)}}
                        </li>
                            <li class="list-inline-item">
                                            @if($subscription->course->level == 'Beginners')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px; color:#000;">
                  {{$subscription->course->level}}
                </span>
                            </span>
                            
                    @elseif($subscription->course->level == 'Intermediate')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px; color:#000;">
                  {{$subscription->course->level}}
                </span>
                            </span>
                    @elseif($subscription->course->level == 'Advance')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px; color:#000;">
                  {{$subscription->course->level}}
                </span>
                            </span>
                            
                        @elseif($subscription->course->level == 'Master')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px; color:#000;">
                  {{$subscription->course->level}}
                </span>
                            </span>

                @endif
                         
                                    </li>
                      </ul>
                           <div class="lh-1">
                  
<span>
                @for ($k = 1 ; $k <= round(\App\Models\Course::rating($subscription->course->id)[0],0) ; $k++)
                <i class="mdi mdi-star me-n1 text-warning"></i>
                @endfor
                @for ($k = 1 ; $k <= 5 - round(\App\Models\Course::rating($subscription->course->id)[0],0) ; $k++)
                <i class="mdi mdi-star me-n1 text-light"></i>
                @endfor
                  </span>
            <span class="text-warning">{{\App\Models\Course::rating($subscription->course->id)[0]}}</span>
                                    <span class="fs-6 text-muted">({{\App\Models\Course::rating($subscription->course->id)[1]}})</span>
                                </div>
                            </div>
                        
                    <!-- Card footer -->
                    <div class="card-footer">
                      <div class="row align-items-center g-0">
                        <div class="col-auto">
                          <img src="{{$subscription->course->user->profile_photo_url}}" class="rounded-circle avatar-xs" alt="">
                        </div>
                        <div class="col ms-2">
                          <span>{{$subscription->course->user->first_name.' '.$subscription->course->user->last_name}}</span>
                        </div>
                        <div class="col-auto">
                           <a href="javascript:void(0)" class="removeBookmark">
                            <i class="fas fa-bookmark"></i>
                          </a>
                        </div>
                      </div>
                      <div class="progress mt-3" style="height: 5px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{(\App\Models\ProgressLesson::where('course_id',$subscription->course->id)->where('user_id',auth()->user()->id)->where('view',1)->count() / \App\Models\Lesson::where('course_title',$subscription->course->title)->where('user_id',$subscription->course->user->id)->count()) * 100}}% " aria-valuenow="{{(\App\Models\ProgressLesson::where('course_id',$subscription->course->id)->where('user_id',auth()->user()->id)->where('view',1)->count() / \App\Models\Lesson::where('course_title',$subscription->course->title)->where('user_id',$subscription->course->user->id)->count()) * 100}}"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                @endif
@endforeach
              </div>
@elseif(auth()->user()->user_type == 'App\Models\Admin')
@foreach (\Illuminate\Support\Facades\DB::table('user_school_classes')
        ->leftJoin('class_schools','class_schools.id','=','user_school_classes.entity_id')
        ->selectRaw('user_school_classes.user_id as student')
        ->where('user_school_classes.entity_type','=','\App\Models\ClassCourse')
        ->where('class_schools.user_id',auth()->user()->id)        
        ->paginate(10) as $school)

              <div class="card  border-top border-muted border-4  card-hover-with-icon">
                <!-- card body -->

                <div class="card-body">
                  <!-- icon  -->

                  <div class="icon-shape icon-lg rounded-circle bg-light text-muted mb-3  card-icon">
                  <img class="avatar avatar" src="{{\App\Models\User::find($school->student)->profile_photo_url}}"></div>
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <!-- heading -->

                      <h4 class="mb-0">{{\App\Models\User::find($school->student)->name}}</h4>
                      <!-- text -->

                      <p class="mb-0 text-muted">{{\App\Models\User::find($school->student)->email}}</p>
                    </div>
                    <!-- arrow -->

                    <a href="{{route('student.profile',$school->student)}}" class="text-inherit">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                          d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                      </svg>
                    </a>
                  </div>
                </div>

              </div>

@endforeach
{{\Illuminate\Support\Facades\DB::table('user_school_classes')
        ->leftJoin('class_schools','class_schools.id','=','user_school_classes.entity_id')
        ->selectRaw('user_school_classes.user_id as student')
        ->where('user_school_classes.entity_type','=','\App\Models\ClassCourse')
        ->where('class_schools.user_id',auth()->user()->id)
        ->paginate(10)->links()}}

@else
@endif
              <div class="row">
                <div class="offset-lg-3 col-lg-6 col-md-12 col-12 text-center mt-5">
                  <p>You’ve reached the end of the list</p>
                </div>
              </div>
            </div>
            <!-- Path -->
            <div class="tab-pane fade" id="path" role="tabpanel" aria-labelledby="path-tab">
              <div class="row  d-flex justify-content-left text-center">
                <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                  {{-- <div class="py-6">
                    <img src="../assets/images/svg/path-img.svg" alt="" class="img-fluid">
                    <div class="mt-4 ">
                      <h2 class="display-4 fw-bold">Coming Soon</h2>
                      <p class="mb-5">The designer working on our design so for now we schedule it
                        to come soon.
                        we release it soon for you. Thank you for watching.</p>
                      <a href="../index.html" class="btn btn-primary">
                        Back To Dashboard
                      </a>
                    </div>
                  </div> --}}
                  @forelse(\App\Models\UserSchoolClass::classes() as $class)
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
                          
                          
                        </div>
                      </div>
                      <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-bookmark text-muted bookmark" viewBox="0 0 16 16">
                          <path
                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                        </svg>
                      </div>

                    </div>
                    <div>
                      <div class="d-md-flex justify-content-between ">
                        <div class="mb-2 mb-md-0">
                          <span class="me-2"> <i class="fe fe-briefcase text-muted"></i><span class="ms-1 "> {{\App\Models\ClassInstructor::where('status',1)->where('class_id',$class->id)->count()}}
                              Instructors</span></span>
                          <span class="me-2">
                            <i class="fe fe-dollar-sign text-muted"></i><span class="ms-1 ">{{$class->type}}</span></span>
                          <span class="me-2">
                          <span> Students ({{\App\Models\UserSchoolClass::where('entity_type','\App\Models\ClassCourse')->where('entity_id',$class->id)->count()}})</span>
                          <span>Courses ({{\App\Models\ClassCourse::where('class_id',$class->id)->where('status',1)->count()}})</span>

                      </div>
                        <div>                          
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>



@endsection