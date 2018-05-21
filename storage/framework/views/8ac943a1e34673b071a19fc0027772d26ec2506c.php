<!-- Dashboard Sidebar -->

<aside class="dashboard-sidebar widget">

                    <!-- User Panel -->
                    <div class="sidebar-user-panel text-center">
                        <h3><?php echo e(ucwords(Auth::user()->name)); ?></h3>
                    <h5>( Unique ID : <?php echo e(Auth::user()->customer_id); ?>)</h5>
                    </div>
                    <!-- User Panel -->

                    <!-- Sidebar Nav -->
                    <nav class="sidebar-navigation">
                        <ul class="sidebar-list">
                            <li class="sidebar-list-item">
                                <a href="<?php echo e(route('manage_ico')); ?>"  <?php if(Request::route()->getName() == 'manage_ico'): ?> class="active" <?php endif; ?>>
                                    <i class="list-item-icon manage-ico-nav-icon svg-sprite"></i>
                                    <span class="list-item-text">Add ICO Listing</span>
                                </a>
                            </li>  
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
                        <a href="mailto:support@weizard.com">support@weizard.com</a>
                    </div>
                    <!-- User Footer -->

                </aside>

