
<?php $__env->startSection('content'); ?>
<div class="page-header d-xl-flex d-block">
    <div class="page-leftheader">
        <h4 class="page-title">Upload Documents for <?php echo e(isset($student->fullname) ? $student->fullname : ''); ?></h4>
    </div>
    <div class="page-rightheader ml-md-auto">
        <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
            <div class="btn-list">
                <a href="<?php echo e(admin_url('students')); ?>" class="btn btn-primary mr-3">View Students</a>
            </div>
        </div>
    </div>
</div>

<section class="">
    <?php if(isset($student->id)): ?>
        <input type="hidden" name="student_id" class="student_id" value="<?php echo e(isset($student->id) && $student->id != '' ? encreptIt($student->id) : ''); ?>" />
        <div class="col-12">
            <div class="dropzone_container" data-url="<?php echo e(admin_url('students/document-upload/' . encreptIt($student->id))); ?>"></div>
        </div>
        <div class='gallery_container row'>
        </div>
    <?php endif; ?>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\glscholars\resources\views/admin/student/document.blade.php ENDPATH**/ ?>