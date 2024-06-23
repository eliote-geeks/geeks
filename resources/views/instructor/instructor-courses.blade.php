@extends('layouts.layouts.layouts.app')
<base href="/public">
@section('content')

				<div class="col-lg-9 col-md-8 col-12">
					<!-- Card -->
					<div class="card mb-4">
						<!-- Card header -->
						<div class="card-header">
							<h3 class="mb-0">Courses</h3>
							<span>Manage your courses and its update like live, draft and
								insight.</span>
						</div>
						<!-- Card body -->
						<!-- Table -->
						<div class="table-responsive border-0 overflow-y-hidden">
							<table class="table mb-0 text-nowrap" id="dataTableBasic" style="with:100%;">
								<thead class="table-dark">
									<tr>
										<th scope="col" class="border-0">Courses</th>
										<th scope="col" class="border-0">Students</th>
										<th scope="col" class="border-0">Rating</th>
										<th scope="col" class="border-0">Status</th>
										<th scope="col" class="border-0">Students</th>										
										<th scope="col" class="border-0"></th>
									</tr>
								</thead>
								<tbody>
                                @foreach ($courses as $course)
									<tr>
										<td class="border-top-0">
											<div class="d-lg-flex">
												<div>
													<a href="{{route('courses.show',$course)}}">
														<img src="{{asset('storage/'.$course->photo)}}" alt="" class="rounded img-4by3-lg" /></a>
												</div>
												<div class="ms-lg-3 mt-2 mt-lg-0">
													<h4 class="mb-1 h5">
														<a href="{{route('courses.show',$course)}}" class="text-inherit">
														{!!\Str::limit($course->title,20)!!}
														</a>
													</h4>
													<ul class="list-inline fs-6 mb-0">
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
                <span class="align-top" style="margin-top:-3px;color:#000;">
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
                <span class="align-top" style="margin-top:-3px;color:#000;">
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
                <span class="align-top" style="margin-top:-3px;color:#000;">
                  {{$course->level}}
                </span>
                            </span>

                @endif
                         
                                    </li>
													</ul>
												</div>
											</div>
										</td>
										<td class="border-top-0">{{\App\Models\Instructor::courseByStudent($course->id)}}</td>
										<td class="border-top-0">
											<span class="text-warning">{{\App\Models\Course::rating($course->id)[0]}}<i class="mdi mdi-star"></i></span>({{\App\Models\Course::rating($course->id)[1]}})
										</td>
										<td class="border-top-0">
											<span class="badge bg-{{$course->status==1 ? 'success' : 'warning'}}">{{$course->status==1 ? 'live' : 'pending'}}</span>
										</td>
										<td class="border-top-0">
								
									<a href="{{route('studentsCourses',$course->id)}}" class="btn btn-outline-white btn-sm">View Students</a>
										
										</td>
										<td class="text-muted border-top-0">
											<span class="dropdown dropstart">
												<a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown"
													data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
													<i class="fe fe-more-vertical"></i>
												</a>
												<span class="dropdown-menu" aria-labelledby="courseDropdown">
													<span class="dropdown-header">Settings </span>
													{{-- <a class="dropdown-item" href="{{route('activeCourse',$course->id)}}"><i class="fe fe-edit dropdown-item-icon"></i>Change Status</a> --}}
													<a class="dropdown-item" href="{{route('courses.destroy',$course->id)}}" onclick="return(confirm('are you sure to do this this course will be defitly deleted to plateform ??!'))"><i class="fe fe-trash dropdown-item-icon"></i>Remove</a>
												</span>
											</span>
										</td>
									</tr>
                                @endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>

@endsection