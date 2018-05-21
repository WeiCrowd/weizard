<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119352640-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-119352640-1');
</script>
  
    
<!-- Meta Tags -->
<meta charset="utf-8" />

<meta name="@yield('metaName')" content="@yield('pageMetaDes')">
<link rel="canonical" href="@yield('canonicalURL')" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="theme-color" content="#326ff9" />
<link rel="shortcut icon" href="{{ asset('content/favicons/favicon.ico') }}" type="image/x-icon" />
<link rel="apple-touch-icon" href="{{ asset('content/favicons/apple-touch-icon.png') }}" />
<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('content/favicons/apple-touch-icon-57x57.png') }}" />
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('content/favicons/apple-touch-icon-72x72.png') }}" />
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('content/favicons/apple-touch-icon-76x76.png') }}" />
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('content/favicons/apple-touch-icon-114x114.png') }}" />
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('content/favicons/apple-touch-icon-120x120.png') }}" />
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('content/favicons/apple-touch-icon-144x144.png') }}" />
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('content/favicons/apple-touch-icon-152x152.png') }}" />
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('content/favicons/apple-touch-icon-180x180.png') }}" />

<!-- Page Title & Favicon -->
<title>@yield('pageTitle')</title>

<!-- Stylesheets -->
<link rel="stylesheet" href="{{ asset('content/css/bootstrap.min.css') }}" />
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('scripts/plugins/sklib-lightbox/lightbox/skLib.lightbox.min.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('scripts/plugins/select2/css/select2.min.css') }}" />
<!--<link rel="stylesheet" href="{{ asset('scripts/plugins/flipclock/flipclock.css') }}" />-->
<link rel="stylesheet" href="{{ asset('scripts/plugins/owlcarousel/dist/assets/owl.carousel.min.css') }}" />
<link rel="stylesheet" href="{{ asset('content/css/animate.min.css') }}" />
<link rel="stylesheet" href="{{ asset('content/css/site.css') }}" />
<link rel="stylesheet" href="{{ asset('content/css/custom.css') }}" />

<!-- Stylesheets -->

@yield('css')
</head>
<body>

<div id="container">

    @include('front.common.header')

    @section('content')
        All content goes here
    @show

    @include('front.common.footer')

</div>
 
     

<!-- Scripts -->
<script src="{{ asset('scripts/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('scripts/head.core.min.js') }}"></script>
<script src="{{ asset('scripts/wow.min.js') }}"></script>
<script src="{{ asset('scripts/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('scripts/jquery.matchHeight-min.js') }}"></script>
<script src="{{ asset('scripts/plugins/sklib-lightbox/lightbox/skLib.lightbox.min.js') }}"></script>
<script src="{{ asset('scripts/plugins/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('scripts/plugins/flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('scripts/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('scripts/jquery.debouncedresize.min.js') }}"></script>
<script src="{{ asset('scripts/plugins/jquery.countdown/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('scripts/plugins/owlcarousel/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('scripts/Custom.js') }}"></script>
<script src="{{ asset('scripts/bootstrap.js') }}"></script> 


@yield('jscript')
</body>
</html>


