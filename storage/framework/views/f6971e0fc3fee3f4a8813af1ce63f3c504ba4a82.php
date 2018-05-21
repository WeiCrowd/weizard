<?php $__env->startSection('head_icon'); ?>
hvr-buzz-out fa fa-user-secret
<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
<?php echo e(Lang::get('common.Manage')); ?> <?php echo e(Lang::get('admin/user/ico.Heading')); ?>

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
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo e(Lang::get('admin/user/ico.ico_list')); ?></h4>
                </div>
            </div>
            <!-- Nav tabs -->
            
            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#tab1" data-toggle="tab">Inactive ICO</a></li>
                <li><a href="#tab2" data-toggle="tab">Active ICO</a></li>
            </ul>
            
            <!-- Tab panels -->
            <!-- tab content -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1">
                    <div class="panel-body">
                        <div class="row">
                            <div class=" form-group col-md-12" align="right">
                                <div class="control-group">
                                    <div class="controls">
                                        <?php echo Form::open(
                                        array(
                                        'name' => 'frmdownloadcustomer',
                                        'id' => 'frmdownloadcustomer',
                                        'autocomplete' => 'off',
                                        'class' => 'form-horizontal row-border',
                                        'url' => 'admin/ico-inactive-filters',
                                        'method' => 'get'
                                        )
                                        ); ?>

                                        <input type="hidden" name="download" value="1">
                                        <?php echo Form::hidden('name', '', ['class' => 'form-control','id'=> 'name_in']); ?>

                                        <?php echo Form::hidden('customer_id', '', ['class' => 'form-control','id'=> 'customer_id_in']); ?>

                                        <?php echo Form::submit('Download Excel', array('class'=>'btn btn-success download_btn')); ?>

                                        <?php echo Form::close(); ?>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <!-- Primary Panel -->
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="panel-title ms-box-title" style="position:relative">
                                            <h4><?php echo e(Lang::get('common.Filter')); ?></h4>
                                            <span class="filter-open-close filter-open" style="display: block; float: right; position: absolute; top: 0px; right:0px;">&#9660;</span>

                                            <span class="filter-open-close filter-close" style="display: none; float: right; position: absolute; top: 0px; right:0px;">&#9650;</span>
                                        </div>
                                    </div>

                                    <div class="panel-body main-filter-dv" style="<?php if (isset($search_active) && (!empty($search_active))) { ?>display: block;<?php } else { ?>display: none;<?php } ?>">
                                        <?php echo Form::open(
                                        array(
                                        'name' => 'filtercustomer',
                                        'id' => 'filtercustomer',
                                        'autocomplete' => 'off',
                                        'class' => 'form-horizontal row-border',
                                        'url' => 'admin/ico-inactive-filters',
                                        'method' => 'get'
                                        )
                                        ); ?>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <?php echo e(Form::text('name', isset($name)?$name:'', ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.ico_name'), 'id'=> 'name'])); ?>

                                            </div>
                                            <div class="form-group col-md-4">
                                                <?php echo e(Form::text('customer_id',isset($customer_id)?$customer_id:'', ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.customer_id'), 'id'=> 'customer_id'])); ?>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <?php echo Form::submit('Apply', array('class'=>'btn btn-success')); ?>

                                                <?php echo Form::submit('Reset', array('class'=>'btn btn-success' , 'id' => 'reset')); ?> 
                                            </div>

                                        </div>

                                        <?php echo Form::close(); ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                       <div class="row">
                            <div class="table-responsive">
                                <table id="dataTableExample2" class="table table-bordered table-striped table-hover dataTableExample2">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th><?php if(count($inactive_ico)): ?><input type="checkbox" id="select_all_inactive"/><?php endif; ?><?php echo e(Lang::get('common.Select_all')); ?></th>
                                            <th><?php echo e(Lang::get('startup/ico.customer_id')); ?></th>
                                            <th><?php echo e(Lang::get('startup/ico.ico_name')); ?></th>
                                            <th><?php echo e(Lang::get('startup/ico.short_description')); ?></th>
                                            <th><?php echo e(Lang::get('startup/ico.start_time')); ?></th>
                                            <th><?php echo e(Lang::get('startup/ico.end_time')); ?></th>
                                            <th><?php echo e(Lang::get('startup/ico.soft_cap')); ?></th>
                                            <th><?php echo e(Lang::get('common.Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  $i = ($inactiveIco->currentpage() - 1) * $inactiveIco->perpage() + 1;  ?>
                                        <?php $__currentLoopData = $inactive_ico; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $id = $value['id']; ?>
                                        <tr>
                                            <th scope="row"><?php echo $i; ?></th>
                                            <td><input class="checkbox_in" type="checkbox" name="check[]" value="<?php echo e($id); ?>"></td>
                                            <td><?php echo e(ucwords($value['weis_id'])); ?></td>
                                            <td><?php echo e(ucwords($value['name'])); ?></td>
                                            <td><?php echo e(ucwords($value['short_description'])); ?></td>
                                            <td><?php echo e(ucwords($value['start_time'])); ?></td>
                                            <td><?php echo e(ucwords($value['end_time'])); ?></td>
                                            <td><?php echo e(ucwords($value['soft_cap'])); ?></td>
                                            <td><a href="<?php echo e(url("admin/ico/$id/edit")); ?>"><button type="button" class="btn btn-primary btn-circle m-b-5"  title="<?php echo e(Lang::get('common.Edit')); ?>" ><i class="glyphicon glyphicon-edit"></i></button></a></td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    

                                </table>
                            </div>
                        </div>   
                        <?php if(count($inactive_ico)): ?>
                        <?php echo e(Form::button('Active Selected', array('type'=>'button', 'class'=>'btn btn-primary w-md m-b-5', 'title' => Lang::get("admin/user/ico.Active"),'data-link'=>url("admin/active-ico"), 'id' =>'active-multiple-ico'))); ?>

                        <?php endif; ?>
                        <input type="hidden" name="active_icos" id="active_icos">
                    </div>
                    <div class="panel-footer">
                        <?php echo e($inactiveIco->appends($_GET)->links('vendor/pagination/default')); ?>

                        <div class="pageTotal"><?php echo e(Lang::get('common.Total')); ?> <?php echo e($inactiveIco->total()); ?> <?php echo e(Lang::get('common.Found')); ?></div>
                    </div>
                </div>
                <!-- / tab 1 -->
                <!-- tab 2-->
                <div class="tab-pane fade" id="tab2">
                    <div class="panel-body">
                        <div class="row">
                            <div class=" form-group col-md-12" align="right">
                                <div class="control-group">
                                    <div class="controls">
                                        <?php echo Form::open(
                                        array(
                                        'name' => 'frmdownloadcustomer',
                                        'id' => 'frmdownloadcustomer',
                                        'autocomplete' => 'off',
                                        'class' => 'form-horizontal row-border',
                                        'url' => 'admin/ico-active-filters',
                                        'method' => 'get'
                                        )
                                        ); ?>

                                        <input type="hidden" name="download" value="1">
                                        <?php echo Form::hidden('name', '', ['class' => 'form-control','id'=> 'name_in']); ?>

                                        <?php echo Form::hidden('customer_id', '', ['class' => 'form-control','id'=> 'customer_id_in']); ?>

                                        <?php echo Form::submit('Download Excel', array('class'=>'btn btn-success download_btn')); ?>

                                        <?php echo Form::close(); ?>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <!-- Primary Panel -->
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="panel-title ms-box-title" style="position:relative">
                                            <h4><?php echo e(Lang::get('common.Filter')); ?></h4>
                                            <span class="filter-open-close filter-open" style="display: block; float: right; position: absolute; top: 0px; right:0px;">&#9660;</span>

                                            <span class="filter-open-close filter-close" style="display: none; float: right; position: absolute; top: 0px; right:0px;">&#9650;</span>
                                        </div>
                                    </div>

                                    <div class="panel-body main-filter-dv" style="<?php if (isset($search_active) && (!empty($search_active))) { ?>display: block;<?php } else { ?>display: none;<?php } ?>">
                                        <?php echo Form::open(
                                        array(
                                        'name' => 'filtercustomer',
                                        'id' => 'filtercustomer',
                                        'autocomplete' => 'off',
                                        'class' => 'form-horizontal row-border',
                                        'url' => 'admin/ico-active-filters',
                                        'method' => 'get'
                                        )
                                        ); ?>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <?php echo e(Form::text('name', isset($name)?$name:'', ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.ico_name'), 'id'=> 'name'])); ?>

                                            </div>
                                            <div class="form-group col-md-4">
                                                <?php echo e(Form::text('customer_id',isset($customer_id)?$customer_id:'', ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.customer_id'), 'id'=> 'customer_id'])); ?>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <?php echo Form::submit('Apply', array('class'=>'btn btn-success')); ?>

                                                <?php echo Form::submit('Reset', array('class'=>'btn btn-success' , 'id' => 'reset')); ?> 
                                            </div>

                                        </div>

                                        <?php echo Form::close(); ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="table-responsive">
                                <table id="" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>

                                            <th>S.NO</th>
                                            <th><?php if(count($active_ico)): ?><input type="checkbox" id="select_all"/><?php endif; ?><?php echo e(Lang::get('common.Select_all')); ?></th>
                                            <th><?php echo e(Lang::get('startup/ico.customer_id')); ?></th>
                                            <th><?php echo e(Lang::get('startup/ico.ico_name')); ?></th>
                                            <th><?php echo e(Lang::get('startup/ico.short_description')); ?></th>
                                            <th><?php echo e(Lang::get('startup/ico.start_time')); ?></th>
                                            <th><?php echo e(Lang::get('startup/ico.end_time')); ?></th>
                                            <th><?php echo e(Lang::get('startup/ico.soft_cap')); ?></th>
                                            <th><?php echo e(Lang::get('common.Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  $i = ($activeIco->currentpage() - 1) * $activeIco->perpage() + 1; 
                                         ?>
                                        <?php $__currentLoopData = $active_ico; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $id = $value['id']; ?>
                                        <tr>
                                            <th scope="row"><?php echo $i; ?></th>
                                            <td><input class="checkbox" type="checkbox" name="check[]" value="<?php echo e($value['id']); ?>"></td>
                                            <td><?php echo e(ucwords($value['weis_id'])); ?></td>
                                            <td><?php echo e(ucwords($value['name'])); ?></td>
                                            <td><?php echo e(ucwords($value['short_description'])); ?></td>
                                            <td><?php echo e(ucwords($value['start_time'])); ?></td>
                                            <td><?php echo e(ucwords($value['end_time'])); ?></td>
                                            <td><?php echo e(ucwords($value['soft_cap'])); ?></td>
                                            <td><a href="<?php echo e(url("admin/ico/$id/edit")); ?>"><button type="button" class="btn btn-primary btn-circle m-b-5"  title="<?php echo e(Lang::get('common.Edit')); ?>" ><i class="glyphicon glyphicon-edit"></i></button></a></td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>   
                                </table>
                            </div>
                        </div>
                        <?php if(count($active_ico)): ?>
                        <?php echo e(Form::button('Inactive Selected', array('type'=>'button', 'class'=>'btn btn-primary w-md m-b-5', 'title' => Lang::get("admin/user/ico.Inactive"),'data-link'=>url("admin/inactive-ico"), 'id' =>'inactive-multiple-ico'))); ?>

                        <?php endif; ?>
                        <input type="hidden" name="inactive_icos" id="inactive_icos">
                    </div>
                    <div class="panel-footer">
                        <?php echo e($activeIco->appends($_GET)->links('vendor/pagination/default')); ?>

                        <div class="pageTotal"><?php echo e(Lang::get('common.Total')); ?> <?php echo e($activeIco->total()); ?> <?php echo e(Lang::get('common.Found')); ?></div>
                    </div>

                </div>
                <!-- / tab 2 -->
            </div>
            <!-- tab content -->
            

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
                'name' => 'frmInactiveico',
                'id' => 'frmInactiveico',
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
    
    $('.download_btn').click(function () {
        var name = $('#name').val();
        var customer_id = $('#customer_id').val();
        $('#name_in').val(name);
        $('#customer_id_in').val(customer_id);
    });
    
     $('#reset').click(function () {
        $('#name').val('');
        $('#customer_id').val('');
    });
    
    $("#inactive-multiple-ico").click(function () {

        var allVals = [];
        $('.checkbox:checkbox:checked').each(function () {
            allVals.push($(this).val());

        });
        $('#inactive_icos').val(allVals);
        if (allVals != "") {
            $('#inactive-icos').val(allVals);
            $('#modal-lg-inactive-icos').modal('show');
            var inactivelink = $(this).data('link');
            $("#frmInactiveico").attr('action', inactivelink);
        } else {
            alert('Please select ICO.');
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
            alert('Please select ICO.');
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

<?php echo $__env->make('admin.main', ['startup_active' => 'active', 'ico_active' => 'active'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>