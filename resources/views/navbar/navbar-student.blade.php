<base href="/public">
<style>
#google-translate-container {
  float: right;
  padding: 2px 4px 0px 0px;
}

.goog-te-combo,
.goog-te-banner *,
.goog-te-ftab *,
.goog-te-menu *,
.goog-te-menu2 *,
.goog-te-balloon * {
  font-family: "poppins";
  font-size: 9pt;
  background-image: url({{\App\Models\Site::first()->logoPath}});
  background-repeat: no-repeat;
  text-indent: 20px;
  background-color: #fff;
  color: #000 !important;
}

.goog-logo-link {
  display: none !important;
}

.goog-te-gadget {
  color: transparent !important;
}

.goog-te-gadget .goog-te-combo {
  margin: 2px 0 !important;
}

</style>
	<div class="pt-5 pb-5">
		<div class="container">
				<!-- User info -->
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
									<a href="#" class="text-decoration-none" data-bs-toggle="tooltip" data-placement="left" title="Beginner">
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
						@if(App\Models\User::find(auth()->user()->id)->user_type == 'App\Models\Student')
							<a href="{{route('dashboard')}}" class="btn btn-outline-primary btn-sm d-none d-md-block">Go to
								Dashboard</a>
						@elseif(App\Models\User::find(auth()->user()->id)->user_type == 'App\Models\Instructor')
						
							<a href="{{route('camtesia')}}" class="btn btn-primary btn-sm d-none d-md-block">Create New Course</a>						
						
						@elseif(auth()->user()->user_type == 'App\Models\Admin')
						<a href="{{route('school.create')}}" class="btn btn-primary btn-sm d-none d-md-block">Create New School</a>						
						@else
						@endif
						</div>
					</div>
				</div>
			</div>
	<!-- Content -->
	<div class="row mt-0 mt-md-4">
				<div class="col-lg-3 col-md-4 col-12">
					<!-- Side navbar -->
					<nav class="navbar navbar-expand-md navbar-light shadow-sm mb-4 mb-lg-0 sidenav">
						<!-- Menu -->
						<a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="#">Menu</a>
						<!-- Button -->
						<button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light" type="button"
							data-bs-toggle="collapse" data-bs-target="#sidenav" aria-controls="sidenav" aria-expanded="false"
							aria-label="Toggle navigation">
							<span class="fe fe-menu"></span>
						</button>
						<!-- Collapse navbar -->
						<div class="collapse navbar-collapse" id="sidenav">
							<div class="navbar-nav flex-column">
							@if(App\Models\User::find(auth()->user()->id)->user_type=='App\Models\Student')
								<span class="navbar-header">Subscription</span>
								<!-- List -->
								<ul class="list-unstyled ms-n2 mb-4">
									<!-- Nav item -->
									<li class="nav-item @if(Request::routeIs('students.subscription')) active @endif">
										<a class="nav-link " href="{{route('students.subscription')}}"><i class="fe fe-calendar nav-icon"></i>My
											Subscriptions</a>
									</li>
									<!-- Nav item -->
									{{-- <li class="nav-item">
										<a class="nav-link" href="billing-info.html"><i class="fe fe-credit-card nav-icon"></i>Billing
											Info</a>
									</li> --}}
									<!-- Nav item -->
									<li class="nav-item  @if(Request::routeIs('students.payment')) active @endif">
										<a class="nav-link" href="{{route('students.payment')}}"><i class="fe fe-credit-card nav-icon"></i>Payment</a>
									</li>
									<!-- Nav item -->
									<li class="nav-item @if(Request::routeIs('students.invoice')) active @endif">
										<a class="nav-link" href="{{route('students.invoice')}}" ><i class="fe fe-clipboard nav-icon"></i>Invoice</a>
									</li>
									<li class="nav-item {{Request::routeIs('myQuiz') ? 'active' : ''}}">
										<a class="nav-link" href="{{route('myQuiz')}}"><i
												class="fe fe-help-circle nav-icon"></i>MyQuiz</a>
									</li>
									
								<li class="nav-item {{Request::routeIs('quizResult') ? 'active' : ''}}">
										<a class="nav-link" href="{{route('quizResult')}}"><i
												class="fe fe-help-circle nav-icon"></i>My Quiz Attempt</a>
									</li>
								</ul>
								
							@elseif(App\Models\User::find(auth()->user()->id)->user_type=='App\Models\Instructor')
							<span class="navbar-header">Dashboard</span>
								<ul class="list-unstyled ms-n2 mb-4">

									<!-- Nav item -->
									<li class="nav-item {{Request::routeIs('dashboard') ? 'active' : ''}}">
										<a class="nav-link " href="{{route('dashboard')}}"><i class="fe fe-home nav-icon"></i>My
											Dashboard</a>
									</li>
									<!-- Nav item -->
									<li class="nav-item {{Request::routeIs('instructors.courses') ? 'active' : ''}}">
										<a class="nav-link" href="{{route('instructors.courses')}}"><i class="fe fe-book nav-icon"></i>My Courses</a>
									</li>
									<!-- Nav item -->
									<li class="nav-item {{Request::routeIs('instructors.reviews') ? 'active' : ' '}}">
										<a class="nav-link" href="{{route('instructors.reviews')}}"><i class="fe fe-star nav-icon"></i>Reviews</a>
									</li>
									{{-- <!-- Nav item -->
									<li class="nav-item">
										<a class="nav-link" href="instructor-earning.html"><i
												class="fe fe-pie-chart nav-icon"></i>Earnings</a>
									</li> --}}
									<!-- Nav item -->
									<li class="nav-item {{Request::routeIs('instructors.orders') ? 'active' : ' '}}">
										<a class="nav-link" href="{{route('instructors.orders')}}"><i
												class="fe fe-shopping-bag nav-icon"></i>Orders</a>
									</li>
									<!-- Nav item -->
									@if(Request::routeIs('studentsCourses'))
									<li class="nav-item {{Request::routeIs('studentsCourses') ? 'active' : ''}}">
										<a class="nav-link" href="javascript:;"><i class="fe fe-users nav-icon"></i>Students</a>
									</li>
									@endif
									<!-- Nav item -->
									{{-- <li class="nav-item">
										<a class="nav-link" href="instructor-payouts.html"><i
												class="fe fe-dollar-sign nav-icon"></i>Payouts</a>
									</li> --}}
									
						<!-- Nav item -->
									<li class="nav-item {{Request::routeIs('instructors.invitation') ? 'active' : ''}}">
										<a class="nav-link" href="{{route('instructors.invitation')}}"><i
												class="fe fe-users nav-icon"></i>Invitations Learn<span class="badge bg-success"> {{
													\App\Models\ClassInstructor::where('user_id',auth()->user()->id)->where('status',0)->count()
												}}</span></a>
									</li>
									
									<li class="nav-item {{Request::routeIs('instructorsQuiz') ? 'active' : ''}}">
										<a class="nav-link" href="{{route('instructorsQuiz')}}"><i
												class="fe fe-help-circle nav-icon"></i>Quiz</a>
									</li>
									
									
								</ul>
								@elseif(auth()->user()->user_type == 'App\Models\Admin')
		
							<span class="navbar-header">Dashboard</span>
								<ul class="list-unstyled ms-n2 mb-4">
								
									<!-- Nav item -->
									<li class="nav-item {{Request::routeIs('admin.schools') ? 'active' : ''}}">
										<a class="nav-link" href="{{route('admin.schools')}}"><i class="fa fa-home nav-icon"></i>Dashboard</a>
									</li>
									
																		<!-- Nav item -->
									<li class="nav-item {{Request::routeIs('admin.schools') ? 'active' : ''}}">
										<a class="nav-link" href="{{route('admin.schools')}}"><i class="fa fa-university nav-icon"></i>My Schools</a>
									</li>
									
									<li class="nav-item {{Request::routeIs('adminOrdersSchool') ? 'active' : ''}}">
										<a class="nav-link" href="{{route('adminOrdersSchool')}}"><i class="fa fa-money-bill-alt nav-icon"></i>Orders</a>
									</li>
									
								<li class="nav-item {{Request::routeIs('adminInstructors') ? 'active' : ''}}">
										<a class="nav-link" href="{{route('adminInstructors')}}"><i class="fa fa-user-graduate nav-icon"></i>Instructors</a>
									</li>
									
							<li class="nav-item {{Request::routeIs('adminStudents') ? 'active' : ''}}">
										<a class="nav-link" href="{{route('adminStudents')}}"><i class="fe fe-users nav-icon"></i>Students</a>
									</li>				




								</ul>


								@else

							@endif
							
								<span class="navbar-header">Account Settings</span>
                <!-- List -->
								<ul class="list-unstyled ms-n2 mb-0">
									<!-- Nav item -->
									<li class="nav-item @if(Request::routeIs('students.edit')) active @endif">
										<a class="nav-link" href="{{route('students.edit',auth()->user()->id)}}"><i class="fe fe-settings nav-icon"></i>Edit Profile</a>
									</li>
									<!-- Nav item -->
									<li class="nav-item @if(Request::routeIs('students.security')) active @endif">
										<a class="nav-link" href="{{route('students.security')}}"><i class="fe fe-user nav-icon"></i>Security</a>
									</li>
									<!-- Nav item -->
									<li class="nav-item @if(Request::routeIs('students.social')) active @endif">
										<a class="nav-link" href="{{route('students.social')}}"><i class="fe fe-refresh-cw nav-icon"></i>Social
											Profiles</a>
									</li>
									<li class="nav-item @if(Request::routeIs('notifications')) active @endif">
										<a class="nav-link" href="{{route('notifications')}}"><i class="fe fe-bell nav-icon"></i>Notifications</a>
									</li>
									<!-- Nav item -->
									<li class="nav-item">
										<a class="nav-link" href="profile-privacy.html"><i class="fe fe-lock nav-icon"></i>Profile
											Privacy</a>
									</li>
									<!-- Nav item -->
									<li class="nav-item @if(Request::routeIs('students.deleted')) active @endif">
										<a class="nav-link" href="{{route('students.deleted')}}"><i class="fe fe-trash nav-icon"></i>Delete
											Profile</a>
									</li>
										<!-- Nav item -->
										<li class="nav-item @if(Request::routeIs('students.linked')) active @endif">
											<a class="nav-link " href="{{route('students.linked')}}"><i class="fe fe-user nav-icon"></i>Linked Accounts</a>
										</li>
									<!-- Nav item -->
									<li class="nav-item">
					<form method="POST" action="{{ route('logout') }}">
						@csrf
						<div class="nav-item">
							<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
										this.closest('form').submit(); " role="button">
								<i class="fe fe-power me-2"></i>

								{{ __('Log Out') }}
							</a>
						</div>
					</form>

								
									</li>
								</ul>
				<span class="navbar-header">Social Media</span>
                <!-- List -->
								<ul class="list-unstyled ms-n2 mb-0">
									<!-- Nav item -->
									<li class="nav-item @if(Request::routeIs('social')) active @endif">
										<a class="nav-link" href="{{route('social')}}"><i class="fe f	e-home nav-icon"></i>Home</a>
									</li>
									<!-- Nav item -->
									<li class="nav-item @if(Request::routeIs('students.friends')) active @endif">
										<a class="nav-link" href="{{route('students.friends')}}"><i class="fa fa-user-friends nav-icon"></i>Friends @if(\App\Models\FriendInvitation::where('invite_id',auth()->user()->id)->where('status',0)->count() > 0)<i class="badge bg-info">{{\App\Models\FriendInvitation::where('invite_id',auth()->user()->id)->where('status',0)->count()}} </i>@endif</a>
									</li>
									<!-- Nav item -->
									<li class="nav-item @if(Request::routeIs('friends.invitations')) active @endif">
										<a class="nav-link " href="{{route('friends.invitations')}}"><i class="fe fe-user-plus nav-icon"></i>Invitations 
											</a>
									</li>
									
										<!-- Nav item -->
									<li class="nav-item @if(Request::routeIs('mail')) active @endif">
										<a class="nav-link " href="{{route('mail')}}"><i class="nav-icon mdi mdi-email-outline me-2"></i>Mail
										<span class="badge rounded-pill bg-primary">{{\App\Models\YahooMail::where('email_to',auth()->user()->id)->where('read',0)->count()}}</span>
											</a>
									</li>
									<li class="nav-item @if(Request::routeIs('social.groups')) active @endif">
										<a class="nav-link" href="{{route('social.groups')}}"><i class="fe fe-globe nav-icon"></i>Social Groups</a>
									</li>
									<!-- Nav item -->
									<li class="nav-item">
										<a class="nav-link" href="{{route('every')}}"><i class="fe fe-search nav-icon"></i>Search</a>
									</li>
								</ul>
							</div>
						</div>
					</nav>
				</div>
          
{{-- 
			</div>
		</div>   Oublie pas de toujours coller ceci
	</div> --}}