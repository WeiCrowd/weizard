<?php $__env->startSection('head_icon'); ?>
hvr-buzz-out fa fa-user-secret
<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
<?php echo e(Lang::get('common.Manage')); ?> <?php echo e(Lang::get('admin/user/icocategory.Heading')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sub_heading'); ?>
<?php echo e(Lang::get('admin/user/icocategory.Sub_Heading')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<?php echo e(Lang::get('common.Manage')); ?> <?php echo e(Lang::get('admin/user/icocategory.Heading')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="pull-right" style="margin: -8px 0 2px 0;">
    <a href="<?php echo e(url('admin/icocategory/add')); ?>">
        <button class="btn btn-labeled btn-success m-b-5" type="button">
            <span class="btn-label">
                <i class="glyphicon glyphicon-plus"></i>
            </span>
            Add New
        </button>
    </a>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <!-- Green Panel -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo e(Lang::get('admin/user/icocategory.icocategory_list')); ?></h4>
                </div>
            </div>
            <!-- Nav tabs -->
            
           <!-- Tab panels -->
            <!-- tab content -->
                    <div class="panel-body">
                       <div class="row">
                            <div class="table-responsive">
                                <table id="dataTableExample2" class="table table-bordered table-striped table-hover dataTableExample2">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th><?php echo e(Lang::get('admin/user/icocategory.name')); ?></th>
                                            <th><?php echo e(Lang::get('common.Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  $i = ($category->currentpage() - 1) * $category->perpage() + 1;  ?>
                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $id = $value['id']; ?>
                                        <tr>
                                            <th scope="row"><?php echo $i; ?></th>
                                            <td><?php echo e(ucwords($value['name'])); ?></td>
                                            <td>
                                                <a href="<?php echo e(url("admin/icocategory/$id/edit")); ?>"><button type="button" class="btn btn-primary btn-circle m-b-5"  title="<?php echo e(Lang::get('common.Edit')); ?>" ><i class="glyphicon glyphicon-edit"></i></button></a>
                                                <?php echo e(Form::button('<i class="glyphicon glyphicon-trash"></i>', array('class'=>'btn btn-danger btn-circle m-b-5 delete-category', 'title' => Lang::get("common.Delete"),'data-link'=>url("admin/icocategory/$id"), 'id' =>'delete-category', 'value' => $id))); ?>

                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    

                                </table>
                            </div>
                        </div>   
                    </div>
                    <div class="panel-footer">
                        <?php echo e($category->appends($_GET)->links('vendor/pagination/default')); ?>

                        <div class="pageTotal"><?php echo e(Lang::get('common.Total')); ?> <?php echo e($category->total()); ?> <?php echo e(Lang::get('common.Found')); ?></div>
                    </div>
                
            

        </div>
    </div>

</div>


<!-- Modal large inactive selected icos -->
<div class="modal fade" id="modal-lg-inactive-icos" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h1 class="modal-title">Inactive ICO</h1>
            </div>
            <div class="modal-body">
                <p>Do you want to inactive these ICO?</p>
            </div>
            <div class="modal-footer">
                <?php echo Form::open(
                array(
                'name' => 'frmcategory',
                'id' => 'frmcategory',
                'autocomplete' => 'off',
                'class' => 'form-horizontal row-border',
                'files' => true
                )
                ); ?>


                <input type="hidden" value="" name="inactive-icos" id="inactive-icos">
                <?php echo Form::submit('UPDATE', array('class'=>'btn btn-success')); ?>

                <?php echo Form::button('CLOSE', array('class'=>'btn btn-danger','data-dismiss'=>'modal')); ?>


                <?php echo Form::close(); ?>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.modal large inactive selected icos -->

<!-- Modal large active selected icos -->
<div class="modal fade" id="modal-lg-active-icos" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h1 class="modal-title">Active ICO</h1>
            </div>
            <div class="modal-body">
                <p>Do you want to active these ICO?</p>
            </div>
            <div class="modal-footer">
                <?php echo Form::open(
                array(
                'name' => 'frmActiveico',
                'id' => 'frmActiveico',
                'autocomplete' => 'off',
                'class' => 'form-horizontal row-border',
                'files' => true

                )
                ); ?>


                <input type="hidden" value="" name="active-icos" id="active-icos">
                <?php echo Form::submit('UPDATE', array('class'=>'btn btn-success')); ?>

                <?php echo Form::button('CLOSE', array('class'=>'btn btn-danger','data-dismiss'=>'modal')); ?>


                <?php echo Form::close(); ?>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.modal large active selected icos -->

<!-- Modal delete Category -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h1 class="modal-title">Delete Category</h1>
            </div>
            <div class="modal-body">
                <p>Do you want to delete this category?</p>
            </div>
            <div class="modal-footer">
                <?php echo Form::open(
                array(
                'method' => 'DELETE',
                'name' => 'frmDeleteCategory',
                'id' => 'frmDeleteCategory',
                'autocomplete' => 'off',
                'class' => 'form-horizontal row-border'

                )
                ); ?>


                <?php echo Form::submit('DELETE', array('class'=>'btn btn-success')); ?>

                <?php echo Form::button('CLOSE', array('class'=>'btn btn-danger','data-dismiss'=>'modal')); ?>


                <?php echo Form::close(); ?>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<!-- dataTables css -->
<link href="<?php echo e(asset('assets/plugins/datatables/dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
<!-- iCheck -->
<link href="<?php echo e(asset('assets/plugins/icheck/skins/all.css')); ?>" rel="stylesheet" type="text/css"/>
<!-- Bootstrap toggle css -->
<link href="<?php echo e(asset('assets/plugins/bootstrap-toggle/bootstrap-toggle.min.css')); ?>" rel="stylesheet" type="text/css"/>
<!-- modals css -->
<link href="<?php echo e(asset('assets/plugins/modals/component.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscript'); ?>
<!-- dataTables js -->
<script src="<?php echo e(asset('assets/plugins/datatables/dataTables.min.js')); ?>" type="text/javascript"></script>
<!-- iCheck js -->
<script src="<?php echo e(asset('assets/plugins/icheck/icheck.min.js')); ?>" type="text/javascript"></script>
<!-- Bootstrap toggle -->
<script src="<?php echo e(asset('assets/plugins/bootstrap-toggle/bootstrap-toggle.min.js')); ?>" type="text/javascript"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo e(asset('assets/plugins/daterangepicker/js/moment.min.js')); ?>"></script>
<script type="text/javascript">
    
    
$(document).ready(function () {
    
     $(".delete-category").click(function () {
        var value = $(this).val();
        $('#delete-modal').modal('show');
        var link = $(this).data('link');
        $("#frmDeleteCategory").attr('action', link);
    });
    
    $("#inactive-multiple-ico").click(function () {

        var allVals = [];
        $('.checkbox:checkbox:checked').each(function () {
            allVals.push($(this).val());

        });
        $('#categorys').val(allVals);
        if (allVals != "") {
            $('#inactive-icos').val(allVals);
            $('#modal-lg-inactive-icos').modal('show');
            var inactivelink = $(this).data('link');
            $("#frmcategory").attr('action', inactivelink);
        } else {
            alert('Please select icos.');
        }

    });

    $("#active-multiple-ico").click(function () {

        var allVals = [];
        $('.checkbox_in:checkbox:checked').each(function () {
            allVals.push($(this).val());

        });
        $('#active_icos').val(allVals);
        if (allVals != "") {
            $('#active-icos').val(allVals);
            $('#modal-lg-active-icos').modal('show');
            var inactivelink = $(this).data('link');
            $("#frmActiveico").attr('action', inactivelink);
        } else {
            alert('Please select icos.');
        }

    });

    $('.ms-box-title').click(function () {
        var hidden = $(".main-filter-dv").is(":hidden");
        $('.main-filter-dv').slideToggle();
        console.log(hidden);
        if (hidden === true) {
            $('.filter-open').hide();
            $('.filter-close').show();
        } else {
            $('.filter-open').show();
            $('.filter-close').hide();
        }
    });
    $('.ms-box-title-active').click(function () {
        var hidden = $(".main-filter-dv-active").is(":hidden");
        $('.main-filter-dv-active').slideToggle();
        console.log(hidden);
        if (hidden === true) {
            $('.filter-open-active').hide();
            $('.filter-close-active').show();
        } else {
            $('.filter-open-active').show();
            $('.filter-close-active').hide();
        }
    });
    
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            
                //alert($(e.target).attr('href'));

        localStorage.setItem('activeTab', $(e.target).attr('href'));

    });

    var activeTab = localStorage.getItem('activeTab');

    if(activeTab){

        $('#myTab a[href="' + activeTab + '"]').tab('show');

    }
   
});

$("#select_all").change(function () {
    //"select all" change
    $(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
});

//".checkbox" change
$('.checkbox').change(function () {
    //uncheck "select all", if one of the listed checkbox item is unchecked
    if (false == $(this).prop("checked")) { //if this item is unchecked
        $("#select_all").prop('checked', false); //change "select all" checked status to false
    }
    //check "select all" if all checkbox items are checked
    if ($('.checkbox:checked').length == $('.checkbox').length) {
        $("#select_all").prop('checked', true);
    }
});

$("#select_all_inactive").change(function () {
    //"select all" change
    $(".checkbox_in").prop('checked', $(this).prop("checked")); //change all ".checkbox_in" checked status
});

//".checkbox_in" change
$('.checkbox_in').change(function () {
    //uncheck "select all", if one of the listed checkbox item is unchecked
    if (false == $(this).prop("checked")) { //if this item is unchecked
        $("#select_all_inactive").prop('checked', false); //change "select all" checked status to false
    }
    //check "select all" if all checkbox items are checked
    if ($('.checkbox_in:checked').length == $('.checkbox_in').length) {
        $("#select_all_inactive").prop('checked', true);
    }
});

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', ['startup_active' => 'active', 'ico_category_active' => 'active'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>