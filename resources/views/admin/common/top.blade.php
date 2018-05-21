<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>WeiCrowd Admin Dashboard</title>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="{{ asset('images/fevicon.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('assets/dist/img/ico/apple-touch-icon-57-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('assets/dist/img/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('assets/dist/img/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('assets/dist/img/ico/apple-touch-icon-144-precomposed.png') }}">

    <!-- Start Global Mandatory Style
    =====================================================================-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i" rel="stylesheet" type="text/css"/>
    <!-- jquery-ui css -->
    <link href="{{ asset('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap -->
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap rtl -->
    <!--<link href="{{ asset('assets/bootstrap-rtl/bootstrap-rtl.min.css') }}" rel="stylesheet" type="text/css"/>-->
    <!-- Lobipanel css -->
    <link href="{{ asset('assets/plugins/lobipanel/lobipanel.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Pace css -->
    <link href="{{ asset('assets/plugins/pace/flash.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Font Awesome -->
    <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Pe-icon -->
    <link href="{{ asset('assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Themify icons -->
    <link href="{{ asset('assets/themify-icons/themify-icons.css') }}" rel="stylesheet" type="text/css"/>
    <!-- End Global Mandatory Style
    =====================================================================-->
    
    <!-- Theme style -->
    <link href="{{ asset('assets/dist/css/styleBD.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Theme style rtl -->
    <!--<link href="{{ asset('assets/dist/css/styleBD-rtl.css') }}" rel="stylesheet" type="text/css"/>-->
    <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">
    
    <link href="{{ asset('/css/datetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css"/>
    
    
    @yield('css')
    
    <style>
      .pagination {
        margin: 0px !important;
      }
      .pe-7s-help1 {
        color: #ddd;
        font-size: 16px;
        font-weight: 600;
      }
      .help-span:hover {
        background-color: rgba(0, 0, 0, 0.15);
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
        cursor: pointer;
      }
      .help-span {
        display: block;
        padding: 7px 5px 4px;
      }
    </style>
    
</head>