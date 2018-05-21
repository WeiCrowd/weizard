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
                    <li><a class="active" href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <!--                            <li><a href="#">4</a></li>-->
                </ul>
                <!-- Pagination -->
            </div>
            <!-- Aside Top -->

            <!-- Aside Center -->
            <div class="panel-aside-center panel-aside-item">
                <div class="panel-aside-icon"><img src="<?php echo e(asset('content/images/panel-info-icon.svg')); ?>" alt="Info" /></div>
                <h5 class="panel-aside-heading">Add Basic Details</h5>
                <p class="panel-aside-text">Add details like ICO Type, ICO Name, Symbol, Short Description, Concept…</p>
            </div>
            <!-- Aside Center -->

            <!-- Aside Bottom -->
            <div class="panel-aside-bottom panel-aside-item has-border-top">
<!--                <p><a href="#" class="theme-color medium-font">Save and Exist</a></p>-->
                <a href="mailto:support@weicrowd.com" class="text-link">support@weicrowd.com</a>
            </div>
            <!-- Aside Bottom -->

        </div>
<!--validateIcoForm-->
        <?php echo e(Form::open(['method' => 'POST','class'=>'panel-main form panel-form has-left-labels','id'=>'','autocomplete'=>'on', 'url'=> route('social_information'), 'enctype' => 'multipart/form-data'])); ?>

        <?php echo e(Form::hidden('id', @$edit_ico->id, ['id'=>'edit_id'])); ?>

        <?php echo e(csrf_field()); ?>

        <div class="form-group-wrap">
            <h1 class="form-heading marB40 marB20-xs">Basic Information</h1>

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.ico_type')); ?>:</label>
                </div>
                <div class="col-sm-6">
                    <ul class="list-inline">
                        <li>
                            <div class="form-check form-control">
                                <input name="ico_type" type="radio" checked class="form-check-input" value="I" />
                                <label class="form-check-label">ICO</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check form-control">
                                <input name="ico_type" type="radio" class="form-check-input" value="P" />
                                <label class="form-check-label">Pre-ICO</label>
                            </div>
                        </li>
                    </ul>
                    <span class="text-danger"><?php echo e($errors->first('ico_type')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.ico_category')); ?>:</label>
                </div>
                <div class="col-md-3 col-sm-4">
                    <?php echo e(Form::select('category_id', [''=>'Please Select Category']+@$category, @$edit_ico->category_id, ['class' => 'form-control','id'=>'category_id'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('category_id')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.ico_name')); ?>:</label>
                </div>
                <div class="col-md-3 col-sm-4">
                    <?php echo e(Form::text('name', @$edit_ico->name, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.ico_name'),'id'=>'name'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row" id="symbol_div">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.symbol')); ?>:</label>
                </div>
                <div class="col-md-3 col-sm-4">
                    <?php echo e(Form::text('symbol', @$edit_ico->symbol, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.symbol'),'id'=>'symbol'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('symbol')); ?></span>
                </div>
            </div>
            <!-- Form Group -->



            <!-- Form Group -->
            <div class="form-group row" id="symbol_img_div">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.symbol_image')); ?>:</label>
                </div>
                <div class="col-sm-6">
                    <div class="custom-input-file form-control">
                        <input type="file" class="form-control symbol_image inputfile" id="symbol_image" name="symbol_image" value="<?php echo e(@$edit_ico->symbol_image); ?>">
                        
                        <label>
                            <span class="selected-value">Upload <?php echo e(Lang::get('startup/ico.symbol_image')); ?></span>
                        </label>
                    </div>
                    <span class="text-danger"><?php echo e($errors->first('symbol_image')); ?></span>
                </div>
            </div>
            <!-- Form Group -->


            <?php if(!empty(@$edit_ico->symbol_image)): ?>
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"></label>
                </div>
                <div class="col-md-3  col-sm-4">
                    <img src="<?php echo e(asset('/ICO/SymbolImage/'.@$edit_ico->symbol_image)); ?>" width="100px" height="100px">
                    <?php echo e(Form::hidden('old_symbol_image', @$edit_ico->symbol_image,['id'=>'old_symbol_image'])); ?>

                </div>
            </div>
            <?php endif; ?>



            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.short_description')); ?>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::textarea('short_description', @$edit_ico->short_description, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.short_description'),'id'=>'short_description','size' => '30x5'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('short_description')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.concept')); ?>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::textarea('concept',  @$edit_ico->concept, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.concept'),'id'=>'concept','size' => '30x5'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('concept')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.start_time')); ?>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::text('start_time',  @$edit_ico->start_time, ['class' => 'form-control form_datetime','placeholder'=>Lang::get('startup/ico.start_time'),'readonly'=>'true', 'data-date-format' =>'dd/mm/yyyy hh:ii:ss'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('start_time')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.end_time')); ?>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::text('end_time',  @$edit_ico->end_time, ['class' => 'form-control form_datetime','placeholder'=>Lang::get('startup/ico.end_time'),'readonly'=>'true', 'data-date-format' =>'dd/mm/yyyy hh:ii:ss'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('end_time')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.soft_cap')); ?>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::text('soft_cap',  @$edit_ico->soft_cap, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.soft_cap'),'id'=>'soft_cap'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('soft_cap')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.technology')); ?>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::text('technology',  @$edit_ico->technology, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.technology'),'id'=>'technology'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('technology')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.origin_country')); ?>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::text('origin_country',  @$edit_ico->origin_country, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.origin_country'),'id'=>'origin_country'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('origin_country')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.kyc_id')); ?>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::text('kyc_id',  @$edit_ico->kyc_id, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.kyc_id'),'id'=>'kyc_id'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('kyc_id')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.banner_image')); ?>:</label>
                </div>
                <div class="col-sm-6">
                    <div class="custom-input-file form-control">
                        <input type="file" class="form-control banner_image inputfile" id="banner_image" name="banner_image">
                        
                        <label>
                            <span class="selected-value">Upload banner image</span>
                        </label>
                    </div>
                    <span class="text-danger"><?php echo e($errors->first('banner_image')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <?php if(!empty(@$edit_ico->banner_image)): ?>
            <div class="form-group row">
                <div class="col-md-6 control-label">
                    <img src="<?php echo e(asset('/ICO/BannerImage/'.@$edit_ico->banner_image)); ?>" width="100px" height="100px">
                    <?php echo e(Form::hidden('old_banner_image', @$edit_ico->banner_image)); ?>

                </div>
            </div>
            <?php endif; ?>

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.logo_image')); ?>:</label>
                </div>
                <div class="col-sm-6">
                    <div class="custom-input-file form-control">
                        <input type="file" class="form-control logo_image inputfile" id="logo_image" name="logo_image" value="<?php echo e(@$edit_ico->logo_image); ?>">
                        
                        <label>
                            <span class="selected-value">Upload Logo image</span>
                        </label>
                    </div>
                    <span class="text-danger"><?php echo e($errors->first('logo_image')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <?php if(!empty(@$edit_ico->logo_image)): ?>
            <div class="form-group row">
                <div class="col-md-6 control-label">
                    <img src="<?php echo e(asset('/ICO/LogoImage/'.@$edit_ico->logo_image)); ?>" width="100px" height="100px">
                    <?php echo e(Form::hidden('old_logo_image', @$edit_ico->logo_image)); ?>

                </div>
            </div>
            <?php endif; ?>

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.kyc_doc')); ?>:</label>
                </div>
                <div class="col-sm-6">
                    <div class="custom-input-file form-control">
                        <input type="file" class="form-control kyc_doc inputfile" id="kyc_doc" name="kyc_doc" value="<?php echo e(@$edit_ico->kyc_doc); ?>">
                        
                        <label>
                            <span class="selected-value">Upload KYC document pdf</span>
                        </label>
                    </div>
                </div>
                <span class="text-danger"><?php echo e($errors->first('kyc_doc')); ?></span>
            </div>
            <!-- Form Group -->

            <?php if(!empty(@$edit_ico->kyc_doc)): ?>
            <div class="form-group">
                <div class="col-md-6 control-label">
                    <img src="<?php echo e(asset('/ICO/KycDoc/'.@$edit_ico->kyc_doc)); ?>" width="100px" height="100px">
                    <?php echo e(Form::hidden('old_kyc_doc', @$edit_ico->kyc_doc)); ?>

                </div>
            </div>
            <?php endif; ?>


        </div>

        <!-- Footer Buttons -->
        <div class="panel-main-btns row marT40">
            <!-- Using anchor tags for link instead of button submit tag -->
            <div class="col-xs-6">
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

<?php $__env->startSection('css'); ?>

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
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscript'); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $('#banner_image').change(function (e) {
            var ext = $('#banner_image').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                alert('invalid extension!');
                $("#banner_image").val('');
            }
        });

        $('#logo_image').change(function (e) {
            var ext = $('#logo_image').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                alert('invalid extension!');
                $("#logo_image").val('');
            }
        });

        $('#kyc_doc').change(function (e) {
            var ext = $('#kyc_doc').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                alert('invalid extension!');
                $("#kyc_doc").val('');
            }
        });

        $("#symbol_image").change(function () {
            if ($(this).val() != "") {
                $("#symbol_div").hide();
            } else {
                $("#symbol_div").show();
            }
        });

        $("#symbol").keyup(function () {
            if ($(this).val() != "") {
                $("#symbol_img_div").hide();
            } else {
                $("#symbol_img_div").show();
            }
        });


        $('.form_datetime').datetimepicker({
            todayBtn: true,
            autoclose: true,
            todayHighlight: 1,
            use24hours: true,
        });
        
        var id = $("#edit_id").val();
        if (id != '') {
            var symImg = $("#old_symbol_image").val();

            if (typeof symImg == 'undefined') {
                $("#symbol_div").show();
                $("#symbol_img_div").hide();
            } else {
                $("#symbol_div").hide();
                $("#symbol_img_div").show();
            }

            jQuery('#validateIcoForm').validate({

                debug: true,
                errorClass: 'text-danger',
                errorElement: 'span',
                rules: {
                    name: {
                        required: true
                    },
                    symbol: {
                        required: true
                    },
                    short_description: {
                        required: true
                    },
                    concept: {
                        required: true
                    },
                    start_time: {
                        required: true
                    },
                    end_time: {
                        required: true
                    },
                    soft_cap: {
                        required: true
                    },

                    technology: {
                        required: true
                    },
                    origin_country: {
                        required: true
                    },
                    kyc_id: {
                        required: true
                    }

                },
                messages: {

                    name: {
                        required: 'This field is required.'
                    }
                },
                submitHandler: function (form) {
                    form.submit();
                }

            });
        } else {
            jQuery('#validateIcoForm').validate({

                debug: true,
                errorClass: 'text-danger',
                errorElement: 'span',
                rules: {
                    category_id: {
                        required: true
                    },
                    name: {
                        required: true
                    },
                    symbol: {
                        required: true
                    },
                    symbol_image: {
                        required: true
                    },
                    short_description: {
                        required: true
                    },
                    concept: {
                        required: true
                    },
                    start_time: {
                        required: true
                    },
                    end_time: {
                        required: true
                    },
                    soft_cap: {
                        required: true
                    },

                    technology: {
                        required: true
                    },
                    origin_country: {
                        required: true
                    },
                    kyc_id: {
                        required: true
                    },
                    banner_image: {
                        required: true
                    },
                    logo_image: {
                        required: true
                    },
                    kyc_doc: {
                        required: true
                    }

                },
                messages: {

                    name: {
                        required: 'This field is required.'
                    }
                },
                submitHandler: function (form) {
                    form.submit();
                }

            });
        }
        
        
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>