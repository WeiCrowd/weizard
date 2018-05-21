<header id="header">
            <div class="container">
                <div class="row">

                    <!-- Logo -->
                    <div class="col-lg-2 col-xs-8 logo">
                        <a href="<?php echo e(url('/')); ?>"><img width="186" src="<?php echo e(asset('content/images/weizard_white.svg')); ?>" alt="Logo" /></a>
                    </div>
                    <!-- Logo -->

                    <!-- Main Navigation -->
                    <div class="col-lg-10 col-xs-12 main-navigation-wrap text-right ">
                        <nav id="main-navigation">
                            <ul class="menu">
                                <li class="ico-sale"><a href="https://www.weicrowd.com/" target="_blank"><img src="<?php echo e(asset('content/images/ico-sale.png')); ?>" alt=""></a></li>
                                <li><a href="https://www.weicrowd.com/" target="_blank">Visit WeiCrowd</a></li>
                                <li><a href="https://medium.com/weicrowd" target="_blank">Blog</a></li>
                                
                                <?php if(Auth::check()): ?>
                                    <?php if(Auth::user()->user_type == 'A'): ?>
                                        <li><a href="<?php echo e(url('admin/dashboard')); ?>">My Account</a></li>
                                    <?php elseif(Auth::user()->user_type == 'S'): ?>    
                                        <li><a href="<?php echo e(url('startup/manage-ico')); ?>">My Account</a></li>
                                        <li>  <a class="nav-link" href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out">&nbsp;</i>
                                            <?php echo e(Lang::get('common.logout')); ?>

                                        </a> 
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form></li>
                                    <?php else: ?> 
                                        <li><a href="<?php echo e(url('home')); ?>">My Account</a></li>
                                        <li>  <a class="nav-link" href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out">&nbsp;</i>
                                            <?php echo e(Lang::get('common.logout')); ?>

                                        </a> 
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form></li>
                                    <?php endif; ?>
                                
                                <?php else: ?>
                                    <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                                    <li><a href="<?php echo e(url('/icolisting')); ?>">Signup</a></li>
                                <?php endif; ?>
                                
                                <li><a href="https://t.me/WeiCrowd" target="_blank"><i class="telegram-nav svg-sprite nav-link"></i>Telegram</a></li>
<!--                                <li><a href="<?php echo e(url('meet-us')); ?>" class="primary-btn">Meet Us</a></li>-->
                                
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