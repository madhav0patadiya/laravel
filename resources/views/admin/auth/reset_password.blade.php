@extends('admin.layouts.auth_master')
@section('content')
	<div class="page login-bg">
		<div class="page-single">
			<div class="container">
				<div class="row">
					<div class="col mx-auto">
						<div class="row justify-content-center">
							<div class="col-md-7 col-lg-5">
								<div class="card">
									<div class="p-4 pt-6 text-center">
										<h1 class="mb-2">Reset Password</h1>
									</div>
									<form class="card-body pt-3 form" method="post" id="reset-form" action="{{ admin_url('reset-password') }}">
										@csrf
										<input type="hidden" name="access_token" value="{{ (isset($token) && $token != '' ? $token : '') }}" />
										<div class="form-group">
											<label class="form-label">New Password<small class="mandotory">*</small></label>
											<input class="form-control" placeholder="New password" id="new_password" name="new_password" type="password">
										</div>
										<div class="form-group">
											<label class="form-label">Confirm Password<small class="mandotory">*</small></label>
											<input class="form-control" placeholder="Confirm password" name="confirm_password" type="password">
										</div>
										<div class="form-group">
											<label class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input"
													value="option1">
												<span class="custom-control-label">Remeber me</span>
											</label>
										</div>
										<div class="submit">
											<button type="submit" class="btn btn-primary btn-block">Reset Password</button>
										</div>
									</form>
									<div class="text-center mb-4">
										<p class="text-dark mb-0">Remembered your password?<a class="text-primary ml-1" href="{{ admin_url() }}">Login</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection