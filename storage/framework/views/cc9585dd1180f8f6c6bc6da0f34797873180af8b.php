
<?php $__env->startSection('content'); ?>
    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <h4 class="page-title"><?php echo e((isset($scholarship->id) && $scholarship->id != '') ? 'Update' : 'Create'); ?> Scholarship</h4>
        </div>
        <div class="page-rightheader ml-md-auto">
            <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <div class="btn-list">
                    <a href="<?php echo e(admin_url('setting/scholarship')); ?>" class="btn btn-primary mr-3">View Scholarship</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card">
                <form class="form" id="scholarship-form" method="post" action="<?php echo e(admin_url('setting/commit-scholarship')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" class="scholarship_id" name="scholarship_id" value="<?php echo e((isset($scholarship->id) && $scholarship->id != '') ? encreptIt($scholarship->id) : ''); ?>" />
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Title<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo e(isset($scholarship->title) ? $scholarship->title : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Sub title</label>
                                    <input type="text" class="form-control" name="sub_title" placeholder="Sub Title" value="<?php echo e(isset($scholarship->sub_title) ? $scholarship->sub_title : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Video Link</label>
                                    <input type="text" class="form-control" name="video_link" placeholder="Video Link" value="<?php echo e(isset($scholarship->video_link) ? $scholarship->video_link : ''); ?>">
                                </div>
                            </div>
                            
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Scholar Ship Overview:</label>
                                    <div id="overview-editor" class="summernote">
                                        <?php if( isset($scholarship->overview)): ?>
                                            <?php echo old('overview', $scholarship->overview); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>                    
                            </div>
    
                            <div class="col-sm-12 col-md-12">
                                <h3>Description:</h3>
                                <div class="form-group">
                                    <label class="form-label">Point 1</label>
                                    <input type="text" class="form-control" name="des_point1" placeholder="Point 1" value="<?php echo e(isset($scholarship->des_point1) ? $scholarship->des_point1 : ''); ?>">
                                    <label class="form-label mt-2">Point 2</label>
                                    <input type="text" class="form-control" name="des_point2" placeholder="Point 1" value="<?php echo e(isset($scholarship->des_point2) ? $scholarship->des_point2 : ''); ?>">
                                    <label class="form-label mt-2">Point 3</label>
                                    <input type="text" class="form-control" name="des_point3" placeholder="Point 1" value="<?php echo e(isset($scholarship->des_point3) ? $scholarship->des_point3 : ''); ?>">
                                    <label class="form-label mt-2">Point 4</label>
                                    <input type="text" class="form-control" name="des_point4" placeholder="Point 1" value="<?php echo e(isset($scholarship->des_point4) ? $scholarship->des_point4 : ''); ?>">
                                    <label class="form-label mt-2">Point 5</label>
                                    <input type="text" class="form-control" name="des_point5" placeholder="Point 1" value="<?php echo e(isset($scholarship->des_point5) ? $scholarship->des_point5 : ''); ?>">
                                </div>
                            </div>
                            
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Paragraph 1</label>
                                    <div id="paragraph1-editor" class="summernote">
                                        <?php if( isset($scholarship->paragraph_1)): ?>
                                            <?php echo old('paragraph_1', $scholarship->paragraph_1); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
    
                            
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Paragraph 2</label>
                                    <div id="paragraph2-editor" class="summernote">
                                        <?php if( isset($scholarship->paragraph_2)): ?>
                                            <?php echo old('paragraph_2', $scholarship->paragraph_2); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Scholars Fees<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="fees" placeholder="Sub Title" value="<?php echo e(isset($scholarship->fees) ? $scholarship->fees : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Applications open<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="application_open" placeholder="Ex: 15 May 2024, 15:00 CEST" value="<?php echo e(isset($scholarship->application_open) ? $scholarship->application_open : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Applications close<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="application_close" placeholder="Ex: 15 May 2024, 15:00 CEST" value="<?php echo e(isset($scholarship->application_close) ? $scholarship->application_close : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Certificate</label>
                                    <input type="text" class="form-control" name="certificate" placeholder="Yes or No" value="<?php echo e(isset($scholarship->certificate) ? $scholarship->certificate : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Language</label>
                                    <input type="text" class="form-control" name="language" placeholder="Language" value="<?php echo e(isset($scholarship->language) ? $scholarship->language : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Apply Button Link</label>
                                    <input type="text" class="form-control" name="apply_link" placeholder="" value="<?php echo e(isset($scholarship->apply_link) ? $scholarship->apply_link : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Thumbnail</label>
                                    <input type="file" class="dropify" name="thumbnail" data-default-file="<?php echo e(isset($scholarship->thumbnail) && $scholarship->thumbnail != '' ? $scholarship->thumbnail_path : ''); ?>" data-height="180" />
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 mt-4">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2"><b>Is Visible?</b></label>
                                    <label class="custom-switch">
                                        <input type="checkbox" name="is_visible" class="custom-switch-input" <?php echo e((isset($scholarship->is_visible) && $scholarship->is_visible == 1) ?'checked' : ''); ?>>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Visible/Not Visible</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary scholarship-submit">
                                <?php echo e((isset($scholarship->id) && $scholarship->id != '') ? 'Update' : 'Save'); ?>

                                <i class="fa fa-circle-o-notch fa-spin hide mr-2"></i>
                            </button>
                        </div>
                    </div>
                <form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\glscholars\resources\views/admin/setting/setup_scholarship.blade.php ENDPATH**/ ?>