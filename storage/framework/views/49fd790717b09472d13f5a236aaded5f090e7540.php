<header class="dashboard-header text-center-xs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-8 text-left-xs">
                        <a href="<?php echo e(url('/')); ?>" class="logo"><img src="<?php echo e(asset('content/images/logo-alt.svg')); ?>" alt="Logo" /></a>
                    </div>
                    <div class="col-sm-6 col-xs-4 text-right">
                        <ul class="list-inline dashboard-header-panel visible-lg ico-dashboard">
                            
                            <li class="hidden-xs weis-balance"><span class="text">WEIS Balance: </span><span class="value"><?php echo e(Auth::user()->totToken?number_format(Auth::user()->totToken):'0'); ?></span></li>
                            <li class="hidden-xs"><a class="header-link highlight-link" href="<?php echo e(url('/startup/manage-ico')); ?>">My Account</a></li>
                            
                            <?php if(Auth::user()->user_type != 'S'): ?>
                            <li class="hidden-xs"><a class="header-link theme-color" href="<?php echo e(route('kyc')); ?>">Update KYC</a></li>
                            <?php endif; ?>
                            <li><a href="javascript:;" class="header-link" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><?php echo e(Lang::get('common.logout')); ?></a>
                                                 <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form></li>
                            
                            
                             
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Dashboard Menu -->
            <div id="dashboardMenu" class="hidden-lg menu-trigger theme2">
                <span class="first line"></span>
                <span class="second line"></span>
                <span class="third line"></span>
            </div>
            <!-- Dashboard Menu -->

        </header>