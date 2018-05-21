<div class="row">
                    <div class="col-xs-12">
                         <div class="card">
                             <div class="card-body">
                                <ul class="nav nav-tabs">
                                        <li class="nav-item <?php echo e(@$ico_status == 'Present'?'active':''); ?>">
                                            <a class="nav-link <?php echo e(@$ico_status == 'Present'?'active':''); ?>" data-toggle="tab" href="#tab1" role="tab" aria-expanded="true">Present</a>
                                        </li>
                                        <li class="nav-item <?php echo e(@$ico_status == 'Upcoming'?'active':''); ?>">
                                            <a class="nav-link  <?php echo e(@$ico_status == 'Upcoming'?'active':''); ?>" data-toggle="tab" href="#tab2" role="tab" aria-expanded="false">Upcoming</a>
                                        </li>
                                        <li class="nav-item <?php echo e(@$ico_status == 'Past'?'active':''); ?>">
                                            <a class="nav-link <?php echo e(@$ico_status == 'Past'?'active':''); ?>" data-toggle="tab" href="#tab3" role="tab" aria-expanded="false">Past</a>
                                        </li>
                                </ul>

                                <div class="tab-content">

                                  <!-- Show this tab by adding `active` class -->
                                  <div class="tab-pane fade in <?php echo e(@$ico_status == 'Present'?'in active':''); ?>" id="tab1">
                                    <div class="head-info">
                                        <?php if(count(@$presentIcoData)>0): ?>
                                        <div class="table-responsive ps ps--theme_default">
                                        <table class="table center-aligned-table">
                                            <thead>
                                                <tr class="text-primary">
                                                    <th>Logo</th>
                                                    <th>Name</th>
                                                    <th>Start date</th>
                                                    <th>Closed Date</th>
                                                    <th>Category</th>
                                                    <th>Year</th>
                                                    <th>Website</th>
                                                    <th>Rating</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php $__currentLoopData = @$presentIcoData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icoVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <tr>
                                                <td class="logo"><a href="<?php echo e(url('ico/'.str_replace(' ', '-', $icoVal['name']))); ?>"><img width="170" height="26" src="<?php echo e(url('/')); ?>/ICO/LogoImage/<?php echo e($icoVal['logo_image']); ?>" alt="Logo"></a></td>
                                                <td class="name"><a href="<?php echo e(url('ico/'.str_replace(' ', '-', $icoVal['name']))); ?>"><?php echo e(ucwords($icoVal['name'])); ?></a></td>
                                                <td class="start-date">
                                                   <?php  $startDate = explode(" ",$icoVal['start_time']); 
                                                    $actualStartDate = date("d M Y",strtotime($startDate[0]));
                                                     ?> 
                                                    <?php echo e(@$actualStartDate); ?>                                                    
                                                </td>
                                                <td class="close-date">
                                                    <?php  $endDate = explode(" ",$icoVal['end_time']); 
                                                    $actualEndDate = date("d M Y",strtotime($endDate[0]));
                                                     ?> 
                                                    <?php echo e($actualEndDate); ?>

                                                </td>
                                                <td class="category"><?php echo e(ucfirst($icoVal->IcoRel['name'])); ?></td>
                                                <td class="category"><?php echo e(date("Y",strtotime($startDate[0]))); ?></td>
                                                <td class="website"><a href="<?php echo e(ucfirst($icoVal['website'])); ?>" target="_blank" class="btn btn-primary btn-sm">Visit Site</a></td>
                                                <td class="rating">N/A</td>
                                              </tr>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                               
                                            </tbody>
                                        </table>
                                    <div class="panel-footer pull-right">
                                        <?php echo e(@$presentIcoData->appends($_GET)->links('vendor/pagination/default')); ?>

                                        <div class="pageTotal"><?php echo e(Lang::get('common.Total')); ?> <?php echo e(@$presentIcoData->total()); ?> <?php echo e(Lang::get('common.Found')); ?></div>
                                    </div>
                                </div>
                                         <?php else: ?>
                                            <p>No record found...</p>
                                                <?php endif; ?>
                                    </div>
                                  </div>

                                  <div class="tab-pane fade <?php echo e(@$ico_status == 'Upcoming'?'in active':''); ?>" id="tab2">
                                    <div class="head-info">
                                        <?php if(count(@$upcomingIcoData)>0): ?>
                                        <div class="table-responsive ps ps--theme_default">
                                        <table class="table center-aligned-table">
                                            <thead>
                                                <tr class="text-primary">
                                                    <th>Logo</th>
                                                    <th>Name</th>
                                                    <th>Start date</th>
                                                    <th>Closed Date</th>
                                                    <th>Category</th>
                                                    <th>Year</th>
                                                    <th>Website</th>
                                                    <th>Rating</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php $__currentLoopData = @$upcomingIcoData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icoVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <tr>
                                                <td class="logo"><a href="<?php echo e(url('ico/'.str_replace(' ', '-', $icoVal['name']))); ?>"><img width="170" height="26" src="<?php echo e(url('/')); ?>/ICO/LogoImage/<?php echo e($icoVal['logo_image']); ?>" alt="Logo"></a></td>
                                                <td class="name"><a href="<?php echo e(url('ico/'.str_replace(' ', '-', $icoVal['name']))); ?>"><?php echo e(ucwords($icoVal['name'])); ?></a></td>
                                                <td class="start-date">
                                                   <?php  $startDate = explode(" ",$icoVal['start_time']); 
                                                    $actualStartDate = date("d M Y",strtotime($startDate[0]));
                                                     ?> 
                                                    <?php echo e(@$actualStartDate); ?>                                                    
                                                </td>
                                                <td class="close-date">
                                                    <?php  $endDate = explode(" ",$icoVal['end_time']); 
                                                    $actualEndDate = date("d M Y",strtotime($endDate[0]));
                                                     ?> 
                                                    <?php echo e($actualEndDate); ?>

                                                </td>
                                                <td class="category"><?php echo e(ucfirst($icoVal->IcoRel['name'])); ?></td>
                                                <td class="category"><?php echo e(date("Y",strtotime($startDate[0]))); ?></td>
                                                <td class="website"><a href="<?php echo e(ucfirst($icoVal['website'])); ?>" target="_blank" class="btn btn-primary btn-sm">Visit Site</a></td>
                                                <td class="rating">N/A</td>
                                              </tr>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                               
                                            </tbody>
                                        </table>
                                    <div class="panel-footer pull-right">
                                        <?php echo e(@$upcomingIcoData->appends($_GET)->links('vendor/pagination/default')); ?>

                                        <div class="pageTotal"><?php echo e(Lang::get('common.Total')); ?> <?php echo e(@$upcomingIcoData->total()); ?> <?php echo e(Lang::get('common.Found')); ?></div>
                                    </div> 
                                </div>
                                         <?php else: ?>
                                            <p>No record found...</p>
                                                <?php endif; ?>
                                    </div>
                                  </div>
                                  <div class="tab-pane fade <?php echo e(@$ico_status == 'Past'?'in active':''); ?>" id="tab3">
                                    <div class="head-info">
                                        <?php if(count(@$pastIcoData)>0): ?>
                                        <div class="table-responsive ps ps--theme_default">
                                        <table class="table center-aligned-table">
                                            <thead>
                                                <tr class="text-primary">
                                                    <th>Logo</th>
                                                    <th>Name</th>
                                                    <th>Start date</th>
                                                    <th>Closed Date</th>
                                                    <th>Category</th>
                                                    <th>Year</th>
                                                    <th>Website</th>
                                                    <th>Rating</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php $__currentLoopData = @$pastIcoData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icoVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <tr>
                                                <td class="logo"><a href="<?php echo e(url('ico/'.str_replace(' ', '-', $icoVal['name']))); ?>"><img width="170" height="26" src="<?php echo e(url('/')); ?>/ICO/LogoImage/<?php echo e($icoVal['logo_image']); ?>" alt="Logo"></a></td>
                                                <td class="name"><a href="<?php echo e(url('ico/'.str_replace(' ', '-', $icoVal['name']))); ?>"><?php echo e(ucwords($icoVal['name'])); ?></a></td>
                                                <td class="start-date">
                                                   <?php  $startDate = explode(" ",$icoVal['start_time']); 
                                                    $actualStartDate = date("d M Y",strtotime($startDate[0]));
                                                     ?> 
                                                    <?php echo e(@$actualStartDate); ?>                                                    
                                                </td>
                                                <td class="close-date">
                                                    <?php  $endDate = explode(" ",$icoVal['end_time']); 
                                                    $actualEndDate = date("d M Y",strtotime($endDate[0]));
                                                     ?> 
                                                    <?php echo e($actualEndDate); ?>

                                                </td>
                                                <td class="category"><?php echo e(ucfirst($icoVal->IcoRel['name'])); ?></td>
                                                <td class="category"><?php echo e(date("Y",strtotime($startDate[0]))); ?></td>
                                                <td class="website"><a href="<?php echo e(ucfirst($icoVal['website'])); ?>" target="_blank" class="btn btn-primary btn-sm">Visit Site</a></td>
                                                <td class="rating">N/A</td>
                                              </tr>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                               
                                            </tbody>
                                        </table>
                                    <div class="panel-footer pull-right">
                                        <?php echo e(@$pastIcoData->appends($_GET)->links('vendor/pagination/default')); ?>

                                        <div class="pageTotal"><?php echo e(Lang::get('common.Total')); ?> <?php echo e(@$pastIcoData->total()); ?> <?php echo e(Lang::get('common.Found')); ?></div>
                                    </div>
                                </div>
                                         <?php else: ?>
                                            <p>No record found...</p>
                                                <?php endif; ?>
                                    </div>
                                  </div>


                                </div>

                                  
                             </div>
                         </div>
                    </div>
                </div>