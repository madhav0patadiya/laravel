<?php if(isset($logos) && count($logos) > 0): ?>
    <?php $__currentLoopData = $logos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="m-1 image_box" data-id="<?php echo e(isset($value->id) ? encreptIt($value->id) : ''); ?>" data-src="<?php echo e($value->uni_logo_path ?? default_img()); ?>">
            <a href="<?php echo e($value->uni_logo_path ?? default_img()); ?>" target="_blank">
                <img src="<?php echo e($value->uni_logo_path ?? default_img()); ?>" alt="document preview" style="width: 100px; height: auto;" />
            </a>
            <div class="remove_image">
                <a href="javascript:void(0)" class="delete-logo" data-image-id="<?php echo e(encreptIt($value->id)); ?>">
                    <i class="feather feather-trash-2 mr-2"></i>
                </a>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <div class="no_data_found">
        <i class="fa fa-image"></i>
        <h4 class="card-title">No data available!</h4>
    </div>
<?php endif; ?>
<?php /**PATH D:\Xampp\htdocs\glscholars\resources\views/admin/setting/university_logo_preview.blade.php ENDPATH**/ ?>