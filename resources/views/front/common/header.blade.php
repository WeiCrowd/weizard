<header id="header">
            <div class="container">
                <div class="row">

                    <!-- Logo -->
                    <div class="col-lg-2 col-xs-8 logo">
                        <a href="{{ url('/') }}"><img width="186" src="{{ asset('content/images/weizard_white.svg') }}" alt="Logo" /></a>
                    </div>
                    <!-- Logo -->

                    <!-- Main Navigation -->
                    <div class="col-lg-10 col-xs-12 main-navigation-wrap text-right ">
                        <nav id="main-navigation">
                            <ul class="menu">
                                <li><a href="https://www.weicrowd.com/" target="_blank">Visit WeiCrowd</a></li>
                                <li><a href="https://medium.com/weicrowd" target="_blank">Blog</a></li>
                                
                                @if (Auth::check())
                                    @if(Auth::user()->user_type == 'A')
                                        <li><a href="{{ url('admin/dashboard')}}">My Account</a></li>
                                    @elseif(Auth::user()->user_type == 'S')    
                                        <li><a href="{{ url('startup/manage-ico')}}">My Account</a></li>
                                        <li>  <a class="nav-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out">&nbsp;</i>
                                            {{ Lang::get('common.logout') }}
                                        </a> 
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
                                    @else 
                                        <li><a href="{{ url('home')}}">My Account</a></li>
                                        <li>  <a class="nav-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out">&nbsp;</i>
                                            {{ Lang::get('common.logout') }}
                                        </a> 
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
                                    @endif
                                
                                @else
                                    <li><a href="{{ url('/login')}}">Login</a></li>
                                    <li><a href="{{ url('/icolisting')}}">Signup</a></li>
                                @endif
                                
                                <li><a href="https://t.me/WeiCrowd" target="_blank"><i class="telegram-nav svg-sprite nav-link"></i>Telegram</a></li>
<!--                                <li><a href="{{url('meet-us')}}" class="primary-btn">Meet Us</a></li>-->
                                
                            </ul>
                        </nav>
                    </div>
                    <!-- Main Navigation -->

                    <!-- Mobile Menu -->
                    <div id="MobileMenu" class="hidden-lg menu-trigger">
                        <span class="first line"></span>
                        <span class="second line"></span>
                        <span class="third line"></span>
                    </div>
                    <!-- Mobile Menu -->

                </div>
            </div>
        </header>