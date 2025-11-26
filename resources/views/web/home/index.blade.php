@extends('web.layouts.master')
@section('content')
<!-- banner section start here -->
<section class="banner-section style-1">
    <div class="container">
        <div class="section-wrapper">
            <div class="row align-items-center">
                <div class="col-xxl-5 col-xl-6 col-lg-10">
                    <div class="banner-content">
                        <h6 class="subtitle text-uppercase fw-medium">Online education</h6>
                        <h2 class="title"><span class="d-lg-block">Welcome</span> to GLScholars <span class="d-lg-block"></span></h2>
                        <p class="desc">We helps students apply to top universities worldwide with scholarships, fast application tracking, and expert guidance.</p>
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-6">
                    <div class="banner-thumb">
                        <img src="{{ asset_url('images/banner/01.png') }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="all-shapes"></div>
    <div class="cbs-content-list d-none">
        <ul class="lab-ul">
            <li class="ccl-shape shape-1"><a href="#">16M Students Happy</a></li>
            <li class="ccl-shape shape-2"><a href="#">130K+ Total Courses</a></li>
            <li class="ccl-shape shape-3"><a href="#">89% Successful Students</a></li>
            <li class="ccl-shape shape-4"><a href="#">23M+ Learners</a></li>
            <li class="ccl-shape shape-5"><a href="#">36+ Languages</a></li>
        </ul>
    </div>
</section>
<!-- banner section ending here -->

<!-- sponsor section start here -->
@if(isset($uni_logo) && count($uni_logo) > 0) 
<div class="sponsor-section section-bg">
    <div class="container">
        <div class="section-wrapper">
            <div class="sponsor-slider">
                <div class="swiper-wrapper">
                    @foreach ($uni_logo as $logo)
                        <div class="swiper-slide">
                            <div class="sponsor-iten">
                                <div class="sponsor-thumb">
                                    <img src="{{ $logo->uni_logo_path }}" alt="sponsor">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- sponsor section ending here -->

<!-- category section start here -->
<div class="category-section padding-tb">
    <div class="container">
        <div class="section-header text-center">
            <span class="subtitle">Popular Category</span>
            <h2 class="title">Popular Category For Learn</h2>
        </div>
        <div class="section-wrapper">
            <div class="row g-2 justify-content-center row-cols-xl-6 row-cols-md-3 row-cols-sm-2 row-cols-1">
                <div class="col">
                    <div class="category-item text-center">
                        <div class="category-inner">
                            <div class="category-thumb">
                                <img src="{{ asset_url('images/category/icon/01.jpg') }}" alt="category">
                            </div>
                            <div class="category-content">
                                <a href="#"><h6>Computer Science</h6></a>
                                <span>24 Course</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="category-item text-center">
                        <div class="category-inner">
                            <div class="category-thumb">
                                <img src="{{ asset_url('images/category/icon/02.jpg') }}" alt="category">
                            </div>
                            <div class="category-content">
                                <a href="#"><h6>Civil Engineering</h6></a>
                                <span>40 Course</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="category-item text-center">
                        <div class="category-inner">
                            <div class="category-thumb">
                                <img src="{{ asset_url('images/category/icon/03.jpg') }}" alt="category">
                            </div>
                            <div class="category-content">
                                <a href="#"><h6>Business Analysis</h6></a>
                                <span>27 Course</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="category-item text-center">
                        <div class="category-inner">
                            <div class="category-thumb">
                                <img src="{{ asset_url('images/category/icon/04.jpg') }}" alt="category">
                            </div>
                            <div class="category-content">
                                <a href="#"><h6>Data Science Analytics</h6></a>
                                <span>28 Course</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="category-item text-center">
                        <div class="category-inner">
                            <div class="category-thumb">
                                <img src="{{ asset_url('images/category/icon/05.jpg') }}" alt="category">
                            </div>
                            <div class="category-content">
                                <a href="#"><h6>Learning Management</h6></a>
                                <span>78 Course</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="category-item text-center">
                        <div class="category-inner">
                            <div class="category-thumb">
                                <img src="{{ asset_url('images/category/icon/06.jpg') }}" alt="category">
                            </div>
                            <div class="category-content">
                                <a href="#"><h6>Computer Engineering</h6></a>
                                <span>38 Course</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="text-center mt-5">
                <a href="#" class="lab-btn"><span>Browse All Categories</span></a>
            </div> --}}
        </div>
    </div>
