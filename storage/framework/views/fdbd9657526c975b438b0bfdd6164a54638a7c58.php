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
                                <a href="<?php echo e(url('startup/dashboard')); ?>" <?php if(Request::route()->getName() == 'dashboard'): ?> class="active" <?php endif; ?>>
                                    <i class="list-item-icon dashboard-nav-icon svg-sprite"></i>
                                    <span class="list-item-text">Dashboard</span>
                                </a>
                            </li>
                            
                            <li class="sidebar-list-item">
                                <a href="<?php echo e(route('manage_ico')); ?>"  <?php if(Request::route()->getName() == 'manage_ico'): ?> class="active" <?php endif; ?>>
                                    <i class="list-item-icon manage-ico-nav-icon svg-sprite"></i>
                                    <span class="list-item-text">Manage ICO</span>
                                </a>
                            </li>
                            
                            <li class="sidebar-list-item">
                                <a href="#"  <?php if(Request::route()->getName() == 'manage_bounty'): ?> class="active" <?php endif; ?>>
                                    <i class="list-item-icon manage-ico-nav-icon svg-sprite"></i>
                                    <span class="list-item-text">Manage Bounty</span>
                                </a>
                            </li>
                            
                            <li class="sidebar-list-item">
                                <a href="#"  <?php if(Request::route()->getName() == 'whitepaper_module'): ?> class="active" <?php endif; ?>>
                                    <i class="list-item-icon manage-ico-nav-icon svg-sprite"></i>
                                    <span class="list-item-text">Whitepaper Module</span>
                                </a>
                            </li>
                            
                            <li class="sidebar-list-item">
                                <a href="#"  <?php if(Request::route()->getName() == 'expert_service'): ?> class="active" <?php endif; ?>>
                                    <i class="list-item-icon manage-ico-nav-icon svg-sprite"></i>
                                    <span class="list-item-text">Expert Services</span>
                                </a>
                            </li>
                            
                            <li class="sidebar-list-item">
                                <a href="#"  <?php if(Request::route()->getName() == 'weicubator'): ?> class="active" <?php endif; ?>>
                                    <i class="list-item-icon manage-ico-nav-icon svg-sprite"></i>
                                    <span class="list-item-text">Weicubator</span>
                                </a>
                            </li>
                             <?php if(Request::route()->getName() == 'add_ico'): ?>
                            <li class="hidden-lg external-list-item"><a class="header-link highlight-link" href="<?php echo e(url('/startup/dashboard')); ?>">My Account</a></li>
                            <?php else: ?>
                            <li class="hidden-lg external-list-item"><a class="header-link highlight-link" target="_blank" href="http://weicrowd.com">Visit WeiCrowd.com</a></li>
                            <?php endif; ?>
                            
                            
                            
                            <?php if(Auth::user()->user_type != 'S'): ?>
                            <li class="hidden-lg external-list-item"><a class="header-link theme-color" href="<?php echo e(route('kyc')); ?>">Update KYC</a></li>
                            <?php endif; ?>

                            <li class="hidden-lg external-list-item"><a href="#">Logout</a></li>
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

