
<?php $__env->startSection('content'); ?>
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Agent Register Page</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="<?php echo e(web_url()); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Register</li>
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
            <h3 class="title">Register as Agent</h3>
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
            <form class="account-form" method="post" id="register-form" action="<?php echo e(agent_url('commit-register')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <input name="firstname" type="text" placeholder="Firstname">
                </div>
                <div class="form-group">
                    <input name="lastname" type="text" placeholder="Lastname">
                </div>
                <div class="form-group">
                    <input class="checkemail" name="email" type="email" placeholder="Email">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="d-block lab-btn"><span>Register</span></button>
                </div>
            </form>
            <div class="account-bottom">
                <span class="d-block cate pt-10">Are you a Agent? <a href="<?php echo e(agent_url()); ?>">Login</a></span>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\people_led\resources\views/front/auth/register.blade.php ENDPATH**/ ?>