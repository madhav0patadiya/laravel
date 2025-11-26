<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-12 mb-4">
            <div class="card h-100">
                <div class="card-header border-0">
                    <h1 class="card-title">Welcome, <?php echo e($login_user->fullname); ?></h1>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-12 mb-4">
            <div class="card h-100">
                <div class="card-header border-0">
                    <h4 class="card-title">Share Your URL</h4>
                </div>
                <div class="pt-2">
                    <div class="list-group">
                        <div class="list-group-item d-flex flex-wrap align-items-center border-0">
                            <span class="file_icon"><i class="fa fa-link"></i></span>
                            <div class="ml-2 flex-grow-1">
                                <div class="h5 fs-14 mb-1" id="referral-link"><?php echo e(student_url('register/' . $login_user->referral_code)); ?></div>
                            </div>
                            <button class="btn btn-info ml-auto mt-2 mt-md-0" id="copy-button">
                                <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-0">
                    <h4 class="card-title">Student List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="agent-student-datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Citizenship</th>
                                    <th>Country</th>
                                    <th>Course</th>
                                    <th>Program</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data will come here -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Citizenship</th>
                                    <th>Country</th>
                                    <th>Course</th>
                                    <th>Program</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div> <!-- end table-responsive -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\glscholars\resources\views/front/profile/dashboard.blade.php ENDPATH**/ ?>