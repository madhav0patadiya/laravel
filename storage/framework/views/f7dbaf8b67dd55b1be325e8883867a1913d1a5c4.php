<div class="modal-header">
    <h5 class="modal-title">Set Project</h5>
    <button  class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form class="form" method="post" action="<?php echo e(portal_url('switch-project')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Project</label>
                    <select name="project" class="form-control custom-select select2" data-placeholder="Select Project">
                        <option label="Select Project"></option>
                        <?php if(isset($projects)): ?>
                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e(isset($project->id) ? encreptIt($project->id) : ''); ?>" <?php echo e(isset($session_project_id) && $project->id == $session_project_id ? 'selected' : ''); ?>><?php echo e(isset($project->title) ? $project->title : ''); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button  class="btn btn-outline-primary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary submit-btn">
            Update
            <i class="fa fa-circle-o-notch fa-spin hide mr-2"></i>
        </button>
    </div>
</form>
<?php /**PATH D:\Xampp\htdocs\people_led\resources\views/front/profile/get_projects.blade.php ENDPATH**/ ?>