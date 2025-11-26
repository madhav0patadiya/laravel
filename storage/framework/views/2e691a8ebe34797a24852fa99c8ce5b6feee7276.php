<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

    <head>
        <!-- Meta data -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
        <!-- Title -->
        <title>GL Scholars - Admin Panel</title>
        <!--Favicon -->
        <link rel="icon" href="<?php echo e(favicon_logo() ?? ''); ?>" type="image/x-icon" />

        <!-- Bootstrap css -->
        <link href="<?php echo e(asset_url('css/bootstrap.css')); ?>" rel="stylesheet" />
        <!-- Animate css -->
        <link href="<?php echo e(asset_url('css/animated.css')); ?>" rel="stylesheet" />
        <!-- Style css -->
        <link href="<?php echo e(asset_url('css/style.css')); ?>" rel="stylesheet" />

        <!--Sidemenu css -->
        <link href="<?php echo e(asset_url('css/sidemenu.css')); ?>" rel="stylesheet">

        <link href="<?php echo e(asset_url('css/notifIt.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset_url('css/datatables.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset_url('css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">

        <link href="<?php echo e(asset_url('css/select2.min.css')); ?>" rel="stylesheet">

        <link href="<?php echo e(asset_url('css/p-scrollbar.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset_url('css/jquery.sweet-modal.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset_url('css/sweetalert.css')); ?>" rel="stylesheet">

        <!---Icons css-->
        <link href="<?php echo e(asset_url('css/icons.css')); ?>" rel="stylesheet" />
        <?php if(isset($css_files)): ?>
            <?php $__currentLoopData = $css_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $css_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <link rel="stylesheet" type="text/css" href="<?php echo e(asset_url($css_value)); ?>">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <!--custom css -->
        <link href="<?php echo e(asset_url('css/custom.css')); ?>" rel="stylesheet">

        <script>
            var admin_url   = "<?php echo e(url('/admin')); ?>";
            var csrf_token  = "<?php echo e(csrf_token()); ?>";
        </script>
    </head>

<body class="app sidebar-mini" id="index1">

    <!---Global-loader-->
    <div id="global-loader">
        <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>

    <div class="page">
        <div class="page-main">
            <!--aside-start-->
            <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!--aside-end-->
            <!-- start app-content-->
            <div class="app-content main-content">
                <div class="side-app">
                    <!--app header-->
                    <?php echo $__env->make('admin.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!--end header-->
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
            <!-- end app-content-->
        </div>
        <!--Footer-->
        <?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--end footer-->
    </div>

    <!--Back to top-->
    <a href="#top" id="back-to-top"><span class="feather feather-chevrons-up"></span></a>

    <!-- Jquery js-->
    <script src="<?php echo e(asset_url('js/jquery.min.js')); ?>"></script>

    <!--Bootstrap4 js-->
    <script src="<?php echo e(asset_url('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/jquery.dataTables.min.js')); ?>"></script>
    <!--Sidemenu js-->
    <script src="<?php echo e(asset_url('js/sidemenu.js')); ?>"></script>
    <!-- Custom js-->
    <script src="<?php echo e(asset_url('js/notifIt.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/p-scrollbar.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/theme.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/confetti.min.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/jquery.sweet-modal.min.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/sweetalert.min.js')); ?>"></script>

    <?php if(isset($js_files)): ?>
        <?php $__currentLoopData = $js_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $js_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <script src="<?php echo e(asset_url($js_value)); ?>"></script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <script src="<?php echo e(asset_url('js/admin/modules/'.strtolower($controller).'.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/admin/custom.js')); ?>"></script>
    <script>
            var message = '';
            var type = '';
            <?php if(Session::has('success')): ?>
                message = "<?php echo Session::get('success'); ?>";
                type    = "success";
            <?php endif; ?>

            <?php if(Session::has('error')): ?>
                message = "<?php echo Session::get('error'); ?>";
                type    = "error";
            <?php endif; ?>
            setTimeout(function(){
                showMessage(type,message);
            }, 500);

    </script>
</body>
</html>
<?php /**PATH D:\Xampp\htdocs\glscholars\resources\views/admin/layouts/master.blade.php ENDPATH**/ ?>