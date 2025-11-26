<?php $__env->startSection('content'); ?>
    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <h4 class="page-title">Update Agent Details</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <form class="form" id="agent-form" method="post" action="<?php echo e(admin_url('agent/commit')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" class="agent_id" name="agent_id" value="<?php echo e((isset($agent->id) && $agent->id != '') ? encreptIt($agent->id) : ''); ?>" />
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Firstname<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="firstname" placeholder="firstname" value="<?php echo e(isset($agent->firstname) ? $agent->firstname : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Lastname<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="lastname" placeholder="" value="<?php echo e(isset($agent->lastname) ? $agent->lastname : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Phone<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="phone" value="<?php echo e(isset($agent->phone) ? $agent->phone : ''); ?>" maxlength="10">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Email<small class="mandotory">*</small></label>
                                    <input type="text" id="checkemail" class="form-control" name="email" placeholder="email" value="<?php echo e(isset($agent->email) ? $agent->email : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Password<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="password" value="<?php echo e(isset($agent->password) ? decreptIt($agent->password) : ''); ?>" placeholder="password">
                                </div>
                            </div>
                            <?php if(isset($agent->referral_code)): ?>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Referral Code<small class="mandotory">*</small></label>
                                        <input type="text" class="form-control" name="referral_code" value="<?php echo e(isset($agent->referral_code) ? $agent->referral_code : ''); ?>" readonly>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="col-sm-4 col-md-4">
                                </div>
                            <?php endif; ?>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Agent avatar</label>
                                    <input type="file" class="dropify" name="avatar" data-default-file="<?php echo e(isset($agent->avatar) && $agent->avatar != '' ? $agent->avatar_path : ''); ?>" data-height="180" />
                                </div>    
                            </div>
                            <div class="col-sm-4 col-md-4 mt-5">
                                <div class="form-group">
                                    <label class="custom-switch">
                                        <input type="checkbox" name="allow_login" class="custom-switch-input" <?php echo e((isset($agent->allow_login) && $agent->allow_login == 1) ?'checked' : ''); ?>>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Login enabled?</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary agent-submit">
                                <?php echo e((isset($agent->id) && $agent->id != '') ? 'Update' : 'Save'); ?> Details
                                <i class="fa fa-circle-o-notch fa-spin hide mr-2"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\people_led\resources\views/admin/agent/setup.blade.php ENDPATH**/ ?>