<?php $__env->startSection('pageTitle'); ?>
Signup to Add your ICO - WeiZard
<?php $__env->stopSection(); ?>

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
                    <form class="form-horizontal" method="POST" id="register_form" action="<?php echo e(route('saveIcolisting')); ?>" autocomplete="off">
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

                             <div class="info-alert">
                                 <i class="fa fa-info"></i>
                                <div class="box-contant">
                                  This field should contain min 8 and max 15 characters with atleast 1 number, 1 alphabet, and 1 special character except .(dot), _(underscore), -(hyphen), ~(tilde).
                                </div>
                            </div>
                            <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                        </div>
                        <div class="form-group">
                            <?php echo e(Form::password('password_confirmation', ['class' => 'form-control','placeholder'=>Lang::get('common.Confirm_Password'),'id'=>'confirm_password'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('password_confirmation')); ?></span>
                            
                        </div>
                        
                        <div class="form-group">
                           <?php echo e(Form::select('citizenship',[''=>'Select Country']+@$arrCountry,'', ['class' => 'form-control' , 'id' => 'citizenship'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('citizenship')); ?></span>
                        </div>
                        
                       
                        <div class="form-group">
                            <div class="marB20"><img src="<?php echo e(captcha_src()); ?>" alt="captcha" class="captcha-image" data-refresh-config="default"></div>
                            <span class="captcha-img text-success pull-right marB20" style="cursor:pointer;" data-refresh-config="default"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp;Refresh Captcha</span>
                            <input type="text" name="captcha" class="form-control" placeholder = "Enter Text Here!">
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


<?php $__env->startSection('css'); ?>

<style>
  .remove-btn {
    display: block;
    border: solid 1px #ccc;
    padding: 2px 0;
    border-radius: 2px;
    width: 74px;
    margin: 0px auto 17px;
    text-align: center;cursor:pointer;
  }
  .box-contant {
    position: absolute;
    right: -323px;
    top: -12px;
    display: none;
    border: solid 1px #ddd;
    background: #FFF;
    padding: 10px;
    min-height: 60px;
    transition: all 0.5s;
    box-shadow: 0 0 10px #eee;
    left: auto;
    width: 320px;
        z-index: 99;
}
.info-alert{ position: absolute;
    top: 12px;
    right: 10px;}
 .info-alert i.fa.fa-info {
    border: solid 1px #ddd;cursor: pointer;
    width: 22px;
    height: 22px;
    border-radius: 100px;
    line-height: 21px;
   
}
.info-alert:hover .box-contant{display: block}
</style>
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
    
    
    $('#register_form').validate({// initialize the plugin
            debug: true,
            errorClass: 'text-danger',
            errorElement: 'span',
            rules: {
                name: {
                    required: true,
                    lettersonly: true,
                },
                password: {
                    required: true,
                    rangelength: [8, 15],
                    pwcheck: true,
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password",
                },
                email: {
                    required: true,
                    email: true
                },
                citizenship: {
                    required: true
                },
                captcha: {
                    required: true
                }
            },
            messages: {

                password: {
                required: 'Password is required.',
                rangelength: 'This field should contain min 8 and max 15 characters with atleast 1 number, 1 alphabet, and 1 special character except .(dot), _(underscore), -(hyphen), ~(tilde).',
                pwcheck: 'This field should contain min 8 and max 15 characters with atleast 1 number, 1 alphabet, and 1 special character except .(dot), _(underscore), -(hyphen), ~(tilde). '
            },
            name: {
                required: 'Name is required.',
                lettersonly: 'Please enter alphabets only.'
            },
            password_confirmation: {
                required: 'Confirm password is required.',
            },
            email: {
                required: 'Email is required.',
                email: 'Enter valid email address.'
            },
            citizenship: {
                required: 'Country is required.'
            },
            captcha: {
                required: 'Captcha code is required.'
            },
        },
            submitHandler: function (form) {
                form.submit();
            }
        });

        $.validator.addMethod("pwcheck", function (value) {
            return /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,15}$/.test(value)

        });
 
 jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z\s]+$/i.test(value); });
  
    
}); 

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