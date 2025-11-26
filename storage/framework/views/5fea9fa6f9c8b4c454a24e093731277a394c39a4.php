
<?php $__env->startSection('content'); ?>
<div class="page-header d-xl-flex d-block">
    <div class="page-leftheader">
        <h4 class="page-title"><?php echo e((isset($notice->id) && $notice->id != '') ? 'Update' : 'Create'); ?> Student Notice</h4>
    </div>
    <div class="page-rightheader ml-md-auto">
        <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
            <div class="btn-list">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-md-12 col-lg-12">
        <div class="card">
            <form class="form" id="notice-form" method="post" action="<?php echo e(admin_url('setting/commit-notice')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" class="notice_id" name="notice_id" value="<?php echo e((isset($notice->id) && $notice->id != '') ? encreptIt($notice->id) : ''); ?>" />
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="form-label">Description:</label>
                                <div class="summernote">
                                    <?php if( isset($notice->description)): ?>
                                        <?php echo old('description', $notice->description); ?>

                                    <?php endif; ?>
                                </div>
                            </div>                    
                        </div>

                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="form-label">Notice Banner</label>
                                <input type="file" class="dropify" name="banner" data-default-file="<?php echo e(isset($notice->banner) && $notice->banner != '' ? $notice->banner_path : ''); ?>" data-height="180" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary submit-btn"><?php echo e((isset($notice->id) && $notice->id != ''? 'Update' : 'Save' )); ?> Student Notice
                        <i class="fa fa-circle-o-notch fa-spin hide mr-2"></i>
                    </button>        
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\glscholars\resources\views/admin/setting/notice.blade.php ENDPATH**/ ?>