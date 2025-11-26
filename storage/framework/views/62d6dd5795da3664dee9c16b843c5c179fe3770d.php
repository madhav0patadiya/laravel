<aside class="app-sidebar">
    <div class="app-sidebar__logo" >
        <a class="header-brand" href="#">
            <h1 class="text-white">GL Scholars</h1>
            
        </a>
    </div>
    <div class="app-sidebar__toggle" data-toggle="sidebar">
        <a class="open-toggle" href="#">
            <i class="fe fe-chevrons-left"></i>
        </a>
        <a class="close-toggle" href="#">
            <i class="fe fe-chevrons-right"></i>
        </a>
    </div>

    <div class="app-sidebar3">
        <div class="app-sidebar__user pb-4 mb-2">
            <div class="dropdown user-pro-body text-center">
                <div class="user-pic">
                    <a href="<?php echo e(agent_url('profile/setup')); ?>">
                        <img src="<?php echo e($login_user->avatar_path ?? ''); ?>" alt="user-img" class="avatar-xl rounded-circle mb-1">
                    </a>
                </div>
                <div class="user-info">
                    <a href="<?php echo e(agent_url('profile/setup')); ?>">
                        <h5 class=" mb-2">
                            <?php echo e($login_user->fullname ?? ''); ?>

                        </h5>
                    </a>
                    <div class="sidebar_action_btn">
                        <a class="mt-4 fs-12 btn btn-outline-light mr-2" href="<?php echo e(agent_url('profile/setup')); ?>">
                            <span class="app-sidebar__user-name text-sm">
                                <i class="fa fa-pencil"></i>
                                Edit Profile
                            </span>
                        </a>
                        <a class="mt-4 fs-12 btn btn-outline-light" href="<?php echo e(agent_url('logout')); ?>">
                            <span class="app-sidebar__user-name text-sm">
                                <i class="fa fa-sign-out"></i>
                                Logout
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="slide">
                <a class="side-menu__item dash" data-toggle="slide" href="<?php echo e(agent_url().'/dashboard'); ?>">
                    <i class="feather feather-home sidemenu_icon"></i>
                    <span class="side-menu__label">Dashboard</span>
                </a>
                
            </li>
        </ul>
    </div>
</aside>
<?php /**PATH D:\Xampp\htdocs\people_led\resources\views/front/layouts/sidebar.blade.php ENDPATH**/ ?>