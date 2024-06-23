@extends('layouts.layouts.layouts.app')
<base href="/public">
@section('content')




    		<div class="col-lg-9 col-md-8 col-12">
    <div class="row g-4">
      <!-- Main content START -->
      <div class="col-lg-8 mx-auto">
        <!-- Card START -->
        <div class="card">
          <div class="card-header py-3 border-0 d-flex align-items-center justify-content-between">
            <h1 class="h5 mb-0">Notifications</h1>
            <!-- Notification action START -->
            <div class="dropdown">  
              <a href="javascript:;" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardNotiAction" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-three-dots"></i>
              </a>
              <!-- Card share action dropdown menu -->
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardNotiAction">
                <li><a class="dropdown-item" href="javascript:;"> <i class="bi bi-check-lg fa-fw pe-2"></i>Mark all read</a></li>
                <li><a class="dropdown-item" href="javascript:;"> <i class="bi bi-bell-slash fa-fw pe-2"></i>Push notifications </a></li>
                <li><a class="dropdown-item" href="javascript:;"> <i class="bi bi-bell fa-fw pe-2"></i>Email notifications </a></li>
              </ul>
            </div>
            <!-- Notification action END -->
          </div>
          <div class="card-body p-2">
            <ul class="list-unstyled">
            @foreach ($notifications as $notification)
                
		
				
						<li class="list-group-item bg-light">
								<div class="row">
								
				@if($notification->type == 'App\Notifications\CourseNotification' && \App\Models\Course::where('title',$notification->data['title'])->count() > 0)
				<div class="col">
										<a href="{{route('courses.show',\App\Models\Course::where('title',$notification->data['title'])->first()->id)}}" class="text-body">
										<div class="d-flex">
											<img
												src="{{\App\Models\Course::where('title',$notification->data['title'])->first()->user->profile_photo_url}}"
												alt=""
												class="avatar-md rounded-circle"
											/>
											<div class="ms-3">
												<h5 class="fw-bold mb-1">{{\App\Models\Course::where('title',$notification->data['title'])->first()->user->first_name.' '.\App\Models\Course::where('title',$notification->data['title'])->first()->user->last_name}}:</h5>
												<p class="mb-3">
													Just launched a new course <b>{{$notification->data['title']}}</b>
												</p>
												<span class="fs-6 text-muted">
													<span
														><span
															class="fa fa-user-graduate text-success me-1"
														></span
														>{{$notification->created_at->diffForHumans()}},</span
													>
													<span class="ms-1"> {{\Carbon\Carbon::parse($notification->created_at)->format('h:i A P')}}</span>
												</span>
											</div>
										</div>
										</a>
									</div>

				@elseif($notification->type == 'App\Notifications\ReportNotification')										
<div class="col">
										<a href="{{route('courses.show',$notification->data['course'])}}" class="text-body">
										<div class="d-flex">
											<img
												src="{{auth()->user()->profile_photo_url}}"
												alt=""
												class="avatar-md rounded-circle"
											/>
											<div class="ms-3">
												<h5 class="fw-bold mb-1">{{auth()->user()->first_name.' '.auth()->user()->last_name}}:</h5>
												<p class="mb-3">
													Your comment <b>{{\Str::limit($notification->data['review'],17)}}</b> has been report in course <b>{{\Str::limit(\App\Models\Course::findOrFail($notification->data['course'])->title,20)}}</b>
												</p>
												<span class="fs-6 text-muted">
													<span
														><span
															class="fa fa-flag text-danger me-1"
														></span
														>{{$notification->created_at->diffForHumans()}},</span
													>
													<span class="ms-1"> {{\Carbon\Carbon::parse($notification->created_at)->format('h:i A P')}}</span>
												</span>
											</div>
										</div>
										</a>
									</div>
			@elseif($notification->type == 'App\Notifications\LikeNotification')
									<div class="col">
										<a href="{{route('courses.show',$notification->data['course'])}}" class="text-body">
										<div class="d-flex">
											<img
												src="{{\App\Models\User::findOrFail($notification->data['author'])->profile_photo_url}}"
												alt=""
												class="avatar-md rounded-circle"
											/>
											<div class="ms-3">
												<h5 class="fw-bold mb-1">{{\App\Models\User::findOrFail($notification->data['author'])->first_name.' '.\App\Models\User::findOrFail($notification->data['author'])->last_name}}:</h5>
												<p class="mb-3">
													Like Your comment <b>{{$notification->data['review']}}</b> in course <b>{{\App\Models\Course::findOrFail($notification->data['course'])->title}}</b>
												</p>
												<span class="fs-6 text-muted">
													<span
														><span
															class="fa fa-thumbs-up text-success me-1"
														></span
														>{{$notification->created_at->diffForHumans()}},</span
													>
													<span class="ms-1"> {{\Carbon\Carbon::parse($notification->created_at)->format('h:i A P')}}</span> 
												</span>
											</div>
										</div>
										</a>
									</div>
									@elseif($notification->type == 'App\Notifications\CommentCourseNotification')							
									<div class="col">
										<a href="{{route('courses.show',$notification->data['course'])}}" class="text-body">
										<div class="d-flex">
											<img
												src="{{\App\Models\User::findOrFail($notification->data['author'])->profile_photo_url}}"
												alt=""
												class="avatar-md rounded-circle"
											/>
											<div class="ms-3">
												<h5 class="fw-bold mb-1">{{\App\Models\User::findOrFail($notification->data['author'])->first_name.' '.\App\Models\User::findOrFail($notification->data['author'])->last_name}}:</h5>
												<p class="mb-3">
													 Rate your course <b>{{\Str::limit(\App\Models\Course::findOrFail($notification->data['course'])->title,20)}}</b>
												</p>
												<span class="fs-6 text-muted">
													<span
														><span
															class="fa fa-comment text-success me-1"
														></span
														>{{$notification->created_at->diffForHumans()}},</span
													>
													<span class="ms-1"> {{\Carbon\Carbon::parse($notification->created_at)->format('h:i A P')}}</span>
												</span>
											</div>
										</div>
										</a>
									</div>


