<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="{{web_url()}}">
            <h1 class="text-white">GL Scholars</h1>
            {{-- <img src="{{ asset_url('images/brand/logo.png') }}" class="header-brand-img dark-logo" alt="People Led">
            <img src="{{ asset_url('images/brand/favicon.png') }}" class="header-brand-img mobile-logo" alt="People Led"> --}}
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
                    <img src="{{ $login_user->avatar_path }}" alt="user-img" class="avatar-xxl rounded-circle mb-1">
                </div>
                <div class="user-info">
                    <a href="{{ admin_url('profile') }}">
                        <h5 class=" mb-2">
                            {{ (isset($login_user->firstname)) && (isset($login_user->lastname)) ? $login_user->firstname.' '.$login_user->lastname : '' }}
                        </h5>
                    </a>
                    <div class="sidebar_action_btn">
                        <a class="mt-4 fs-12 btn btn-outline-light mr-2" href="{{ admin_url('profile') }}">
                            <span class="app-sidebar__user-name text-sm">
                                <i class="fa fa-pencil"></i>
                                Edit Profile
                            </span>
                        </a>
                        <a class="mt-4 fs-12 btn btn-outline-light" href="{{ admin_url('logout') }}">
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
                <a class="side-menu__item" data-toggle="slide" href="{{ admin_url().'/dashboard' }}">
                    <i class="fe fe-grid sidemenu_icon"></i>
                    <span class="side-menu__label">Dashboard</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ admin_url().'/agent' }}">
                    <i class="feather feather-user sidemenu_icon"></i>
                    <span class="side-menu__label">Manage Agents</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ admin_url('students') }}">
                    <i class="fa fa-users sidemenu_icon"></i>
                    <span class="side-menu__label">Manage Student</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ admin_url('admins') }}">
                    <i class="fa fa-user-secret sidemenu_icon"></i>
                    <span class="side-menu__label">Master Admin</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ admin_url('setting') }}">
                    <i class="fa fa-cog sidemenu_icon"></i>
                    <span class="side-menu__label">Settings</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a href="{{ admin_url('setting/university-logo') }}" class="slide-item">University Logo Section</a>
                    </li>
                    <li>
                        <a href="{{ admin_url('setting/scholarship') }}" class="slide-item">Scholarship Section</a>
                    </li>
                    <li>
                        <a href="{{ admin_url('setting/feedback') }}" class="slide-item">Student Feedback Section</a>
                        <a href="{{ admin_url('setting/notice') }}" class="slide-item">Student Dashboard Notice</a>
                        <a href="{{ admin_url('setting/about-us') }}" class="slide-item">About Us Page</a>
                        <a href="{{ admin_url('setting/social-handles') }}" class="slide-item">System Settings</a>
                    </li>
                    <!-- Add more sub-items here -->
                </ul>
            </li>            
        </ul>
    </div>
</aside>
