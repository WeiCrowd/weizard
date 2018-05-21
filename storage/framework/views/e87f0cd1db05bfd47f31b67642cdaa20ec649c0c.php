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
            <div class="site-banner has-bg-color">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-push-6">
                            <div class="site-banner-text">
                                <h1 class="site-banner-heading marB0"><img class="block-element marB10" src="<?php echo e(url('/')); ?>/ICO/LogoImage/<?php echo e($icoData->logo_image); ?>" alt="Logo" /><span class="wow fadeInDown" data-wow-duration="2s" data-wow-delay="0s"><?php echo e(ucwords($icoData->name)); ?></span></h1>
                                <p class="site-banner-text wow fadeInUp normal-font marT20" data-wow-duration="2s" data-wow-delay="0s"><?php echo e(ucwords($icoData->short_description)); ?></p>
                                <ul class="site-banner-btns list-inline">
                                    <li class="full-width"><a href="<?php echo e($icoData->website); ?>" class="primary-btn theme2-btn big-btn marT20 full-width" target="_blank">WEBSITE</a></li>                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-sm-pull-6">
                            <div class="site-banner-video marT20">
                                <img class="full-width" src="<?php echo e(url('/')); ?>/ICO/BannerImage/<?php echo e($icoData->banner_image); ?>" alt="Banner" />
                            </div>
                        </div>
                    </div>
                    <hr class="marB0">
                </div>
            </div>
            <!-- Home Banner -->

            <!-- Section Overview -->
            <div class="section with-bg padT0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="section-heading">Overview</h2>
                            <p class="section-tagline"><?php echo e(ucwords($icoData->short_description)); ?></p>
                            <ul class="list-inline section-card-list">
                                <li class="section-card">
                                    <h3 class="section-card-heading small-heading body-color marB40">SYMBOL</h3>
                                    <figure class="section-card-figure marB0"><img src="<?php echo e(asset('front/images/panel-social-icon.svg')); ?>" alt="AMLT" />
                                    <figcaption><?php echo e(ucwords($icoData->symbol)); ?></figcaption>
                                    </figure>
                                </li>
                                <li class="section-card">
                                    <h3 class="section-card-heading small-heading body-color marB40">TOKEN SALE OPENING DATE</h3>
                                    <figure class="section-card-figure marB0"><img src="<?php echo e(asset('front/images/opening-date-icon.svg')); ?>" alt="12. Dec 2017" />
                                        <?php  $startDate = explode(" ",$icoData->start_time); 
                                                $actualStartDate = date("d M Y",strtotime($startDate[0]));
                                                 ?>
                                    <figcaption><?php echo e(@$actualStartDate); ?></figcaption>
                                    </figure>
                                </li>
                                <li class="section-card">
                                    <h3 class="section-card-heading small-heading body-color marB40">TOKEN SALE CLOSING DATE</h3>
                                    <figure class="section-card-figure marB0"><img src="<?php echo e(asset('front/images/closing-date-icon.svg')); ?>" alt="30. Jan 2018" />
                                         <?php  $endDate = explode(" ",$icoData->end_time); 
                                                $actualEndDate = date("d M Y",strtotime($endDate[0]));
                                                 ?>
                                    <figcaption><?php echo e(@$actualEndDate); ?></figcaption>
                                    </figure>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Section Overview -->
            
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