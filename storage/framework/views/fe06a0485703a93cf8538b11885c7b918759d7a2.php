
<?php $__env->startSection('content'); ?>
<div class="page-header d-xl-flex d-block">
    <div class="page-leftheader">
        <h4 class="page-title">Student Letter</h4>
    </div>
    <div class="page-rightheader ml-md-auto">
        <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
            <div class="btn-list">
            </div>
        </div>
    </div>
</div>
<?php if(isset($student_doc) && count($student_doc) > 0): ?>
<div class="gallery_container row">
    <?php $__currentLoopData = $student_doc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $extension = strtolower(pathinfo($value->doc_path, PATHINFO_EXTENSION));
            $isPdf = $extension === 'pdf';
            $imageSrc = $isPdf ? pdf_image() : ($value->doc_path ?? default_img());
            $fileLink = $value->doc_path ?? '#';
        ?>
        <div class="m-1 image_box" data-id="<?php echo e(isset($value->id) ? encreptIt($value->id) : ''); ?>" data-src="<?php echo e($fileLink); ?>">
            <a href="<?php echo e($fileLink); ?>" target="_blank">
                <img src="<?php echo e($imageSrc); ?>" alt="document preview" style="width: 100px; height: auto;" />
            </a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php else: ?>
    <div class="no_data_found">
        <i class="fa fa-image"></i>
        <h4 class="card-title">No data available!</h4>
    </div>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\glscholars\resources\views/front/profile/student_document.blade.php ENDPATH**/ ?>