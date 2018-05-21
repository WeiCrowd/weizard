<?php $__env->startSection('head_icon'); ?>
  hvr-buzz-out fa fa-user-secret
<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
  
   <?php if(@$edit_ico->id): ?>
  <?php echo e(Lang::get('common.Edit')); ?> <?php echo e(Lang::get('admin/user/ico.Heading')); ?>

  <?php else: ?>
  <?php echo e(Lang::get('common.Add')); ?> <?php echo e(Lang::get('admin/user/ico.Heading')); ?>  
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sub_heading'); ?>
  <?php echo e(Lang::get('admin/user/ico.Sub_Heading')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('breadcrumb'); ?>
<?php echo e(Lang::get('common.Manage')); ?> <?php echo e(Lang::get('admin/user/ico.Heading')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-sm-12 col-md-12">
        <!-- Green Panel -->
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo e(Lang::get('common.Edit')); ?> <?php echo e(Lang::get('admin/user/ico.Add')); ?></h4>
                </div>
                <span class="help-span pull-right"><a data-toggle="modal" data-target="#modal-lg">
                    </a></span>
            </div>
            <div class="panel-body">
                <?php echo e(Form::open(['method' => 'PUT','class'=>'form-horizontal','id'=>'validateIcoForm','autocomplete'=>'off', 'url'=> 'admin/ico/'. @$edit_ico->id, 'enctype' => 'multipart/form-data'])); ?>

                <?php echo e(Form::hidden('id', @$edit_ico->id, ['id'=>'edit_id'])); ?>

                <?php echo e(csrf_field()); ?>

                     
            <div class="Address row">
                <div class="col-md-12 bottom20">
                    <label><strong>Basic Detail :</strong></label>
                </div>
                <div class=" ">
                    
                    <div class="form-group <?php echo e($errors->has('category_id') ? 'has-error' : ''); ?>">
                        <label for="ico_type" class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.ico_category')); ?></label>
                        <div class="col-md-6">
                            <?php echo e(Form::select('category_id', [''=>'Select Category']+@$category,@$edit_ico->category_id, ['class' => 'form-control', 'id' => "category_id"])); ?>

                            <span class="text-danger"><?php echo e($errors->first('category_id')); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                        <label for="name" class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.ico_name')); ?></label>
                        <div class="col-md-6">
                            <?php echo e(Form::text('name', @$edit_ico->name, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.ico_name'),'id'=>'name'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group <?php echo e($errors->has('symbol') ? 'has-error' : ''); ?>" id="symbol_div">
                        <label for="symbol" class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.symbol')); ?></label>
                        <div class="col-md-6">
                            <?php echo e(Form::text('symbol', @$edit_ico->symbol, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.symbol'),'id'=>'symbol'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('symbol')); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group <?php echo e($errors->has('symbol_image') ? 'has-error' : ''); ?>" id="symbol_img_div">
                        <label for="symbol_image" class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.symbol_image')); ?></label>
                        <div class="col-md-6">
                            <input type="file" class="form-control symbol_image" id="symbol_image" name="symbol_image" value="<?php echo e(@$edit_ico->symbol_image); ?>">
                            <span class="text-danger"><?php echo e($errors->first('symbol_image')); ?></span>
                        </div>
                    </div>
                    
                    <?php if(!empty(@$edit_ico->symbol_image)): ?>
                    <div class="form-group">
                        <div class="col-md-6 control-label">
                            <img src="<?php echo e(asset('/ICO/SymbolImage/'.@$edit_ico->symbol_image)); ?>" width="100px" height="100px">
                            <?php echo e(Form::hidden('old_symbol_image', @$edit_ico->symbol_image,['id'=>'old_symbol_image'])); ?>

                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="form-group <?php echo e($errors->has('short_description') ? 'has-error' : ''); ?>">
                        <label for="short_description" class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.short_description')); ?></label>
                        <div class="col-md-6">
                            <?php echo e(Form::textarea('short_description', @$edit_ico->short_description, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.short_description'),'id'=>'short_description','size' => '30x5'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('short_description')); ?></span>
                        </div>
                    </div>

                    <div class="form-group <?php echo e($errors->has('start_time ') ? 'has-error' : ''); ?>">
                        <label for="start_time" class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.start_time')); ?></label>
                        <div class="col-md-6">
                            <?php echo e(Form::text('start_time',  @$edit_ico->start_time, ['class' => 'form-control form_datetime','placeholder'=>Lang::get('startup/ico.start_time'),'readonly'=>'true', 'data-date-format' =>'dd/mm/yyyy hh:ii:ss'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('start_time')); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group <?php echo e($errors->has('end_time ') ? 'has-error' : ''); ?>">
                        <label for="end_time" class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.end_time')); ?></label>
                        <div class="col-md-6">
                            <?php echo e(Form::text('end_time',  @$edit_ico->end_time, ['class' => 'form-control form_datetime','placeholder'=>Lang::get('startup/ico.end_time'),'readonly'=>'true', 'data-date-format' =>'dd/mm/yyyy hh:ii:ss'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('end_time')); ?></span>
                        </div>
                    </div>
                    
                    <!-- Form Group -->
            <div class="form-group ">
                    <label class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.token_price')); ?><span class="text-danger">*</span>:</label>
                <div class="col-md-6">
                    <?php echo e(Form::text('token_price', @$edit_ico->token_price, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.token_price'),'id'=>'token_price'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('token_price')); ?></span>
                </div>
            </div>
            <!-- Form Group -->
            
            <!-- Form Group -->
            <div class="form-group ">
                    <label class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.whitelist')); ?>:</label>
                <div class="col-md-6">
                    <?php echo e(Form::select('whitelist', ['Yes'=>'Yes','No'=>'No'], @$edit_ico->whitelist, ['class' => 'form-control','id'=>'whitelist'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('whitelist')); ?></span>
                </div>
            </div>
            <!-- Form Group -->
            
            <!-- Form Group -->
            <div class="form-group ">
                    <label class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.kyc')); ?>:</label>
                <div class="col-md-6">
                    <?php echo e(Form::select('kyc', ['Yes'=>'Yes','No'=>'No'], @$edit_ico->kyc, ['class' => 'form-control','id'=>'kyc'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('kyc')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

                    <div class="form-group <?php echo e($errors->has('soft_cap') ? 'has-error' : ''); ?>">
                        <label for="soft_cap" class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.soft_cap')); ?></label>
                        <div class="col-md-6">
                            <?php echo e(Form::text('soft_cap',  @$edit_ico->soft_cap, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.soft_cap'),'id'=>'soft_cap'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('soft_cap')); ?></span>
                        </div>
                    </div>
                    
                     <!-- Form Group -->
            <div class="form-group ">
                    <label class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.hardcap')); ?><span class="text-danger">*</span>:</label>
                <div class="col-sm-6">
                    <?php echo e(Form::text('hardcap',  @$edit_ico->hardcap, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.hardcap'),'id'=>'hardcap'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('hardcap')); ?></span>
                </div>
            </div>
            <!-- Form Group -->
            
             <!-- Form Group -->
            <div class="form-group ">
                    <label class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.restriction')); ?><span class="text-danger">*</span>:</label>
                <div class="col-sm-6">
                    <?php echo e(Form::text('restriction',  @$edit_ico->restriction, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.restriction'),'id'=>'restriction'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('restriction')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

             <!-- Form Group -->
            <div class="form-group ">
                    <label class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.accepts')); ?><span class="text-danger">*</span>:</label>
                <div class="col-sm-6">
                    <?php echo e(Form::text('accepts',  @$edit_ico->accepts, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.accepts'),'id'=>'accepts'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('accepts')); ?></span>
                </div>
            </div>
            <!-- Form Group -->

                    <div class="form-group <?php echo e($errors->has('technology') ? 'has-error' : ''); ?>">
                        <label for="technology" class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.technology')); ?></label>
                        <div class="col-md-6">
                            <?php echo e(Form::text('technology',  @$edit_ico->technology, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.technology'),'id'=>'technology'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('technology')); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group <?php echo e($errors->has('origin_country') ? 'has-error' : ''); ?>">
                        <label for="origin_country" class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.origin_country')); ?></label>
                        <div class="col-md-6">
                            <?php echo e(Form::text('origin_country',  @$edit_ico->origin_country, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.origin_country'),'id'=>'origin_country'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('origin_country')); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group <?php echo e($errors->has('banner_image') ? 'has-error' : ''); ?>">
                        <label for="banner_image" class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.banner_image')); ?></label>
                        <div class="col-md-6">
                            <input type="file" class="form-control banner_image" id="banner_image" name="banner_image">
                            <span class="text-danger"><?php echo e($errors->first('banner_image')); ?></span>
                        </div>
                    </div>
                    
                    <?php if(!empty(@$edit_ico->banner_image)): ?>
                    <div class="form-group">
                        <div class="col-md-6 control-label">
                            <img src="<?php echo e(asset('/ICO/BannerImage/'.@$edit_ico->banner_image)); ?>" width="100px" height="100px">
                            <?php echo e(Form::hidden('old_banner_image', @$edit_ico->banner_image)); ?>

                        </div>
                    </div>
                    <?php endif; ?>
                                       
                    
                    <div class="form-group <?php echo e($errors->has('logo_image') ? 'has-error' : ''); ?>">
                        <label for="logo_image" class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.logo_image')); ?></label>
                        <div class="col-md-6">
                            <input type="file" class="form-control logo_image" id="logo_image" name="logo_image" value="<?php echo e(@$edit_ico->logo_image); ?>">
                            <span class="text-danger"><?php echo e($errors->first('logo_image')); ?></span>
                        </div>
                    </div>
                    
                    <?php if(!empty(@$edit_ico->logo_image)): ?>
                    <div class="form-group">
                        <div class="col-md-6 control-label">
                            <img src="<?php echo e(asset('/ICO/LogoImage/'.@$edit_ico->logo_image)); ?>" width="100px" height="100px">
                            <?php echo e(Form::hidden('old_logo_image', @$edit_ico->logo_image)); ?>

                        </div>
                    </div>
                    <?php endif; ?>
                                        
                </div>
            </div>
                    
                    <div class="Address row">
                <div class="col-md-12 bottom20">
                    <label><strong>Social Links :</strong></label>
                </div>
                
                    <div class="form-group <?php echo e($errors->has('video') ? 'has-error' : ''); ?>">
                        <label for="website" class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.video')); ?></label>
                        <div class="col-md-6">
                            <?php echo e(Form::text('video',  @$edit_ico->video, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.video_url'),'id'=>'video'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('video')); ?></span>
                        </div>
                    </div>
                <div class="form-group <?php echo e($errors->has('website') ? 'has-error' : ''); ?>">
                        <label for="website" class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.website')); ?></label>
                        <div class="col-md-6">
                            <?php echo e(Form::text('website',  @$edit_ico->website, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.website'),'id'=>'website'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('website')); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group <?php echo e($errors->has('blog') ? 'has-error' : ''); ?>">
                        <label for="blog" class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.blog')); ?></label>
                        <div class="col-md-6">
                            <?php echo e(Form::text('blog',  @$edit_ico->blog, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.blog'),'id'=>'blog'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('blog')); ?></span>
                        </div>
                    </div>

                    <div class="form-group <?php echo e($errors->has('whitepaper') ? 'has-error' : ''); ?>">
                        <label for="whitepaper" class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.whitepaper')); ?></label>
                        <div class="col-md-6">
                            <?php echo e(Form::text('whitepaper',@$edit_ico->whitepaper, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.whitepaper'),'id'=>'whitepaper'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('whitepaper')); ?></span>
                        </div>
                    </div>
                        
                <div id="items">
                    <?php if(count(@$edit_social) >0): ?>
                    <?php $__currentLoopData = @$edit_social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group <?php echo e($errors->has('link_type') ? 'has-error' : ''); ?>">
                        <label for="website" class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.link_type')); ?></label>
                        <div class="col-md-6">
                            <?php echo e(Form::select('link_type[]', [''=>'Select']+@$link_type ,$value->link_type, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.link_type'),'id'=>'link_type0'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('website')); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group <?php echo e($errors->has('url') ? 'has-error' : ''); ?>">
                        <label for="website" class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.url')); ?></label>
                        <div class="col-md-6">
                            <?php echo e(Form::text('url[]',  $value->url, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.url'),'id'=>'url0'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('url')); ?></span>
                        </div>
                    </div>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <div class="form-group row">
                <div class="col-md-3 col-sm-4">
                            <a class="uppercase add_field_button" href="javascript:;">+Add More</a>
                        </div>
                </div>
                </div>
            </div>
            
            
            <div class="Address row">
                <div class="col-md-12 bottom20">
                    <label><strong>Team :</strong></label>
                </div>
                <?php if(@$edit_ico->id != ""): ?>
                <div class="member_name">
                <?php $__currentLoopData = @$edit_team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ico_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                    <div class="form-group <?php echo e($errors->has('member_name') ? 'has-error' : ''); ?>">
                        <label for="member_name" class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.member_name')); ?></label>
                        <div class="col-md-6">
                            <?php echo e(Form::text('member_name[]',$ico_data['member_name'], ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.member_name'),'id'=>'member_name'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('member_name')); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group <?php echo e($errors->has('member_designation') ? 'has-error' : ''); ?>">
                        <label for="member_designation" class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.member_designation')); ?></label>
                        <div class="col-md-6">
                            <?php echo e(Form::text('member_designation[]',$ico_data['member_designation'], ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.member_designation'),'id'=>'member_designation'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('member_designation')); ?></span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php else: ?>
                
                <div class="member_name">
                    <div class="form-group <?php echo e($errors->has('member_name') ? 'has-error' : ''); ?>">
                        <label for="member_name" class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.member_name')); ?></label>
                        <div class="col-md-6">
                            <?php echo e(Form::text('member_name[]','', ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.member_name'),'id'=>'member_name'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('member_name')); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group <?php echo e($errors->has('member_designation') ? 'has-error' : ''); ?>">
                        <label for="member_designation" class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.member_designation')); ?></label>
                        <div class="col-md-6">
                            <?php echo e(Form::text('member_designation[]','', ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.member_designation'),'id'=>'member_designation'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('member_designation')); ?></span>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="col-md-3 col-sm-4">
                             <a style="cursor: pointer;" class="add-btn" id="addmore" data-counter="form-accordion0">+Add More</a>
                        </div>
               
            </div>
           <div class="Address row">
                <div class="col-md-12 bottom20">
                    <label><strong>Project Details :</strong></label>
                </div>     
            
            <div class="form-group <?php echo e($errors->has('concept') ? 'has-error' : ''); ?>">
                <label for="concept" class="col-md-4 control-label"><?php echo e(Lang::get('startup/ico.concept')); ?></label>
                <div class="col-md-6">
                    <?php echo e(Form::textarea('concept',  @$edit_ico->concept, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.concept'),'id'=>'concept'])); ?>

                    <span class="text-danger"><?php echo e($errors->first('concept')); ?></span>
                </div>
            </div>
           </div>

                
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                    <a class="btn btn-primary" href="<?php echo e(url('admin/ico')); ?>">Cancel</a>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

            
            </div>
           
        </div>
    </div>
    
</div>

                            
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
<script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>
<script type="text/javascript">
 $(document).ready(function() {
CKEDITOR.replace('concept');
  $("#concept").trigger('onchange');
 var id = $("#edit_id").val();
 if(id != ''){
    var symImg = $("#old_symbol_image").val();
   
    if(typeof symImg == 'undefined'){
        $("#symbol_div").show();
        $("#symbol_img_div").hide();
    }else{
        $("#symbol_div").hide();
        $("#symbol_img_div").show();
    }
    
    jQuery('#validateIcoForm').validate({

       // initialize the plugin
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
            technology: {
                required: true
            },
            origin_country: {
                required: true
            },
            kyc_id: {
                required: true
            },
            video: {
                url: true
            },
            website: {
                required: true,
                url: true
            },
            blog: {
                //required: true
                url: true
            },
            whitepaper: {
                required: true,
                url: true
            },
            'member_name[]': {
                required: true
            },
            'member_designation[]': {
                required: true
            },
            'url[]': {
                mytst: true
            },
            'link_type[]': {
                linktype: true
            }
        },
        messages:{

            name:{
              required: 'This field is required.'
            }
        },
    submitHandler: function (form) {
            form.submit();
        }

    });
    
    $.validator.addMethod("mytst", function (value, element) {
        var flag = true;
                
      $("[name^=url]").each(function (i, j) {
                        $(this).parent('div').find('label.text-danger ').remove();
                        if ($.trim($(this).val()) == '') {
                            flag = false;
                            $(this).parent('div').append('<label  id="url'+i+'-error" class="text-danger pull-left">This field is required.</label>');
                        }
                    });
                
                
                    return flag;


    }, "");
    
     $.validator.addMethod("linktype", function (value, element) {
        var flag = true;
                
      $("[name^=link_type]").each(function (i, j) {
                        $(this).parent('div').find('label.text-danger ').remove();
                        if ($.trim($(this).val()) == '') {
                            flag = false;
                            $(this).parent('div').append('<label  id="link_type'+i+'-error" class="text-danger pull-left">This field is required.</label>');
                        }
                    });
                    return flag;
    }, "");
 } 
 
 $('.form_datetime').datetimepicker({
// format: 'dd/mm/yyyy H:i:s',
//  weekStart: 1,
    todayBtn: true,
    autoclose: true,
    todayHighlight: 1,
    use24hours: true
            // startView: 2,
            //forceParse: 0,
            //  showMeridian:false
});

 
 //Add more functionality    
 var max_fields = 10; //maximum input boxes allowed 
 var wrapper = $(".member_name"); 
 //Fields wrapper 
 var add_button = $("#addmore"); 
 //Add button ID 
 var x = 1; 
 //initlal text box count 
 $(add_button).click(function(e){ 
 //on add input button click 
 e.preventDefault(); 
 if(x < max_fields){ 
 //max input box allowed 
 x++; 
 //text box increment 
 $(wrapper).append('<div class="member_name clone-div"><div class="form-group "><label for="member_name" class="col-md-4 control-label">Member Name</label> <div class="col-md-6"><input placeholder="Member Name" id="member_name" name="member_name[]" type="text" value="" class="form-control"> <span class="text-danger"></span></div></div> <div class="form-group "><label for="member_designation" class="col-md-4 control-label">Member Designation</label> <div class="col-md-6"><input placeholder="Member Designation" id="member_designation" name="member_designation[]" type="text" value="" class="form-control"> <span class="text-danger"></span></div></div><a href="javascript:void(0);" class="remove_field remove-btn">Remove</a></div>'); 
 //add input box 
 } }); 
 $(wrapper).on("click",".remove_field", function(e){ 
     //user click on remove text 
     e.preventDefault(); 
     $(this).closest('.clone-div').remove(); x--; })
     
     
     
    
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
    
    $("#symbol_image").change(function(){
        if($(this).val() != ""){
            $("#symbol_div").hide();
        }else{
            $("#symbol_div").show();
        }
    });
    
    $("#symbol").keyup(function(){
        if($(this).val() != ""){
            $("#symbol_img_div").hide();
        }else{
            $("#symbol_img_div").show();
        }
    });
    
    
       
    var social_max_fields = 20; //maximum input boxes allowed
    var social_wrapper = $("#items"); //Fields wrapper
    var social_add_button = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(social_add_button).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields){ //max input box allowed
    x++; //text box increment
    $(social_wrapper).append('<div class="form-group-main"><div class="form-group row"><div class="col-md-4 col-sm-4"><label style="width:100%" class="control-label">Link Type<span class="required">*</span>:</label></div>' +
    '<div class="col-sm-6">'+ '<?php echo e(Form::select('link_type[]', [''=>'Select']+@$link_type, '', ['class' => 'form-control','id'=>''])); ?>' +'</div></div>' +
    '<div class="form-group row"><div class="col-md-4 col-sm-4"><label style="width:100%" class="control-label">URL<span class="required">*</span>:</label></div>'+
    '<div class="col-sm-6"><input class="form-control" id="" type="text" placeholder="URL" name="url[]"/></div></div><a href="#" class="social_remove_field remove-btn" title="Remove">Remove</a></div>'); //add input box
    }
    });
     
$(social_wrapper).on("click",".social_remove_field", function(e){ //user click on remove field
        e.preventDefault(); 
        $(this).parent('div.form-group-main').remove(); ;
    });

    
});
   
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', ['startup_active' => 'active', 'ico_active' => 'active'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>