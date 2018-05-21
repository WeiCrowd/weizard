<!-- Dashboard Sidebar -->

<aside class="dashboard-sidebar widget">

                    
                    <!-- Sidebar Nav -->
                    <nav class="sidebar-navigation">
                        <ul class="sidebar-list">
                            <li class="weis-balance hidden-lg external-list-item"><span class="text">WEIS Balance: </span><span class="value">{{ Auth::user()->totToken?number_format(Auth::user()->totToken):'0' }}</span></li>
                            <li class="hidden-lg external-list-item"><a class="header-link highlight-link" href="{{ url('startup/manage-ico')}}">My Account</a></li>
                            
                            <li class="hidden-lg external-list-item">  <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out">&nbsp;</i>
                                            {{ Lang::get('common.logout') }}
                                        </a> 
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
                        </ul>
                    </nav>
                    <!-- Sidebar Nav -->

                    <!-- User Footer -->
                    <div class="sidebar-footer text-center">
<!--                        <p><a href="#" class="theme-color medium-font float-btn float-md">Save and Exist</a></p>-->
                        <a href="mailto:support@weicrowd.com">support@weicrowd.com</a>
                    </div>
                    <!-- User Footer -->

                </aside>

