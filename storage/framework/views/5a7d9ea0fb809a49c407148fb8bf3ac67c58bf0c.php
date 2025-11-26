
<?php $__env->startSection('content'); ?>
<!-- banner section start here -->
<section class="banner-section style-1">
    <div class="container">
        <div class="section-wrapper">
            <div class="row align-items-center">
                <div class="col-xxl-5 col-xl-6 col-lg-10">
                    <div class="banner-content">
                        <h6 class="subtitle text-uppercase fw-medium">Online education</h6>
                        <h2 class="title"><span class="d-lg-block">Learn The</span> Skills You Need <span class="d-lg-block">To Succeed</span></h2>
                        <p class="desc">Free online courses from the world’s Leading experts. join 18+ million Learners today.</p>
                        <div class="banner-catagory d-flex flex-wrap mb-5">
                            <p>Most Popular : </p>
                            <ul class="lab-ul d-flex flex-wrap">
                                <li><a href="#">Figma</a></li>
                                <li><a href="#">Adobe XD</a></li>
                                <li><a href="#">illustration</a></li>
                                <li><a href="#">Photoshop</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-6">
                    <div class="banner-thumb">
                        <img src="<?php echo e(asset_url('images/banner/01.png')); ?>" alt="img">
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
<?php if(isset($uni_logo) && count($uni_logo) > 0): ?> 
<div class="sponsor-section section-bg">
    <div class="container">
        <div class="section-wrapper">
            <div class="sponsor-slider">
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $uni_logo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide">
                            <div class="sponsor-iten">
                                <div class="sponsor-thumb">
                                    <img src="<?php echo e($logo->uni_logo_path); ?>" alt="sponsor">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
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
                                <img src="<?php echo e(asset_url('images/category/icon/01.jpg')); ?>" alt="category">
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
                                <img src="<?php echo e(asset_url('images/category/icon/02.jpg')); ?>" alt="category">
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
                                <img src="<?php echo e(asset_url('images/category/icon/03.jpg')); ?>" alt="category">
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
                                <img src="<?php echo e(asset_url('images/category/icon/04.jpg')); ?>" alt="category">
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
                                <img src="<?php echo e(asset_url('images/category/icon/05.jpg')); ?>" alt="category">
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
                                <img src="<?php echo e(asset_url('images/category/icon/06.jpg')); ?>" alt="category">
                            </div>
                            <div class="category-content">
                                <a href="#"><h6>Computer Engineering</h6></a>
                                <span>38 Course</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- category section start here -->

