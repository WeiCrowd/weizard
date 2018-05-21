<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
 <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P7S469B');</script>
<!-- End Google Tag Manager -->   
    
<!-- Meta Tags -->
<meta charset="utf-8" />
<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="theme-color" content="#326ff9" />
<link rel="shortcut icon" href="<?php echo e(asset('content/favicons/favicon.ico')); ?>" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?php echo e(asset('content/favicons/apple-touch-icon.png')); ?>" />
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo e(asset('content/favicons/apple-touch-icon-57x57.png')); ?>" />
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('content/favicons/apple-touch-icon-72x72.png')); ?>" />
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('content/favicons/apple-touch-icon-76x76.png')); ?>" />
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(asset('content/favicons/apple-touch-icon-114x114.png')); ?>" />
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo e(asset('content/favicons/apple-touch-icon-120x120.png')); ?>" />
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo e(asset('content/favicons/apple-touch-icon-144x144.png')); ?>" />
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(asset('content/favicons/apple-touch-icon-152x152.png')); ?>" />
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('content/favicons/apple-touch-icon-180x180.png')); ?>" />

<!-- Page Title & Favicon -->
<title><?php echo $__env->yieldContent('pageTitle'); ?></title>

<!-- Stylesheets -->
<link rel="stylesheet" href="<?php echo e(asset('content/css/bootstrap.min.css')); ?>" />
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo e(asset('scripts/plugins/sklib-lightbox/lightbox/skLib.lightbox.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('scripts/plugins/select2/css/select2.min.css')); ?>" />
<!--<link rel="stylesheet" href="<?php echo e(asset('scripts/plugins/flipclock/flipclock.css')); ?>" />-->
<link rel="stylesheet" href="<?php echo e(asset('scripts/plugins/owlcarousel/dist/assets/owl.carousel.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('content/css/animate.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('content/css/site.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('content/css/custom.css')); ?>" />

<!-- Stylesheets -->

<?php echo $__env->yieldContent('css'); ?>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P7S469B"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<div id="container">

    <?php echo $__env->make('front.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php $__env->startSection('content'); ?>
        All content goes here
    <?php echo $__env->yieldSection(); ?>

    <?php echo $__env->make('front.common.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</div>
 
     

<!-- Scripts -->
<script src="<?php echo e(asset('scripts/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('scripts/head.core.min.js')); ?>"></script>
<script src="<?php echo e(asset('scripts/wow.min.js')); ?>"></script>
<script src="<?php echo e(asset('scripts/plugins/select2/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('scripts/jquery.matchHeight-min.js')); ?>"></script>
<script src="<?php echo e(asset('scripts/plugins/sklib-lightbox/lightbox/skLib.lightbox.min.js')); ?>"></script>
<script src="<?php echo e(asset('scripts/plugins/flot/jquery.flot.js')); ?>"></script>
<script src="<?php echo e(asset('scripts/plugins/flot/jquery.flot.pie.js')); ?>"></script>
<script src="<?php echo e(asset('scripts/isotope.pkgd.min.js')); ?>"></script>
<script src="<?php echo e(asset('scripts/jquery.debouncedresize.min.js')); ?>"></script>
<script src="<?php echo e(asset('scripts/plugins/jquery.countdown/jquery.countdown.min.js')); ?>"></script>
<script src="<?php echo e(asset('scripts/plugins/owlcarousel/dist/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('scripts/Custom.js')); ?>"></script>


<?php echo $__env->yieldContent('jscript'); ?>
</body>
</html>


