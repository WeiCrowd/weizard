<?php $__env->startSection('head_icon'); ?>
  hvr-buzz-out fa fa-user-secret
<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
  <?php if(@$edit_category->id): ?>
  <?php echo e(Lang::get('common.Edit')); ?> <?php echo e(Lang::get('admin/user/icocategory.Heading')); ?>

  <?php else: ?>
  <?php echo e(Lang::get('common.Add')); ?> <?php echo e(Lang::get('admin/user/icocategory.Heading')); ?>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sub_heading'); ?>
  <?php echo e(Lang::get('admin/user/icocategory.Sub_Heading')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<?php echo e(Lang::get('common.Manage')); ?> <?php echo e(Lang::get('admin/user/icocategory.Heading')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-sm-12 col-md-12">
        <!-- Green Panel -->
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>ICO Category</h4>
                </div>
                <span class="help-span pull-right"><a data-toggle="modal" data-target="#modal-lg">
                    </a></span>
            </div>
            <div class="panel-body">
                <?php if(@$edit_category->id): ?>
                <?php echo e(Form::open(['method' => 'PUT','class'=>'form-horizontal','id'=>'validateIcoForm','autocomplete'=>'off', 'url'=> 'admin/icocategory/'. @$edit_category->id, 'enctype' => 'multipart/form-data'])); ?>

                <?php echo e(Form::hidden('id', @$edit_category->id, ['id'=>'edit_id'])); ?>

                <?php else: ?>
                <?php echo e(Form::open(['method' => 'POST','class'=>'form-horizontal','id'=>'validateIcoForm','autocomplete'=>'off', 'url'=> 'admin/icocategory', 'enctype' => 'multipart/form-data'])); ?>

                <?php endif; ?>
                <?php echo e(csrf_field()); ?>

                     
                    <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                        <label for="name" class="col-md-4 control-label"><?php echo e(Lang::get('admin/user/icocategory.name')); ?></label>
                        <div class="col-md-6">
                            <?php echo e(Form::text('name', @$edit_category->name, ['class' => 'form-control','placeholder'=>Lang::get('admin/user/icocategory.name'),'id'=>'name'])); ?>

                            <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                        </div>
                    </div>
                    
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                    <a class="btn btn-primary" href="<?php echo e(url('admin/icocategory')); ?>">Cancel</a>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

            
            </div>
           
        </div>
    </div>
    
</div>

                            
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscript'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', ['startup_active' => 'active', 'ico_category_active' => 'active'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>