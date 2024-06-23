@extends('layouts.app')
@section('content')


	<!-- Bg -->
	<div class="py-20" style="
				background: url(../assets/images/background/profile-bg.jpg) no-repeat;
				background-position: center;
			"></div>
	<!-- User info -->
	<div class="card p-lg-2 pt-2 pt-lg-0 rounded-0 border-0">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-8 col-md-8 col-12">
					<div class="d-flex align-items-center">
						<div class="position-relative mt-n9">
							<img src="{{$user->profile_photo_url}}" alt=""
								class="rounded-circle avatar-xxl border-white border border-4 position-relative" >
							<a href="#" class="position-absolute top-0 end-0 me-2" data-bs-toggle="tooltip" data-placement="top"
								title="Verified">
								{{-- <img src="../assets/images/svg/checked-mark.svg" alt="" height="30" width="30" /> --}}
							</a>
						</div>
						<div class="ms-3">
							<div class="d-flex align-items-center">
								<h3 class="mb-0 fw-bold me-2">{{$user->first_name.' '.$user->last_name}}</h3>
								<span class="badge bg-light-primary text-primary">Student</span>
							</div>
							<span class="fs-6">Hi {{$user->name}}!!</span>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-12">
					<div class="fs-4 mt-4 mt-lg-0 pb-2 pb-lg-0 d-lg-flex justify-content-end">
						<a href="#" class="mdi mdi-youtube text-muted me-2"></a>
						<a href="#" class="mdi mdi-link-variant text-muted me-2"></a>
						<a href="#" class="mdi mdi-instagram text-muted me-2"></a>
						<a href="#" class="mdi mdi-facebook text-muted me-2"></a>
						<a href="#" class="mdi mdi-twitter text-muted"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Content -->
	<div class="py-5 py-md-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-4 col-12">
				<div class="card border-0 mb-4">
						<!-- Card body -->
						<div class="card-body">
							<h4>About me</h4>
							<p>Name: <b>{{$user->name}}</b></p>
							<p>Email: <b>{{$user->email}}</b></p>
							<p>First Name: <b>{{$user->first_name }}</b></p>
							<p>Last Name: <b>{{$user->last_name}}</b></p>							
							<p>Status: <b>{{$user->type=='App\Models\Instructor' ? 'Instructor' : 'Student'}}</b></p>							
							{{-- <a href="#" class="btn-link"> Read more</a> --}}
							{{-- <img class="avatar avatar-sm" src="{{$user->profile_photo_url}}"> --}}
							<p>Join <b>{{$user->created_at->diffForHumans()}}</b></p><br>
							<small class="text-center"><a href="{{route('mail')}}">Send him a message here before copy address <i class="fe fe-mail"></i> {{auth()->user()->email}}</a></small>
						</div>
					</div>
					<!-- Card -->
					<div class="card border-0">
						<!-- Card header -->
						<div class="card-header">
							<h4 class="mb-0">
								My Courses <span class="text-muted fs-6">({{$courses->count()}})</span>
							</h4>
						</div>
						<!-- Card body -->
						<div class="card-body">
							<!-- List group -->
							<ul class="list-group list-group-flush">
								<!-- List group item -->
                                @forelse($courses as $course)
								<li class="list-group-item px-0 pb-3 pt-0">
									<div class="d-flex align-items-center justify-content-between">
										<a href="{{route('courses.show',\App\Models\Course::find($course->id))}}">
											<div class="d-lg-flex align-items-center">
												<div>
													<img src="{{asset('storage/'.$course->photo)}}" alt="{{$course->title}}" class="rounded img-4by3-lg" />
												</div>
												<div class="ms-lg-3 mt-2 mt-lg-0">
													<h4 class="text-primary-hover">
														{{\Str::title($course->title)}}												
													</h4>
													<ul class="list-inline fs-6 mb-0 text-inherit">
														<li class="list-inline-item">
															<i class="far fa-clock me-1">{{\App\Models\Course::hourCourse($course->title)}}</i>
														</li>
														<li class="list-inline-item">
                                                                                            @if($course->level == 'Beginners')                            
                            <span class="text-dark ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;">
                  {{$course->level}}
                </span>
                            </span>
                            
                    @elseif($course->level == 'Intermediate')                            
                            <span class="text-dark ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;">
                  {{$course->level}}
                </span>
                            </span>
                    @elseif($course->level == 'Advance')                            
                            <span class="text-dark ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;">
                  {{$course->level}}
                </span>
                            </span>
                            
                        @elseif($course->level == 'Master')                            
                            <span class="text-dark ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;">
                  {{$course->level}}
                </span>
                            </span>

                @endif
														</li>
														<li class="list-inline-item">
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
															
														</li>
													</ul>
												</div>
											</div>
										</a>
										<div>
											<!-- Dropdown -->
											<span class="dropdown dropstart">
												<a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown"
													data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="true">
													<i class="fe fe-more-vertical"></i>
												</a>
												<span class="dropdown-menu" aria-labelledby="courseDropdown">
													<span class="dropdown-header">Share</span>
													<a class="dropdown-item" href="#"><i
															class="fab fa-facebook dropdown-item-icon"></i>Facebook</a>
													<a class="dropdown-item" href="#"><i
															class="fab fa-twitter dropdown-item-icon"></i>Twitter</a>
													<a class="dropdown-item" href="#"><i class="fab fa-linkedin dropdown-item-icon"></i>Linked
														In</a>
													<a class="dropdown-item" href="#"><i class="fas fa-copy dropdown-item-icon"></i>Copy Link</a>
												</span>
											</span>
										</div>
									</div>
								</li>
                                @empty
                                <span>No course!!!</span>
                                @endforelse
                                @if ($user->is_subscribed ==1)
									<span><i class="far fa-star me-1"></i> Premium user!!</span>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection