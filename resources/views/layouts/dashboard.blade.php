<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8" />
    <meta name="description" content="" />
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
    <link rel="stylesheet" href="{{ asset('scripts/plugins/owlcarousel/dist/assets/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('content/css/animate.min.css') }}" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <link rel="stylesheet" href="{{ asset('content/css/site.css') }}" />
     <link rel="stylesheet" href="{{ asset('content/css/custom.css') }}" />
    <!-- Datetimepicker css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('/css/datetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css"/>
    
    <!-- Stylesheets -->
    @yield('css')
</head>
<body>
    <!-- Container -->
    <div id="container" class="dashboard-area">

   @include('front.common.dashboard-header')

    @section('content')
        All content goes here
    @show
 
    </div>

    <!-- Scripts -->
    <script src="{{ asset('scripts/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('scripts/head.core.min.js') }}"></script>
    <script src="{{ asset('scripts/wow.min.js') }}"></script>
    <script src="{{ asset('scripts/plugins/owlcarousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('scripts/plugins/jquery.countdown/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('scripts/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('scripts/custom-file-input.js') }}"></script>
    
    <!--Dashboard Charts-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <script src="{{ asset('scripts/plugins/chart.js/Chart.bundle.js') }}"></script>
    <script src="{{ asset('scripts/plugins/chart.js/utils.js') }}"></script>
    <!-- End -->

    <script src="{{ asset('scripts/Custom.js') }}"></script>
    <!-- Validation -->
    <script src="{{ asset('assets/front/js/validate.js') }}" type="text/javascript"></script>
    <!-- Datetimepicker js -->
    <script src = "{{ asset('/js/datetimepicker/bootstrap-datetimepicker.js') }}" ></script>
    <script src="{{ asset('scripts/bootstrap.js') }}"></script>


@yield('jscript')
</body>
</html>


