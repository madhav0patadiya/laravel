<?php $__env->startSection('content'); ?>
    <div class="page-header d-xl-flex d-block mt-0">
        <div class="page-leftheader">
            <h4 class="page-title">Setup team members</h4>
            <small>
                Templates have been based Deloitte's subject matter expertise or create one from sctach to have everything customised.
            </small>
        </div>
    </div>
    <div class="card">
        <div class="card-body pl-0 pt-2 pb-2">
            <div class="row no-gutters">
                <div class="col-xl-4 col-lg-4">
                    <div class="card-header border-bottom-0">
                        <div class="card-title">
                            Invite Members
                            <h6 class="card-subtitle mb-2 text-muted">Invite your staff members to the team for the project assignments</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8">
                    <form class="form" method="post" action="" id="send-invites">
                        <div class="card-body pr-0">
                            <div id="role-rows">
                                <div class="row role-row mb-2">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="input-icon">
                                            <span class="input-icon-addon">
                                                <i class="fe fe-mail"></i>
                                            </span>
                                            <input type="text" name="email[]" class="form-control email-val" placeholder="Email">
                                        </div>
                                        <label class="validate-error-email hide text-danger"></label>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <select name="role[]" class="form-control custom-select select2" data-placeholder="Select Role">
                                            <option label="Select Role"></option>
                                            <?php if(isset($roles)): ?>
                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e(isset($role_data->id) ? $role_data->id : ''); ?>"><?php echo e(isset($role_data->role) ? $role_data->role : ''); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                        <label class="validate-error-role hide text-danger"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-outline-primary add-btn">
                                    <i class="fa fa-plus mr-2"></i>Add Another Member
                                    <i class="fa fa-circle-o-notch fa-spin hide mr-2"></i>
                                </button>
                                <button type="submit" class="btn btn-primary submit-btn" >
                                    Send Invites
                                    <i class="fa fa-circle-o-notch fa-spin hide mr-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body pl-0 pt-2 pb-5">
            <div class="row no-gutters">
                <div class="col-xl-3 col-lg-3">
                    <div class="card-header border-bottom-0">
                        <div class="card-title">
                            Manage Members
                            <h6 class="card-subtitle mb-2 text-muted">Manage your staff members details</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 mt-5">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="user-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Login Allowed?</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Login Allowed?</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<script>
    const loginUserRole = "<?php echo e(isset($login_user->role) ? $login_user->role : ''); ?>";
</script>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\people_led\resources\views/front/users/index.blade.php ENDPATH**/ ?>