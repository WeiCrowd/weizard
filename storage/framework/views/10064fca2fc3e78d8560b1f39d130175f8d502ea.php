<?php $__env->startSection('pageTitle'); ?>
List your ICO for Free - WeiZard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageMetaDes'); ?>
Get your ICO listed for free on WeiZard - An ICO listing and rating site powered by WeiCrowd having past, current and upcoming ICO details.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('canonicalURL'); ?><?php echo e(url()->current()); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 
        <!-- Body Content -->
        <div id="body-content">

            <!-- Home Banner -->
            <div class="site-banner page-banner ico-page-front">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="site-banner-text full-max-width text-center">
                                 <div class="ico-sale"><a href="https://www.weicrowd.com/" target="_blank"><img src="<?php echo e(asset('content/images/ico-sale.png')); ?>" alt=""></a></div>
                                <h1 class="site-banner-heading wow fadeInDown" data-wow-duration="2s" data-wow-delay="0s">ICO Listing and Rating by WeiCrowd</h1>
                                <?php if(Auth::check()): ?>
                                    <a href="<?php echo e(url('/startup/add-ico')); ?>" class="primary-btn theme2-btn highlight-btn">List Your ICO </a>
                                <?php else: ?>
                                    <a href="<?php echo e(url('/login')); ?>" class="primary-btn theme2-btn highlight-btn">List Your ICO </a>
                                <?php endif; ?>
                                <a href="<?php echo e(url('/ico-listing-bounty')); ?>" class="primary-btn theme2-btn highlight-btn">ICO Listing Bounty</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Home Banner -->
        </div>
        <!-- Body Content -->

         <!-- Upcoming Tokens -->
       <div class="section has-less-spacing with-bg upcoming-token">
            <div class="container">
                <!-- Listing Filters -->
                            <div class="row listing-filters">
                                <h2 class="col-sm-5 section-heading small-heading">ICO</h2>
                                <div class="frmSearch col-sm-4 col-md-3">
                                    <?php echo e(Form::text('ico_name', '',['class' => 'form-control','id'=>'search-box', 'placeholder' => 'Enter ICO Name'])); ?>

                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    <div id="suggesstion-box"></div>
                                    
                                </div>
                                <div class="col-sm-7">
                                   <div class="selectbox-group">
                                    <h4 class="selectbox-group-heading">Filter By:</h4>
                                    <ul class="selectbox-group-list">
                                    <li>
                                        <?php echo e(Form::select('category_id', [''=>'Category']+@$category, @$edit_ico->category_id, ['class' => 'listing-filters-select theme-selectbox form-control','id'=>'category_id'])); ?>

                                    </li>
                                    <li>
                                        <?php  
                                            $currentYear = date('Y');
                                            $endYear = $currentYear + 1;
                                         ?>
                                        <select class="listing-filters-select theme-selectbox form-control" id ="datewiseCategory">
                                            <option value="">Year</option>
                                            <?php  for($i = 10; $i > 4; $i--){  ?>
                                                <option value="<?php echo e($endYear); ?>"><?php echo e($endYear); ?></option>
                                            <?php  $endYear--; }  ?>
                                        </select>
                                    </li>
                                    </ul>
                                    <button class="primary-btn theme2-btn" id="resetFilter">Reset</button>
                                   </div>
                                </div>
                            </div>
                            <!-- Listing Filters -->
                <div id="icoListDiv">
                <div class="row">
                    <div class="col-xs-12">
                         <div class="card">
                             <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab">
                                  <li class="nav-item active">
                                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-expanded="true">Present</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-expanded="false">Upcoming</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tab3" role="tab" aria-expanded="false">Past</a>
                                        </li>
                                </ul>

                                <div class="tab-content">

                                  <!-- Show this tab by adding `active` class -->
                                  <div class="tab-pane fade in active" id="tab1">
                                    <div class="head-info">
                                        <?php if(count(@$presentIcoData)>0): ?>
                                        <div class="table-responsive ps ps--theme_default">
                                        <table class="table center-aligned-table">
                                            <thead>
                                                <tr class="text-primary">
                                                    <th>Logo</th>
                                                    <th>Name</th>
                                                    <th>Start date</th>
                                                    <th>Closed Date</th>
                                                    <th>Category</th>
                                                    <th>Year</th>
                                                    <th>Website</th>
                                                    <th>Rating</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php $__currentLoopData = @$presentIcoData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icoVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <tr>
                                                <td class="logo"><a href="<?php echo e(url('ico/'.str_replace(' ', '-', $icoVal['name']))); ?>"><img width="170" height="26" src="<?php echo e(url('/')); ?>/ICO/LogoImage/<?php echo e($icoVal['logo_image']); ?>" alt="Logo"></a></td>
                                                <td class="name"><a href="<?php echo e(url('ico/'.str_replace(' ', '-', $icoVal['name']))); ?>"><?php echo e(ucwords($icoVal['name'])); ?></a></td>
                                                <td class="start-date">
                                                   <?php  $startDate = explode(" ",$icoVal['start_time']); 
                                                    $actualStartDate = date("d M Y",strtotime($startDate[0]));
                                                     ?> 
                                                    <?php echo e(@$actualStartDate); ?>                                                    
                                                </td>
                                                <td class="close-date">
                                                    <?php  $endDate = explode(" ",$icoVal['end_time']); 
                                                    $actualEndDate = date("d M Y",strtotime($endDate[0]));
                                                     ?> 
                                                    <?php echo e($actualEndDate); ?>

                                                </td>
                                                <td class="category"><?php echo e(ucfirst($icoVal->IcoRel['name'])); ?></td>
                                                <td class="category"><?php echo e(date("Y",strtotime($startDate[0]))); ?></td>
                                                <td class="website"><a href="<?php echo e(ucfirst($icoVal['website'])); ?>" target="_blank" class="btn btn-primary btn-sm">Visit Site</a></td>
                                                <td class="rating">N/A</td>
                                              </tr>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                               
                                            </tbody>
                                        </table>
                                    <div class="panel-footer pull-right">
                                        <?php echo e(@$presentIcoData->appends($_GET)->links('vendor/pagination/default')); ?>

                                        <div class="pageTotal"><?php echo e(Lang::get('common.Total')); ?> <?php echo e(@$presentIcoData->total()); ?> <?php echo e(Lang::get('common.Found')); ?></div>
                                    </div>
                                </div>
                                         <?php else: ?>
                                            <p>No record found...</p>
                                                <?php endif; ?>
                                    </div>
                                  </div>

                                  <div class="tab-pane fade" id="tab2">
                                    <div class="head-info">
                                        <?php if(count(@$upcomingIcoData)>0): ?>
                                        <div class="table-responsive ps ps--theme_default">
                                        <table class="table center-aligned-table">
                                            <thead>
                                                <tr class="text-primary">
                                                    <th>Logo</th>
                                                    <th>Name</th>
                                                    <th>Start date</th>
                                                    <th>Closed Date</th>
                                                    <th>Category</th>
                                                    <th>Year</th>
                                                    <th>Website</th>
                                                    <th>Rating</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php $__currentLoopData = @$upcomingIcoData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icoVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <tr>
                                                <td class="logo"><a href="<?php echo e(url('ico/'.str_replace(' ', '-', $icoVal['name']))); ?>"><img width="170" height="26" src="<?php echo e(url('/')); ?>/ICO/LogoImage/<?php echo e($icoVal['logo_image']); ?>" alt="Logo"></a></td>
                                                <td class="name"><a href="<?php echo e(url('ico/'.str_replace(' ', '-', $icoVal['name']))); ?>"><?php echo e(ucwords($icoVal['name'])); ?></a></td>
                                                <td class="start-date">
                                                   <?php  $startDate = explode(" ",$icoVal['start_time']); 
                                                    $actualStartDate = date("d M Y",strtotime($startDate[0]));
                                                     ?> 
                                                    <?php echo e(@$actualStartDate); ?>                                                    
                                                </td>
                                                <td class="close-date">
                                                    <?php  $endDate = explode(" ",$icoVal['end_time']); 
                                                    $actualEndDate = date("d M Y",strtotime($endDate[0]));
                                                     ?> 
                                                    <?php echo e($actualEndDate); ?>

                                                </td>
                                                <td class="category"><?php echo e(ucfirst($icoVal->IcoRel['name'])); ?></td>
                                                <td class="category"><?php echo e(date("Y",strtotime($startDate[0]))); ?></td>
                                                <td class="website"><a href="<?php echo e(ucfirst($icoVal['website'])); ?>" target="_blank" class="btn btn-primary btn-sm">Visit Site</a></td>
                                                <td class="rating">N/A</td>
                                              </tr>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                               
                                            </tbody>
                                        </table>
                                    <div class="panel-footer pull-right">
                                        <?php echo e(@$upcomingIcoData->appends($_GET)->links('vendor/pagination/default')); ?>

                                        <div class="pageTotal"><?php echo e(Lang::get('common.Total')); ?> <?php echo e(@$upcomingIcoData->total()); ?> <?php echo e(Lang::get('common.Found')); ?></div>
                                    </div>                                    
                                </div>
                                         <?php else: ?>
                                            <p>No record found...</p>
                                                <?php endif; ?>
                                    </div>
                                  </div>
                                  <div class="tab-pane fade" id="tab3">
                                    <div class="head-info">
                                        <?php if(count(@$pastIcoData)>0): ?>
                                        <div class="table-responsive ps ps--theme_default">
                                        <table class="table center-aligned-table">
                                            <thead>
                                                <tr class="text-primary">
                                                    <th>Logo</th>
                                                    <th>Name</th>
                                                    <th>Start date</th>
                                                    <th>Closed Date</th>
                                                    <th>Category</th>
                                                    <th>Year</th>
                                                    <th>Website</th>
                                                    <th>Rating</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php $__currentLoopData = @$pastIcoData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icoVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <tr>
                                                <td class="logo"><a href="<?php echo e(url('ico/'.str_replace(' ', '-', $icoVal['name']))); ?>"><img width="170" height="26" src="<?php echo e(url('/')); ?>/ICO/LogoImage/<?php echo e($icoVal['logo_image']); ?>" alt="Logo"></a></td>
                                                <td class="name"><a href="<?php echo e(url('ico/'.str_replace(' ', '-', $icoVal['name']))); ?>"><?php echo e(ucwords($icoVal['name'])); ?></a></td>
                                                <td class="start-date">
                                                   <?php  $startDate = explode(" ",$icoVal['start_time']); 
                                                    $actualStartDate = date("d M Y",strtotime($startDate[0]));
                                                     ?> 
                                                    <?php echo e(@$actualStartDate); ?>                                                    
                                                </td>
                                                <td class="close-date">
                                                    <?php  $endDate = explode(" ",$icoVal['end_time']); 
                                                    $actualEndDate = date("d M Y",strtotime($endDate[0]));
                                                     ?> 
                                                    <?php echo e($actualEndDate); ?>

                                                </td>
                                                <td class="category"><?php echo e(ucfirst($icoVal->IcoRel['name'])); ?></td>
                                                <td class="category"><?php echo e(date("Y",strtotime($startDate[0]))); ?></td>
                                                <td class="website"><a href="<?php echo e(ucfirst($icoVal['website'])); ?>" target="_blank" class="btn btn-primary btn-sm">Visit Site</a></td>
                                                <td class="rating">N/A</td>
                                              </tr>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                               
                                            </tbody>
                                        </table>
                                    <div class="panel-footer pull-right">
                                        <?php echo e(@$pastIcoData->appends($_GET)->links('vendor/pagination/default')); ?>

                                        <div class="pageTotal"><?php echo e(Lang::get('common.Total')); ?> <?php echo e(@$pastIcoData->total()); ?> <?php echo e(Lang::get('common.Found')); ?></div>
                                    </div>
                                </div>
                                         <?php else: ?>
                                            <p>No record found...</p>
                                                <?php endif; ?>
                                    </div>
                                  </div>


                                </div>

                                  
                             </div>
                         </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- Upcoming Tokens -->
        
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

        <!-- Loader modal -->
    <div class="payment-load loder" style="display:none;">
        <div class="bg-lod"></div>
        <div class="loader" ></div>
    </div>   
        
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<style type="text/css">.text-left-li .listing-items{justify-content:left;}</style>
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
  .uploadfile-msg {
    color: blue;
    padding: 5px 10px;
    display: block;
    font-size: 12px;
}

  .loader {
 border: 8px solid #f3f3f3;
    border-radius: 50%;
    border-top: 8px solid #333;
    width: 78px;
    height: 78px;
 -webkit-animation: spin 2s linear infinite; /* Safari */
 animation: spin 2s linear infinite;
}
.payment-load.loder {
    position: fixed;
    z-index: 99999;
    left: 50%;
    top: 50%;
}

