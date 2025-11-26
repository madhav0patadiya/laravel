
<?php $__env->startSection('content'); ?>
    <!--Page header-->
    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <h4 class="page-title">Manage Agents</h4>
        </div>
        <div class="page-rightheader ml-md-auto">
            <div class="d-md-flex align-items-center flex-wrap my-auto end-content breadcrumb-end"> 
                <div class="d-flex flex-wrap gap-2 mr-2"> 
                    <form class="search_company_list">
                        <div class="w-100">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search for..." value="<?php echo e(request('search')); ?>">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary ">Go!</button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div> 
                <div class="d-flex gap-2"> 
                    <a href="<?php echo e(admin_url('company/setup')); ?>" class="btn btn-outline-primary"><i class="fe fe-plus"></i> Create Agent</a>
                </div> 
            </div>
        </div>
    </div>
    <!--End Page header-->

	<!-- Row -->
    <div class="row flex-lg-nowrap">
        <div class="col-12">
            <div class="row flex-lg-nowrap">
                <div class="col-12 mb-3">
                    <div class="row">
                        <div class="col mb-4">
                            
                        </div>
                        <div class="col col-auto mb-4">
                            
                        </div>
                    </div>
                    <div class="company-list">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\people_led\resources\views/admin/company/index.blade.php ENDPATH**/ ?>