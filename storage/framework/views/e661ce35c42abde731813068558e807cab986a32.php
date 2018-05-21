<?php $__env->startSection('content'); ?>
 <!-- Dashboard Content -->
        <div class="dashboard-content">

            <div class="container">

            </div>


            <div class="container">

                <!-- Dashboard Sidebar -->
                <?php echo $__env->make('front.common.left_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                
                <!-- Dashboard Sidebar -->

                <!-- Dashboard Main -->
                <main class="dashboard-main">

                    <h4 class="marB20">Dashboard</h4>

                    <div class="row">

                         <!-- Wallet Cards -->
                <ul class="row">
                    <li class="col-sm-4 marB35">
                        <div class="wallet-card">
                            <h5 class="wallet-card-heading">WEIS Balance</h5>
                            <p class="wallet-card-text"><?php echo e(@$varTotToken?number_format($varTotToken, 2):'0'); ?></p>
                            <div class="wallet-card-icon"><i class="weicrowd-circle-icon svg-sprite"></i></div>
                        </div>
                    </li>                    
                </ul>
                <!-- Wallet Cards -->
                    </div>

                </main>
                <!-- Dashboard Main -->

            </div>
        </div>
        <!-- Dashboard Content -->
        
    
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>