/* Safari */
@-webkit-keyframes spin {
 0% { -webkit-transform: rotate(0deg); }
 100% { -webkit-transform: rotate(360deg); }
}

@keyframes  spin {
 0% { transform: rotate(0deg); }
 100% { transform: rotate(360deg); }
}

.payment-load.loder:before {
    content: "";
    width: 100%;
    background: rgba(0, 0, 0, 0.6);
    height: 100%;
    position: fixed;
    left: 0;
    top: 0;
}

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jscript'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        setTimeout(function(){localStorage.removeItem("activeTab");}, 1000*60*60);
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
    });
    
    $("#resetFilter").on('click', function () {
        $("#datewiseCategory").select2().val('');
        $("#category_id").select2().val('');
        $.resetFilter();
    });
    
    $("#category_id").on('change', function () {
        $.getIcoList();
    });
    $("#datewiseCategory").on('change', function () {
        $.getDatewiseIcoList();
    });

    $.resetFilter = function (e) {
        $.ajax({
            type: 'POST',
            url: 'get-ico-list',
            headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"},
            dataType: 'JSON',
            data: {'id': $("#category_id").val(), 'type': $("#datewiseCategory").val()},
            beforeSend: function () {
                $(".loder").show();
            },
            success: function (res) {
                $(".loder").hide();
                $('#icoListDiv').show().html(res.html);
            }
        });
            $("#datewiseCategory").select2().val('');
            $("#category_id").select2().val('');
    };
    
    $.getIcoList = function (e) {
        $.ajax({
            type: 'POST',
            url: 'get-ico-list',
            headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"},
            dataType: 'JSON',
            data: {'id': $("#category_id").val(), 'type': $("#datewiseCategory").val()},
            beforeSend: function () {
                 $(".loder").show();
             },
            success: function (res) {
                $(".loder").hide();
                $('#icoListDiv').show().html(res.html);
            }
        });
    };

    $.getDatewiseIcoList = function (e) {
        $.ajax({
            type: 'POST',
            url: 'get-datewise-ico-list',
            headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"},
            dataType: 'JSON',
            data: {'type': $("#datewiseCategory").val(), 'id': $("#category_id").val()},
            beforeSend: function () {
                 $(".loder").show();
             },
            success: function (res) {
                $(".loder").hide();
                $('#icoListDiv').show().html(res.html);
            }
        });
    };
    
    // AJAX call for autocomplete 
	$("#search-box").keyup(function(){
                if($(this).val().length != '0'){
                    $.ajax({
                    type: 'POST',
                    url: 'get-ico-name',
                    headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"},
                    dataType: 'JSON',
                    data:'keyword='+$(this).val(),
                    beforeSend: function(){
                            //$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
                    },
                    success: function(data){
                            $("#suggesstion-box").show();
                            $("#suggesstion-box").html(data.html);
                            //$("#search-box").css("background","#FFF");
                    }
                    });
                }else{
                    $("#suggesstion-box").hide();
                    $("#suggesstion-box").html();
                }
	});
   
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.web', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>