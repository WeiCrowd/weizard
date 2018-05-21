<?php $__env->startSection('content'); ?>
 
        <!-- Body Content -->
        <div id="body-content">

            <!-- Home Banner -->
            <div class="site-banner page-banner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="site-banner-text full-max-width text-center">
                                <h1 class="site-banner-heading wow fadeInDown" data-wow-duration="2s" data-wow-delay="0s">Experience the power of Crowdsale Automation</h1>
                                <a href="<?php echo e(url('/icolisting')); ?>" class="primary-btn theme2-btn highlight-btn">List Your ICO </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Home Banner -->
        </div>
        <!-- Body Content -->

        <!-- Upcoming Tokens -->
        <div class="section has-less-spacing with-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">

                        <!-- Section Listing -->
                        <div class="section-listing">

                            <!-- Listing Filters -->
                            <div class="row listing-filters">
                                <h2 class="col-sm-5 section-heading small-heading">ICO</h2>
                                <div class="col-sm-7">
                                   <div class="selectbox-group">
                                    <h4 class="selectbox-group-heading">Filter By:</h4>
                                    <ul class="selectbox-group-list">
                                    <li>
                                    <?php echo e(Form::select('category_id', [''=>'Select Category']+@$category, @$edit_ico->category_id, ['class' => 'listing-filters-select theme-selectbox form-control','id'=>'category_id'])); ?>

                                    </li>
                                    <li>
                                    <select class="listing-filters-select theme-selectbox form-control" id ="datewiseCategory">
                                    <option value="">Select Status</option>
                                    <option value="Present">Present</option>
                                    <option class="Upcoming">Upcoming</option>
                                    <option value="Past">Past</option>
                                    </select>
                                    </li>
                                    </ul>
                                   </div>
                                </div>
                            </div>
                            <!-- Listing Filters -->

                            <div id="icoListDiv" class="text-left-li">
                            <!-- Listing Items -->
                            <div class="row">
                                <div class="col-xs-12">
                                    <ul class="listing-items">
                                         <?php if(count(@$categoryData)>0): ?>
                            <?php $__currentLoopData = @$categoryData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icoVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="listing-box social-media-filter">
                                            <a href="<?php echo e(url('list/'.$icoVal['id'])); ?>">
                                                <div class="listing-box-figure"><img src="<?php echo e(url('/')); ?>/ICO/LogoImage/<?php echo e($icoVal['logo_image']); ?>" alt="Image" /></div>
                                                <h6 class="listing-box-heading"><?php echo e(ucfirst($icoVal['name'])); ?></h6>
                                                <?php  $startDate = explode(" ",$icoVal['start_time']); 
                                                $actualStartDate = date("d M Y",strtotime($startDate[0]));
                                                 ?>
                                                <p class="listing-box-text"><?php echo e(@$actualStartDate); ?></p>
                                            </a>
                                        </li>
                                        
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <li class="listing-box social-media-filter">
                            No Record Found..
                            </li>
                            <?php endif; ?>
                                    </ul>

                                    <!-- <div class="text-center marT40">
                                        <a href="#" class="primary-btn is-ghost-btn theme-btn highlight-btn">Show More</a>
                                    </div> -->
                                </div>
                            </div>
                            <!-- Listing Items -->
                        </div>

                        </div>
                        <!-- Section Listing -->

                    </div>
                </div>
            </div>
        </div>
        <!-- Upcoming Tokens -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<style type="text/css">.text-left-li .listing-items{justify-content:left;}</style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('jscript'); ?>
<script type="text/javascript">
    $("#category_id").on('change', function () {
         $("#datewiseCategory").select2().val('');
        $.getIcoList();
    });
    $("#datewiseCategory").on('change', function () {
          $("#category_id").select2().val('');
        $.getDatewiseIcoList();
    });

    
    $.getIcoList = function (e) {
        $.ajax({
            type: 'GET',
            url: 'get-ico-list',
            headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"},
            dataType: 'JSON',
            data: {'id': $("#category_id").val()},
            success: function (res) {
                $('#icoListDiv').show().html(res.html);
            }
        });
    };

     $.getDatewiseIcoList = function (e) {
        $.ajax({
            type: 'GET',
            url: 'get-datewise-ico-list',
            headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"},
            dataType: 'JSON',
            data: {'type': $("#datewiseCategory").val()},
            success: function (res) {
                $('#icoListDiv').show().html(res.html);
            }
        });
    };

   
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.web', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>