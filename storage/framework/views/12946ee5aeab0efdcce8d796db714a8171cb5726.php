<?php $__env->startSection('content'); ?>

<!-- Dashboard Content -->
<div class="dashboard-content">
<div class="hidden-md hidden-lg"><?php echo $__env->make('front.common.responsive_left_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

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
                </ul>
                <!-- Pagination -->
            </div>
            <!-- Aside Top -->

            <!-- Aside Center -->
            <div class="panel-aside-center panel-aside-item">
                <div class="panel-aside-icon"><img src="<?php echo e(asset('content/images/panel-info-icon.svg')); ?>" alt="Info" /></div>
                <h5 class="panel-aside-heading">Add Basic Details</h5>
                <p class="panel-aside-text">Add details like ICO Name, Symbol, Short Description, Concept…</p>
            </div>
            <!-- Aside Center -->

            <!-- Aside Bottom -->
            <div class="panel-aside-bottom panel-aside-item has-border-top">
                <a href="mailto:support@weizard" class="text-link">support@weizard.com</a>
            </div>
            <!-- Aside Bottom -->

        </div>
<!--validateIcoForm-->
        <?php echo e(Form::open(['method' => 'POST','class'=>'panel-main form panel-form has-left-labels','id'=>'validateIcoForm','autocomplete'=>'off', 'url'=> route('social_information'), 'enctype' => 'multipart/form-data'])); ?>

        <?php echo e(Form::hidden('id', @$edit_ico->id, ['id'=>'edit_id'])); ?>

        <?php echo e(csrf_field()); ?>

        <div class="form-group-wrap">
            <h1 class="form-heading marB40 marB20-xs">Basic Information</h1>
            
            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.ico_category')); ?><span class="required">*</span>:</label>
                </div>
                <div class="col-md-6 col-sm-6">
                    <?php echo e(Form::select('category_id', [''=>'Please Select Category']+@$category, @$edit_ico->category_id, ['class' => 'form-control','id'=>'category_id'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('category_id')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.ico_name')); ?><span class="required">*</span>:</label>
                </div>
                <div class="col-md-6 col-sm-6">
                    <?php echo e(Form::text('name', @$edit_ico->name, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.ico_name'),'id'=>'name'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row" id="symbol_div">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.symbol')); ?><span class="required">*</span>:</label>
                </div>
                <div class="col-md-6 col-sm-6">
                    <?php echo e(Form::hidden('hiddenSymbol', @$edit_ico->symbol, ['id'=>'hiddenSymbol'])); ?>

                    <?php echo e(Form::text('symbol', @$edit_ico->symbol, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.symbol'),'id'=>'symbol'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('symbol')); ?></span>
                    <span class="text-danger" id="errorMsg" style="display:none;"></span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.token_price')); ?><span class="required">*</span>:</label>
                </div>
                <div class="col-md-6 col-sm-6">
                    <?php echo e(Form::text('token_price', @$edit_ico->token_price, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.token_price'),'id'=>'token_price'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('token_price')); ?></span>
                </div>
            </div>
            <!-- Form Group -->
            
            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.whitelist')); ?><span class="required">*</span>:</label>
                </div>
                <div class="col-md-6 col-sm-6">
                    <?php echo e(Form::select('whitelist', ['Yes'=>'Yes','No'=>'No'], @$edit_ico->whitelist, ['class' => 'form-control','id'=>'whitelist'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('whitelist')); ?></span>
                </div>
            </div>
            <!-- Form Group -->
            
            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.kyc')); ?><span class="required">*</span>:</label>
                </div>
                <div class="col-md-6 col-sm-6">
                    <?php echo e(Form::select('kyc', ['Yes'=>'Yes','No'=>'No'], @$edit_ico->kyc, ['class' => 'form-control','id'=>'kyc'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('kyc')); ?></span>
                </div>
            </div>
            <!-- Form Group -->


            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.start_time')); ?><span class="required">*</span>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::text('start_time',  @$edit_ico->start_time?@date("d/m/Y H:i:s",strtotime($edit_ico->start_time)):'', ['class' => 'form-control form_datetime','placeholder'=>Lang::get('startup/ico.start_time'),'readonly'=>'true', 'data-date-format' =>'dd/mm/yyyy hh:ii:ss'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('start_time')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.end_time')); ?><span class="required">*</span>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::text('end_time',  @$edit_ico->end_time?@date("d/m/Y H:i:s",strtotime(@$edit_ico->end_time)):'', ['class' => 'form-control form_datetime','placeholder'=>Lang::get('startup/ico.end_time'),'readonly'=>'true', 'data-date-format' =>'dd/mm/yyyy hh:ii:ss'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('end_time')); ?></span>
                </div>
            </div>
            <!-- Form Group -->
            
            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.technology')); ?><span class="required">*</span>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::text('technology',  @$edit_ico->technology, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.technology'),'id'=>'technology'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('technology')); ?></span>
                </div>
            </div>
            <!-- Form Group -->
            
            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.soft_cap')); ?><span class="required">*</span>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::text('soft_cap',  @$edit_ico->soft_cap, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.soft_cap'),'id'=>'soft_cap'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('soft_cap')); ?></span>
                </div>
            </div>
            <!-- Form Group -->
            
            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.hardcap')); ?><span class="required">*</span>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::text('hardcap',  @$edit_ico->hardcap, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.hardcap'),'id'=>'hardcap'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('hardcap')); ?></span>
                </div>
            </div>
            <!-- Form Group -->
            
             <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.restriction')); ?><span class="required">*</span>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::text('restriction',  @$edit_ico->restriction, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.restriction'),'id'=>'restriction'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('restriction')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

             <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.accepts')); ?><span class="required">*</span>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::text('accepts',  @$edit_ico->accepts, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.accepts'),'id'=>'accepts'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('accepts')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

            
            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label"><?php echo e(Lang::get('startup/ico.origin_country')); ?><span class="required">*</span>:</label>
                </div>
                <div class="col-sm-6">
                    <?php echo e(Form::text('origin_country',  @$edit_ico->origin_country, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.origin_country'),'id'=>'origin_country'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('origin_country')); ?></span>
                </div>
            </div>
            <!-- Form Group -->
           
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

//       $("#symbol_image").change(function () {
//            if ($(this).val() != "") {
//                $("#symbol_div").hide();
//            } else {
//                $("#symbol_div").show();
//            }
//        });
//
//        $("#symbol").keyup(function () {
//            if ($(this).val() != "") {
//                $("#symbol_img_div").hide();
//            } else {
//                $("#symbol_img_div").show();
//            }
//        });


        $('.form_datetime').datetimepicker({
            todayBtn: true,
            autoclose: true,
            todayHighlight: 1,
            use24hours: true,
        });
        
        var id = $("#edit_id").val();
        if (id != '') {
//            var symImg = $("#old_symbol_image").val();
//
//            if (typeof symImg == 'undefined') {
//                $("#symbol_div").show();
//                $("#symbol_img_div").hide();
//            } else {
//                $("#symbol_div").hide();
//                $("#symbol_img_div").show();
//            }

            jQuery('#validateIcoForm').validate({

                debug: true,
                errorClass: 'text-danger',
                errorElement: 'span',
                rules: {
                    name: {
                        required: true
                    },
                    symbol: {
                        required: true,            
                    },
                    short_description: {
                        required: true
                    },
                    start_time: {
                        required: true
                    },
                    end_time: {
                        required: true
                    },
                    soft_cap: {
                        required: true,
                        number: true
                    },
                    hardcap: {
                        required: true,
                        number: true
                    },
                    restriction: {
                        required: true
                    },
                    accepts: {
                        required: true
                    },
                    token_price: {
                        required: true,
                        number: true
                    },
                    whitelist: {
                        required: true,
                    },
                    kyc: {
                        required: true,
                    },
                    technology: {
                        required: true
                    },
                    origin_country: {
                        required: true
                    }

                },
                messages: {

                    name: {
                        required: 'This field is required.'
                    },
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
                        required: true,
                        remote: {
                            url: "check-symbol",
                            type: "get",
                        }
                    },
                    symbol_image: {
                        required: true
                    },
                    short_description: {
                        required: true
                    },
                    start_time: {
                        required: true
                    },
                    end_time: {
                        required: true
                    },
                    soft_cap: {
                        required: true,
                        number: true
                    },
                    hardcap: {
                        required: true,
                        number: true
                    },
                    restriction: {
                        required: true
                    },
                    accepts: {
                        required: true
                    },
                    token_price: {
                        required: true,
                        number: true
                    },
                    whitelist: {
                        required: true,
                    },
                    kyc: {
                        required: true,
                    },
                    technology: {
                        required: true
                    },
                    origin_country: {
                        required: true
                    }

                },
                messages: {

                    name: {
                        required: 'This field is required.'
                    },
                    symbol: {
                        remote : "Symbol already exist."
                    },
                },
                submitHandler: function (form) {
                    form.submit();
                }

            });
        }
        
        
    });
    
//     $(document).on('focusout', '#symbol',function () {
//        $.checkSymbol();
//    });
//    
    $.checkSymbol = function (e) {
        $.ajax({
             type: 'POST',
             url: 'check-symbol',
             headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"},
             dataType: 'JSON',
             data: {'symbol': $('#symbol').val()},
             success: function (res) {
                 if(res.status == 'true'){
                     $("#errorMsg").hide();
                     return true;
                 }else{
                     $("#errorMsg").html(res.msg);
                     $("#errorMsg").show();
                     return false;
                 }
             },
             complete: function () {

             }
         });
    };

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>