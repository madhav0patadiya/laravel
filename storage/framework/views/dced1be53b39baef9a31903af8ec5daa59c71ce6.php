<?php if(isset($company_list) && count($company_list) > 0): ?>
<div class="row">
    <?php $__currentLoopData = $company_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xl-3 col-lg-6">
            <div class="card text-center user-contact-list company_card">
                <div class="p-5">
                    <div class="avatar avatar-xxl brround d-block cover-image mx-auto" data-image-src="<?php echo e(isset($company->logo_path) ? $company->logo_path : ''); ?>" style="background: url(<?php echo e(isset($company->logo_path) ? $company->logo_path : ''); ?>) #ffffff center center;"></div>
                    <div class="wrapper mt-3">
                        <p class="mb-0 mt-1 text-dark font-weight-semibold"><?php echo e(isset($company->name) ? $company->name : ''); ?></p>
                        <small class="text-muted"><?php echo e(isset($company->address) ? $company->address : ''); ?></small>
                    </div>
                    <div class="mt-5">
                        <a class="btn btn-outline-primary mr-1" href="<?php echo e(isset($company->id) ? admin_url('agent/setup/'.encreptIt($company->id)) : 'javascript:void(0)'); ?>">
                            <i class="feather feather-edit-2 fs-15 my-auto"></i>
                        </a>
                        <a class="btn btn-outline-danger company-delete" data-id="<?php echo e(isset($company->id) ? encreptIt($company->id) : ''); ?>" href="javascript:void(0)">
                            <i class="feather feather-trash fs-15 my-auto"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php echo e($company_list->links()); ?>

<?php else: ?>
    <div class="no-record-found">
        <h1><i class="fa fa-search"></i></h1>
        <h4 class="card-title mb-0">No record found!</h4>
    </div>
<?php endif; ?>

<?php /**PATH D:\Xampp\htdocs\people_led\resources\views/admin/company/cards.blade.php ENDPATH**/ ?>