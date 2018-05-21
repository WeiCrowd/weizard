<aside class="main-sidebar">
    <!-- sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <!-- sidebar menu -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="<?php echo e(route('admin.dashboard')); ?>"><i class="ti-home"></i> <span>Dashboard</span>
                    
                </a>
            </li>
       
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_startup')): ?>
            <li class="treeview <?php echo e(@$startup_active); ?>">
                <a href="#">
                    <i class="ti-paint-bucket"></i><span>Startup</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                
                <ul class="treeview-menu">
                    <li class="<?php echo e(@$ico_category_active); ?>"><a href="<?php echo e(url('admin/icocategory')); ?>"><span>ICO Category</span></a></li>                    
                </ul>   
                
                <ul class="treeview-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ico.index')): ?>
                    <li class="<?php echo e(@$ico_active); ?>"><a href="<?php echo e(url('admin/ico')); ?>"><span>Manage ICO</span></a></li>
                    <?php endif; ?>
                </ul>                   
            </li>
            <?php endif; ?>            
        </ul>
    </div> <!-- /.sidebar -->
</aside>
