<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
<base href="/public">
    <!-- Required meta tags -->
    <x-embed-styles />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="{{\App\Models\Site::first()->description}}" />
<meta name="keywords" content="{{\App\Models\Site::first()->name}} , bootstrap, bootstrap 5, Course, Sass, landing, Marketing, admin themes, bootstrap admin, bootstrap dashboard, ui kit, web app, multipurpose" />
 {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> --}}
    
<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="{{\App\Models\Site::first()->faviconPath}}">

  {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}" data-turbolinks-track="reload"> --}}
<!-- Libs CSS -->

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

<link rel="stylesheet" type="text/css" href="assets/vendor/glightbox/css/glightbox.css">
  <link rel="stylesheet" type="text/css" href="assets/vendor/aos/aos.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Theme CSS -->
<link rel="stylesheet" href="../node_modules/@yaireo/tagify/dist/tagify.css">
<link rel="stylesheet" href="../../assets/css/theme.min.css">
<x-embed-styles />
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
    <title>{{\App\Models\Site::first()->name}} </title>
  @livewireStyles
  </head>
    
<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <!-- Navbar -->
    
@include('navbar.navbar-user')


 <!-- placement -->

@yield('content')
 {{-- @include('cookieConsent::index')  --}}

  <!-- Footer -->
  @if (!Request::routeIs('courses.resume'))
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
                    {{-- <a class="nav-link" href="#">Terms </a>
                    <a class="nav-link" href="#">Feedback</a>
                    <a class="nav-link" href="#">Support</a>
                </nav> --}}
            </div>
        </div>
    </div>
</div>
@endif




    <!-- Script -->


    @livewireScripts
      <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
{{-- <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script> --}}
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://www.paypal.com/sdk/js?client-id={{config('services.paypal.client_id')}}&vault=true&intent=subscription"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine.js" integrity="sha512-nIwdJlD5/vHj23CbO2iHCXtsqzdTTx3e3uAmpTm4x2Y8xCIFyWu4cSIV8GaGe2UNVq86/1h9EgUZy7tn243qdA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ mix('js/app.js') }}"></script>
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
    </script>
   --}}
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

<!-- Vendors -->
<script src="assets/vendor/tiny-slider/tiny-slider.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.js"></script>
<script src="assets/vendor/purecounterjs/dist/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>

</body>
</html>