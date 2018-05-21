<!DOCTYPE html>
<html lang="en">

    @include('admin.common.top')

    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            @include('admin.common.header')
            <!-- =============================================== -->

            <!-- Left side column. contains the sidebar -->
            @include('admin.common.left')

            <!-- =============================================== -->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="header-icon">
                        <i class="@yield('head_icon')"></i>
                        
                    </div>
                    <div class="header-title">
                        <h1>
                            @yield('heading')
                        </h1>
                        <small>
                            @yield('sub_heading')
                        </small>

                        <ol class="breadcrumb">
                            <li><a href="{{ url('admin/dashboard') }}"><i class="pe-7s-home"></i> Home</a></li>
                            <li class="active">@yield('breadcrumb')</li>
                        </ol>
                    </div>
                </section>
                

                <!-- Main content -->
                <section class="content">
                    <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                    <div class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
                    @endif
                    @endforeach
                </div>
                    @section('content')
                    All content goes here
                    @show
                </section>

            </div>
            @include('admin.common.footer')
        </div>

        @include('admin.common.bottom')

        @yield('jscript')

    </body>
</html>