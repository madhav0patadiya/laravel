
<?php $__env->startSection('content'); ?>
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Reset Password</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="<?php echo e(web_url()); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="login-section padding-tb section-bg">
    <div class="container">
        <div class="account-wrapper">
            <h3 class="title">Reset Password</h3>
            <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success" role="alert">
                    <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i> <?php echo e($message); ?>! 
                </div>
            <?php else: ?>
                <?php if($message = Session::get('error')): ?> 
                <div class="alert alert-danger" role="alert">
                    <i class="fa fa-frown-o mr-2" aria-hidden="true"></i> <?php echo e($message); ?>!
                </div>
                <?php endif; ?>
            <?php endif; ?>
            <form class="account-form" method="post" id="reset-form"  action="<?php echo e(agent_url('reset-password')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="access_token" value="<?php echo e((isset($token) && $token != '' ? $token : '')); ?>" />
                <div class="form-group">
                    <input placeholder="New password" id="new_password" name="new_password" type="password">
                </div>
                <div class="form-group">
                    <input placeholder="Confirm password" name="confirm_password" type="password">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="d-block lab-btn"><span>Proceed</span></button>
                </div>
            </form>
            <div class="account-bottom">
                <span class="d-block cate pt-10">Back to Login? <a href="<?php echo e(agent_url()); ?>">Login</a></span>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\people_led\resources\views/front/auth/reset_password.blade.php ENDPATH**/ ?>