@elseif($notification->type == 'App\Notifications\SchoolNotification')
									<div class="col">
										<a href="{{route('schools.show',$notification->data['school'])}}" class="text-body">
										<div class="d-flex">
											<img
												src="{{\App\Models\User::findOrFail($notification->data['author'])->profile_photo_url}}"
												alt=""
												class="avatar-md rounded-circle"
											/>
											<div class="ms-3">
												<h5 class="fw-bold mb-1">{{\App\Models\User::findOrFail($notification->data['author'])->first_name.' '.\App\Models\User::findOrFail($notification->data['author'])->last_name}}:</h5>
												<p class="mb-3">
													just launch new Degree <b>{{\App\Models\School::find($notification->data['school'])->title}}</b>
												</p>
												<span class="fs-6 text-muted">
													<span
														><span
															class="fa fa-thumbs-up text-success me-1"
														></span
														>{{$notification->created_at->diffForHumans()}},</span
													>
													<span class="ms-1"> {{\Carbon\Carbon::parse($notification->created_at)->format('h:i A P')}}</span> 
												</span>
											</div>
										</div>
										</a>
									</div>
									
									@elseif($notification->type == 'App\Notifications\ClassNotification')
									<div class="col">
										<a href="{{route('class.show',$notification->data['class'])}}" class="text-body">
										<div class="d-flex">
											<img
												src="{{\App\Models\User::findOrFail($notification->data['author'])->profile_photo_url}}"
												alt=""
												class="avatar-md rounded-circle"
											/>
											<div class="ms-3">
												<h5 class="fw-bold mb-1">{{\App\Models\User::findOrFail($notification->data['author'])->first_name.' '.\App\Models\User::findOrFail($notification->data['author'])->last_name}}:</h5>
												<p class="mb-3">
													just launch new Class <b>{{\App\Models\School::find($notification->data['class'])->name}}</b>
												</p>
												<span class="fs-6 text-muted">
													<span
														><span
															class="fa fa-thumbs-up text-success me-1"
														></span
														>{{$notification->created_at->diffForHumans()}},</span
													>
													<span class="ms-1"> {{\Carbon\Carbon::parse($notification->created_at)->format('h:i A P')}}</span> 
												</span>
											</div>
										</div>
										</a>
									</div>
									@elseif($notification->type == 'App\Notifications\CommentCourseNotification')							
									<div class="col">
										<a href="{{route('courses.show',$notification->data['course'])}}" class="text-body">
										<div class="d-flex">
											<img
												src="{{\App\Models\User::findOrFail($notification->data['author'])->profile_photo_url}}"
												alt=""
												class="avatar-md rounded-circle"
											/>
											<div class="ms-3">
												<h5 class="fw-bold mb-1">{{\App\Models\User::findOrFail($notification->data['author'])->first_name.' '.\App\Models\User::findOrFail($notification->data['author'])->last_name}}:</h5>
												<p class="mb-3">
													 Rate your course <b>{{\Str::limit(\App\Models\Course::findOrFail($notification->data['course'])->title,20)}}</b>
												</p>
												<span class="fs-6 text-muted">
													<span
														><span
															class="fa fa-comment text-success me-1"
														></span
														>{{$notification->created_at->diffForHumans()}},</span
													>
													<span class="ms-1"> {{\Carbon\Carbon::parse($notification->created_at)->format('h:i A P')}}</span>
												</span>
											</div>
										</div>
										</a>
									</div>

				@endif			


									<div class="col-auto text-center me-2">
										{{-- <a
											href="javascript:;"
											class="badge-dot bg-info"
											data-bs-toggle="tooltip"
											data-bs-placement="top"
											title="Mark as read"
										>
										</a> --}}
										
									</div>
								</div> 
							</li>
	

				
@if($loop->last)
		
							
							<div class="border-top px-3 pt-3 pb-0">
								<a
									href="{{route('deleteAllNotif')}}"
									class="text-danger fw-semi-bold"
									>Delete all Notifications</a
								>
							</div>
							

@endif
		
		

              @endforeach
    
            </ul>
          </div>
          {{-- <div class="card-footer border-0 py-3 text-center position-relative d-grid pt-0">
            <!-- Load more button START -->
            <a href="#!" role="button" class="btn btn-loader btn-primary-soft" data-bs-toggle="button" aria-pressed="true">
              <span class="load-text"> Load more notifications </span>
              <div class="load-icon">
                <div class="spinner-grow spinner-grow-sm" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </div>
            </a>
            <!-- Load more button END -->
          </div> --}}
        </div>
        <!-- Card END -->
      </div>
    </div> <!-- Row END -->
  </div>

















@endsection