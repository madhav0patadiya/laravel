
<?php $__env->startSection('content'); ?>
    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <h4 class="page-title"><?php echo e((isset($student->id) && $student->id != '') ? 'Update' : 'Create'); ?> Student</h4>
        </div>
        <div class="page-rightheader ml-md-auto">
            <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <div class="btn-list">
                    <?php if(isset($student->id)): ?>
                        <a href="<?php echo e(admin_url('students/document/'. encreptIt($student->id))); ?>" class="btn btn-primary mr-3">Upload Documents</a>
                        <a href="<?php echo e(admin_url('students/student-document/'. encreptIt($student->id))); ?>" class="btn btn-primary mr-3">Student Side Documents</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card">
                <form class="form" id="student-form" method="post" action="<?php echo e(admin_url('students/commit')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" class="student_id" name="student_id" value="<?php echo e((isset($student->id) && $student->id != '') ? encreptIt($student->id) : ''); ?>" />
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">First Name<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?php echo e(isset($student->firstname) ? $student->firstname : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Last Name<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="<?php echo e(isset($student->lastname) ? $student->lastname : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Citizenship<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="citizenship" placeholder="Citizenship" value="<?php echo e(isset($student->citizenship) ? $student->citizenship : ''); ?>" maxlength="10">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Course<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="course" placeholder="Course" value="<?php echo e(isset($student->course) ? $student->course : ''); ?>" maxlength="10">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Email address<small class="mandotory">*</small></label>
                                    <input type="email" class="form-control email" name="email" placeholder="Email" value="<?php echo e(isset($student->email) ? $student->email : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Password<small class="mandotory">*</small></label>
                                    <input type="password" class="form-control" name="password" placeholder="password">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Agent<small class="mandotory">*</small></label>
                                    <select class="form-control" name="agent_code">
                                        <option value="">Select Agent</option>
                                        <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(encreptIt($agent->referral_code)); ?>" <?php echo e(isset($student->agent_code) && $agent->referral_code == $student->agent_code ? 'selected' : ''); ?>><?php echo e($agent->fullname); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Country<small class="mandotory">*</small></label>
                                    <select class="form-control" name="country_id">
                                        <option value="">Select Country</option>
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(encreptIt($country->id)); ?>" <?php echo e(isset($student->country_id) && $country->id == $student->country_id ? 'selected' : ''); ?>><?php echo e($country->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Program Level<small class="mandotory">*</small></label>
                                    <select class="form-control" name="program_level_id">
                                        <option value="">Select Program Level</option>
                                        <?php $__currentLoopData = $program_levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(encreptIt($program->id)); ?>" <?php echo e(isset($student->program_level_id) && $program->id == $student->program_level_id ? 'selected' : ''); ?>><?php echo e($program->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Address<small class="mandotory">*</small></label>
                                    <textarea class="form-control" name="address"><?php echo e(isset($student->address) ? $student->address : ''); ?></textarea>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Avatar</label>
                                    <input type="file" class="dropify" name="avatar" data-default-file="<?php echo e(isset($student->avatar) && $student->avatar != '' ? $student->avatar_path : ''); ?>" data-height="180" />
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2"><b>Allowed Login?</b></label>
                                    <label class="custom-switch">
                                        <input type="checkbox" name="allow_login" class="custom-switch-input" <?php echo e((isset($student->allow_login) && $student->allow_login == 1) ?'checked' : ''); ?>>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Active/Inactive</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary student-submit">
                                <?php echo e((isset($student->id) && $student->id != '') ? 'Update' : 'Save'); ?>

                                <i class="fa fa-circle-o-notch fa-spin hide mr-2"></i>
                            </button>
                        </div>
                    </div>
                <form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\people_led\resources\views/admin/student/setup.blade.php ENDPATH**/ ?>