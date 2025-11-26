    <!-- header section start here -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="header-top-area">
                    <ul class="lab-ul left">
                        <?php if(isset(socialHandles()->phone)): ?>
                            <li>
                                <a href="tel:<?php echo e(socialHandles()->phone); ?>">
                                    <i class="icofont-ui-call"></i> <span><?php echo e(socialHandles()->phone); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if(isset(socialHandles()->address)): ?>
                            <li>
                                <i class="icofont-location-pin"></i> <?php echo e(socialHandles()->address ?? '#'); ?>

                            </li>
                        <?php endif; ?>
                    </ul>
                    <ul class="lab-ul social-icons d-flex align-items-center">
                        <li><p>Find us on : </p></li>
                        <?php if(isset(socialHandles()->facebook)): ?>
                            <li><a href="<?php echo e(socialHandles()->facebook ?? '#'); ?>" target="_blank" class="fb"><i class="icofont-facebook"></i></a></li>
                        <?php endif; ?>
                        <?php if(isset(socialHandles()->twitter)): ?>
                            <li><a href="<?php echo e(socialHandles()->twitter ?? '#'); ?>" ><i class="icofont-twitter"></i></a></li>
                        <?php endif; ?>
                        <?php if(isset(socialHandles()->instagram)): ?>
                            <li><a href="<?php echo e(socialHandles()->instagram ?? '#'); ?>"><i class="icofont-instagram"></i></a></li>
                        <?php endif; ?>
                        <?php if(isset(socialHandles()->whatsapp)): ?>
                            <li><a href="https://wa.me/<?php echo e(socialHandles()->whatsapp ?? '#'); ?>" target="_blank"><i class="icofont-whatsapp"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo">
                        <a href="<?php echo e(web_url()); ?>"><img class="header-logo" src="<?php echo e(header_logo() ?? ''); ?>" alt="logo" ></a>
                    </div>
                    <div class="menu-area">
                        <div class="menu">
                            <ul class="lab-ul">
                                <li><a href="<?php echo e(web_url()); ?>">Home</a></li>
                                <li><a href="<?php echo e(web_url('all-scholarship')); ?>">Scholarship</a></li>
                                <li><a href="<?php echo e(web_url('about')); ?>">About</a></li>
                                <li><a href="<?php echo e(web_url('contact')); ?>">Contact</a></li>
                            </ul>
                        </div>
                        
                        <a href="<?php echo e(agent_url()); ?>" class="login"><i class="icofont-user"></i> <span>AGENT LOG IN</span> </a>
                        <a href="<?php echo e(student_url('')); ?>" class="signup"><i class="icofont-users"></i> <span>STUDENT LOG IN</span> </a>

                        <!-- toggle icons -->
                        <div class="header-bar d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="ellepsis-bar d-lg-none">
                            <i class="icofont-info-square"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header section ending here -->
<?php /**PATH D:\Xampp\htdocs\people_led\resources\views/web/layouts/header.blade.php ENDPATH**/ ?>