<!-- course section start here -->
<div class="course-section padding-tb section-bg">
    <div class="container">
        <div class="section-header text-center">
            <span class="subtitle">Featured Scholarship</span>
            <h2 class="title">Pick A Scholarship To Get Started</h2>
        </div>
        <div class="section-wrapper">
            <div class="row g-4 justify-content-center row-cols-xl-3 row-cols-md-2 row-cols-1">
                <?php $__currentLoopData = $scholarship; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col">
                    <div class="course-item">
                        <div class="course-inner">
                            <div class="course-thumb">
                                <img src="<?php echo e($item->thumbnail_path ?? default_img()); ?>" alt="course">
                            </div>
                            <div class="course-content">
                                <?php if($item->fees != ''): ?>
                                <div class="course-price">$<?php echo e($item->fees ?? 0); ?></div>
                                <?php endif; ?>
                                <div class="course-category">
                                    <div class="course-cate">
                                        
                                    </div>
                                    <div class="course-reiew">
                                        <span class="ratting">
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                        </span>
                                        
                                    </div>
                                </div>
                                <a href="#"><h5><?php echo e($item->title ?? ''); ?></h5></a>
                                
                                <div class="course-footer">
                                    <div class="course-author">
                                        
                                    </div>
                                    <div class="course-btn">
                                        <a href="<?php echo e(web_url('scholarship/'. encreptIt($item->id))); ?>" class="lab-btn-text">Read More <i class="icofont-external-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="text-center mt-5">
            <a href="<?php echo e(web_url('all-scholarship')); ?>" class="lab-btn"><span>Browse All Scholarship</span></a>
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
                                    <img src="<?php echo e(asset_url('images/about/icon/01.jpg')); ?>" alt="about icon">
                                </div>
                                <div class="sr-right">
                                    <h5>Skilled Instructors</h5>
                                    <p>Distinctively provide acces mutfuncto users whereas communicate leveraged services</p>
                                </div>
                            </li>
                            <li>
                                <div class="sr-left">
                                    <img src="<?php echo e(asset_url('images/about/icon/02.jpg')); ?>" alt="about icon">
                                </div>
                                <div class="sr-right">
                                    <h5>Get Certificate</h5>
                                    <p>Distinctively provide acces mutfuncto users whereas communicate leveraged services</p>
                                </div>
                            </li>
                            <li>
                                <div class="sr-left">
                                    <img src="<?php echo e(asset_url('images/about/icon/03.jpg')); ?>" alt="about icon">
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
                        <img src="<?php echo e(asset_url('images/about/01.png')); ?>" alt="about">
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
                <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col">
                    <div class="instructor-item">
                        <div class="instructor-inner">
                            <div class="instructor-thumb">
                                <img src="<?php echo e($agent->avatar_path); ?>" alt="instructor">
                            </div>
                            <div class="instructor-content">
                                <h4><?php echo e($agent->fullname ?? ''); ?></h4>
                                <p><?php echo e($agent->phone ?? ''); ?></p>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="text-center footer-btn">
                <p>Want to help people learn, grow and achieve more in life?<a href="<?php echo e(web_url('agent')); ?>">Become an Agent</a></p>
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
                                    <img src="<?php echo e($feedback->feed1_img_path); ?>" alt="student feedback">
                                </div>
                                <div class="sftl-content">
                                    <h6><?php echo e(isset($feedback->feed1_name) ? $feedback->feed1_name : ''); ?></h6>
                                    <span><?php echo e(isset($feedback->feed1_subtitle) ? $feedback->feed1_subtitle : ''); ?></span>
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
                            <p><?php echo e(isset($feedback->feed1_description) ? $feedback->feed1_description : ''); ?></p>
                        </div>
                    </div>
                </div>
                <div class="stu-feed-item">
                    <div class="stu-feed-inner">
                        <div class="stu-feed-top">
                            <div class="sft-left">
                                <div class="sftl-thumb">
                                    <img src="<?php echo e($feedback->feed2_img_path); ?>" alt="student feedback">
                                </div>
                                <div class="sftl-content">
                                    <h6><?php echo e(isset($feedback->feed2_name) ? $feedback->feed2_name : ''); ?></h6>
                                    <span><?php echo e(isset($feedback->feed2_subtitle) ? $feedback->feed2_subtitle : ''); ?></span>
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
                            <p><?php echo e(isset($feedback->feed2_description) ? $feedback->feed2_description : ''); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sf-left">
                        <div class="sfl-thumb">
                            <img src="<?php echo e($feedback->video1_img_path); ?>" alt="student feedback">
                            <a href="<?php echo e(isset($feedback->video1_link) ? $feedback->video1_link : ''); ?>" class="video-button" data-rel="lightcase"><i class="icofont-ui-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sf-left">
                        <div class="sfl-thumb">
                            <img src="<?php echo e($feedback->video2_img_path); ?>" alt="student feedback">
                            <a href="<?php echo e(isset($feedback->video1_link) ? $feedback->video1_link : ''); ?>" class="video-button" data-rel="lightcase"><i class="icofont-ui-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="stu-feed-item">
                    <div class="stu-feed-inner">
                        <div class="stu-feed-top">
                            <div class="sft-left">
                                <div class="sftl-thumb">
                                    <img src="<?php echo e($feedback->feed3_img_path); ?>" alt="student feedback">
                                </div>
                                <div class="sftl-content">
                                    <h6><?php echo e(isset($feedback->feed3_name) ? $feedback->feed3_name : ''); ?></h6>
                                    <span><?php echo e(isset($feedback->feed3_subtitle) ? $feedback->feed3_subtitle : ''); ?></span>
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
                            <p><?php echo e(isset($feedback->feed3_description) ? $feedback->feed3_description : ''); ?></p>
                        </div>
                    </div>
                </div>                
                <div class="stu-feed-item">
                    <div class="stu-feed-inner">
                        <div class="stu-feed-top">
                            <div class="sft-left">
                                <div class="sftl-thumb">
                                    <img src="<?php echo e($feedback->feed4_img_path); ?>" alt="student feedback">
                                </div>
                                <div class="sftl-content">
                                    <h6><?php echo e(isset($feedback->feed4_name) ? $feedback->feed4_name : ''); ?></h6>
                                    <span><?php echo e(isset($feedback->feed4_subtitle) ? $feedback->feed4_subtitle : ''); ?></span>
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
                            <p><?php echo e(isset($feedback->feed4_description) ? $feedback->feed4_description : ''); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- student feedbak section ending here -->

<!-- blog section start here -->

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
            
        </div>
    </div>
</div>
<!-- Achievement section ending here -->
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\people_led\resources\views/web/home/index.blade.php ENDPATH**/ ?>