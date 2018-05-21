<!DOCTYPE html>
<html lang="en">

    <?php echo $__env->make('admin.common.top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- =============================================== -->

            <!-- Left side column. contains the sidebar -->
            <?php echo $__env->make('admin.common.left', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <!-- =============================================== -->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="header-icon">
                        <i class="<?php echo $__env->yieldContent('head_icon'); ?>"></i>
                        
                    </div>
                    <div class="header-title">
                        <h1>
                            <?php echo $__env->yieldContent('heading'); ?>
                        </h1>
                        <small>
                            <?php echo $__env->yieldContent('sub_heading'); ?>
                        </small>

                        <ol class="breadcrumb">
                            <li><a href="<?php echo e(url('admin/dashboard')); ?>"><i class="pe-7s-home"></i> Home</a></li>
                            <li class="active"><?php echo $__env->yieldContent('breadcrumb'); ?></li>
                        </ol>
                    </div>
                </section>
                

                <!-- Main content -->
                <section class="content">
                    <div class="flash-message">
                    <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(Session::has('alert-' . $msg)): ?>

                    <div class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                    <?php $__env->startSection('content'); ?>
                    All content goes here
                    <?php echo $__env->yieldSection(); ?>
                </section>

            </div>
            <?php echo $__env->make('admin.common.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

        <?php echo $__env->make('admin.common.bottom', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->yieldContent('jscript'); ?>

    </body>
</html>