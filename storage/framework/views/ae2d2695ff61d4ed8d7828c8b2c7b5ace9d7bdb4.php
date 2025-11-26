
<?php $__env->startSection('content'); ?>
    <div class="page-content-wrapper">
        <div class="page-content" style="padding-bottom: 100px;"> <!-- Added padding for footer -->
            <div class="page-header d-flex justify-content-between align-items-center mb-5">
                <div>
                    <h4 class="page-title text-gradient">Welcome back, <?php echo e(isset($login_user->fullname) ? $login_user->fullname : ''); ?></h4>
                    <p class="text-muted mb-0">Here's what's happening today</p>
                </div>
            </div>
            <?php if(isset($agent->id)): ?>
                <div class="row">
                    <!-- Agent Card -->
                    <div class="col-xl-6 col-lg-8 col-md-10 mb-4">
                        <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                            <div class="card-header bg-primary text-white py-3">
                                <h5 class="mb-0"><i class="fa fa-user-secret me-2"></i>Your Agent</h5>
                            </div>
                            <div class="row ">
                                <div class="col-md-4 bg-dark bg-opacity-10 d-flex align-items-center justify-content-center p-4">
                                    <div class="position-relative">
                                        <img src="<?php echo e($agent->avatar_path ?? asset('images/default-avatar.png')); ?>" 
                                            alt="Agent Photo" 
                                            class="rounded-circle border border-3 border-white shadow" 
                                            width="120" 
                                            height="120" 
                                            style="object-fit: cover;">
                                        
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <h3 class="text-dark mb-3"><?php echo e($agent->fullname ?? 'Your Agent'); ?></h3>
                                        <ul class="list-unstyled mb-0">
                                            <?php if(isset($agent->phone)): ?>
                                                <li class="mb-2 d-flex align-items-center">
                                                    <div class="icon-container bg-light-primary rounded-circle p-2 me-3">
                                                        <i class="fa fa-phone text-primary"></i>
                                                    </div>
                                                    <div>
                                                        <small class="text-muted d-block">Phone</small>
                                                        <span><?php echo e($agent->phone); ?></span>
                                                    </div>
                                                </li>
                                            <?php endif; ?>
                                            <?php if(isset($agent->email)): ?>
                                                <li class="mb-2 d-flex align-items-center">
                                                    <div class="icon-container bg-light-warning rounded-circle p-2 me-3">
                                                        <i class="fa fa-envelope text-warning"></i>
                                                    </div>
                                                    <div>
                                                        <small class="text-muted d-block">Email</small>
                                                        <span><?php echo e($agent->email); ?></span>
                                                    </div>
                                                </li>
                                            <?php endif; ?>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row mb-4">
                <div class="<?php echo e(isset($notice->banner_path) ? 'col-md-6' : 'col-md-12'); ?>">
                    <div class="card border-0 shadow-sm rounded-3 h-100">
                        <div class="card-header bg-white border-0 py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0"><i class="fa fa-bullhorn text-warning me-2"></i>  Announcements</h5>
                                <span class="badge bg-light-warning text-warning rounded-pill">New</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if(!empty($notice)): ?>
                                <div class="announcement-content">
                                    <?php echo $notice->description; ?>

                                </div>
                                <div class="mt-3 text-end">
                                    <small class="text-muted">Posted <?php echo e($notice->updated_at->diffForHumans()); ?></small>
                                </div>
                            <?php else: ?>
                                <div class="text-center py-4">
                                    <i class="fa fa-bell-slash text-muted fa-3x mb-3"></i>
                                    <h5 class="text-muted">No announcements yet</h5>
                                    <p class="text-muted">Check back later for updates</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <?php if(isset($notice->banner_path)): ?>
                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow-sm rounded-3 overflow-hidden h-100">
                            <div class="card-body p-0 position-relative">
                                <img src="<?php echo e($notice->banner_path); ?>" 
                                     alt="Banner Image" 
                                     class="img-fluid w-100 h-100" 
                                     style="object-fit: cover; min-height: 300px;">
                                <div class="position-absolute bottom-0 start-0 end-0 p-3 bg-gradient-dark">
                                    <h5 class="text-white mb-1">Important Notice</h5>
                                    <p class="text-white-50 mb-0">Please read the latest announcement</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <footer class="footer fixed-bottom py-3" style="background-color: #01142b">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-10 text-center text-md-start">
                    <span class="text-white">
                        Become a Part of GL Scholars as an Agent &nbsp;
                        <a class="btn btn-warning" href="<?php echo e(web_url('agent/register')); ?>">
                            Join Now
                        </a>    
                    </span>
                </div>
            </div>
        </div>
    </footer>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\glscholars\resources\views/student/profile/dashboard.blade.php ENDPATH**/ ?>