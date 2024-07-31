<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<base href="/public">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="{{\App\Models\Site::first()->description}}" />
<meta name="keywords" content="{{\App\Models\Site::first()->name}}, bootstrap, bootstrap 5, Course, Sass, landing, Marketing, admin themes, bootstrap admin, bootstrap dashboard, ui kit, web app, multipurpose" />



<script defer src="{{ mix('js/app.js') }}"></script>  
  <link href="{{mix('css/app.css')}}" rel="stylesheet" data-turbolinks-track="true">
<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="{{\App\Models\Site::first()->faviconPath}}">

  <link rel="stylesheet" href="{{asset('css/app.css')}}" data-turbolinks-track="reload">
<!-- Libs CSS -->
{{-- <script src="{{asset('js/app.js')}}" data-turbolinks-track="reload"></script> --}}
<link href="../assets/fonts/feather/feather.css" rel="stylesheet">
<link href="../assets/libs/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="../assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
<link href="../assets/libs/dragula/dist/dragula.min.css" rel="stylesheet" />
<link href="../assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
<link href="../assets/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
<link href="../assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet" />
<link href="../assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="../assets/libs/%40yaireo/tagify/dist/tagify.css" rel="stylesheet">
<link href="../assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
<link href="../assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">
<link href="../assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="../assets/libs/prismjs/themes/prism-okaidia.css" rel="stylesheet">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Theme CSS -->
<link rel="stylesheet" href="../node_modules/@yaireo/tagify/dist/tagify.css">
<link rel="stylesheet" href="../../assets/css/theme.min.css">
<x-embed-styles />

    <title>{{\App\Models\Site::first()->name}} Learning System</title>
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
@livewireStyles
  </head>
 
<body>
    <div id="db-wrapper">
      <!-- navbar vertical -->
       <!-- Sidebar -->
