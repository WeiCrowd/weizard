<?php $__env->startSection('content'); ?>
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">2FA</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/2fa/validate" autocomplete="off">
                        <?php echo csrf_field(); ?>


                        <div class="form-group<?php echo e($errors->has('totp') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">One-Time Password</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="totp">

                                <?php if($errors->has('totp')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('totp')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Validate
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>