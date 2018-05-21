<?php $__env->startSection('content'); ?>

<div id="container" class="dashboard-area">
<section class="register_page">
	<div class="container">
		<div class="row">
 <div class="flash-message" id="iframeMessage">  
    <div class="admin-alert-msg alert alert-success" style="display:none;z-index: 1000 !important;" id="customSuccessFlash" ><span></span><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
    <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(Session::has('alert-' . $msg)): ?>
    <div class="admin-alert-msg alert alert-<?php echo e($msg); ?>  text-center"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="dashboard-content">
            <div class="login-form-wrap text-center">
                <a href="<?php echo e(url('/')); ?>" class="logo"><img width="220" src="<?php echo e(asset('content/images/logo-alt.svg')); ?>" alt="Logo" /></a>
                <div class="box login-box">
                    <h1 class="box-heading">Forgot Password</h1>   
			<div class="form">
                            
                            <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    
                    
                            <form class="form-horizontal" method="POST" action="<?php echo e(route('password.email')); ?>">
                                        <?php echo e(csrf_field()); ?>

					
					<div class="row form-group">
						<div class="col-sm-12">
							<?php echo e(Form::text('email', '', ['class' => 'form-control','placeholder'=>'Email','id'=>'email'])); ?>

                                                    <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
						</div>						
					</div>
                                        
                                        <div class="row">
						<div class="col-sm-12">
							<input type="submit" class="primary-btn theme2-btn marB20 full-width" value="Send Password Reset Link" class="form-control"/>
						</div>						
					</div>	
				</form>
			</div>
            
            </div>
            </div>
            </div>
		</div>
	</div>
</section>
</div>


<!--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <form class="form-horizontal" method="POST" action="<?php echo e(route('password.email')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plane', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>