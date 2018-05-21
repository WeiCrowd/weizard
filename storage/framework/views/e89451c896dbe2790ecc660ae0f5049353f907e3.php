<?php $__env->startSection('content'); ?>
<?php 
$arrCountry = App\Helpers\Helper::getAlCountries();
 ?>
<div id="container" class="dashboard-area">
       
       <!-- Dashboard Content -->
            <div class="dashboard-content">
            
            
        <div class="login-form-wrap text-center">
            <a href="<?php echo e(url('/')); ?>" class="logo"><img width="220" src="content/images/logo-alt.svg" alt="Logo" /></a>

                <!-- Box -->
                <div class="box login-box">
                    <h1 class="box-heading">ICO Listing</h1>

                    <!-- Form -->
                    <form class="form-horizontal" method="POST" id="register_form" action="<?php echo e(route('saveIcolisting')); ?>">
                        <?php echo e(csrf_field()); ?>

                    <div class="form">
                       
                        <div class="form-group">
                            <?php echo e(Form::text('name', '', ['class' => 'form-control','placeholder'=>Lang::get('common.Name'),'id'=>'name', 'autofocus'=>true])); ?>

                            <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo e(Form::text('email', '', ['class' => 'form-control','placeholder'=>Lang::get('common.Email'),'id'=>'email'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                        </div>
                        
                        <div class="form-group">
                            <?php echo e(Form::password('password', ['class' => 'form-control','placeholder'=>Lang::get('common.Password') , 'id' => 'password'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo e(Form::password('password_confirmation', ['class' => 'form-control','placeholder'=>Lang::get('common.Confirm_Password'),'id'=>'confirm_password'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('password_confirmation')); ?></span>
                            
                        </div>
                        <div class="form-group">
                            <?php echo e(Form::tel('mobile',@$data->mobile, ['class' => 'form-control','id'=>'phone','placeholder'=>Lang::get('common.Mobile')])); ?>

                            <span class="text-danger"><?php echo e($errors->first('mobile')); ?></span>
                               
                        </div>
                        
                        <div class="form-group">
                           <?php echo e(Form::select('citizenship',[''=>'Select Country']+@$arrCountry,'', ['class' => 'form-control' , 'id' => 'citizenship'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('citizenship')); ?></span>
                        </div>
                        
                       
                        <div class="form-group">
                            <div class="g-recaptcha recaptcha-bx" data-sitekey="<?php echo e(env('CAPTCHA_SITEKEY')); ?>"></div>
                            <span class="text-danger"><?php echo e($errors->first('captcha')); ?></span>
                        </div>
                        
                        
                        
                        <div class="form-group">
                            <button type="submit" class="primary-btn theme2-btn marB20 full-width">
                                    SignUp
                                </button>
                            
                            <small class="form-note">Signing up signifies you have read and agree to our <a class="text-link" href="#" target="_blank">Terms of Service</a> and <a class="text-link" href="#" target="_blank">Privacy Policy</a></small>
                        </div>
                    </div>
                    </form>
                    <!-- Form -->

                </div>
                <!-- Box -->

                <p class="marB0 marT20">Already have an account? <a href="<?php echo e(url('/login')); ?>">Login</a></p>

            </div>
        </div>
        <!-- Dashboard Content -->

    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('jscript'); ?>
<script type="text/javascript">
$(document).ready(function () {
    $('input[type="radio"]').click(function(){
        if($(this).val() == 'startup'){
                $('#register_form').attr('action', '/startup-saveregister');
            }else{
                $('#register_form').attr('action', '/register');
            }
    });
    
    
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plane', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>