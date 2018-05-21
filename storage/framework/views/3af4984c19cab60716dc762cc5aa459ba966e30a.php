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
                    <?php if(@$errors): ?>
                    <p class="text-danger"><strong><?php echo e($errors->first('error_msg')); ?></strong></p>
                    <?php endif; ?>
                    <!-- Form -->
                        <?php echo e(Form::open(['method' => 'POST','autocomplete'=>'off', 'url'=> route('login'),  'class'=>'form-horizontal'])); ?>

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
                            <div class="marB20"><img src="<?php echo e(captcha_src()); ?>" alt="captcha" class="captcha-image" data-refresh-config="default"></div>
                            <span class="captcha-img text-success pull-right marB20" style="cursor:pointer;" data-refresh-config="default"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp;Refresh Captcha</span>
                            <input type="text" name="captcha" class="form-control" placeholder = "Enter Text Here!">
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

                <p class="marB0 marT20">Don't have an account? <a href="<?php echo e(url('/icolisting')); ?>">Sign Up for Free</a></p>

            </div>
        </div>
        <!-- Dashboard Content -->


    </div>
    <!-- Container -->

   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscript'); ?>
<script type="text/javascript">
 $('.captcha-img').on('click', function () {
    var captcha = $(this);
    var config = captcha.data('refresh-config');
    $.ajax({
        method: 'GET',
        url: '/get_captcha/' + config,
    }).done(function (response) {
        $(".captcha-image").prop('src', response);
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.plane', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>