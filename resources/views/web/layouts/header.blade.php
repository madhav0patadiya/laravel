    <!-- header section start here -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="header-top-area">
                    <ul class="lab-ul left">
                        @if(isset(socialHandles()->phone))
                            <li>
                                <a href="tel:{{ socialHandles()->phone }}">
                                    <i class="icofont-ui-call"></i> <span>{{ socialHandles()->phone }}</span>
                                </a>
                            </li>
                        @endif
                        @if(isset(socialHandles()->address))
                            <li>
                                <i class="icofont-location-pin"></i> {{socialHandles()->address ?? '#'}}
                            </li>
                        @endif
                    </ul>
                    <ul class="lab-ul social-icons d-flex align-items-center">
                        <li><p>Find us on : </p></li>
                        @if(isset(socialHandles()->facebook))
                            <li><a href="{{socialHandles()->facebook ?? '#'}}" target="_blank" class="fb"><i class="icofont-facebook"></i></a></li>
                        @endif
                        @if(isset(socialHandles()->twitter))
                            <li><a href="{{socialHandles()->twitter ?? '#'}}" ><i class="icofont-linkedin"></i></a></li>
                        @endif
                        @if(isset(socialHandles()->instagram))
                            <li><a href="{{socialHandles()->instagram ?? '#'}}"><i class="icofont-instagram"></i></a></li>
                        @endif
                        @if(isset(socialHandles()->whatsapp))
                            <li><a href="https://wa.me/{{ socialHandles()->whatsapp ?? '#' }}" target="_blank"><i class="icofont-whatsapp"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo">
                        <a href="{{web_url()}}"><img class="header-logo" src="{{ header_logo() ?? '' }}" alt="logo" ></a>
                    </div>
                    <div class="menu-area">
                        <div class="menu">
                            <ul class="lab-ul">
                                <li><a href="{{web_url()}}">Home</a></li>
                                <li><a href="{{web_url('all-scholarship')}}">Scholarship</a></li>
                                <li><a href="{{web_url('about')}}">About</a></li>
                                <li><a href="{{web_url('contact')}}">Contact</a></li>
                            </ul>
                        </div>
                        
                        <a href="{{agent_url()}}" class="login"><i class="icofont-user"></i> <span>AGENT LOG IN</span> </a>
                        <a href="{{student_url('')}}" class="signup"><i class="icofont-users"></i> <span>STUDENT LOG IN</span> </a>

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
        <div class="menu d-lg-none">
            <ul class="lab-ul">
                <li><a href="{{web_url()}}">Home</a></li>
                <li><a href="{{web_url('all-scholarship')}}">Scholarship</a></li>
                <li><a href="{{web_url('about')}}">About</a></li>
                <li><a href="{{web_url('contact')}}">Contact</a></li>
                <!-- Add additional links for mobile view -->
                <li><a href="{{agent_url()}}">Agent Login</a></li>
                <li><a href="{{student_url('')}}">Student Login</a></li>
            </ul>
        </div>
    </header>
    <!-- header section ending here -->
