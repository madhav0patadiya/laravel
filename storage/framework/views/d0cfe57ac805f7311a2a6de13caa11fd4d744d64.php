
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
                <form class="form" method="post" id="profile-form" action="<?php echo e(student_url('profile/update-profile')); ?>"  enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="student_id" class="student_id" value="<?php echo e(isset($login_user->id) && $login_user->id != ''? encreptIt($login_user->id) : ''); ?> "/>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">First Name<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?php echo e(isset($login_user->firstname) ? $login_user->firstname : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Last Name<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="<?php echo e(isset($login_user->lastname) ? $login_user->lastname : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Phone<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?php echo e(isset($login_user->phone) ? $login_user->phone : ''); ?>">
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
                                    <label class="form-label">Citizenship<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="citizenship" placeholder="Citizenship" value="<?php echo e(isset($login_user->citizenship) ? $login_user->citizenship : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Country<small class="mandotory">*</small></label>
                                    <select class="form-control" name="country_id">
                                        <option value="">Select Country</option>
                                        <?php if(isset($countries)): ?>
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(encreptIt($country->id)); ?>" <?php echo e(isset($login_user->country_id) && $country->id == $login_user->country_id ? 'selected' : ''); ?>><?php echo e($country->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Program Level<small class="mandotory">*</small></label>
                                    <select class="form-control" name="program_level_id">
                                        <option value="">Select Program Level</option>
                                        <?php if(isset($program_levels)): ?>
                                            <?php $__currentLoopData = $program_levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(encreptIt($program->id)); ?>" <?php echo e(isset($login_user->program_level_id) && $program->id == $login_user->program_level_id ? 'selected' : ''); ?>><?php echo e($program->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Course<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="course" placeholder="Course" value="<?php echo e(isset($login_user->course) ? $login_user->course : ''); ?>">
                                </div>
                            </div>
                            <?php if(isset($login_user->agent_code)): ?>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Agent<small class="mandotory">*</small></label>
                                        <input type="text" class="form-control" name="agent_code" value="<?php echo e(isset($login_user->agent_code) ? $login_user->agent_code : ''); ?>" readonly>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="col-sm-6 col-md-6">
                                </div>
                            <?php endif; ?>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Address<small class="mandotory">*</small></label>
                                    <textarea class="form-control" name="address" placeholder="Address"><?php echo e(isset($login_user->address) ? $login_user->address : ''); ?></textarea>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Avatar</label>
                                    <input type="file" class="dropify" name="avatar" data-default-file="<?php echo e(isset($login_user->avatar) && $login_user->avatar != '' ? storage_url($login_user->avatar) : ''); ?>" data-height="180" />
                                </div>
                            </div>
                        </div>
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
                <form class="form" method="post" id="password-form" action="<?php echo e(student_url('profile/update-password')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="student_id" value="<?php echo e(isset($login_user->id) && $login_user->id != ''? encreptIt($login_user->id) : ''); ?> "/>
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
<?php echo $__env->make('student.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\glscholars\resources\views/student/profile/setup.blade.php ENDPATH**/ ?>