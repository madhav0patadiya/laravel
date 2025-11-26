
<?php $__env->startSection('content'); ?>
	<div class="page login-bg">
		<div class="page-single">
			<div class="container">
				<div class="row">
					<div class="col mx-auto">
						<div class="row justify-content-center">
							<div class="col-md-7 col-lg-5">
								<div class="card">
									<div class="p-4 pt-6 text-center">
										<h1 class="mb-2">Forgot Password</h1>
										<p class="text-muted">Enter the email address registered on your account</p>
									</div>
									<form  class="card-body pt-3" method="post" id="forgot-form" action="<?php echo e(admin_url('forgot-password')); ?>">
										<?php echo csrf_field(); ?>
										<div class="form-group">
											<label class="form-label">E-Mail<small class="mandotory">*</small></label>
											<input class="form-control" name="email" placeholder="Email" type="email">
										</div>
										<div class="submit">
											<button type="submit" class="btn btn-primary btn-block">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.auth_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\people_led\resources\views/admin/auth/forgot_password.blade.php ENDPATH**/ ?>