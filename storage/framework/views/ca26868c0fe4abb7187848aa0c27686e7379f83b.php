<aside class="main-sidebar">
    <!-- sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel text-center">
            <div class="image">
                
                <?php if(Auth::user()->user_photo != ''): ?>
                <img class="img-circle" alt="User Image" 
                     src="<?php echo e(url('/')); ?>/admin_image/<?php echo e(Auth::user()->user_photo); ?>" />
                <?php else: ?>
                <img src="<?php echo e(asset('assets/dist/img/user2-160x160.png')); ?>" class="img-circle" alt="User Image">
                <?php endif; ?>
                 
            </div>
            <div class="info">
                <p>

                </p>
                <?php if(count(Auth::user())>0): ?>
                 <a href="#"><i class="fa fa-circle text-success"></i><?php echo e(ucwords(Auth::user()->name)); ?><br><?php echo e(ucwords(Auth::user()->email)); ?></a>
                <?php endif; ?>
            </div>
        </div>
    
        <!-- sidebar menu -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="<?php echo e(route('admin.dashboard')); ?>"><i class="ti-home"></i> <span>Dashboard</span>
                    
                </a>
            </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_users')): ?>
<!--            <li class="treeview">
                <a href="#">
                    <i class="ti-paint-bucket"></i><span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                
                <ul class="treeview-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('investor.index')): ?>
                    <li><a href="<?php echo e(url('admin/investor')); ?>"><span>Manage Investor</span></a></li>
                    <?php endif; ?>
                 
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('startup.index')): ?>
                    <li><a href="<?php echo e(url('admin/startup')); ?>"><span>Manage Startup</span></a></li>
                    <?php endif; ?>
                </ul>
            </li>-->
            <?php endif; ?>
            
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_startup')): ?>
            <li class="treeview">
                <a href="#">
                    <i class="ti-paint-bucket"></i><span>Startup</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                
                <ul class="treeview-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ico.index')): ?>
                    <li><a href="<?php echo e(url('admin/ico')); ?>"><span>Manage ICO</span></a></li>
                    <?php endif; ?>
                </ul>

                <ul class="treeview-menu">
                    <li><a href="<?php echo e(url('admin/icocategory')); ?>"><span>ICO Category</span></a></li>                    
                </ul>   
                
                
            </li>
            <?php endif; ?>
            
            <?php if(Auth::user()->user_type == 'A'): ?>
<!--            <li class="treeview">
                <a href="#">
                    <i class="ti-spray"></i>
                    <span>AMS</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(url('admin/user')); ?>">Users</a></li>
                    <li class="<?php echo e(''); ?>"><a href="<?php echo e(route('admin_role')); ?>">Role</a></li>
                    <li class="<?php echo e(Request::is('role-permission')?'active':''); ?>"><a href="<?php echo e(route('admin_role_permission')); ?>">ACL</a></li>
                </ul>
            </li>-->
            <?php endif; ?>

    
        </ul>
    </div> <!-- /.sidebar -->
</aside>
