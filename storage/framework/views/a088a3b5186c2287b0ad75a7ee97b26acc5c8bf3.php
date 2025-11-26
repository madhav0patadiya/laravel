
<?php $__env->startSection('content'); ?>
    <div class="pageheader-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pageheader-content text-center">
                        <h2>Student Register Page</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="<?php echo e(web_url()); ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Register as Student</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(isset(socialHandles()->student_notice)): ?>
        <div class="section-bg pt-5">
            <div class="container">
                <div class="account-wrapper" style="background: #ff8554; padding: 10px;">
                    <h3 class="title">Import Notice</h3>
                    <div>
                        <p class="text-white"><b><?php echo e(socialHandles()->student_notice ?? ''); ?></b></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="login-section padding-tb section-bg">
        <div class="container">
            <div class="account-wrapper">
                <h3 class="title">Register as Student</h3>
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
                <form class="account-form" method="post" id="register-form" action="<?php echo e(student_url('commit-register')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <input name="firstname" type="text" placeholder="Firstname">
                    </div>
                    <div class="form-group">
                        <input name="lastname" type="text" placeholder="Lastname">
                    </div>
                    <div class="form-group">
                        <input name="citizenship" type="text" placeholder="Citizenship">
                    </div>
                    <div class="form-group">
                        <input name="address" type="text" placeholder="Residentail Address">
                    </div>
                    <div class="form-group">
                        <input name="phone" type="text" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <div class="outline-select shipping-select">
                            <select name="country_id">
                                <option value="">Select Country</option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(encreptIt($country->id)); ?>"><?php echo e($country->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input name="course" type="text" placeholder="Crouse Choice">
                    </div>
                    <div class="form-group">
                        <div class="outline-select shipping-select">
                            <select name="program_level_id">
                                <option value="">Select Program Level</option>
                                <?php $__currentLoopData = $program_levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(encreptIt($program->id)); ?>"><?php echo e($program->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="checkemail" name="email" type="email" placeholder="Email">
                    </div>
                    <?php if(isset($agent_code)): ?>
                        <input type="hidden" name="agent_code" value="<?php echo e($agent_code); ?>">
                        <div class="form-group">
                            <label style="font-weight:bold; text-align:left; display:block;">Referred by:</label>
                            <input type="text" class="form-control" value="<?php echo e($agent_name ?? 'Unknown Agent'); ?>" readonly>
                        </div>
                    <?php endif; ?>
                    <div class="form-group text-center">
                        <button type="submit" class="d-block lab-btn"><span>Register</span></button>
                    </div>
                </form>
                <div class="account-bottom">
                    <span class="d-block cate pt-10">Already have an Student Login? <a href="<?php echo e(student_url()); ?>">Login</a></span>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\glscholars\resources\views/student/auth/register.blade.php ENDPATH**/ ?>