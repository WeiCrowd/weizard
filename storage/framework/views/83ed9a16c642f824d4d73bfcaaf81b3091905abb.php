<!-- Dashboard Sidebar -->

<aside class="dashboard-sidebar widget">

                    
                    <!-- Sidebar Nav -->
                    <nav class="sidebar-navigation">
                        <ul class="sidebar-list">
                            <li class="weis-balance hidden-lg external-list-item"><span class="text">WEIS Balance: </span><span class="value"><?php echo e(Auth::user()->totToken?number_format(Auth::user()->totToken):'0'); ?></span></li>
                            <li class="hidden-lg external-list-item"><a class="header-link highlight-link" href="<?php echo e(url('startup/manage-ico')); ?>">My Account</a></li>
                            
                            <li class="hidden-lg external-list-item">  <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out">&nbsp;</i>
                                            <?php echo e(Lang::get('common.logout')); ?>

                                        </a> 
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

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

