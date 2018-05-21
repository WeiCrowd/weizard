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
                    <li><a class="active" href="#">2</a></li>
                    <li><a href="#">3</a></li>
                </ul>
                <!-- Pagination -->
            </div>
            <!-- Aside Top -->

            <!-- Aside Center -->
            <div class="panel-aside-center panel-aside-item">
                <div class="panel-aside-icon"><img src="<?php echo e(asset('content/images/panel-social-icon.svg')); ?>" alt="Social" /></div>
                <h5 class="panel-aside-heading">Add Social Details</h5>
                <p class="panel-aside-text">Add details like Website, Blog, Whitepaper, Facebook, Twitter, Linkedin, Social chat… </p>
            </div>
            <!-- Aside Center -->

            <!-- Aside Bottom -->
            <div class="panel-aside-bottom panel-aside-item has-border-top">
                <p><a href="#" class="theme-color medium-font">Save and Exist</a></p>
                <p><a href="#" class="text-link">Call 0043-57385 for help</a></p>
            </div>
            <!-- Aside Bottom -->

        </div>
<!--        viewSocialData-->
        <?php echo e(Form::open(['method' => 'POST','class'=>'panel-main form panel-form has-left-labels','id'=>'','autocomplete'=>'on', 'url'=> route('team_information'), 'enctype' => 'multipart/form-data'])); ?>

        <input type="hidden" name="id" value="<?php echo e(@$ico_id->id); ?>">
        <?php echo e(csrf_field()); ?>

        <div class="form-group-wrap">
            <h1 class="form-heading marB40 marB20-xs">Social Information</h1>

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.website')); ?>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::text('website',  @$ico_id->website, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.website'),'id'=>'website'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('website')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.blog')); ?>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::text('blog',  @$ico_id->blog, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.blog'),'id'=>'blog'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('blog')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.whitepaper')); ?>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::text('whitepaper',@$ico_id->whitepaper, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.whitepaper'),'id'=>'whitepaper'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('whitepaper')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.facebook')); ?>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::text('facebook',@$ico_id->facebook, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.facebook'),'id'=>'facebook'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('facebook')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.twitter')); ?>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::text('twitter',@$ico_id->twitter, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.twitter'),'id'=>'twitter'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('twitter')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.linkedin')); ?>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::text('linkedin',@$ico_id->linkedin, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.linkedin'),'id'=>'linkedin'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('linkedin')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.slack_chat')); ?>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::text('slack_chat',@$ico_id->slack_chat, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.slack_chat'),'id'=>'slack_chat'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('slack_chat')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.telegram_chat')); ?>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::text('telegram_chat',@$ico_id->telegram_chat, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.telegram_chat'),'id'=>'telegram_chat'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('telegram_chat')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.github')); ?>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::text('github',@$ico_id->github, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.github'),'id'=>'github'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('github')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

        </div>

        <!-- Footer Buttons -->
        <div class="panel-main-btns row marT40">
            <!-- Using anchor tags for link instead of button submit tag -->
            <div class="col-xs-6">
                <a href="<?php echo e(url("startup/edit-ico/$ico_id->id")); ?>" class="primary-btn is-slim is-ghost-btn prev-btn">Previous</a>
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
        jQuery('#validateSocialForm').validate({

            debug: true,
            errorClass: 'text-danger',
            errorElement: 'span',
            rules: {
                website: {
                required: true
            },
            blog: {
                required: true
            },
            whitepaper: {
                required: true
            },
            facebook: {
                required: true
            },
            twitter: {
                required: true
            },
            linkedin: {
                required: true
            },
            slack_chat: {
                required: true
            },
            telegram_chat: {
                required: true
            },
            github: {
                required: true
            }

            },
            messages: {

                website: {
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