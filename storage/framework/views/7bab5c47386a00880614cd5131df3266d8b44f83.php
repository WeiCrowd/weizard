<?php $__env->startSection('content'); ?>


    <!-- Container -->
    <div id="container" class="dashboard-area">
<div class="flash-message" id="iframeMessage">  
                        <div class="admin-alert-msg alert alert-success" style="display:none;z-index: 1000 !important;" id="customSuccessFlash" ><span></span><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
                        <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(Session::has('alert-' . $msg)): ?>
                        <div class="admin-alert-msg alert alert-<?php echo e($msg); ?>  text-center"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <div class="login-form-wrap text-center">
                <a href="<?php echo e(url('/')); ?>" class="logo"><img width="220" src="content/images/logo-alt.svg" alt="Logo" /></a>

                <!-- Box -->
                <div class="box login-box">
                    <h1 class="box-heading">Login</h1>
<!--                    <a href="#" class="primary-btn full-width marB30"><img class="btn-icon" src="content/images/google-icon.svg" alt="Google" />Login with Google</a>
                    <div class="content-divider marB30"><span class="content-divider-text">OR</span></div>-->
<span class="text-danger"><?php echo e($errors->first('error_msg')); ?></span>
                    <!-- Form -->
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>

                    <div class="form">
                        <div class="form-group">
                            <?php echo e(Form::text('email', '', ['class' => 'form-control','placeholder'=>Lang::get('common.Email'),'id'=>'email'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo e(Form::password('password', ['class' => 'form-control','placeholder'=>Lang::get('common.Password') , 'id' => 'password'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                            
                            <div class="text-right marT5">
                                <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">Forgot Password?</a>
                            </div>
                        </div>
                        
                       <div class="form-group">
                            <div class="g-recaptcha recaptcha-bx" data-sitekey="<?php echo e(env('CAPTCHA_SITEKEY')); ?>"></div>
                            <span class="text-danger"><?php echo e($errors->first('captcha')); ?></span>
                        </div>
                        
                        
                        <div class="form-group">
                            <button type="submit" class="primary-btn theme2-btn marB20 full-width">
                                    Login
                                </button>
                            
                            
<!--                            <small class="form-note">Signing up signifies you have read and agree to our <a class="text-link" href="#" target="_blank">Terms of Service</a> and <a class="text-link" href="#" target="_blank">Privacy Policy</a></small>-->
                        </div>
                    </div>
                    </form>
                    <!-- Form -->

                </div>
                <!-- Box -->

                <p class="marB0 marT20">Don't have an account? <a href="<?php echo e(url('/register')); ?>">Sign Up for Free</a></p>

            </div>
        </div>
        <!-- Dashboard Content -->


    </div>
    <!-- Container -->

   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plane', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>