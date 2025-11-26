
<?php $__env->startSection('content'); ?>
    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <h4 class="page-title">My Profile</h4>
        </div>
        <div class="page-rightheader ml-md-auto">
            <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <div class="btn-list">
                    <a href="<?php echo e(student_url('profile/setup')); ?>" class="btn btn-primary">
                        <i class="fa fa-pencil"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row employee_profile_view">
        <div class="col-xl-4 col-md-12 col-lg-12">
            <div class="card box-widget widget-user">
                <div class="card-body text-center">
                    <div class="widget-user-image mx-auto text-center">
                        <?php if(isset($login_user->avatar_path)): ?>
                            <img class="avatar avatar-xxl brround rounded-circle" alt="img" src="<?php echo e($login_user->avatar_path); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="pro-user mt-3">
                        <?php if(isset($login_user->firstname)): ?>
                            <h4 class="pro-user-username text-dark mb-1"><?php echo e(isset($login_user->firstname) ? $login_user->firstname :''); ?> <?php echo e(isset($login_user->lastname) ? $login_user->lastname :''); ?></h4>
                        <?php endif; ?>
                        <?php if(isset($login_user->citizenship)): ?>
                            <h6 class="pro-user-desc text-muted fs-12"><?php echo e(isset($login_user->citizenship) ? $login_user->citizenship :''); ?></h6>
                        <?php endif; ?>
                        <div class="row mt-5">
                            <div class="col-12  text-center">
                                <?php if(isset($login_user->address)): ?>
                                    <h6 class="pro-user-desc text-muted fs-12"><i class="fa fa-home"></i> <?php echo e(isset($login_user->address) ? ucfirst($login_user->address) :''); ?></h6>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header  border-0">
                    <div class="card-title">Personal Details</div>
                </div>
                <div class="card-body border-bottom pb-2">
                    <div class="row">
                        <div class="col-12">
                            <?php if(isset($login_user->email)): ?>
                                 <h6 class="fs-14"><i class="fa fa-envelope-o"></i> <?php echo e(isset($login_user->email) ? $login_user->email :''); ?></h6>
                            <?php endif; ?>

                            <?php if(isset($login_user->phone)): ?>
                                <h6 class="fs-14 mt-3"><i class="fa fa-mobile-phone"></i> <?php echo e(isset($login_user->phone) ? $login_user->phone :''); ?></h6>
                            <?php endif; ?>

                            <?php if(isset($login_user->country->name)): ?>
                                <h6 class="fs-14 mt-3"><i class="fa fa-book"></i> <?php echo e(isset($login_user->country->name) ? $login_user->country->name :''); ?></h6>
                            <?php endif; ?>
                            <?php if(isset($login_user->course)): ?>
                                <h6 class="fs-14 mt-3 text-overflow"><i class="fa fa-futbol-o"></i> <?php echo e(isset($login_user->course) ? $login_user->course :''); ?></h6>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if(isset($login_user->firstname)): ?>
                    <div class="card-header  border-0 pt-5">
                        <div class="card-title">Other Detail</div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-12">
                                <?php if(isset($login_user->program->name)): ?>
                                    <h6 class="fs-14 mt-3"><i class="fa fa-user"></i> <?php echo e(isset($login_user->program->name) ? $login_user->program->name :''); ?></h6>
                                <?php endif; ?>
                                <?php if(isset($login_user->agent_code)): ?>
                                    <h6 class="fs-14 mt-3"><i class="fa fa-user"></i> <?php echo e(isset($login_user->agent_code) ? $login_user->agent_code :''); ?></h6>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\people_led\resources\views/student/profile/index.blade.php ENDPATH**/ ?>