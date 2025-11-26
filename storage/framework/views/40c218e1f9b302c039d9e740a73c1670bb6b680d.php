<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Abroad Initiative - GLscholars</title>
    <link rel="shortcut icon" href="<?php echo e(favicon_logo() ?? ''); ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo e(asset_url('css/homepage/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset_url('css/homepage/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset_url('css/homepage/icofont.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset_url('css/homepage/swiper.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset_url('css/homepage/lightcase.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset_url('css/homepage/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset_url('css/homepage/custom.css')); ?>">

        <?php if(isset($css_files)): ?>
            <?php $__currentLoopData = $css_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $css_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <link rel="stylesheet" type="text/css" href="<?php echo e(asset_url($css_value)); ?>">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <script>
            var base_url    = "<?php echo e(web_url()); ?>";
            var csrf_token  = "<?php echo e(csrf_token()); ?>";
        </script>
    </head>

<body>
    <!-- preloader start here -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- preloader ending here -->

    <!-- scrollToTop start here -->
    <a href="#" class="scrollToTop"><i class="icofont-rounded-up"></i></a>
    <!-- scrollToTop ending here -->
    
    <?php echo $__env->make('web.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('web.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset_url('js/homepage/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/jquery.validate.min.js')); ?>"></script>

    <script src="<?php echo e(asset_url('js/homepage/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/homepage/swiper.min.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/homepage/progress.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/homepage/lightcase.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/homepage/counter-up.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/homepage/isotope.pkgd.js')); ?>"></script>
    <script src="<?php echo e(asset_url('js/homepage/functions.js')); ?>"></script>

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

    <?php if(isset($js_files)): ?>
        <?php $__currentLoopData = $js_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $js_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <script src="<?php echo e(asset_url($js_value)); ?>"></script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</body>
</html>
<?php /**PATH D:\Xampp\htdocs\glscholars\resources\views/web/layouts/master.blade.php ENDPATH**/ ?>