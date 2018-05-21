<?php $__env->startSection('pageTitle'); ?>
Dashboard | WeiZard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- Dashboard Content -->
        <div class="dashboard-content">

            <div class="container">

               <?php echo $__env->make('front.common.left_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <!-- Dashboard Main -->
                <main class="dashboard-main">

                    <div class="dashboard-main-header-wrap marB30">
                        <h4 class="marB20">Manage ICO</h4>
                        <a href="<?php echo e(route('add_ico')); ?>" class="primary-btn dashboard-main-header-btn is-small">ADD ICO</a>
                    </div>
                    <div class="flash-message">
                    <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(Session::has('alert-' . $msg)): ?>

                    <div class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!-- Table -->
                    <div class="widget padding-none">
                        <table class="table responsive-table has-five-col marT10">
                            <thead>
                                <tr>
                                    <th><?php echo e(Lang::get('startup/ico.sno')); ?></th>
                                    <th><?php echo e(Lang::get('startup/ico.ico_type')); ?></th>
                                    <th><?php echo e(Lang::get('startup/ico.ico_name')); ?></th>
                                    <th><?php echo e(Lang::get('startup/ico.start_time')); ?></th>
                                    <th><?php echo e(Lang::get('startup/ico.end_time')); ?></th>
                                    <th><?php echo e(Lang::get('startup/ico.technology')); ?></th>
                                    <th><?php echo e(Lang::get('startup/ico.soft_cap')); ?></th>
                                    <th><?php echo e(Lang::get('startup/ico.status')); ?></th>
                                    <th><?php echo e(Lang::get('startup/ico.action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php if(count(@$ico)>0): ?>
                        <?php  $i = 1;  ?>
                        <?php $__currentLoopData = @$ico; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icoData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i); ?></td>
                            <td><?php echo e($icoData->ico_type =="I"?"ICO":"Pre ICO"); ?></td>
                            <td><?php echo e($icoData->name); ?></td>
                            <td><?php echo e($icoData->start_time); ?></td>
                            <td><?php echo e($icoData->end_time); ?></td>
                            <td><?php echo e($icoData->technology); ?></td>
                            <td><?php echo e($icoData->soft_cap); ?></td>
                            <td><?php echo e($icoData->ico_status == "1"?"Active":"Pending"); ?></td>
                            <td>
                                <?php if($icoData->ico_status != "1"): ?>
                                <a  class="text-link theme-color" href="<?php echo e(url("startup/edit-ico/$icoData->id")); ?>" title="Edit">Edit</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                         
                        <?php  $i++;  ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Table -->

                </main>
                <!-- Dashboard Main -->

            </div>
        </div>
        <!-- Dashboard Content -->
     
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>