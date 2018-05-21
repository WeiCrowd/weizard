<?php $__env->startSection('content'); ?>
 <!-- Dashboard Content -->
        <div class="dashboard-content">
        
        <!-- Panel -->
        <div class="panel marAuto">
            <div class="panel-aside">

                <!-- Aside Top -->
                <div class="panel-aside-top panel-aside-item has-border-bottom">
                    <!-- Pagination -->
                    <ul class="pagination">
                        <li><a class="visited" href="#">1</a></li>
<!--                        <li><a class="visited" href="#">2</a></li>-->
                        <li><a class="visited" href="#">2</a></li>
                        <li><a class="active" href="#">3</a></li>
                    </ul>
                    <!-- Pagination -->
                </div>
                <!-- Aside Top -->

                <!-- Aside Center -->
                <div class="panel-aside-center panel-aside-item">
                    <div class="panel-aside-icon"><img src="<?php echo e(asset('content/images/panel-team-information.svg')); ?>" alt="Team" /></div>
                    <h5 class="panel-aside-heading">Add Team Details</h5>
                    <p class="panel-aside-text">Add details like Member name, member designation…</p>
                </div>
                <!-- Aside Center -->

                <!-- Aside Bottom -->
                <div class="panel-aside-bottom panel-aside-item has-border-top">
                    <p><a href="#" class="theme-color medium-font">Save and Exist</a></p>
                    <p><a href="#" class="text-link">Call 0043-57385 for help</a></p>
                </div>
                <!-- Aside Bottom -->

            </div>
           <?php echo e(Form::open(['method' => 'POST','class'=>'panel-main form panel-form has-left-labels','id'=>'validateTeamForm','autocomplete'=>'on', 'url'=> route('save_ico'), 'enctype' => 'multipart/form-data'])); ?>

        <input type="hidden" name="id" value="<?php echo e(@$ico_id->id); ?>">
        <?php echo e(csrf_field()); ?>

               
                <div class="form-group-wrap team-information-wrap">
                    <h1 class="form-heading marB40 marB20-xs">Team Information</h1>
                    
                    <!-- Team Block -->
                    <div class="team-block-inner">
                         <div class="form-team-block">
                    <?php if(count(@$teamData[0]['icoTeamRel'])>0): ?>
                    <?php  $i=1;  ?>
                    <?php $__currentLoopData = @$teamData[0]['icoTeamRel']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teamVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                       
                    <?php if(@$i!=1): ?>
                    <span class="form-team-block-remove">Remove</span>
                    <?php endif; ?>
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-md-4 col-sm-5">
                            <label class="form-group-label"><?php echo e(Lang::get('startup/ico.member_name')); ?>:</label>
                        </div>
                        <div class="col-sm-6">
                          <?php echo e(Form::text('member_name[]',@$teamVal['member_name'], ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.member_name'),'id'=>'member_name'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('member_name')); ?></span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-md-4 col-sm-5">
                            <label class="form-group-label"><?php echo e(Lang::get('startup/ico.member_designation')); ?>:</label>
                        </div>
                        <div class="col-sm-6">
                           <?php echo e(Form::text('member_designation[]',@$teamVal['member_designation'], ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.member_designation'),'id'=>'member_designation'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('member_designation')); ?></span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                   
                   <?php  $i++;  ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <span class="form-team-block-remove">Remove</span>
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-md-4 col-sm-5">
                            <label class="form-group-label"><?php echo e(Lang::get('startup/ico.member_name')); ?>:</label>
                        </div>
                        <div class="col-sm-6">
                          <?php echo e(Form::text('member_name[]',@$teamVal['member_name'], ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.member_name'),'id'=>'member_name'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('member_name')); ?></span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-md-4 col-sm-5">
                            <label class="form-group-label"><?php echo e(Lang::get('startup/ico.member_designation')); ?>:</label>
                        </div>
                        <div class="col-sm-6">
                           <?php echo e(Form::text('member_designation[]',@$teamVal['member_designation'], ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.member_designation'),'id'=>'member_designation'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('member_designation')); ?></span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    <?php endif; ?>
                     </div>
                     </div>
                    <!-- Team Block -->
                     
                    <!-- Form Group -->
                    <div class="form-group row marT30">
                        <div class="col-md-12">
                            <a class="uppercase add-member-btn" href="javascript:;">+Add More</a>
                        </div>
                    </div>
                    <!-- Form Group -->

                </div>
                
                <!-- Footer Buttons -->
                    <div class="panel-main-btns row marT40"><!-- Using anchor tags for link instead of button submit tag -->
                       <div class="col-xs-6">
                            <a href="<?php echo e(url("startup/social-inform/$ico_id->id")); ?>" class="primary-btn is-slim is-ghost-btn prev-btn">Previous</a>
                        </div>
                        <div class="col-xs-6 text-right">
                            <button type="submit" class="primary-btn is-slim next-btn">
                    Next
                </button>
                        </div>
                    </div>
                    <!-- Footer Buttons -->
                    
         <?php echo e(Form::close()); ?>

        </div>
        <!-- Panel -->
        
        </div>
        <!-- Dashboard Content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscript'); ?>

<script type="text/javascript">
    $(document).ready(function () {
        jQuery('#validateTeamForm').validate({

            debug: true,
            errorClass: 'text-danger',
            errorElement: 'span',
            rules: {
                'member_name[]': {
                required: true
            },
            'member_designation[]': {
                required: true
            }

            },
            messages: {

                member_name: {
                    required: 'This field is required.'
                }
            },
            submitHandler: function (form) {
                form.submit();
            }

        });
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>