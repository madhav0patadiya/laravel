<?php $__env->startSection('content'); ?>
    <!--Page header-->
    <div class="page-header d-xl-flex d-block mt-0">
        <div class="page-leftheader">
            <h4 class="page-title">Project <span class="font-weight-normal text-muted ml-2">Dashboard</span></h4>
        </div>
        <div class="page-rightheader ml-md-auto">
            <div class="d-flex align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <?php if(isset($login_user->role) ? $login_user->role == 1 : ''): ?>
                <div class="btn-list">
                    <a href="javascript:void(0)"  class="btn btn-outline-primary setup-project" data-toggle="modal"><i class="feather feather-plus fs-15 my-auto mr-2"></i>Create Project</a>
                </div>

                <?php endif; ?>
            </div>
        </div>
    </div>
    <!--End Page header-->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-2 col-lg-6 col-md-12">
            <div class="card">
                <a href="#">
                    <div class="card-body text-center">
                        <span class="avatar avatar-lg bradius fs-20 bg-primary-transparent"><?php echo e($totalProjects); ?></span>
                        <h5 class="mb-0 mt-3">Total Projects</h5>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-2 col-lg-6 col-md-12">
            <div class="card">
                <a href="#">
                    <div class="card-body text-center">
                        <span class="avatar avatar-lg bradius fs-20 bg-orange-transparent"><?php echo e($pendingProjects); ?></span>
                        <h5 class="mb-0 mt-3">Pending Projects</h5>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-2 col-lg-6 col-md-12">
            <div class="card">
                <a href="#">
                    <div class="card-body text-center">
                        <span class="avatar avatar-lg bradius fs-20 bg-secondary-transparent"><?php echo e($ongoingProjects); ?></span>
                        <h5 class="mb-0 mt-3">Ongoing Projects</h5>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-2 col-lg-6 col-md-12">
            <div class="card">
                <a href="#">
                    <div class="card-body text-center">
                        <span class="avatar avatar-lg bradius fs-20 bg-info-transparent"><?php echo e($notStartedProjects); ?></span>
                        <h5 class="mb-0 mt-3">Not Started Projects</h5>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-2 col-lg-6 col-md-12">
            <div class="card">
                <a href="#">
                    <div class="card-body text-center">
                        <span class="avatar avatar-lg bradius fs-20 bg-success-transparent"><?php echo e($completedProjects); ?></span>
                        <h5 class="mb-0 mt-3">Completed Projects</h5>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-2 col-lg-6 col-md-12">
            <div class="card">
                <a href="#">
                    <div class="card-body text-center">
                        <span class="avatar avatar-lg bradius fs-20 bg-danger-transparent"><?php echo e($cancelledProjects); ?></span>
                        <h5 class="mb-0 mt-3">Cancelled Projects</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- End Row-->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header  border-0">
                    <h4 class="card-title">Recent Project Summary</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-xl-7">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Search:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="feather feather-search"></i>
                                                </div>
                                            </div><input class="form-control search-filter" placeholder="Search....." type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-6">
                                    <div class="form-group">
                                        <label class="form-label">Select Status:</label>
                                        <select name="status"  class="form-control custom-select select2 work-status-filter" data-placeholder="Select Status">
                                            <option label="Select Priority"></option>
                                            <option value="all">All</option>
                                            <option value="1">Active</option>
                                            <option value="2">Completed</option>
                                            <option value="3">On going</option>
                                            <option value="4">Pending</option>
                                            <option value="5">Not Started</option>
                                            <option value="6">Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-xl-3">
                            <div class="form-group">
                                <label class="form-label">Select Priority:</label>
                                <select name="priority"  class="form-control custom-select select2 priority-filter" data-placeholder="Select Priority">
                                    <option label="Select Priority"></option>
                                    <option value="all">All</option>
                                    <option value="1">High</option>
                                    <option value="2">Medium</option>
                                    <option value="3">Low</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-xl-2">
                            <div class="form-group mt-5">
                                <a href="#" class="btn btn-primary btn-block serch-button">Search</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-vcenter text-nowrap table-bordered border-bottom project-data-table">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#ID</th>
                                    <th class="border-bottom-0">Project Title</th>
                                    <th class="border-bottom-0">Team</th>
                                    <th class="border-bottom-0">Priority</th>
                                    <th class="border-bottom-0">Start Date</th>
                                    <th class="border-bottom-0">Due Date</th>
                                    <th class="border-bottom-0">Status</th>
                                    <th class="border-bottom-0">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="border-bottom-0">#ID</th>
                                    <th class="border-bottom-0">Project Title</th>
                                    <th class="border-bottom-0">Team</th>
                                    <th class="border-bottom-0">Priority</th>
                                    <th class="border-bottom-0">Start Date</th>
                                    <th class="border-bottom-0">Deadline</th>
                                    <th class="border-bottom-0">Status</th>
                                    <th class="border-bottom-0">Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\people_led\resources\views/front/project/index.blade.php ENDPATH**/ ?>