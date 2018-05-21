<!-- Listing Items -->
                            <div class="row">
                                <div class="col-xs-12">
                                    <ul class="listing-items">
                                          <?php if(count(@$icoData)>0): ?>
                            <?php $__currentLoopData = @$icoData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icoVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="listing-box social-media-filter">
                                            <a href="coin-page.html">
                                                <div class="listing-box-figure"><img src="<?php echo e(url('/')); ?>/ICO/LogoImage/<?php echo e($icoVal['logo_image']); ?>" alt="Image" /></div>
                                                <h6 class="listing-box-heading"><?php echo e(ucfirst($icoVal['name'])); ?></h6>
                                                <?php  $startDate = explode(" ",$icoVal['start_time']); 
                                                $actualStartDate = date("d M Y",strtotime($startDate[0]));
                                                 ?>
                                                <p class="listing-box-text"><?php echo e(@$actualStartDate); ?></p>
                                            </a>
                                        </li>
                                        
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <li class="listing-box social-media-filter">
                            No Record Found..
                            </li>
                            <?php endif; ?>
                                
                                    </ul>

                                    <!-- <div class="text-center marT40">
                                        <a href="#" class="primary-btn is-ghost-btn theme-btn highlight-btn">Show More</a>
                                    </div> -->
                                </div>
                            </div>
                            <!-- Listing Items -->