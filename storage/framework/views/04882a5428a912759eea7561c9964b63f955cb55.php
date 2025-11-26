<?php $__env->startSection('content'); ?>

<?php if(isset($milestones) && count($milestones) > 0): ?>
    <div class="page-header d-xl-flex d-block mt-0">
        <div class="page-leftheader">
            <h4 class="page-title">Task <span class="font-weight-normal text-muted ml-2">Dashboard</span></h4>
        </div>
        <div class="page-rightheader ml-md-auto">
            <div class="d-flex align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <div class="d-lg-flex d-block">
                    <div class="btn-list">
                        <?php if(isset($login_role) && $login_role == 1): ?>
                            <?php if(isset($current_project->id)): ?>
                                <a href="javascript:void(0)" class="btn btn-outline-primary setup-task" data-project_id="<?php echo e(isset($current_project->id) ? encreptIt($current_project->id) : ''); ?>" ><i class="feather feather-plus fs-15 my-auto mr-2"></i> Create Task</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xl-3 col-lg-4">
            <?php if(isset($milestones)): ?>
                <div class="card">
                    <div class="list-group list-group-transparent mb-0 mail-inbox pb-3">
                        <div class="mt-4 mb-4 ml-4 mr-4 text-center">
                            <?php if(isset($login_role) && $login_role == 1): ?>
                                <?php if(isset($current_project->id)): ?>
                                    <a href="javascript:void(0)" class="btn btn-primary btn-block setup-milestone-create" data-project_id="<?php echo e(isset($current_project->id) ? encreptIt($current_project->id) : ''); ?>">Create Milestone</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $milestone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $milestone_progress = number_format($milestone->average_progress, 0);
                            ?>
                            <a href="javascript:void(0)" data-id="<?php echo e(isset($milestone->id) ? encreptIt($milestone->id) : ''); ?>" class="list-group-item list-group-item-action d-flex align-items-center <?php echo e($key === 0 ? 'active' : ''); ?> milestoneId-load-table">
                                <span class="w-3 h-3 brround mr-2" style="background-color: <?php echo e(isset($milestone->color) ? $milestone->color : ''); ?>"></span>
                                <span class="milestone-title"><?php echo e(isset($milestone->title) ? $milestone->title : ''); ?></span>
                                <div class="ml-auto" data-toggle="tooltip" data-placement="top" title="<?php echo e(isset($milestone_progress) ? $milestone_progress : ''); ?>% Progress">
                                    <div class="chart-circle chart-circle-xs" data-value="<?php echo e(isset($milestone_progress) ? $milestone_progress / 100 : ''); ?>" data-thickness="3" data-color="<?php echo e(isset($milestone->color) ? $milestone->color : ''); ?>">
                                        <div class="chart-circle-value"><?php echo e(isset($milestone_progress) ? $milestone_progress : ''); ?></div>
                                    </div>
                                </div>
                                <div class="milestone-due-date d-none"><?php echo e(isset($milestone->last_due_date) ? showDate($milestone->last_due_date) : 'N/A'); ?></div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="card">
                    <div class="list-group list-group-transparent mb-0 mail-inbox pb-3">
                        <div class="mt-4 mb-4 ml-4 mr-4 text-center">
                            <?php if(isset($login_role) && $login_role == 1): ?>
                                <?php if(isset($current_project->id)): ?>
                                    <a href="javascript:void(0)" class="btn btn-primary btn-block setup-milestone-create" data-project_id="<?php echo e(isset($current_project->id) ? encreptIt($current_project->id) : ''); ?>">Create Milestone</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <p class="text-muted text-center">No milestone found.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-12 col-lg-8 col-xl-9">
            <?php if(isset($milestones)): ?>
                <div class="card">
                    <div class="card-header border-bottom-0">
                        <div class="row w-100">
                            <div class="col">
                                <div class="form-group w-200">
                                    <h4 id="active-milestone-title"></h4>
                                    <h6 class="card-subtitle mb-2 text-muted" id="active-milestone-due-date"></h6>
                                </div>
                            </div>
                            <div class="col col-auto">
                                <?php if(isset($login_role) && $login_role == 1): ?>
                                    <div class="card-options d-none" id="active-milestone-actions">
                                        <a class="btn btn-primary btn-icon btn-sm setup-milestone-update mr-2" data-id="" data-toggle="tooltip" data-placement="top" title="Edit Milestone"><i class="feather feather-edit-2"></i></a>
                                        <a class="btn btn-danger btn-icon btn-sm delete-milestone" data-id="" data-toggle="tooltip" data-placement="top" title="Delete Milestone"><i class="feather feather-trash-2"></i></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-vcenter text-nowrap border-top  mb-0 task-data-table" id="task-table">
                                <thead>
                                    <tr>
                                        <th class="wd-10p border-bottom-0">Tasks</th>
                                        <th class="w-5p border-bottom-0">Due Date</th>
                                        <th class="wd-20p border-bottom-0">Progress</th>
                                        <th class="wd-15p border-bottom-0">Status</th>
                                        <th class="wd-25p border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php else: ?>
<div class="row">
    <div class="card">
        <div class="card-body text-center not_found_card">
            <img src="<?php echo e(asset_url('images/no_task.png')); ?>" alt="img" class="">
            <h4 class="">No Milestone</h4>
            <p class="text-muted">There is no milestone created yet.</p>
            <?php if(isset($login_role) && $login_role == 1): ?>
                <?php if(isset($current_project->id)): ?>
                    <a href="javascript:void(0)" class="btn btn-primary setup-milestone-create" data-project_id="<?php echo e(isset($current_project->id) ? encreptIt($current_project->id) : ''); ?>">Create Milestone</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>




<?php $__env->stopSection(); ?>
<script>
    const defaultMilestoneId = "<?php echo e(isset($default_milestone_id) ?  $default_milestone_id : ''); ?>";
</script>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\people_led\resources\views/front/task/index.blade.php ENDPATH**/ ?>