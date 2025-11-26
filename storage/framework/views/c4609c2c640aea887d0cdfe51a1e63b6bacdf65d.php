
<?php $__env->startSection('content'); ?>
<section class="banner-section">
</section>
<div class="course-section padding-tb section-bg">
    <div class="container">
        <div class="section-header text-center">
            <span class="subtitle">Featured All Scholarship</span>
            <h2 class="title">Pick A Scholarship To Get Started</h2>
        </div>
        <div class="section-wrapper">
            <div class="row g-4 justify-content-center row-cols-xl-3 row-cols-md-2 row-cols-1">
                <?php $__currentLoopData = $scholarship; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col">
                    <div class="course-item">
                        <div class="course-inner">
                            <a href="<?php echo e(web_url('scholarship/'. encreptIt($item->id))); ?>">
                                <div class="course-thumb">
                                    <img src="<?php echo e($item->thumbnail_path ?? default_img()); ?>" alt="course">
                                </div>
                            </a>
                            <div class="course-content">
                                <?php if($item->fees != ''): ?>
                                <div class="course-price">$<?php echo e($item->fees ?? 0); ?></div>
                                <?php endif; ?>
                                <div class="course-category">
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
                                <a href="<?php echo e(web_url('scholarship/'. encreptIt($item->id))); ?>"><h5><?php echo e($item->title ?? ''); ?></h5></a>
                                <div class="course-footer">
                                    <div class="course-btn">
                                        <a href="<?php echo e(web_url('scholarship/'. encreptIt($item->id))); ?>" class="lab-btn-text">Read More <i class="icofont-external-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\glscholars\resources\views/web/home/all_scholarship.blade.php ENDPATH**/ ?>