
<?php $__env->startSection('content'); ?>
    <!-- Page Header section start here -->
    <div class="pageheader-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pageheader-content text-center">
                        <h2>Get In Touch With Us</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="<?php echo e(web_url()); ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header section ending here -->

    <!-- Map & address us Section Section Starts Here -->
    <div class="map-address-section padding-tb section-bg">
        <div class="container">
            <div class="section-header text-center">
                <span class="subtitle">Get in touch with us</span>
                <h2 class="title">We're Always Eager To Hear From You!</h2>
            </div>
            <div class="section-wrapper">
                <div class="row flex-row-reverse">
                    <div class="col-xl-4 col-lg-5 col-12">
                        <div class="contact-wrapper">
                            <div class="contact-item">
                                <div class="contact-thumb">
                                    <img src="<?php echo e(asset_url('images/icon/01.png')); ?>" alt="CodexCoder">
                                </div>
                                <div class="contact-content">
                                    <h6 class="title">Office Address</h6>
                                    <p><?php echo e($socail->address ?? ''); ?></p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-thumb">
                                    <a href="tel:<?php echo e(socialHandles()->phone); ?>"><img src="<?php echo e(asset_url('images/icon/02.png')); ?>" alt="phone"></a>
                                </div>
                                <div class="contact-content">
                                    <h6 class="title"><a href="tel:<?php echo e(socialHandles()->phone); ?>">Phone number</a></h6>
                                    <a href="tel:<?php echo e(socialHandles()->phone); ?>"><?php echo e($socail->phone ?? ''); ?></a>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-thumb">
                                    <img src="<?php echo e(asset_url('images/icon/03.png')); ?>" alt="CodexCoder">
                                </div>
                                <div class="contact-content">
                                    <h6 class="title">Send email </h6>
                                    <a href="mailto:<?php echo e($socail->email ?? ''); ?>"><?php echo e($socail->email ?? ''); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 col-12">
                        <div class="map-area">
                            <div class="maps">
                                <iframe src="<?php echo e($socail->map ?? ''); ?>" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Map & address us Section Section Ends Here -->

    <!-- Contact us Section Section Starts Here -->
    
    <!-- Contact us Section Section Ends Here -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\glscholars\resources\views/web/home/contact_us.blade.php ENDPATH**/ ?>