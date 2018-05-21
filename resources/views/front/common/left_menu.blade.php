<!-- Dashboard Sidebar -->

<aside class="dashboard-sidebar widget">

                    <!-- User Panel -->
                    <div class="sidebar-user-panel text-center">
                        <h3>{{ ucwords(Auth::user()->name) }}</h3>
                    <h5>( Unique ID : {{ Auth::user()->customer_id }})</h5>
                    </div>
                    <!-- User Panel -->

                    <!-- Sidebar Nav -->
                    <nav class="sidebar-navigation">
                        <ul class="sidebar-list">
                            <li class="sidebar-list-item">
                                <a href="{{ route('manage_ico') }}"  @if(Request::route()->getName() == 'manage_ico') class="active" @endif>
                                    <i class="list-item-icon manage-ico-nav-icon svg-sprite"></i>
                                    <span class="list-item-text">Add ICO Listing</span>
                                </a>
                            </li>  
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
                        <a href="mailto:support@weizard.com">support@weizard.com</a>
                    </div>
                    <!-- User Footer -->

                </aside>

