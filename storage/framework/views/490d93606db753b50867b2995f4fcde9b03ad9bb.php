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

<meta name="<?php echo $__env->yieldContent('metaName'); ?>" content="<?php echo $__env->yieldContent('pageMetaDes'); ?>">
<link rel="canonical" href="<?php echo $__env->yieldContent('canonicalURL'); ?>" />
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo e(asset('content/css/animate.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('content/css/site.css')); ?>" />
<!-- Stylesheets -->

<?php echo $__env->yieldContent('css'); ?>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P7S469B"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->       
<?php $__env->startSection('content'); ?>
    All content goes here
<?php echo $__env->yieldSection(); ?>


<!-- Scripts -->
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="<?php echo e(asset('scripts/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('scripts/head.core.min.js')); ?>"></script>
<script src="<?php echo e(asset('scripts/wow.min.js')); ?>"></script>
<script src="<?php echo e(asset('scripts/Custom.js')); ?>"></script>
<script src="<?php echo e(asset('scripts/bootstrap.js')); ?>"></script>
<!-- Validation -->
<script src="<?php echo e(asset('js/validate.js')); ?>" type="text/javascript"></script>
<?php echo $__env->yieldContent('jscript'); ?>
</body>
</html>