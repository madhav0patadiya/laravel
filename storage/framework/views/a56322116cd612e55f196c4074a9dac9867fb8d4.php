<?php $__env->startSection('content'); ?>
    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <h4 class="page-title">Manage Company Details</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <form class="form" id="company-form" method="post" action="<?php echo e(admin_url('company/commit')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" class="company_id" name="company_id" value="<?php echo e((isset($company->id) && $company->id != '') ? encreptIt($company->id) : ''); ?>" />
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Company Legal Name<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="name" placeholder="" value="<?php echo e(isset($company->name) ? $company->name : ''); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="custom-switch">
                                        <input type="checkbox" name="allow_login" class="custom-switch-input" <?php echo e((isset($company->allow_login) && $company->allow_login == 1) ?'checked' : ''); ?>>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Login enabled?</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Address<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="address" placeholder="" value="<?php echo e(isset($company->address) ? $company->address : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Company Logo</label>
                                    <input type="file" class="dropify" name="logo" data-default-file="<?php echo e(isset($company->logo) && $company->logo != '' ? $company->logo_path : ''); ?>" data-height="180" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">City<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="city" placeholder="" value="<?php echo e(isset($company->city) ? $company->city : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Zip Code<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="zipcode" placeholder="" value="<?php echo e(isset($company->zipcode) ? $company->zipcode : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Country<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="country" placeholder="" value="<?php echo e(isset($company->country) ? $company->country : ''); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary company-submit">
                                Save Details
                                <i class="fa fa-circle-o-notch fa-spin hide mr-2"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card overflow-hidden">
                <div class="card-header border-0">
                    <h4 class="card-title">Company Admins</h4>
                </div>
                <div class="table-responsive recent_jobs pt-2 pb-2 pl-2 pr-2 card-body">
                    <table class="table mb-0 text-nowrap">
                        <tbody>
                            <?php if(isset($company_admins)): ?>
                                <?php $__currentLoopData = $company_admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="">
                                        <td>
                                            <div class="d-flex" >
                                                <div class="table_img brround bg-light mr-3">
                                                    <img src="<?php echo e($admin->avatar_path); ?>" class="brround fs-12">
                                                </div>
                                                <div class="mr-3 mt-2 d-block" >
                                                    <h6 class="mb-0 fs-13 font-weight-semibold descresize d-block"><?php echo e(isset($admin->firstname) ? $admin->firstname : ''); ?> <?php echo e(isset($admin->lastname) ? $admin->lastname : ''); ?></h6>
                                                    <small class="text-muted descresize" data-toggle='tooltip' data-placement='top' title='<?php echo e(isset($admin->email) ? $admin->email : ''); ?>'><?php echo e(isset($admin->email) ? $admin->email : ''); ?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <?php if($admin->password == ''): ?>
                                                <a href="javascript:void(0)" data-id="<?php echo e(isset($admin->id) ? encreptIt($admin->id) : ''); ?>" class="action-btns resend-invite" data-toggle='tooltip' data-placement='top' title='Resend activation email'><i class="fa fa-refresh text-primary"></i></a>
                                            <?php endif; ?>
                                            <a href="javascript:void(0)" data-id="<?php echo e(isset($admin->id) ? encreptIt($admin->id) : ''); ?>" class="action-btns invite-admin-delete" data-toggle='tooltip' data-placement='top' title='Delete Admin'><i class="feather feather-x text-danger"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-body">
                    <form class="form" id="company-admin" method="post" action="<?php echo e(admin_url('company/invite-admin')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                        <input type="hidden" class="company_id" name="company_id" value="<?php echo e((isset($company->id) && $company->id != '') ? encreptIt($company->id) : ''); ?>" />
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Invite admin<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="name" placeholder="Name & Surname" value="<?php echo e(isset($company->phone) ? $company->phone : ''); ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo e(isset($company->phone) ? $company->phone : ''); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary admin-submit">
                                Send Invite
                                <i class="fa fa-circle-o-notch fa-spin hide mr-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\people_led\resources\views/admin/company/setup.blade.php ENDPATH**/ ?>