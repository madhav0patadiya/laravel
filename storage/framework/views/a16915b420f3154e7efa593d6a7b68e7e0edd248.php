<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="" name="description">
    <meta content="" name="author">
    <meta name="keywords" content="" />
    <!-- Title -->
    <title>GL Scholars - Agent Panel</title>

    <!--Favicon -->
    <link rel="icon" href="<?php echo e(asset_url('images/favicon.png')); ?>" />

    <!-- Bootstrap css -->
    <link href="<?php echo e(asset_url('css/bootstrap.css')); ?>" rel="stylesheet" />
    
    <!-- Style css -->
    <link href="<?php echo e(asset_url('css/style.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset_url('css/custom.css')); ?>" rel="stylesheet" />
    <script>
        var base_url    = "<?php echo e(agent_url()); ?>";
        var csrf_token  = "<?php echo e(csrf_token()); ?>";
    </script>

    <?php if(isset($css_files)): ?>
        <?php $__currentLoopData = $css_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $css_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <link rel="stylesheet" type="text/css" href="<?php echo e(asset_url($css_value)); ?>">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</head>

<body>

    <div class="page responsive-log login-bg1">
        <div class="page-single">
            <div class="container">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>

    <!-- Jquery js-->
    <script src="<?php echo e(asset_url('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/jquery.validate.min.js')); ?>"></script>

    <!-- Bootstrap4 js-->
    <script src="<?php echo e(asset_url('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/bootstrap.min.js')); ?>"></script>
    <!-- Custom js-->
    <script src="<?php echo e(asset_url('js/theme.js')); ?>"></script>
    <?php if(isset($js_files)): ?>
        <?php $__currentLoopData = $js_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $js_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <script src="<?php echo e(asset_url($js_value)); ?>"></script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <script src="<?php echo e(asset_url('js/front/custom.js')); ?>"></script>
</body>

</html><?php /**PATH D:\Xampp\htdocs\people_led\resources\views/front/layouts/auth_master.blade.php ENDPATH**/ ?>