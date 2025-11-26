@extends('web.layouts.master')
@section('content')
    <!-- Pageheader section start here -->
    <div class="pageheader-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pageheader-content text-center">
                        <h2>About Our GL Scholars</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ web_url() }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pageheader section ending here -->

    <!-- About Us Section Start Here -->
    <div class="about-section style-3 padding-tb section-bg">
        <div class="container">
            <div class="row justify-content-center row-cols-xl-2 row-cols-1 align-items-center">
                <div class="col">
                    <div class="about-left">
                        <div class="about-thumb">
                            <img src="{{ asset_url('images/about/01.jpg') }}" alt="about">
                        </div>
                        <div class="abs-thumb">
                            <img src="{{ asset_url('images/about/02.jpg') }}" alt="about">
                        </div>
                        <div class="about-left-content">
                            <h3>30+</h3>
                            <p>Years Of Experiences</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="about-right">
                        <div class="section-header">
                            <span class="subtitle">About GL Scholars</span>
                            <h2 class="title">Empowering Global Education Dreams</h2>
                            <p>GL Scholars Unlimited is a premier education consultancy dedicated to helping students and professionals achieve their dreams of studying abroad. With a commitment to excellence, we provide expert guidance on university admissions, visa applications, scholarships, and career planning. Our mission is to empower individuals with global education opportunities, ensuring a seamless transition to international academic institutions.</p>
                        </div>
                        <div class="section-wrapper">
                            <ul class="lab-ul">
                                <li>
                                    <div class="sr-left">
                                        <img src="{{ asset_url('images/about/icon/01.jpg') }}" alt="about icon">
                                    </div>
                                    <div class="sr-right">
                                        <h5>Expert Guidance</h5>
                                        <p>Our experienced counselors provide personalized support through every step of your study abroad journey.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="sr-left">
                                        <img src="{{ asset_url('images/about/icon/02.jpg') }}" alt="about icon">
                                    </div>
                                    <div class="sr-right">
                                        <h5>Scholarship Support</h5>
                                        <p>We help students secure scholarships and financial aid opportunities to make global education more accessible.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="sr-left">
                                        <img src="{{ asset_url('images/about/icon/03.jpg') }}" alt="about icon">
                                    </div>
                                    <div class="sr-right">
                                        <h5>Global University Access</h5>
                                        <p>Connect with prestigious universities worldwide and unlock diverse academic and career paths.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Us Section Ending Here -->

    <!-- Instructors Section Start Here -->
    <div class="instructor-section padding-tb section-bg">
        <div class="container">
            <div class="section-header text-center">
                <span class="subtitle">Meet our Experts</span>
                <h2 class="title">The backbone of GL Scholars</h2>
            </div>
            <div class="section-wrapper">
                <div class="row g-4 justify-content-center row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4">
                    @foreach($founders as $founder)
                        <div class="col">
                            <div class="instructor-item">
                                <div class="instructor-inner">
                                    <div class="instructor-thumb">
                                        <img src="{{ $founder->image_path }}" alt="instructor">
                                    </div>
                                    <div class="instructor-content">
                                        <a href="team-single.html"><h4>{{ ucfirst($founder->name) ?? '' }}</h4></a>
                                        <p>{{ ucfirst($founder->title) ?? '' }}</p>
                                        <span class="ratting">
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Instructors Section Ending Here -->

@endsection