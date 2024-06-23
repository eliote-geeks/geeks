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
        background-image: url({{ \App\Models\Site::first()->faviconPath }});
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
<nav class="navbar navbar-expand-lg navbar-default">
    <div class="container-fluid px-0">

        <div onclick="handleClick(event)" id="google-translate-container">
            <div id="google_translate_element">
            </div>
        </div>

        <script>
            function handleClick(event) {
                event.preventDefault();
                // Autres actions à effectuer lors du clic sur la div
            }
        </script>

        <a class="navbar-brand" href="{{ url('/') }}" data-turbolinks="false"><img class="avatar avatar"
                src="{{ \App\Models\Site::first()->logoPath }}" alt="{{ \App\Models\Site::first()->name }}" /></a>
        <!-- Mobile view nav wrap -->
        @auth
            <ul class="navbar-nav navbar-right-wrap ms-auto d-lg-none d-flex nav-top-wrap">
                <li class="dropdown stopevent">
                    <a class="btn btn-light btn-icon rounded-circle text-muted indicator indicator-primary" href="#"
                        role="button" data-bs-toggle="dropdown">
                        <i class="fe fe-bell"> </i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end shadow">
                        <div>
                            <div class="border-bottom px-3 pb-3 d-flex justify-content-between align-items-center">
                                <span class="h5 mb-0">Notifications</span>
                                <a href="# " class="text-muted"><span class="align-middle"><i
                                            class="fe fe-settings me-1"></i></span></a>
                            </div>
                            @auth
                                <ul class="list-group list-group-flush notification-list-scroll">

                                    @forelse (auth()->user()->notifications as $notification)
                                        <li class="list-group-item bg-light">

                                            {{-- <div class="row">
									<div class="col">
										<a href="#" class="text-body">
										<div class="d-flex">
											<img
												src="assets/images/avatar/avatar-1.jpg"
												alt=""
												class="avatar-md rounded-circle"
											/>
											<div class="ms-3">
												<h5 class="fw-bold mb-1">Kristin Watson:</h5>
												<p class="mb-3">
													Krisitn Watsan like your comment on course Javascript
													Introduction!
												</p>
												<span class="fs-6 text-muted">
													<span
														><span
															class="fe fe-thumbs-up text-success me-1"
														></span
														>2 hours ago,</span
													>
													<span class="ms-1">2:19 PM</span>
												</span>
											</div>
										</div>
										</a>
									</div>
									<div class="col-auto text-center me-2">
										<a
											href="#"
											class="badge-dot bg-info"
											data-bs-toggle="tooltip"
											data-bs-placement="top"
											title="Mark as read"
										>
										</a>
										<div>
											<a
												href="#"
												data-bs-toggle="tooltip"
												data-bs-placement="top"

												title="Remove"
											>
												<i class="fe fe-x text-muted"></i>
											</a>
										</div>
									</div>
								</div> --}}
                                        </li>

                                    @empty
                                        <li class="list-group-item bg-light">
                                            no record found
                                        </li>
                                    @endforelse
                                </ul>
                                <div class="border-top px-3 pt-3 pb-0">
                                    <a href="pages/notification-history.html" class="text-link fw-semi-bold">See all
                                        Notifications</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown ms-2">

                        <a class="rounded-circle" href="#" role="button" data-bs-toggle="dropdown">
                            @auth
                                <div class="avatar avatar-md avatar-indicators avatar-online">
                                    <img alt="avatar" src="{{ auth()->user()->profile_photo_url }}" class="rounded-circle" />
                                </div>
                            @endauth
                        </a>
                        <div class="dropdown-menu dropdown-menu-end shadow">
                            <div class="dropdown-item">
                                <div class="d-flex">
                                    @auth
                                        <div class="avatar avatar-md avatar-indicators avatar-online">
                                            <img alt="avatar" src="{{ auth()->user()->profile_photo_url }}"
                                                class="rounded-circle" />
                                        </div>

                                        <div class="ms-3 lh-1">
                                            <h5 class="mb-1">{{ auth()->user()->name }}</h5>
                                            <p class="mb-0 text-muted">{{ auth()->user()->email }}</p>
                                        </div>
                                    @endauth
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <ul class="list-unstyled">
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-list-group-item dropdown-toggle">
                                        <i class="fe fe-circle me-2"></i>Status
                                    </a>
                                    <ul class="dropdown-menu">
                                        @auth
                                            <li>
                                                <a class="dropdown-item">
                                                    <span class="badge-dot bg-success me-2"></span>Online
                                                </a>
                                            </li>
                                        @endauth

                                        @guest
                                            <li>
                                                <a class="dropdown-item" href="{{ route('login') }}">
                                                    <span class="badge-dot bg-warning me-2"></span>Away
                                                </a>
                                            </li>
                                        @endguest
                                    </ul>
                                @endauth

                            </li>
                            @auth
                                <li>
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                                        <i class="fe fe-user me-2"></i>Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('students.subscription', auth()->user()) }}">
                                        <i class="fe fe-star me-2"></i>Subscription
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('students.update', auth()->user()) }}">
                                        <i class="fe fe-settings me-2"></i>Settings
                                    </a>
                                </li>
                            </ul>

                            <div class="dropdown-divider"></div>
                            <ul class="list-unstyled">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <div class="nav-item">
                                            <a class="nav-link" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
										this.closest('form').submit(); "
                                                role="button">
                                                <i class="fe fe-power me-2"></i>

                                                {{ __('Log Out') }}
                                            </a>
                                        </div>
                                    </form>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </li>
            </ul>

            <!-- Collapse -->

            <div class="dropdown">
                <button class="btn btn-light-primary btn-sm text-primary" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fe fe-list me-2 align-middle "></i>Category
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    @foreach (\App\Models\Category::where('view', 1)->get() as $category)
                        @if (\App\Models\Category::where('category_id', $category->id)->count() > 0)
                            <li class="dropdown-submenu dropend">

                                <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">
                                    {{ $category->name }}
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach (\App\Models\Category::where('category_id', $category->id)->get() as $cat)
                                        <li>
                                            <a class="dropdown-item" href="{{ route('courses.category', $cat->id) }}">
                                                {{ $cat->name }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </li>
                        @else
                            @if ($category->category_id == 0)
                                <li>
                                    <a href="{{ route('courses.category', $category->id) }}" class="dropdown-item">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endif
                        @endif
                    @endforeach

                </ul>
            </div>

            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="icon-bar top-bar mt-0"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-default">
                <ul class="navbar-nav ms-auto">
                    {{-- <li class="nav-item dropdown">
					<a
						class="nav-link dropdown-toggle"
						href="#"
						id="navbarBrowse"
						data-bs-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
						data-bs-display="static"
					>
						Browse
					</a>
					<ul
						class="dropdown-menu dropdown-menu-arrow"
						aria-labelledby="navbarBrowse"
					>
					
				
					</ul>
				</li> --}}

                    <li class="nav-item dropdown">
                        <a class="nav-link " href="{{ url('/') }}">
                            <img class="avatar avatar-sm" src="{{ asset('../assets/images/brand/home.png') }}">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarAccount">
                            <li>
                                <h4 class="dropdown-header"> Home</h4>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link " href="{{ route('browseSchool') }}">
                            <img class="avatar avatar-sm" src="{{ asset('../assets/images/brand/school.png') }}">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarAccount">
                            <li>
                                <h4 class="dropdown-header"> Schools</h4>
                            </li>
                        </ul>
                    </li>




                    <li class="nav-item dropdown">
                        <a class="nav-link " href="{{ route('social') }}">
                            <img class="avatar avatar-sm" src="{{ asset('../assets/images/brand/social.png') }}">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarAccount">
                            <li>
                                <h4 class="dropdown-header">Social Media</h4>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link " href="{{ route('blog') }}">
                            <img class="avatar avatar-sm" src="{{ asset('../assets/images/brand/blog.png') }}">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarAccount">
                            <li>
                                <h4 class="dropdown-header">Blog</h4>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link " href="{{ route('contact') }}">
                            <img class="avatar avatar-sm" src="{{ asset('../assets/images/brand/contact.png') }}">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarAccount">
                            <li>
                                <h4 class="dropdown-header">Contact</h4>
                            </li>
                        </ul>
                    </li>
                </ul>
                @livewire('search-course')
                @auth
                    <ul class="navbar-nav navbar-right-wrap ms-auto d-none d-lg-block">
                        <li class="dropdown d-inline-block stopevent">
                            <a class="btn btn-light btn-icon rounded-circle text-muted indicator indicator-primary"
                                href="#" role="button" id="dropdownNotificationSecond" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fe fe-bell"> </i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg"
                                aria-labelledby="dropdownNotificationSecond">
                                <div>
                                    <div class="border-bottom px-3 pb-3 d-flex justify-content-between align-items-center">
                                        <span class="h5 mb-0">Notifications <small
                                                class="badge bg-primary">{{ auth()->user()->unreadNotifications->count() }}</small></span>
                                        <a href="# " class="text-muted"><span class="align-middle"><i
                                                    class="fe fe-settings me-1"></i></span></a>
                                    </div>
                                    <ul class="list-group list-group-flush notification-list-scroll ">
                                        @auth
                                            @forelse (auth()->user()->unreadNotifications->take(3) as $notification)
                                                <li class="list-group-item bg-light">
                                                    <div class="row">

                                                        @if (
                                                            $notification->type == 'App\Notifications\CourseNotification' &&
                                                                \App\Models\Course::where('title', $notification->data['title'])->count() > 0)
                                                            <div class="col">
                                                                <a href="{{ route('courses.show', \App\Models\Course::where('title', $notification->data['title'])->firstOrFail()->id) }}"
                                                                    class="text-body">
                                                                    <div class="d-flex">
                                                                        <img src="{{ \App\Models\Course::where('title', $notification->data['title'])->first()->user->profile_photo_url }}"
                                                                            alt="" class="avatar-md rounded-circle" />
                                                                        <div class="ms-3">
                                                                            <h5 class="fw-bold mb-1">
                                                                                {{ \App\Models\Course::where('title', $notification->data['title'])->first()->user->first_name . ' ' . \App\Models\Course::where('title', $notification->data['title'])->first()->user->last_name }}:
                                                                            </h5>
                                                                            <p class="mb-3">
                                                                                Just launched a new course
                                                                                <b>{{ $notification->data['title'] }}</b>
                                                                            </p>
                                                                            <span class="fs-6 text-muted">
                                                                                <span><span
                                                                                        class="fa fa-user-graduate text-success me-1"></span>{{ $notification->created_at->diffForHumans() }},</span>
                                                                                <span class="ms-1">
                                                                                    {{ \Carbon\Carbon::parse($notification->created_at)->format('h:i A P') }}</span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @elseif($notification->type == 'App\Notifications\ReportNotification')
                                                            <div class="col">
                                                                <a href="{{ route('courses.show', $notification->data['course']) }}"
                                                                    class="text-body">
                                                                    <div class="d-flex">
                                                                        <img src="{{ auth()->user()->profile_photo_url }}"
                                                                            alt="" class="avatar-md rounded-circle" />
                                                                        <div class="ms-3">
                                                                            <h5 class="fw-bold mb-1">
                                                                                {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}:
                                                                            </h5>
                                                                            <p class="mb-3">
                                                                                Your comment
                                                                                <b>{{ \Str::limit($notification->data['review'], 17) }}</b>
                                                                                has been report in course
                                                                                <b>{{ \Str::limit(\App\Models\Course::findOrFail($notification->data['course'])->title, 20) }}</b>
                                                                            </p>
                                                                            <span class="fs-6 text-muted">
                                                                                <span><span
                                                                                        class="fa fa-flag text-danger me-1"></span>{{ $notification->created_at->diffForHumans() }},</span>
                                                                                <span class="ms-1">
                                                                                    {{ \Carbon\Carbon::parse($notification->created_at)->format('h:i A P') }}</span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @elseif($notification->type == 'App\Notifications\LikeNotification')
                                                            <div class="col">
                                                                <a href="{{ route('courses.show', $notification->data['course']) }}"
                                                                    class="text-body">
                                                                    <div class="d-flex">
                                                                        <img src="{{ \App\Models\User::findOrFail($notification->data['author'])->profile_photo_url }}"
                                                                            alt="" class="avatar-md rounded-circle" />
                                                                        <div class="ms-3">
                                                                            <h5 class="fw-bold mb-1">
                                                                                {{ \App\Models\User::findOrFail($notification->data['author'])->first_name . ' ' . \App\Models\User::findOrFail($notification->data['author'])->last_name }}:
                                                                            </h5>
                                                                            <p class="mb-3">
                                                                                Like Your comment
                                                                                <b>{{ $notification->data['review'] }}</b> in
                                                                                course
                                                                                <b>{{ \App\Models\Course::findOrFail($notification->data['course'])->title }}</b>
                                                                            </p>
                                                                            <span class="fs-6 text-muted">
                                                                                <span><span
                                                                                        class="fa fa-thumbs-up text-success me-1"></span>{{ $notification->created_at->diffForHumans() }},</span>
                                                                                <span class="ms-1">
                                                                                    {{ \Carbon\Carbon::parse($notification->created_at)->format('h:i A P') }}</span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @elseif($notification->type == 'App\Notifications\CommentCourseNotification')
                                                            <div class="col">
                                                                <a href="{{ route('courses.show', $notification->data['course']) }}"
                                                                    class="text-body">
                                                                    <div class="d-flex">
                                                                        <img src="{{ \App\Models\User::findOrFail($notification->data['author'])->profile_photo_url }}"
                                                                            alt="" class="avatar-md rounded-circle" />
                                                                        <div class="ms-3">
                                                                            <h5 class="fw-bold mb-1">
                                                                                {{ \App\Models\User::findOrFail($notification->data['author'])->first_name . ' ' . \App\Models\User::findOrFail($notification->data['author'])->last_name }}:
                                                                            </h5>
                                                                            <p class="mb-3">
                                                                                Rate your course
                                                                                <b>{{ \Str::limit(\App\Models\Course::findOrFail($notification->data['course'])->title, 20) }}</b>
                                                                            </p>
                                                                            <span class="fs-6 text-muted">
                                                                                <span><span
                                                                                        class="fa fa-comment text-success me-1"></span>{{ $notification->created_at->diffForHumans() }},</span>
                                                                                <span class="ms-1">
                                                                                    {{ \Carbon\Carbon::parse($notification->created_at)->format('h:i A P') }}</span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @elseif($notification->type == 'App\Notifications\SchoolNotification')
                                                            <div class="col">
                                                                <a href="{{ route('schools.show', $notification->data['school']) }}"
                                                                    class="text-body">
                                                                    <div class="d-flex">
                                                                        <img src="{{ \App\Models\User::findOrFail($notification->data['author'])->profile_photo_url }}"
                                                                            alt="" class="avatar-md rounded-circle" />
                                                                        <div class="ms-3">
                                                                            <h5 class="fw-bold mb-1">
                                                                                {{ \App\Models\User::findOrFail($notification->data['author'])->first_name . ' ' . \App\Models\User::findOrFail($notification->data['author'])->last_name }}:
                                                                            </h5>
                                                                            <p class="mb-3">
                                                                                just launch new Degree
                                                                                <b>{{ \App\Models\School::find($notification->data['school'])->title }}</b>
                                                                            </p>
                                                                            <span class="fs-6 text-muted">
                                                                                <span><span
                                                                                        class="fa fa-thumbs-up text-success me-1"></span>{{ $notification->created_at->diffForHumans() }},</span>
                                                                                <span class="ms-1">
                                                                                    {{ \Carbon\Carbon::parse($notification->created_at)->format('h:i A P') }}</span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @elseif($notification->type == 'App\Notifications\ClassNotification')
                                                            <div class="col">
                                                                <a href="{{ route('class.show', $notification->data['class']) }}"
                                                                    class="text-body">
                                                                    <div class="d-flex">
                                                                        <img src="{{ \App\Models\User::findOrFail($notification->data['author'])->profile_photo_url }}"
                                                                            alt="" class="avatar-md rounded-circle" />
                                                                        <div class="ms-3">
                                                                            <h5 class="fw-bold mb-1">
                                                                                {{ \App\Models\User::findOrFail($notification->data['author'])->first_name . ' ' . \App\Models\User::findOrFail($notification->data['author'])->last_name }}:
                                                                            </h5>
                                                                            <p class="mb-3">
                                                                                just launch new Class
                                                                                <b>{{ \App\Models\School::find($notification->data['class'])->name }}</b>
                                                                            </p>
                                                                            <span class="fs-6 text-muted">
                                                                                <span><span
                                                                                        class="fa fa-thumbs-up text-success me-1"></span>{{ $notification->created_at->diffForHumans() }},</span>
                                                                                <span class="ms-1">
                                                                                    {{ \Carbon\Carbon::parse($notification->created_at)->format('h:i A P') }}</span>
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



                                                @if ($loop->last)
                                                    <div class="border-top px-3 pt-3 pb-0">
                                                        <a href="{{ route('notifications') }}" class="text-link fw-semi-bold">See
                                                            all Notifications</a>
                                                    </div>
                                                @endif
                                            @empty
                                                <small class="text-center">No record notification</small>
                                            @endforelse
                                        </ul>
                                    @endauth

                                </div>
                            </div>
                        </li>
                        <li class="dropdown ms-2 d-inline-block">
                            <a class="btn btn-white shadow-sm me-1"
                                href="https://www.paypal.com/donate/?hosted_button_id=6M7JB5NU4HCB2"><i
                                    class="fe fe-donate"></i> Donate</a>
                        </li>
                        @auth
                            <li class="dropdown ms-2 d-inline-block">
                                <a class="rounded-circle" href="#" data-bs-toggle="dropdown" data-bs-display="static"
                                    aria-expanded="false">
                                    <div class="avatar avatar-md avatar-indicators avatar-online">
                                        <img alt="avatar" src="{{ Auth::user()->profile_photo_url }}"
                                            class="rounded-circle" />
                                    </div>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="dropdown-item">
                                        <div class="d-flex">
                                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                                <img alt="avatar" src="{{ Auth::user()->profile_photo_url }}"
                                                    class="rounded-circle avatar-sm" />
                                            </div>
                                            <div class="ms-3 lh-1">
                                                <h5 class="mb-1">{{ auth()->user()->name }}</h5>
                                                <p class="mb-0 text-muted">{{ auth()->user()->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <ul class="list-unstyled">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('dashboard') }}">
                                                <i class="fe fe-user me-2"></i>Profile
                                            </a>
                                        </li>
                                        <li>
                                            @if (auth()->user()->user_type == 'App\Models\Student')
                                                <a class="dropdown-item" href="{{ route('students.subscription') }}">
                                                    <i class="fe fe-star me-2"></i>Subscription
                                                </a>
                                            @elseif(auth()->user()->user_type == 'App\Models\Instructor')
                                                <a class="dropdown-item" href="{{ route('camtesia') }}">
                                                    <i class="fe fe-book me-2"></i>Create course
                                                </a>
                                            @else
                                            @endif
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('students.edit', auth()->user()->id) }}">
                                                <i class="fe fe-settings me-2"></i>Settings
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="dropdown-divider"></div>
                                    <ul class="list-unstyled">
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <div class="nav-item">
                                                    <a class="nav-link" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
										this.closest('form').submit(); "
                                                        role="button">
                                                        <i class="fe fe-power me-2"></i>

                                                        {{ __('Log Out') }}
                                                    </a>
                                                </div>
                                            </form>

                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endauth
                    @endauth
                </ul>
            @endauth
            @guest
                <div class="ms-auto mt-3 mt-lg-0">
                    <a class="btn btn-white shadow-sm me-1" href="{{ route('login') }}">Sign In</a>
                    <a class="btn btn-primary" href="{{ route('register') }}">Sign Up</a>

                    <a class="btn btn-success shadow-sm me-1"
                        href="https://www.paypal.com/donate/?hosted_button_id=6M7JB5NU4HCB2"><i class="fe fe-donate"></i>
                        Donate</a>

                </div>
            @endguest
        </div>
    </div>
    {{-- <p>Translate this page:</p> --}}

</nav>