@include('navbar.navbar-admin')

  <div id="page-content">
        <div class="header">
    <!-- navbar -->
    <nav class="navbar-default navbar navbar-expand-lg">
        <a id="nav-toggle" href="#">
            <i class="fe fe-menu"></i>
        </a>
        <div class="ms-lg-3 d-none d-md-none d-lg-block">
            <!-- Form -->
            <form class="d-flex align-items-center">
                <span class="position-absolute ps-3 search-icon">
                        <i class="fe fe-search"></i>
                    </span>
                <input type="search" class="form-control form-control-sm ps-6" placeholder="Search Entire Dashboard" />
            </form>
        </div>
        <!--Navbar nav -->
        <ul class="navbar-nav navbar-right-wrap ms-auto d-flex nav-top-wrap">
            <li class="dropdown stopevent">
                <a class="btn btn-light btn-icon rounded-circle indicator indicator-primary text-muted" href="#" role="button" id="dropdownNotification" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fe fe-bell"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg" aria-labelledby="dropdownNotification">
                    <div class=" ">
                        <div class="border-bottom px-3 pb-3 d-flex justify-content-between align-items-center">
                            <span class="h4 mb-0">Notifications</span>
                            <a href="# " class="text-muted">
                                <span class="align-middle">
                                        <i class="fe fe-settings me-1"></i>
                                    </span>
                            </a>
                        </div>
                        <!-- List group -->
                        <ul class="list-group list-group-flush notification-list-scroll">
                            <li class="list-group-item bg-light">
                                <div class="row">
                                    <div class="col">
                                        <a class="text-body" href="#">
                                        <div class="d-flex">
                                            <img
                                                src="../../assets/images/avatar/avatar-1.jpg"
                                                alt=""
                                                class="avatar-md rounded-circle"
                                            />
                                            <div class="ms-3">
                                                <h5 class="fw-bold mb-1">Kristin Watson:</h5>
                                                <p class="mb-3">
                                                    Krisitn Watsan like your comment on course
                                                    Javascript Introduction!
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
                                                class="bg-transparent"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"

                                                title="Remove"
                                            >
                                                <i class="fe fe-x text-muted"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <a class="text-body" href="#">
                                        <div class="d-flex">
                                            <img
                                                src="../../assets/images/avatar/avatar-2.jpg"
                                                alt=""
                                                class="avatar-md rounded-circle"
                                            />
                                            <div class="ms-3">
                                                <h5 class="fw-bold mb-1">Brooklyn Simmons</h5>
                                                <p class="mb-3">
                                                    Just launched a new Courses React for Beginner.
                                                </p>
                                                <span class="fs-6 text-muted">
                                                    <span
                                                        ><span
                                                            class="fe fe-thumbs-up text-success me-1"
                                                        ></span
                                                        >Oct 9,</span
                                                    >
                                                    <span class="ms-1">qqq1:20 PM</span>
                                                </span>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-auto text-center me-2">
                                        <a
                                            href="#"
                                            class="badge-dot bg-secondary"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"

                                            title="Mark as unread"
                                        >
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <a class="text-body" href="#">
                                        <div class="d-flex">
                                            <img
                                                src="../../assets/images/avatar/avatar-3.jpg"
                                                alt=""
                                                class="avatar-md rounded-circle"
                                            />
                                            <div class="ms-3">
                                                <h5 class="fw-bold mb-1">Jenny Wilson</h5>
                                                <p class="mb-3">
                                                    Krisitn Watsan like your comment on course
                                                    Javascript Introduction!
                                                </p>
                                                <span class="fs-6 text-muted">
                                                    <span
                                                        ><span
                                                            class="fe fe-thumbs-up text-info me-1"
                                                        ></span
                                                        >Oct 9,</span
                                                    >
                                                    <span class="ms-1">1:56 PM</span>
                                                </span>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-auto text-center me-2">
                                        <a
                                            href="#"
                                            class="badge-dot bg-secondary"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"

                                            title="Mark as unread"
                                        >
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <a class="text-body" href="#">
                                        <div class="d-flex">
                                            <img
                                                src="../../assets/images/avatar/avatar-4.jpg"
                                                alt=""
                                                class="avatar-md rounded-circle"
                                            />
                                            <div class="ms-3">
                                                <h5 class="fw-bold mb-1">Sina Ray</h5>
                                                <p class="mb-3">
                                                    You earn new certificate for complete the Javascript
                                                    Beginner course.
                                                </p>
                                                <span class="fs-6 text-muted">
                                                    <span
                                                        ><span
                                                            class="fe fe-award text-warning me-1"
                                                        ></span
                                                        >Oct 9,</span
                                                    >
                                                    <span class="ms-1">1:56 PM</span>
                                                </span>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-auto text-center me-2">
                                        <a
                                            href="#"
                                            class="badge-dot bg-secondary"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"

                                            title="Mark as unread"
                                        >
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="border-top px-3 pt-3 pb-0">
                            <a href="../notification-history.html" class="text-link fw-semi-bold">
                                    See all Notifications
                                </a>
                        </div>
                    </div>
                </div>
            </li>
            <!-- List -->
@auth
				 <li class="dropdown ms-2 d-inline-block">
					<a
						class="rounded-circle"
						href="#"
						data-bs-toggle="dropdown"
						data-bs-display="static"
						aria-expanded="false"
					>
						<div class="avatar avatar-md avatar-indicators avatar-online">
							<img
								alt="avatar"
								src="{{ Auth::user()->profile_photo_url }}"
								class="rounded-circle"
							/>
						</div>
					</a>
					 <div class="dropdown-menu dropdown-menu-end">
						<div class="dropdown-item">
							<div class="d-flex">
								<div class="avatar avatar-md avatar-indicators avatar-online">
									<img
										alt="avatar"
										src="{{ Auth::user()->profile_photo_url }}"
										class="rounded-circle"
									/>
								</div>
								<div class="ms-3 lh-1">
									<h5 class="mb-1">{{auth()->user()->name}}</h5>
									<p class="mb-0 text-muted">{{auth()->user()->email}}</p>
								</div>
							</div>
						</div>
						<div class="dropdown-divider"></div>
						<ul class="list-unstyled">
							<li>
								<a
									class="dropdown-item"
									href="{{route('dashboard')}}"
								>
									<i class="fe fe-user me-2"></i>Profile
								</a>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="{{route('students.subscription',auth()->user())}}"
								>
									<i class="fe fe-star me-2"></i>Subscription
								</a>
							</li>
							<li>
								<a class="dropdown-item" href="#">
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
							<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
										this.closest('form').submit(); " role="button">
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

@guest
				<li class="dropdown ms-2 d-inline-block">
				<a href={{url('login')}} class="btn-sm btn-primary">Login</a>
				</li>
						<li class="dropdown ms-2 d-inline-block">
				<a href="{{url('register')}}" class="btn-sm btn-link">Register</a>
				</li>
