<?php $__env->startSection('pageTitle'); ?>
Bounty Program - WeiCrowd - The Safest Token Marketplace
<?php $__env->stopSection(); ?>

<?php $__env->startSection('canonicalURL'); ?><?php echo e(url()->current()); ?><?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<!-- Body Content -->
<div id="body-content">

    <!-- Home Banner -->
    <div class="page-banner site-banner text-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="page-banner-heading">ICO Listing Bounty</h1>
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSeoHYHCpm9V8XPGnvQCzPa5MJZwBIH5RKuJvzQKti7UGwA_6Q/viewform" class="primary-btn theme2-btn highlight-btn">Join Now</a>
                </div>
            </div>                    
        </div>
    </div>
    <!-- Home Banner -->

    <!-- Section -->
    <div class="section bounty-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">                       
                    <div class="bounty_tabs">
                        <!-- Tab panes -->
                        <div class="tab-content" id="my-tab-content">
                          <div role="tabpanel" class="tab-pane active" id="ibo">
                                        <div align="center" class="inner-image"><img class="userimg" src="<?php echo e(asset('content/images/ico_listing_bounty_weicrowd.png')); ?>" alt="" border="0"></div>                                 
                                        <h2>Introduction:</h2>
                                        
                                        <p><a href="https://www.weizard.com/" target="_blank">WeiZard.com</a> is an ICO listing and rating website powered by <a href="http://weicrowd.com/" target="_blank">WeiCrowd.com</a>.</p>
                                        <p>WeiCrowd is using the power of the crowd through an ICO listing Bounty through WeiZard.com.</p>
                                        
                                        <p>This campaign rewards you in WEIS (the WeiCrowd ICO token) for listing ICO's on WeiZard.com</p>
                                        <h2>How to Signup?</h2>
                                        
                                        <p>1. Register on <a href="https://www.weizard.com/icolisting" target="_blank">WeiZard.com </a>with your details.</p>
                                        <p>2. Next, fill in the bounty registration form <a href="https://docs.google.com/forms/d/e/1FAIpQLSeoHYHCpm9V8XPGnvQCzPa5MJZwBIH5RKuJvzQKti7UGwA_6Q/viewform" target="_blank">ICO-Listing Bounty</a>.</p>

                                        <h2>How it Works?</h2>
                                        <p>1. After signup and registration on Bounty form, login to your WeiZard account & click on the <a href="https://www.weizard.com/startup/add-ico" target="_blank">Add ICO</a> button to list an ICO.</p>
                                        <p>2. Each ICO listing is subject to approval within 24-48 hours. You will receive an email after approval.</p>
                                        <p>3. For updates follow our <a href="https://bitcointalk.org/index.php?topic=3346733.0" target="_blank">Bounty thread </a>& join our <a href="https://t.me/weicrowd" target="_blank">telegram </a>group.</p>
                                        <h2>Rewards:</h2>
                                        <p>1. For 1 Correct & Unique Token Data submission you will get 10 WEIS worth $1</p>
                                        <p>2. Your WEIS balance will reflect in your WeiZard account in 24 hours.</p>
                                        <p>3. Every 7 days Top 10 participants will receive 100 extra WEIS.</p>

                                        <h2>Rules:</h2>
                                        <p>1. The Campaign is on First In, First Win Basis.</p>
                                        <p>2. Duplicate applicants will be disqualified.</p>
                                        <p>3. Duplicate entries not allowed.</p>
                                        <p>4. Incorrect or incomplete data will be rejected.</p>
                                        <p>5. Every participant should submit a minimum of 5 ICO's per week.</p>
                                        <p>6. Entries are allowed from 2016 onwords till date.</p>
                                        <p>For Support : Email Us at <a href="mailto:support@weicrowd.com">support@weicrowd.com</a> or use <a href="t.me/weicrowd.com" target="_blank">t.me/weicrowd.com</a></p>
                                        <p><strong>Happy Winning !!</strong></p>


                                    </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Section -->
    <div class="section-btn">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                   <a href="https://docs.google.com/forms/d/e/1FAIpQLSeoHYHCpm9V8XPGnvQCzPa5MJZwBIH5RKuJvzQKti7UGwA_6Q/viewform" class="primary-btn theme2-btn highlight-btn">Join Now</a> 

                </div>
            </div>
        </div>
    </div>
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
                        <li><a href="https://medium.com/@Weicrowd" target="_blank" class="social-icon medium-icon" tooltip="Medium"></a></li>
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
<?php $__env->startSection('jscript'); ?>
<script>
    //grabs the hash tag from the url
    var hash = window.location.hash;
    //checks whether or not the hash tag is set
    if (hash != "") {
        //removes all active classes from tabs
        $('#tabs li').each(function () {
            $(this).removeClass('active');
        });
        $('#my-tab-content div').each(function () {
            $(this).removeClass('active');
        });
        //this will add the active class on the hashtagged value
        var link = "";
        $('#tabs li').each(function () {
            link = $(this).find('a').attr('href');
            if (link == hash) {
                $(this).addClass('active');
            }
        });
        $('#my-tab-content div').each(function () {
            link = $(this).attr('id');
            if ('#' + link == hash) {
                $(this).addClass('active');
            }
        });
    }

</script>
<style>
    .inner-image{margin-bottom: 15px;text-align: center;}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>