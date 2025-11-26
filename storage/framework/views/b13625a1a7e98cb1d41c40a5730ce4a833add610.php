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
        <title>GL Scholars - Student Panel</title>
        <!--Favicon -->
        <link rel="icon" href="<?php echo e(favicon_logo() ?? ''); ?>" />

        <!-- Bootstrap css -->
        <link href="<?php echo e(asset_url('css/bootstrap.css')); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset_url('css/notifIt.css')); ?>" rel="stylesheet">
        <!-- <link href="<?php echo e(asset_url('css/datatables.min.css')); ?>" rel="stylesheet"> -->
        <link href="<?php echo e(asset_url('css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset_url('css/bootstrap-datepicker.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset_url('css/summernote-bs4.css')); ?>" rel="stylesheet">
        <!-- Animate css -->
        <link href="<?php echo e(asset_url('css/animated.css')); ?>" rel="stylesheet"/>
        <!-- Style css -->
        <link href="<?php echo e(asset_url('css/style.css')); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset_url('css/introjs.css')); ?>" rel="stylesheet" />

        <!--Sidemenu css -->
        <link href="<?php echo e(asset_url('css/sidemenu.css')); ?>" rel="stylesheet">

        <link href="<?php echo e(asset_url('css/select2.min.css')); ?>" rel="stylesheet">

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
            var base_url    = "<?php echo e(student_url()); ?>";
            var csrf_token  = "<?php echo e(csrf_token()); ?>";
        </script>
    </head>

<body class="app sidebar-mini employee_portal" id="index1">
    <!---Global-loader-->
    <div id="global-loader">
        <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>
    <div class="page">
        <div class="page-main">
            <?php echo $__env->make('student.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="app-content main-content">
                <div class="side-app">
                    <?php echo $__env->make('student.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="page-box">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $__env->make('student.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    <script src="<?php echo e(asset_url('js/dataTables.bootstrap4.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/responsive.bootstrap4.min.js')); ?>"></script>

    <script src="<?php echo e(asset_url('js/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/summernote-bs4.js')); ?>"></script>

    <!--Sidemenu js-->
    <script src="<?php echo e(asset_url('js/sidemenu.js')); ?>"></script>

    <script src="<?php echo e(asset_url('js/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/notifIt.js')); ?>"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <?php if(isset($pre_js_files)): ?>
        <?php $__currentLoopData = $pre_js_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pre_key => $pre_js_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <script src="<?php echo e(asset_url($pre_js_value)); ?>"></script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <!-- Custom js-->
    <script src="<?php echo e(asset_url('js/theme.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/confetti.min.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/jquery.sweet-modal.min.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/interactive.v0.0.2.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/intro.js')); ?>"></script>
    <?php if(isset($js_files)): ?>
        <?php $__currentLoopData = $js_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $js_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <script src="<?php echo e(asset_url($js_value)); ?>"></script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <script src="<?php echo e(asset_url('js/student/modules/'.strtolower($controller).'.js')); ?>"></script>

    <script src="<?php echo e(asset_url('js/student/custom.js')); ?>"></script>

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
</body>
</html>
<?php /**PATH D:\Xampp\htdocs\glscholars\resources\views/student/layouts/master.blade.php ENDPATH**/ ?>