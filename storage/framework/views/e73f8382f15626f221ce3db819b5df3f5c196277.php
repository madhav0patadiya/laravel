<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="" name="description">
    <meta content="" name="author">
    <meta name="keywords" content="" />

    <!-- Title -->
    <title>GL Scholars Admin Panel</title>

    <!--Favicon -->
    <link rel="icon" href="<?php echo e(favicon_logo() ?? ''); ?>" type="image/x-icon"/>

    <!-- Bootstrap css -->
    <link href="<?php echo e(asset_url('css/bootstrap.css')); ?>" rel="stylesheet" />

    <link href="<?php echo e(asset_url('css/notifIt.css')); ?>" rel="stylesheet">
    <!-- Style css -->
    <link href="<?php echo e(asset_url('css/style.css')); ?>" rel="stylesheet" />

    <!--custom css -->
    <link  href="<?php echo e(asset_url('css/custom.css')); ?>" rel="stylesheet">
</head>
<body>
    
    <?php echo $__env->yieldContent('content'); ?>
    <!-- Jquery js-->
    <script src="<?php echo e(asset_url('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/jquery.validate.min.js')); ?>"></script>

    <!-- Bootstrap4 js-->
    <script src="<?php echo e(asset_url('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/notifIt.js')); ?>"></script>
    <!-- Custom js-->
    <script src="<?php echo e(asset_url('js/theme.js')); ?>"></script>
    <?php if(isset($js_files)): ?>
        <?php $__currentLoopData = $js_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $js_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <script src="<?php echo e(asset_url($js_value)); ?>"></script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <script src="<?php echo e(asset_url('js/admin/custom.js')); ?>"></script>
</body>
<script>
    var message = '';
    var type = '';
    <?php if(Session::has('success')): ?>
        message = "<?php echo Session::get('success'); ?>";
        type    = "success";
        // console.log("asdasd");
    <?php endif; ?>

    <?php if(Session::has('error')): ?>
        message = "<?php echo Session::get('error'); ?>";
        type    = "error";
    <?php endif; ?>
    setTimeout(function(){
        showMessage(type,message);
    }, 500);
    </script>
</html><?php /**PATH D:\Xampp\htdocs\glscholars\resources\views/admin/layouts/auth_master.blade.php ENDPATH**/ ?>