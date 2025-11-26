
<?php $__env->startSection('content'); ?>
    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <h4 class="page-title">My Profile</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card">
                <div class="card-header border-bottom-0">
                    <div class="card-title">Edit Details</div>
                </div>
                <form class="form" method="post" id="profile-form" action="<?php echo e(agent_url('profile/update-profile')); ?>"  enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="employee_id" class="employee_id" value="<?php echo e(isset($login_user->id) && $login_user->id != ''? encreptIt($login_user->id) : ''); ?> "/>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">First Name<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?php echo e(isset($login_user->firstname) ? $login_user->firstname : ''); ?>">
                                </div>
                            </div>
                            <!-- <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2">Father's Name<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control mb-md-0 mb-5" name="fathername" placeholder="Enter Father Name" value="<?php echo e(isset($login_user->fathername) ? $login_user->fathername :''); ?>">
                                </div>
                            </div> -->
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Last Name<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="<?php echo e(isset($login_user->lastname) ? $login_user->lastname : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Email address<small class="mandotory">*</small></label>
                                    <input type="email" class="form-control email" name="email" placeholder="Email" value="<?php echo e(isset($login_user->email) ? $login_user->email : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Phone Number<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="phone" placeholder="Number" value="<?php echo e(isset($login_user->phone) ? $login_user->phone : ''); ?>" maxlength="10">
                                </div>
                            </div>
                            <!-- <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Education<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="education" placeholder="Enter Education" value="<?php echo e(isset($login_user->education) ? $login_user->education :''); ?>">
                                </div>
                            </div> -->
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Avatar</label>
                                    <input type="file" class="dropify" name="avatar" data-default-file="<?php echo e(isset($login_user->avatar) && $login_user->avatar != '' ? storage_url($login_user->avatar) : ''); ?>" data-height="180" />
                                </div>
                            </div>
                            <!-- <div class="col-sm-8 col-md-8">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label mb-0 mt-2"><b>Gender</b><small class="mandotory">*</small></label>
                                            <div class="d-flex">
                                                <label class="custom-control custom-radio mr-4">
                                                    <input type="radio" class="custom-control-input" name="gender" value="male"<?php echo e((isset($login_user->gender) && $login_user->gender == "male") ? 'checked' : ''); ?>>
                                                    <span class="custom-control-label"><b>Male</b></span>
                                                </label>
                                                <label class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" name="gender" value="female"<?php echo e((isset($login_user->gender) && $login_user->gender == "female") ?'checked' : ''); ?>>
                                                    <span class="custom-control-label"><b>Female</b></span>
                                                </label>
                                            </div>
                                        </div>
                                        <?php if($errors->has('gender')): ?>
                                            <div class="error"><?php echo e($errors->first('gender')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label mb-0 mt-2"><b>Birthdate</b><small class="mandotory">*</small></label>
                                            <input class="form-control fc-datepicker" name="birthdate" placeholder="DD/MM/YYYY" type="text" value="<?php echo e(isset($login_user->birthdate) ? showDate($login_user->birthdate) :''); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label mb-0 mt-2"><b>Hobbies</b><small class="mandotory">*</small> <small>(Type word and press SPACE)</small></label>
                                            <input type="text" class="form-control mb-md-0 mb-5 tags_input" name="hobby" placeholder="Eg. Cricket, Tennis, Swimming" value="<?php echo e(isset($login_user->hobby) ? $login_user->hobby :''); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <!-- <h5 class="mb-0 mt-2 text-primary"><b>Other Contact Details:</b></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2"><b>Name</b></label>
                                    <input type="text" class="form-control mb-md-0 mb-5" name="other_person_name" placeholder="Enter Name" value="<?php echo e(isset($login_user->other_person_name) ? $login_user->other_person_name :''); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2"><b>Phone Number</b></label>
                                    <input type="text" class="form-control mb-md-0 mb-5" maxlength="10" name="other_person_number" placeholder="Enter number" value="<?php echo e(isset($login_user->other_person_number) ? $login_user->other_person_number :''); ?>">
                                </div>
                            </div>
                        </div>
                        <h5 class="mb-0 mt-2 text-primary"><b>Address Details:</b></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2"><b>Current Address</b><small class="mandotory">*</small></label>
                                    <textarea class="form-control" name="current_address" rows="4" placeholder="Enter current address"><?php echo e(isset($login_user->current_address) ? $login_user->current_address :''); ?></textarea>
                                </div>
                                <?php if($errors->has('address')): ?>
                                    <div class="error"><?php echo e($errors->first('address')); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2"><b>Permanent Address</b><small class="mandotory">*</small></label>
                                    <textarea class="form-control" name="permanent_address" rows="4" placeholder="Enter permanent address"><?php echo e(isset($login_user->permanent_address) ? $login_user->permanent_address :''); ?></textarea>
                                </div>
                                <?php if($errors->has('address')): ?>
                                <div class="error"><?php echo e($errors->first('address')); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <h5 class="mb-0 mt-2 text-primary"><b>Bank Details:</b></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2">Bank Name<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="bank_name" placeholder="Enter Bank name" value="<?php echo e(isset($bankdetail->bankname) ? $bankdetail->bankname :''); ?>">
                                </div>
                                <?php if($errors->has('bank_name')): ?>
                                <div class="error"><?php echo e($errors->first('bank_name')); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2">Account Number<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="account_number" placeholder="Enter Account Number" value="<?php echo e(isset($bankdetail->account_number) ? $bankdetail->account_number :''); ?>">
                                </div>
                                <?php if($errors->has('account_number')): ?>
                                <div class="error"><?php echo e($errors->first('account_number')); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2">Account Holder<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="holder_name" placeholder="Enter Account Holder Name" value="<?php echo e(isset($bankdetail->holder_name) ? $bankdetail->holder_name :''); ?>">
                                </div>
                                <?php if($errors->has('account_holder_name')): ?>
                                <div class="error"><?php echo e($errors->first('account_holder_name')); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2">Branch<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="branch_name" placeholder="Enter Branch name" value="<?php echo e(isset($bankdetail->branch) ? $bankdetail->branch :''); ?>">
                                </div>
                                <?php if($errors->has('branch_name')): ?>
                                <div class="error"><?php echo e($errors->first('branch_name')); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2">IFSC Code<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="ifsc_code" placeholder="Enter IFSC Code" value="<?php echo e(isset($bankdetail->ifsc_code) ? $bankdetail->ifsc_code :''); ?>" maxlength="11">
                                </div>
                                <?php if($errors->has('ifsc_code')): ?>
                                <div class="error"><?php echo e($errors->first('ifsc_code')); ?></div>
                                <?php endif; ?>
                            </div>
                        </div> -->
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary profile-submit">
                            Update
                            <i class="fa fa-circle-o-notch fa-spin hide mr-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5">
            <div class="card">
                <div class="card-header border-bottom-0">
                    <div class="card-title">Edit Password</div>
                </div>
                <form class="form" method="post" id="password-form" action="<?php echo e(agent_url('profile/update-password')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="employee_id" value="<?php echo e(isset($login_user->id) && $login_user->id != ''? encreptIt($login_user->id) : ''); ?> "/>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Current Password<small class="mandotory">*</small></label>
                            <input type="password" class="form-control" name="old_password">
                        </div>
                        <div class="form-group">
                            <label class="form-label">New Password<small class="mandotory">*</small></label>
                            <input type="password" id="new_password" class="form-control" name="new_password">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirm Password<small class="mandotory">*</small></label>
                            <input type="password" class="form-control" name="confirm_password">
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary password-submit">
                            Update
                            <i class="fa fa-circle-o-notch fa-spin hide mr-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\people_led\resources\views/front/profile/setup.blade.php ENDPATH**/ ?>