</div>
<!-- category section start here -->

<!-- feedback highlight section start -->
<section class="padding-tb section-bg">
    <div class="container">
        <div class="section-wrapper">
            <div class="row align-items-center g-4">
                <!-- Left Image -->
                <div class="col-lg-6">
                    <div class="about-thumb">
                        <img src="{{ $setting->image_path ?? ''}}" alt="Feedback Image" class="img-fluid rounded shadow">
                    </div>
                </div>
                <!-- Right Content -->
                <div class="col-lg-6">
                    <div class="about-content">
                        <h5 class="subtitle text-uppercase fw-medium">{{ $setting->sec1_subtitle ?? ''}}</h5>
                        <h2 class="title mb-3">{{ $setting->sec1_heading ?? ''}}</h2>
                        <p class="desc mb-3">{{ $setting->sec1_para1 ?? ''}}</p>
                        <p class="desc">{{ $setting->sec1_para2 ?? ''}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- feedback highlight section end -->
<!-- info text section start -->
<section class="padding-tb">
    <div class="container">
        <div class="section-wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h5 class="subtitle text-uppercase fw-medium">{{ $setting->sec2_subtitle ?? '' }}</h5>
                    <h2 class="title mb-4">{{ $setting->sec2_heading ?? '' }}</h2>
                    <p class="desc mb-3">{{ $setting->sec2_para1 ?? '' }}</p>
                    <p class="desc">{{ $setting->sec2_para2 ?? '' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- info text section end -->

<!-- course section start here -->
<div class="course-section padding-tb section-bg">
    <div class="container">
        <div class="section-header text-center">
            <span class="subtitle">Featured Scholarship</span>
            <h2 class="title">Pick A Scholarship To Get Started</h2>
        </div>
        <div class="section-wrapper">
            <div class="row g-4 justify-content-center row-cols-xl-3 row-cols-md-2 row-cols-1">
                @foreach($scholarship as $item)
                <div class="col">
                    <div class="course-item">
                        <div class="course-inner">
                            <div class="course-thumb">
                                <img src="{{ $item->thumbnail_path ?? default_img()}}" alt="course">
                            </div>
                            <div class="course-content">
                                @if($item->fees != '')
                                <div class="course-price">{{ $item->fees ?? 0}}</div>
                                @endif
                                <div class="course-category">
                                    <div class="course-cate">
                                        {{-- <a href="#">Adobe XD</a> --}}
                                    </div>
                                    <div class="course-reiew">
                                        <span class="ratting">
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                        </span>
                                        {{-- <span class="ratting-count">
                                            03 reviews
                                        </span> --}}
                                    </div>
                                </div>
                                <a href="#"><h5>{{ $item->title ?? '' }}</h5></a>
                                {{-- <div class="course-details">
                                    <div class="couse-count"><i class="icofont-video-alt"></i> 18x Lesson</div>
                                    <div class="couse-topic"><i class="icofont-signal"></i> Online Class</div>
                                </div> --}}
                                <div class="course-footer">
                                    <div class="course-author">
                                        {{-- <img src="{{ asset_url('images/course/author/01.jpg') }}" alt="course author">
                                        <a href="#" class="ca-name">William Smith</a> --}}
                                    </div>
                                    <div class="course-btn">
                                        <a href="{{web_url('scholarship/'. encreptIt($item->id))}}" class="lab-btn-text">Read More <i class="icofont-external-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="text-center mt-5">
            <a href="{{web_url('all-scholarship')}}" class="lab-btn"><span>Browse All Scholarship</span></a>
        </div>
    </div>
</div>
<!-- course section ending here -->

<!-- abouts section start here -->
<div class="about-section">
    <div class="container">
        <div class="row justify-content-center row-cols-xl-2 row-cols-1 align-items-end flex-row-reverse">
            <div class="col">
                <div class="about-right padding-tb">
                    <div class="section-header">
                        <span class="subtitle">About Our GL Scholars</span>
                        <h2 class="title">Good Qualification Services And Better Skills</h2>
                        <p>Distinctively provide acces mutfuncto users whereas transparent proceses somes ncentivize eficient functionalities rather than extensible archtectur communicate leveraged services and cross-platform.</p>
                    </div>
                    <div class="section-wrapper">
                        <ul class="lab-ul">
                            <li>
                                <div class="sr-left">
                                    <img src="{{ asset_url('images/about/icon/01.jpg') }}" alt="about icon">
                                </div>
                                <div class="sr-right">
                                    <h5>Skilled Instructors</h5>
                                    <p>Distinctively provide acces mutfuncto users whereas communicate leveraged services</p>
                                </div>
                            </li>
                            <li>
                                <div class="sr-left">
                                    <img src="{{ asset_url('images/about/icon/02.jpg') }}" alt="about icon">
                                </div>
                                <div class="sr-right">
                                    <h5>Get Certificate</h5>
                                    <p>Distinctively provide acces mutfuncto users whereas communicate leveraged services</p>
                                </div>
                            </li>
                            <li>
                                <div class="sr-left">
                                    <img src="{{ asset_url('images/about/icon/03.jpg') }}" alt="about icon">
                                </div>
                                <div class="sr-right">
                                    <h5>Online Classes</h5>
                                    <p>Distinctively provide acces mutfuncto users whereas communicate leveraged services</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="about-left">
                    <div class="about-thumb">
                        <img src="{{ asset_url('images/about/01.png') }}" alt="about">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about section ending here -->

<!-- Instructors Section Start Here -->
<div class="instructor-section padding-tb section-bg">
    <div class="container">
        <div class="section-header text-center">
            <span class="subtitle">World-class Agents</span>
            <h2 class="title">Classes Taught By Real Creators</h2>
        </div>
        <div class="section-wrapper">
            <div class="row g-4 justify-content-center row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4">
                @foreach($agents as $agent)
                <div class="col">
                    <div class="instructor-item">
                        <div class="instructor-inner">
                            <div class="instructor-thumb">
                                <img src="{{ $agent->avatar_path }}" alt="instructor">
                            </div>
                            <div class="instructor-content">
                                <h4>{{ $agent->fullname ?? '' }}</h4>
                                <p>{{ $agent->phone ?? '' }}</p>
                                <span class="ratting">
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                </span>
                            </div>
                        </div>
                        {{-- <div class="instructor-footer">
                            <ul class="lab-ul d-flex flex-wrap justify-content-between align-items-center">
                                <li><i class="icofont-book-alt"></i> 08 courses</li>
                                <li><i class="icofont-users-alt-3"></i> 30 students</li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center footer-btn">
                <p>Want to help people learn, grow and achieve more in life?<a href="{{web_url('agent')}}">Become an Agent</a></p>
            </div>
        </div>
    </div>
</div>
<!-- Instructors Section Ending Here -->

<!-- student feedbak section start here -->
<div class="student-feedbak-section padding-tb shape-img">
    <div class="container">
        <div class="section-header text-center">
            <span class="subtitle">Loved by 200,000+ students</span>
            <h2 class="title">Students Community Feedback</h2>
        </div>
        <div class="section-wrapper">
            <div class="row justify-content-center row-cols-lg-2 row-cols-1">
                <div class="stu-feed-item">
                    <div class="stu-feed-inner">
                        <div class="stu-feed-top">
                            <div class="sft-left">
                                <div class="sftl-thumb">
                                    <img src="{{ $feedback->feed1_img_path }}" alt="student feedback">
                                </div>
                                <div class="sftl-content">
                                    <h6>{{ isset($feedback->feed1_name) ? $feedback->feed1_name : '' }}</h6>
                                    <span>{{ isset($feedback->feed1_subtitle) ? $feedback->feed1_subtitle : '' }}</span>
                                </div>
                            </div>
                            <div class="sft-right">
                                <span class="ratting">
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                </span>
                            </div>
                        </div>
                        <div class="stu-feed-bottom">
                            <p>{{ isset($feedback->feed1_description) ? $feedback->feed1_description : '' }}</p>
                        </div>
                    </div>
                </div>
                <div class="stu-feed-item">
                    <div class="stu-feed-inner">
                        <div class="stu-feed-top">
                            <div class="sft-left">
                                <div class="sftl-thumb">
                                    <img src="{{ $feedback->feed2_img_path }}" alt="student feedback">
                                </div>
                                <div class="sftl-content">
                                    <h6>{{ isset($feedback->feed2_name) ? $feedback->feed2_name : '' }}</h6>
                                    <span>{{ isset($feedback->feed2_subtitle) ? $feedback->feed2_subtitle : '' }}</span>
                                </div>
                            </div>
                            <div class="sft-right">
                                <span class="ratting">
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                </span>
                            </div>
                        </div>
                        <div class="stu-feed-bottom">
                            <p>{{ isset($feedback->feed2_description) ? $feedback->feed2_description : '' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sf-left">
                        <div class="sfl-thumb">
                            <img src="{{ $feedback->video1_img_path }}" alt="student feedback">
                            <a href="{{ isset($feedback->video1_link) ? $feedback->video1_link : '' }}" class="video-button" data-rel="lightcase"><i class="icofont-ui-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sf-left">
                        <div class="sfl-thumb">
                            <img src="{{ $feedback->video2_img_path }}" alt="student feedback">
                            <a href="{{ isset($feedback->video1_link) ? $feedback->video1_link : '' }}" class="video-button" data-rel="lightcase"><i class="icofont-ui-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="stu-feed-item">
                    <div class="stu-feed-inner">
                        <div class="stu-feed-top">
                            <div class="sft-left">
                                <div class="sftl-thumb">
                                    <img src="{{ $feedback->feed3_img_path }}" alt="student feedback">
                                </div>
                                <div class="sftl-content">
                                    <h6>{{ isset($feedback->feed3_name) ? $feedback->feed3_name : '' }}</h6>
                                    <span>{{ isset($feedback->feed3_subtitle) ? $feedback->feed3_subtitle : '' }}</span>
                                </div>
                            </div>
                            <div class="sft-right">
                                <span class="ratting">
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                </span>
                            </div>
                        </div>
                        <div class="stu-feed-bottom">
                            <p>{{ isset($feedback->feed3_description) ? $feedback->feed3_description : '' }}</p>
                        </div>
                    </div>
                </div>                
                <div class="stu-feed-item">
                    <div class="stu-feed-inner">
                        <div class="stu-feed-top">
                            <div class="sft-left">
                                <div class="sftl-thumb">
                                    <img src="{{ $feedback->feed4_img_path }}" alt="student feedback">
                                </div>
                                <div class="sftl-content">
                                    <h6>{{ isset($feedback->feed4_name) ? $feedback->feed4_name : '' }}</h6>
                                    <span>{{ isset($feedback->feed4_subtitle) ? $feedback->feed4_subtitle : '' }}</span>
                                </div>
                            </div>
                            <div class="sft-right">
                                <span class="ratting">
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                </span>
                            </div>
                        </div>
                        <div class="stu-feed-bottom">
                            <p>{{ isset($feedback->feed4_description) ? $feedback->feed4_description : '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- student feedbak section ending here -->

<!-- blog section start here -->
{{-- <div class="blog-section padding-tb section-bg">
    <div class="container">
        <div class="section-header text-center">
            <span class="subtitle">FORM OUR BLOG POSTS</span>
            <h2 class="title">More Articles From Resource Library</h2>
        </div>
        <div class="section-wrapper">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center g-4">
                <div class="col">
                    <div class="post-item">
                        <div class="post-inner">
                            <div class="post-thumb">
                                <a href="#"><img src="{{ asset_url('images/blog/01.jpg') }}" alt="blog thumb"></a>
                            </div>
                            <div class="post-content">
                                <a href="#"><h4>Scottish Creatives To Receive Funded Business.</h4></a>
                                <div class="meta-post">
                                    <ul class="lab-ul">
                                        <li><i class="icofont-ui-user"></i>Begrass Tyson</li>
                                        <li><i class="icofont-calendar"></i>April 23,2021</li>
                                    </ul>
                                </div>
                                <p>Pluoresnts customize prancing apcente customer service anding ands asing in straelg Interacvely cordinate performe</p>
                            </div>
                            <div class="post-footer">
                                <div class="pf-left">
                                    <a href="#" class="lab-btn-text">Read more <i class="icofont-external-link"></i></a>
                                </div>
                                <div class="pf-right">
                                    <i class="icofont-comment"></i>
                                    <span class="comment-count">3</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="post-item">
                        <div class="post-inner">
                            <div class="post-thumb">
                                <a href="#"><img src="{{ asset_url('images/blog/02.jpg') }}" alt="blog thumb"></a>
                            </div>
                            <div class="post-content">
                                <a href="#"><h4>Scottish Creatives To Receive Funded Business.</h4></a>
                                <div class="meta-post">
                                    <ul class="lab-ul">
                                        <li><i class="icofont-ui-user"></i>Begrass Tyson</li>
                                        <li><i class="icofont-calendar"></i>April 23,2021</li>
                                    </ul>
                                </div>
                                <p>Pluoresnts customize prancing apcente customer service anding ands asing in straelg Interacvely cordinate performe</p>
                            </div>
                            <div class="post-footer">
                                <div class="pf-left">
                                    <a href="#" class="lab-btn-text">Read more <i class="icofont-external-link"></i></a>
                                </div>
                                <div class="pf-right">
                                    <i class="icofont-comment"></i>
                                    <span class="comment-count">3</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="post-item">
                        <div class="post-inner">
                            <div class="post-thumb">
                                <a href="#"><img src="{{ asset_url('images/blog/03.jpg') }}" alt="blog thumb"></a>
                            </div>
                            <div class="post-content">
                                <a href="#"><h4>Scottish Creatives To Receive Funded Business.</h4></a>
                                <div class="meta-post">
                                    <ul class="lab-ul">
                                        <li><i class="icofont-ui-user"></i>Begrass Tyson</li>
                                        <li><i class="icofont-calendar"></i>April 23,2021</li>
                                    </ul>
                                </div>
                                <p>Pluoresnts customize prancing apcente customer service anding ands asing in straelg Interacvely cordinate performe</p>
                            </div>
                            <div class="post-footer">
                                <div class="pf-left">
                                    <a href="#" class="lab-btn-text">Read more <i class="icofont-external-link"></i></a>
                                </div>
                                <div class="pf-right">
                                    <i class="icofont-comment"></i>
                                    <span class="comment-count">3</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- blog section ending here -->

<!-- Achievement section start here -->
<div class="achievement-section padding-tb">
    <div class="container">
        <div class="section-header text-center">
            <span class="subtitle">START TO SUCCESS</span>
            <h2 class="title">Achieve Your Goals With GL Scholars</h2>
        </div>
        <div class="section-wrapper">
            <div class="counter-part mb-4">
                <div class="row g-4 row-cols-lg-4 row-cols-sm-2 row-cols-1 justify-content-center">
                    <div class="col">
                        <div class="count-item">
                            <div class="count-inner">
                                <div class="count-content">
                                    <h2><span class="count" data-to="30" data-speed="1500"></span><span>+</span></h2>
                                    <p>Years of Language Education Experience</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="count-item">
                            <div class="count-inner">
                                <div class="count-content">
                                    <h2><span class="count" data-to="3080" data-speed="1500"></span><span>+</span></h2>
                                    <p>Learners Enrolled in GL Scholars Courses</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="count-item">
                            <div class="count-inner">
                                <div class="count-content">
                                    <h2><span class="count" data-to="330" data-speed="1500"></span><span>+</span></h2>
                                    <p>Qualified Teachers And Language Experts</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="count-item">
                            <div class="count-inner">
                                <div class="count-content">
                                    <h2><span class="count" data-to="2300" data-speed="1500"></span><span>+</span></h2>
                                    <p>Innovative Foreign Language Courses</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="achieve-part">
                <div class="row g-4 row-cols-1 row-cols-lg-2">
                    <div class="col">
                        <div class="achieve-item">
                            <div class="achieve-inner">
                                <div class="achieve-thumb">
                                    <img src="{{ asset_url('images/achive/01.png') }}" alt="achieve thumb">
                                </div>
                                <div class="achieve-content">
                                    <h4>Start Teaching Today</h4>
                                    <p>Seamlessly engage technically sound coaborative reintermed goal oriented content rather than ethica</p>
                                    <a href="#" class="lab-btn"><span>Become A Instructor</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="achieve-item">
                            <div class="achieve-inner">
                                <div class="achieve-thumb">
                                    <img src="{{ asset_url('images/achive/01.png') }}" alt="achieve thumb">
                                </div>
                                <div class="achieve-content">
                                    <h4>If You Join Our Course</h4>
                                    <p>Seamlessly engage technically sound coaborative reintermed goal oriented content rather than ethica</p>
                                    <a href="#" class="lab-btn"><span>Register For Free</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<!-- Achievement section ending here -->
    
@endsection