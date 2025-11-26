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
                                        <h1 class="mb-2">Admin Login</h1>
                                        <p class="text-muted">Sign In to your account</p>
                                    </div>
                                    <form class="card-body pt-1" id="login-form" method="post" action="{{ admin_url('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label">Email<small class="mandotory">*</small></label>
                                            <input class="form-control" placeholder="Email" type="email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Password<small class="mandotory">*</small></label>
                                            <input class="form-control" placeholder="password" type="password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                <span class="custom-control-label">Remember me</span>
                                            </label>
                                        </div>
                                        <div class="submit">
                                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                        <div class="text-center mt-3">
                                            <p class="mb-2"><a href="{{ admin_url('forgot-password') }}">Forgot Password</a></p>
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
@endsection