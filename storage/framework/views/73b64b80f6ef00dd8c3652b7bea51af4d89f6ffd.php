<?php $__env->startSection('metaName'); ?>
ROBOTS
<?php $__env->stopSection(); ?>

<?php $__env->startSection('metaContent'); ?>
NOINDEX, NOFOLLOW
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 <!-- Body Content -->
        <div id="body-content" class="thanku_page">

            <!-- Home Banner -->
            <div class="page-banner site-banner text-center">
                
            </div>
            <!-- Home Banner -->

            <!-- Section -->
            <div class="jumbotron" style="text-align: center;background: #fff;">
            <div class="center" style="margin-bottom: 20px;"><img src="https://www.weicrowd.com/content/images/thanks-img.png"></div>
              <h2 class="display-3">Thank You for Signing Up on WeiZard!</h2>
              <p class="lead">We have sent you activation link on your registered email. Please verify that link and login.</p>
              <hr>
              <p> Having trouble? <a href="mailto:support@weizard.com">Contact us</a></p>
              <p class="lead">
                <a class="primary-btn light-btn marB30 uppercase" href="<?php echo e(url('/login')); ?>" role="button">Login</a>
              </p>
            </div>
            <!-- Section -->

            <!-- Section Connect with Us -->
            <div class="section section-social with-bg padding-none">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                           <!-- Social Icons -->
                            <ul class="social-icons list-inline">
                                <li><a href="https://www.facebook.com/Weicrowd/" target="_blank" class="social-icon facebook-icon" tooltip="Facebook"></a></li>
                                <li><a href="https://twitter.com/WeiCrowd" target="_blank" class="social-icon twitter-icon" tooltip="Twitter"></a></li>
                                <li><a href="https://www.linkedin.com/company/weicrowd/" target="_blank" class="social-icon linkedin-icon" tooltip="LinkedIn"></a></li>
                                <li><a href="https://medium.com/weicrowd" target="_blank" class="social-icon medium-icon" tooltip="Medium"></a></li>
                                <li><a href="https://www.reddit.com/user/Weicrowd" target="_blank" class="social-icon reddit-icon" tooltip="Reddit"></a></li>
                            <li><a href="https://t.me/WeiCrowd" target="_blank" class="social-icon telegram-icon" tooltip="Telegram"></a></li>
                            </ul>
                            <!-- Social Icons -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- Section Connect with Us -->

        </div>
        <!-- Body Content -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.web', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>