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
                    <li><a class="visited" href="#">3</a></li>
                    <li><a class="active" href="#">4</a></li>
                </ul>
                <!-- Pagination -->
            </div>
            <!-- Aside Top -->

            <!-- Aside Center -->
            <div class="panel-aside-center panel-aside-item">
                <div class="panel-aside-icon"><img src="<?php echo e(asset('content/images/panel-social-icon.svg')); ?>" alt="Social" /></div>
                <h5 class="panel-aside-heading">Add Project Details</h5>
                <p class="panel-aside-text">Add your project details. </p>
            </div>
            <!-- Aside Center -->

            <!-- Aside Bottom -->
            <div class="panel-aside-bottom panel-aside-item has-border-top">
                <p><a href="#" class="text-link">Call 0043-57385 for help</a></p>
            </div>
            <!-- Aside Bottom -->

        </div>
<!--        viewSocialData-->
        <?php echo e(Form::open(['method' => 'POST','class'=>'panel-main form panel-form has-left-labels','id'=>'validateInformationForm','autocomplete'=>'off', 'url'=> route('save_information'), 'enctype' => 'multipart/form-data'])); ?>

        <input type="hidden" name="id" value="<?php echo e(@$ico_id->id); ?>">
        <?php echo e(csrf_field()); ?>

        <div class="form-group-wrap">
            <h1 class="form-heading marB40 marB20-xs">Project Information</h1>

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.concept')); ?><span class="required">*</span>:</label>
                </div>
                <div class="col-sm-9">
                    <?php echo e(Form::textarea('concept',  @$ico_id->concept, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.concept'),'id'=>'concept'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('concept')); ?></span>
                </div>
            </div>
            <!-- Form Group -->
        </div>
        
                <!-- Footer Buttons -->
                    <div class="panel-main-btns row marT40"><!-- Using anchor tags for link instead of button submit tag -->
                       <div class="col-xs-6">
                            <a href="<?php echo e(url("startup/team-inform/$ico_id->id")); ?>" class="primary-btn is-slim is-ghost-btn prev-btn">Previous</a>
                        </div>
                        <div class="col-xs-6 text-right">
                            <button type="submit" class="primary-btn is-slim next-btn">
                    Submit
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
<script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        CKEDITOR.replace('concept');
        $("#concept").trigger('onchange');        
        jQuery('#validateInformationForm').validate({

            debug: true,
            errorClass: 'text-danger',
            errorElement: 'span',
            rules: {
                concept: {
                required: true
            }
            },
            messages: {
                concept: {
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