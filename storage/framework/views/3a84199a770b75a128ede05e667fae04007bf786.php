<?php $__env->startSection('content'); ?>
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">2FA Secret Key</div>

                <div class="panel-body">
                    2FA has been removed
                    <br /><br />
                    <!--<a href="<?php echo e(url('/home')); ?>">Go Home</a>-->
                    <?php if(Auth::user()->user_type == 'A'): ?>
                    <a href="<?php echo e(url('admin/dashboard')); ?>">Go Home</a>
                    <?php elseif(Auth::user()->user_type == 'S'): ?>
                    <a href="<?php echo e(url('startup/dashboard')); ?>">Go Home</a>
                    <?php elseif(Auth::user()->user_type == 'O'): ?>
                    <a href="<?php echo e(url('admin/dashboard')); ?>">Go Home</a>
                    <?php else: ?>
                    <a href="<?php echo e(url('home')); ?>">Go Home</a>
                    <?php endif; ?>  
                </div>
            </div>
        </div>
    </div>    
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>