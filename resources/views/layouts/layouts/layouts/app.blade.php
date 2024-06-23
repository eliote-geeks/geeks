<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="{{\App\Models\Site::first()->description}}" />
<meta name="keywords" content="Geeks UI, learn ,e-learning , Course, Sass, landing, Marketing, admin themes, bootstrap admin, students, bootstrap dashboard, ui kit, web app, multipurpose" />
{{-- <meta http-equiv="refresh" content="30"> --}}


<script defer src="{{ mix('js/app.js') }}"></script>  
  <link href="{{mix('css/app.css')}}" rel="stylesheet" data-turbolinks-track="true">
<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="{{asset(\App\Models\Site::first()->faviconPath)}}">


<!-- Libs CSS -->
  {{-- <link rel="stylesheet" href="/application-258e88d.css" data-turbolinks-track="reload"> --}}
<link href={{asset("assets/fonts/feather/feather.css")}} rel="stylesheet">
<link href={{asset("assets/libs/%40fortawesome/fontawesome-free/css/all.min.css")}} rel="stylesheet">
<link href={{asset("assets/libs/bootstrap-icons/font/bootstrap-icons.css")}} rel="stylesheet" />
<link href={{asset("assets/libs/dragula/dist/dragula.min.css" )}} rel="stylesheet" />
<link href={{asset("assets/libs/%40mdi/font/css/materialdesignicons.min.css")}} rel="stylesheet" />
<link href={{asset("assets/libs/dropzone/dist/dropzone.css")}} rel="stylesheet" />
<link href={{asset("assets/libs/magnific-popup/dist/magnific-popup.css")}} rel="stylesheet" />
<link href={{asset("assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css")}} rel="stylesheet">
<link href={{asset("assets/libs/%40yaireo/tagify/dist/tagify.css")}} rel="stylesheet">
<link href={{asset("assets/libs/tiny-slider/dist/tiny-slider.css")}} rel="stylesheet">
<link href={{asset("assets/libs/tippy.js/dist/tippy.css")}} rel="stylesheet">
<link href={{asset("assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css")}} rel="stylesheet">
<link href={{asset("assets/libs/prismjs/themes/prism-okaidia.css")}} rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<x-embed-styles />

<!-- Theme CSS -->
<link rel="stylesheet" href="assets/css/theme.min.css">
    <title>{{\App\Models\Site::first()->name}} </title>
    
</head>
<base href="/public">
@livewireStyles
<body>
    <!-- Navbar -->
@include('navbar.navbar-user')
@include('navbar.navbar-student')


@yield('content')

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

    <!-- Scripts -->
    <!-- Libs JS -->
@livewireScripts
  


 
    <script>
      window.Promise ||
        document.write(
          '<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"><\/script>'
        )
      window.Promise ||
        document.write(
          '<script src="https://cdn.jsdelivr.net/npm/eligrey-classlist-js-polyfill@1.2.20171210/classList.min.js"><\/script>'
        )
      window.Promise ||
        document.write(
          '<script src="https://cdn.jsdelivr.net/npm/findindex_polyfill_mdn"><\/script>'
        )
    </script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://www.paypal.com/sdk/js?client-id={{config('services.paypal.client_id')}}&vault=true&intent=subscription"></script>

 <script src="{{asset('js/app.js')}}"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.0.0/turbolinks.min.js" integrity="sha512-ifx27fvbS52NmHNCt7sffYPtKIvIzYo38dILIVHQ9am5XGDQ2QjSXGfUZ54Bs3AXdVi7HaItdhAtdhKz8fOFrA==" crossorigin="anonymous" referrerpolicy="no-referrer"  data-turbolinks-eval="false" data-turbolinks-suppress-warning></script> --}}
      {{-- <script src="/application-cbd3cd4.js" data-turbolinks-track="reload"></script> --}}
      {{-- <script src="{{ asset('js/app.js') }}" data-turbolinks-track="reload"></script> --}}
<script src={{asset("assets/libs/jquery/dist/jquery.min.js")}}></script>
<script src={{asset("assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js")}}></script>
<script src={{asset("assets/libs/odometer/odometer.min.js")}}></script>
<script src={{asset("assets/libs/jquery-slimscroll/jquery.slimscroll.min.js")}}></script>
<script src={{asset("assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js")}}></script>
<script src={{asset("assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js")}}></script>
<script src={{asset("assets/libs/flatpickr/dist/flatpickr.min.js")}}></script>
<script src={{asset("assets/libs/inputmask/dist/jquery.inputmask.min.js")}}></script>
<script src={{asset("assets/libs/apexcharts/dist/apexcharts.min.js")}}></script>
<script src={{asset("assets/libs/quill/dist/quill.min.js")}}></script>
<script src={{asset("assets/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js")}}></script>
<script src={{asset("assets/libs/dragula/dist/dragula.min.js")}}></script>
{{-- <script src="../assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script> --}}
<script src={{asset("assets/libs/dropzone/dist/min/dropzone.min.js")}}></script>
<script src={{asset("assets/libs/jQuery.print/jQuery.print.js")}}></script>
<script src={{asset("assets/libs/prismjs/prism.js")}}></script>
<script src={{asset("assets/libs/prismjs/components/prism-scss.min.js")}}></script>
<script src={{asset("assets/libs/%40yaireo/tagify/dist/tagify.min.js")}}></script>
<script src={{asset("assets/libs/tiny-slider/dist/min/tiny-slider.js")}}></script>
<script src={{asset("assets/libs/%40popperjs/core/dist/umd/popper.min.js")}}></script>
<script src={{asset("assets/libs/tippy.js/dist/tippy-bundle.umd.min.js")}}></script>
<script src={{asset("assets/libs/typed.js/lib/typed.min.js")}}></script>
<script src={{asset("assets/libs/jsvectormap/dist/js/jsvectormap.min.js")}}></script>
<script src={{asset("assets/libs/jsvectormap/dist/maps/world.js")}}></script>
<script src={{asset("assets/libs/datatables.net/js/jquery.dataTables.min.js")}}></script>
<script src={{asset("assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js")}}></script>
<script src={{asset("assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js")}}></script>
<script src={{asset("assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js")}}></script>
<script src={{asset("assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js")}}></script>
<script src={{asset("assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js")}}></script>
<script src="https://www.paypal.com/sdk/js?client-id=client-id={{config('services.paypal.client_id')}}&currency=USD"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine.js" integrity="sha512-nIwdJlD5/vHj23CbO2iHCXtsqzdTTx3e3uAmpTm4x2Y8xCIFyWu4cSIV8GaGe2UNVq86/1h9EgUZy7tn243qdA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Chartisan -->




<!-- Theme JS -->
<script src="{{asset('assets/js/country-states.js')}}"></script> 
<script src={{asset("assets/js/theme.min.js")}}></script>
{{-- <div class="toast" role="alert" aria-live="assertive" aria-atomic="true"> --}}

{{-- <script>
	    var botmanWidget = {
        title: "geeks" ,
	        aboutText: 'geeks',
	        introMessage: "✋ Hi! I'm form Geeks"
	    };
    </script> --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js" integrity="sha512-Y+cHVeYzi7pamIOGBwYHrynWWTKImI9G78i53+azDb1uPmU1Dz9/r2BLxGXWgOC7FhwAGsy3/9YpNYaoBy7Kzg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){window.dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-2KW04TMCJK');
</script>
<script>
    // mesage message popup notification
  @if(Session::has('message'))
$.toast({
    heading: 'Information',
    text: "{{session::get('message')}}",
    icon: 'info',
    hideAfter: 10000,   // in milli seconds
    position: 'top-right', 
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