<header class="main-header">
    <a href="{{ route('dashboard') }}" class="logo">
        <span class="logo-mini">
            <!--<b>A</b>BD-->
            <img src="{{ asset('content/images/weizard_white.svg') }}" alt="">
        </span>
        <span class="logo-lg">
            <!--<b>Admin</b>BD-->
            <img src="{{ asset('content/images/weizard_white.svg') }}" alt="">
        </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
            <span class="sr-only">Toggle navigation</span>
            <span class="pe-7s-keypad"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages -->
<!--                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-mail"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                            <ul class="menu">
                                <li> start message 
                                    <a href="#">
                                        <div class="pull-left"><img src="{{ asset('assets/dist/img/avatar.png') }}" class="img-circle" alt="User Image"></div>
                                        <h4>Support Team<small><i class="fa fa-clock-o"></i> 5 mins</small></h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left"><img src="{{ asset('assets/dist/img/avatar2.png') }}" class="img-circle" alt="User Image"></div>
                                        <h4>AdminLTE Design Team<small><i class="fa fa-clock-o"></i> 2 hours</small></h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left"><img src="{{ asset('assets/dist/img/avatar3.png') }}" class="img-circle" alt="User Image"></div>
                                        <h4>Developers<small><i class="fa fa-clock-o"></i> Today</small></h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left"><img src="{{ asset('assets/dist/img/avatar4.png') }}" class="img-circle" alt="User Image"></div>
                                        <h4>Sales Department<small><i class="fa fa-clock-o"></i> Yesterday</small></h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left"><img src="{{ asset('assets/dist/img/avatar5.png') }}" class="img-circle" alt="User Image"></div>
                                        <h4>Reviewers<small><i class="fa fa-clock-o"></i> 2 days</small></h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                 Notifications 
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-speaker"></i>
                        <span class="label label-warning">8</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <ul class="menu">
                                <li><a href="#"><i class="ti-user color-gray"></i> 5 new members joined today </a></li>
                                <li><a href="#"><i class="ti-announcement color-green"></i> Very long description here that may not fit into the page and may cause design problems</a></li>
                                <li><a href="#"><i class="fa fa-users"></i> 5 new members joined</a></li>
                                <li><a href="#"><i class="ti-shopping-cart color-violet"></i> 25 sales made</a></li>
                                <li><a href="#"><i class="ti-twitter color-info"></i>  3 New Followers</a></li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>-->
                <!-- Tasks -->
<!--                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-flag"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                            <ul class="menu">
                                <li>  Task item 
                                    <a href="#">
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                                                <span class="sr-only">30% Complete (primary)</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>  end task item 
                                <li>  Task item 
                                    <a href="#">
                                        <h3>
                                            Create a nice theme
                                            <small class="pull-right">40%</small>
                                        </h3>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                <span class="sr-only">40% Complete (primary)</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>  end task item 
                                <li>  Task item 
                                    <a href="#">
                                        <h3>
                                            Some task I need to do
                                            <small class="pull-right">60%</small>
                                        </h3>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                <span class="sr-only">60% Complete (info)</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>  end task item 
                                <li>  Task item 
                                    <a href="#">
                                        <h3>
                                            Make beautiful transitions
                                            <small class="pull-right">80%</small>
                                        </h3>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                <span class="sr-only">80% Complete (warning)</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                 end task item 
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li>-->
                <!-- settings -->
<!--                <li class="dropdown dropdown-user">
                    <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    
                </li>-->
                
                <li class="dropdown dropdown-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="pe-7s-settings"></i></a>
                    <ul class="dropdown-menu">
<!--                        <li><a href="{{ route('admin_profile') }}"><i class="pe-7s-users"></i>User Profile</a></li>
                        <li><a href="{{ route('admin_site_setting') }}"><i class="pe-7s-settings"></i>Site Settings</a></li>-->
                        <li>
                          <a href="{{ url('/logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              <i class="pe-7s-key"></i> Logout
                          </a>

                          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                        </li>
                    </ul>
                </li>
                
                
            </ul>
        </div>
    </nav>
</header>