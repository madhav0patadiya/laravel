@extends('admin.layouts.master')

@section('content')
    <div class="page-header d-lg-flex d-block">
        <div class="page-leftheader">
            <h4 class="page-title">Edit Profile</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card">
                <form class="form" id="profile-form" method="post" name="update_profile" action="{{ admin_url('profile/update-profile') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" class="user_id" value="{{ isset($login_user->id) && $login_user->id != ''? encreptIt($login_user->id) : '' }} "/>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">First Name<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="firstname" placeholder="First Name" value="{{ isset($login_user->firstname) ? $login_user->firstname : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Last Name<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="{{ isset($login_user->lastname) ? $login_user->lastname : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Email address<small class="mandotory">*</small></label>
                                    <input type="email" class="form-control email" name="email" placeholder="Email" value="{{ isset($login_user->email) ? $login_user->email : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Phone Number<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="phone" placeholder="Number" value="{{ isset($login_user->phone) ? $login_user->phone : '' }}" maxlength="10">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Avatar</label>
                                    <input type="file" class="dropify" name="avatar" data-default-file="{{ $login_user->avatar_path }}" data-height="180" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary profile-submit">
                            Update
                            <i class="fa fa-circle-o-notch fa-spin hide mr-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5">
            <div class="card">
                <div class="card-header border-bottom-0">
                    <div class="card-title">Edit Password</div>
                </div>
                <form class="form" id="password-form" method="post" action="{{ admin_url('profile/update-password') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ isset($login_user->id) && $login_user->id != ''? encreptIt($login_user->id) : '' }} "/>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Current Password<small class="mandotory">*</small></label>
                            <input type="password" class="form-control" name="old_password">
                        </div>
                        <div class="form-group">
                            <label class="form-label">New Password<small class="mandotory">*</small></label>
                            <input type="password" id="new_password" class="form-control" name="new_password">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirm Password<small class="mandotory">*</small></label>
                            <input type="password" class="form-control" name="confirm_password">
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary password-submit">
                            Update
                            <i class="fa fa-circle-o-notch fa-spin hide mr-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection