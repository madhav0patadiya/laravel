
<?php $__env->startSection('content'); ?>
    <!-- Page Header section start here -->
    <div class="pageheader-section style-2">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-between align-items-center flex-row-reverse">
                <div class="col-lg-7 col-12">
                    <div class="pageheader-thumb">
                        <img src="<?php echo e($scholarship->thumbnail_path ?? default_img()); ?>" alt="rajibraj91" class="w-100">
                        <a href="<?php echo e($scholarship->video_link ?? '#'); ?>" class="video-button" data-rel="lightcase"><i class="icofont-ui-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <div class="pageheader-content">
                        <h2 class="phs-title"><?php echo e($scholarship->title ?? ''); ?></h2>
                        <p class="phs-desc"><?php echo e($scholarship->sub_title ?? ''); ?></p>
                        <div class="phs-thumb">
                            <div class="course-reiew">
                                <span class="ratting">
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                </span>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header section ending here -->

    <!-- course section start here -->
    <div class="course-single-section padding-tb section-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="main-part">
                        <div class="course-item">
                            <div class="course-inner">
                                <div class="course-content">
                                    <h3>Scholarship Overview</h3>
                                    <p><?php echo e($scholarship->overview ?? ''); ?></p>
                                    <h4>What You'll Learn in This Scholarship:</h4>
                                    <ul class="lab-ul">
                                        <?php if(isset($scholarship->des_point1)): ?>
                                        <li><i class="icofont-tick-mark"></i><?php echo e($scholarship->des_point1 ?? ''); ?></li>
                                        <?php endif; ?>  
                                        <?php if(isset($scholarship->des_point2)): ?>
                                        <li><i class="icofont-tick-mark"></i><?php echo e($scholarship->des_point2 ?? ''); ?></li>
                                        <?php endif; ?>  
                                        <?php if(isset($scholarship->des_point3)): ?>
                                        <li><i class="icofont-tick-mark"></i><?php echo e($scholarship->des_point3 ?? ''); ?></li>
                                        <?php endif; ?>  
                                        <?php if(isset($scholarship->des_point4)): ?>
                                        <li><i class="icofont-tick-mark"></i><?php echo e($scholarship->des_point4 ?? ''); ?></li>
                                        <?php endif; ?>  
                                        <?php if(isset($scholarship->des_point5)): ?>
                                        <li><i class="icofont-tick-mark"></i><?php echo e($scholarship->des_point5 ?? ''); ?></li>
                                        <?php endif; ?>  
                                    </ul>
                                    <?php if(isset($scholarship->paragraph_1)): ?>
                                    <p><?php echo e($scholarship->paragraph_1 ?? ''); ?></p>
                                    <?php endif; ?>
                                    <?php if(isset($scholarship->paragraph_1)): ?>
                                    <p><?php echo e($scholarship->paragraph_2 ?? ''); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-part">
                        <div class="course-side-detail">
                            <div class="csd-title">
                                <div class="csdt-left">
                                    <h4 class="mb-0"><sup>$</sup><?php echo e($scholarship->fees ?? ''); ?></h4>
                                </div>
                                <div class="csdt-right">
                                    <p class="mb-0"><i class="icofont-clock-time"></i>Limited time offer</p>
                                </div>
                            </div>
                            <div class="csd-content">
                                <div class="csdc-lists">
                                    <ul class="lab-ul">
                                        <li>
                                            <div class="csdc-left"><i class="icofont-ui-alarm"></i>Application Open</div>
                                            <div class="csdc-right"><?php echo e($scholarship->application_open ?? ''); ?></div>
                                        </li>
                                        <li>
                                            <div class="csdc-left"><i class="icofont-hour-glass"></i>Application Close</div>
                                            <div class="csdc-right"><?php echo e($scholarship->application_close ?? ''); ?></div>
                                        </li>
                                        <li>
                                            <div class="csdc-left"><i class="icofont-certificate"></i>Certificate</div>
                                            <div class="csdc-right"><?php echo e($scholarship->certificate ?? ''); ?></div>
                                        </li>
                                        <li>
                                            <div class="csdc-left"><i class="icofont-globe"></i>Language</div>
                                            <div class="csdc-right"><?php echo e($scholarship->language ?? ''); ?></div>
                                        </li>
                                    </ul>
                                </div>
                                <?php if(isset($scholarship->apply_link)): ?>
                                <div class="course-enroll text-end">
                                    <a href="<?php echo e($scholarship->apply_link ?? ''); ?>" class="lab-btn"><span>Apply Directly</span></a>
                                </div>
                                <?php endif; ?>
                                <div class="text-end">
                                    <a href="<?php echo e(web_url('student/register')); ?>" class="lab-btn"><span>Apply from GL Scholars</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- course section ending here -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\people_led\resources\views/web/home/scholarship.blade.php ENDPATH**/ ?>