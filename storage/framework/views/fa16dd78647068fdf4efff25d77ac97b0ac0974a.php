<?php $__env->startSection('pageTitle'); ?>
ICO listing - <?php echo e(ucwords($icoData->name)); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('canonicalURL'); ?><?php echo e(url()->current()); ?><?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

        <!-- Body Content -->
        <div id="body-content">

            <!-- Home Banner -->
            <div class="site-banner page-banner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="site-banner-text full-max-width text-center">
                                <h1 class="site-banner-heading wow fadeInDown" data-wow-duration="2s" data-wow-delay="0s">ICO Listing</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Home Banner -->
        </div>
        <!-- Body Content -->
 <!-- Home Banner -->
           <div class="site-banner has-bg-color token-detail">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3 ico-image">
                    <p><img width="280" height="276" src="<?php echo e(url('/')); ?>/ICO/LogoImage/<?php echo e($icoData->logo_image); ?>" class="ico-logo" alt="logo"></p>
                    <p>Starting date: <?php  $startDate = explode(" ",$icoData->start_time); 
                                        $actualStartDate = date("d M Y",strtotime($startDate[0]));
                                         ?> 
                                        <?php echo e(@$actualStartDate); ?>  </p>
                    <p>Ending date:  <?php  $endDate = explode(" ",$icoData->end_time); 
                                        $actualEndDate = date("d M Y",strtotime($endDate[0]));
                                         ?> 
                                        <?php echo e(@$actualEndDate); ?> </p>
                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 ico-overview">
                    <div class="ico-overview-head">
                        <div class="left">
                            <h2><?php echo e(ucwords($icoData->name)); ?></h2>
                            <p>Next-Generation Game Platform</p>
                             <?php if($icoData->telegram_chat || $icoData->facebook || $icoData->linkedin || $icoData->twitter): ?>
                                    <div class="row">
                                    
                                    <div class="col-xs-12 col-sm-8 col-md-9 ico-social-links">
                                    <?php if($icoData->twitter): ?>
                                    <a href="<?php echo e($icoData->twitter); ?>" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <?php endif; ?>
                                    <?php if($icoData->telegram_chat): ?>
                                    <a href="<?php echo e($icoData->telegram_chat); ?>" title="Telegram" target="_blank"><i class="fa fa-telegram"></i></a>
                                    <?php endif; ?>
                                    <?php if($icoData->facebook): ?>
                                    <a href="<?php echo e($icoData->facebook); ?>" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <?php endif; ?>
                                    <?php if($icoData->linkedin): ?>
                                    <a href="<?php echo e($icoData->linkedin); ?>" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a> 
                                    <?php endif; ?>
                                    <?php if($icoData->slack_chat): ?>
                                    <a href="<?php echo e($icoData->slack_chat); ?>" title="Slack" target="_blank"><i class="fa fa-slack"></i></a> 
                                    <?php endif; ?>
                                    <?php if($icoData->github): ?>
                                    <a href="<?php echo e($icoData->github); ?>" title="Github" target="_blank"><i class="fa fa-github"></i></a> 
                                    <?php endif; ?>
                                    </div>
                                    </div>
                                    <?php else: ?>
                                    <div class="row">
                                    <div class="col-xs-12 col-sm-8 col-md-9 ico-social-links">
                                    <?php $__currentLoopData = @$icoData->socialRel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e($link->url); ?>" title="<?php echo e($link->link_type); ?>" target="_blank"><i class="fa fa-<?php echo e(strtolower($link->link_type)); ?>"></i></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    </div>
                                    <?php endif; ?>
                        </div>
                        <div class="right btn-section">
                        <a class="btn btn-primary btn-website" href="<?php echo e($icoData->website); ?>" target="_blank">View Website</a>
                        <a class="btn btn-primary btn-white" href="<?php echo e($icoData->whitepaper); ?>" target="_blank">View Whitepaper</a>
                        </div>
                    </div>
                    <div class="detail-ico">
                        <div class="col-md-6 col-xs-12 left">
                            <h4>About</h4>
                            <p><?php echo $icoData->concept; ?></p>
                            <div class="ico-img">
                                <?php if($icoData->video == ""): ?>
                                    <img src="<?php echo e(asset('front/images/default-video.png')); ?>" alt="Video" width="436px;">
                                <?php else: ?>
                                    <iframe width="436" height="242" src="<?php echo e($icoData->video); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 right">
                            <h4>ICO Detail</h4>
                            <div class="row">
                                <p class="col-xs-7 col-sm-6 col-md-8 low">Whitelist</p>
                                <p class="col-xs-5 col-sm-4 col-md-4"><?php echo e(ucwords($icoData->whitelist)); ?></p>
                            </div>
                            <div class="row">
                                <p class="col-xs-7 col-sm-6 col-md-8 low">Token Sale Hard Cap</p>
                                <p class="col-xs-5 col-sm-4 col-md-4">$<?php echo e($icoData->hardcap); ?></p>
                            </div>
                            <div class="row">
                                <p class="col-xs-7 col-sm-6 col-md-8 low">Token Sale Soft Cap</p>
                                <p class="col-xs-5 col-sm-4 col-md-4">$<?php echo e($icoData->soft_cap); ?></p>
                            </div>
                            <div class="row">
                                <p class="col-xs-7 col-sm-6 col-md-8 low">Start Date</p>
                                <p class="col-xs-5 col-sm-4 col-md-4"><?php echo e(@$actualStartDate); ?> </p>
                            </div>
                            <div class="row">
                                <p class="col-xs-7 col-sm-6 col-md-8 low">End Date</p>
                                <p class="col-xs-5 col-sm-4 col-md-4"><?php echo e(@$actualEndDate); ?></p>
                            </div>
                            <div class="row">
                                <p class="col-xs-7 col-sm-6 col-md-8 low">Token Symbol</p>
                                <p class="col-xs-5 col-sm-4 col-md-4"><?php echo e(strtoupper($icoData->symbol)); ?></p>
                            </div>
                            <div class="row">
                                <p class="col-xs-7 col-sm-6 col-md-8 low">Token Type</p>
                                <p class="col-xs-5 col-sm-4 col-md-4"><?php echo e($icoData->technology); ?> </p>
                            </div>
                            <div class="row">
                                <p class="col-xs-7 col-sm-6 col-md-8 low">Initial Token Price</p>
                                <p class="col-xs-5 col-sm-4 col-md-4">$<?php echo e($icoData->token_price); ?></p>
                            </div>
                            <div class="row">
                                <p class="col-xs-7 col-sm-6 col-md-8 low">KYC</p>
                                <p class="col-xs-5 col-sm-4 col-md-4"><?php echo e($icoData->kyc); ?></p>
                            </div>
                            <div class="row">
                                <p class="col-xs-7 col-sm-6 col-md-8 low">Participation Restriction</p>
                                <p class="col-xs-5 col-sm-4 col-md-4"><?php echo e($icoData->restriction); ?></p>
                            </div>
                            <div class="row">
                                <p class="col-xs-12 col-sm-8 col-md-8 low">Accept</p>
                                <p class="col-xs-12 col-sm-4 col-md-4"><?php echo e($icoData->accepts); ?></p>
                            </div>

                        </div>
                    </div>
                    <div class="ico-team-detail clearfix">
                        <h4>Team</h4>
                        <ul class="clearfix">
                             <?php if(@$icoData->icoTeamRel): ?>
                                    <?php $__currentLoopData = $icoData->icoTeamRel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="col-xs-12 col-sm-6 col-md-3">
                                 <p class="name"><?php echo e($value->member_name); ?></p>
                                 <p class="low"><?php echo e($value->member_designation); ?></p>
                                 <?php if(@$value->linkedin_url): ?>
                                            <a href="<?php echo e(@$value->linkedin_url); ?>" target="_blank">
                                            <i class="fa fa-linkedin"></i>
                                            </a>
                                        <?php endif; ?>
                             </li>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                         </ul>
                         
                    </div>
                    <div class="latest-tweet post-block">
                        <h4>Latest Tweet <i class="fa fa-twitter"></i></h4>
                        <ul>
                            <li>
                                <p>Today #SEC accepted The Abyss LTD’s filing of Form D (Notice of Exempt Offering of Securities) for the sale  of $ABYSS tokens in the US under Regulation D and outside of US under Regulation S of Securities Act of 1933:</p>
                                <p class="low"><i class="fa fa-clock-o"></i> April 16</p>
                            </li>
                            <li>
                                <p>Today #SEC accepted The Abyss LTD’s filing of Form D (Notice of Exempt Offering of Securities) for the sale  of $ABYSS tokens in the US under Regulation D and outside of US under Regulation S of Securities Act of 1933:</p>
                                <p class="low"><i class="fa fa-clock-o"></i> 16 Hours Ago</p>
                            </li>
                            <li>
                                <p>Today #SEC accepted The Abyss LTD’s filing of Form D (Notice of Exempt Offering of Securities) for the sale  of $ABYSS tokens in the US under Regulation D and outside of US under Regulation S of Securities Act of 1933:</p>
                                <p class="low"><i class="fa fa-clock-o"></i> 16 Hours Ago</p>
                            </li>
                        </ul>
                    </div>
                     <div class="latest-post post-block">
                        <h4>Latest Tweet <i class="fa fa-facebook"></i></h4>
                        <ul>
                            <li>
                                <p>Today #SEC accepted The Abyss LTD’s filing of Form D (Notice of Exempt Offering of Securities) for the sale  of $ABYSS tokens in the US under Regulation D and outside of US under Regulation S of Securities Act of 1933:</p>
                                <p class="low"><i class="fa fa-clock-o"></i> April 16</p>
                            </li>
                            <li>
                                <p>Today #SEC accepted The Abyss LTD’s filing of Form D (Notice of Exempt Offering of Securities) for the sale  of $ABYSS tokens in the US under Regulation D and outside of US under Regulation S of Securities Act of 1933:</p>
                                <p class="low"><i class="fa fa-clock-o"></i> 16 Hours Ago</p>
                            </li>
                            <li>
                                <p>Today #SEC accepted The Abyss LTD’s filing of Form D (Notice of Exempt Offering of Securities) for the sale  of $ABYSS tokens in the US under Regulation D and outside of US under Regulation S of Securities Act of 1933:</p>
                                <p class="low"><i class="fa fa-clock-o"></i> 16 Hours Ago</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <!-- Home Banner -->
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<style type="text/css">

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jscript'); ?>

<script type="text/javascript">
 $(document).ready(function() {
    var id = $("#edit_id").val();
    
    if(id != ''){
        var symImg = $("#old_symbol_image").val();
        if(typeof symImg == 'undefined'){
            $("#symbol_div").show();
            $("#symbol_img_div").hide();
        }else{
            $("#symbol_div").hide();
            $("#symbol_img_div").show();
        }
    } 
});
</script>
<?php $__env->stopSection(); ?>

    
<?php echo $__env->make('layouts.web', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>