<?php if(isset($documents) && count($documents) > 0): ?>
    <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
            <div class="remove_image">
                <a href="javascript:void(0)" class="delete-document" data-image-id="<?php echo e(encreptIt($value->id)); ?>">
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
<?php /**PATH D:\Xampp\htdocs\people_led\resources\views/admin/student/document_preview.blade.php ENDPATH**/ ?>