@endguest

        </ul>

    </nav>
</div>


    @yield('content')

      </div>
    </div>
  <!-- Footer -->
<div class="footer">
    <div class="container">
        <div class="row align-items-center g-0 border-top py-2">
            <!-- Desc -->
            <div class="col-md-6 col-12 text-center text-md-start">
                <span>© {{date('d M,Y')}} {{\App\Models\Site::first()->name}}. All Rights Reserved.</span>
            </div>
              <!-- Links -->
            <div class="col-12 col-md-6">
                <nav class="nav nav-footer justify-content-center justify-content-md-end">
                    <a class="nav-link active ps-0" href="javascript:;">Production: Father Paul</a>
                </nav>
            </div>
        </div>
    </div>
</div>



  <body>
  {{-- <script src="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.js"></script> --}}
    <!-- Script -->
    <!-- Libs JS -->
 
    @livewireScripts
      {{-- @livewire('livewire-ui-modal')
                 @stack('modals') --}}


 
<!-- Chartisan -->


<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://www.paypal.com/sdk/js?client-id={{config('services.paypal.client_id')}}&vault=true&intent=subscription"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine.js" integrity="sha512-nIwdJlD5/vHj23CbO2iHCXtsqzdTTx3e3uAmpTm4x2Y8xCIFyWu4cSIV8GaGe2UNVq86/1h9EgUZy7tn243qdA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://www.paypal.com/sdk/js?client-id=client-id={{config('services.paypal.client_id')}}&currency=USD"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.0.0/turbolinks.min.js" integrity="sha512-ifx27fvbS52NmHNCt7sffYPtKIvIzYo38dILIVHQ9am5XGDQ2QjSXGfUZ54Bs3AXdVi7HaItdhAtdhKz8fOFrA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/odometer/odometer.min.js"></script>
<script src="../assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script src="../assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="../assets/libs/flatpickr/dist/flatpickr.min.js"></script>
<script src="../assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
<script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="../assets/libs/quill/dist/quill.min.js"></script>
<script src="../assets/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js"></script>
<script src="../assets/libs/dragula/dist/dragula.min.js"></script>
<script src="../assets/libs/dropzone/dist/min/dropzone.min.js"></script>
<script src="../assets/libs/jQuery.print/jQuery.print.js"></script>
<script src="../assets/libs/prismjs/prism.js"></script>
<script src="../assets/libs/prismjs/components/prism-scss.min.js"></script>
<script src="../assets/libs/%40yaireo/tagify/dist/tagify.min.js"></script>
<script src="../assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
<script src="../assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
<script src="../assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
<script src="../assets/libs/typed.js/lib/typed.min.js"></script>
<script src="../assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
<script src="../assets/libs/jsvectormap/dist/maps/world.js"></script>
<script src="../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="../assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
<script src="../assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js" integrity="sha512-Y+cHVeYzi7pamIOGBwYHrynWWTKImI9G78i53+azDb1uPmU1Dz9/r2BLxGXWgOC7FhwAGsy3/9YpNYaoBy7Kzg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- <script>
	    var botmanWidget = {
            title: 'Geeks',
	        aboutText: 'geeks',
	        introMessage: "✋ Hi! I'm form geeks"
	    };
    </script> --}}
  
    {{-- <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script> --}}

<script src="{{asset('assets/js/country-states.js')}}"></script> 
<!-- Theme JS -->
<script src={{asset("assets/js/theme.min.js")}}></script>
<script>
    // mesage message popup notification
  @if(Session::has('message'))
$.toast({
    heading: 'Information',
    text: "{{session::get('message')}}",
    icon: 'info',
    position: 'top-right', 
    hideAfter: 10000,   // in milli seconds
    loader: true,        // Change it to false to disable loader
    loaderBg: '#9EC600'  // To change the background
}) 

  @endif
  
</script>


<script>
$(document).on('turbolinks:click', function(){
  $('img')
    .addClass('animated fadeOut')
    .off('webkitAnimationEnd oanimationend msAnimationEnd animationend')
});
$(document).on('turbolinks:load', function(event){
    // if call was fired by turbolinks
    if (event.originalEvent.data.timing.visitStart) {
      $('img')
        .addClass('animated fadeIn')
        .one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(){
          $('img').removeClass('animated');
        });
    }else{
      $('img').removeClass('hide')
    }
});
</script>

  </body>
        <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</html>