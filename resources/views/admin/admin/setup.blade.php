@extends('admin.layouts.master')
@section('content')
    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <h4 class="page-title">{{ (isset($user->id) && $user->id != '') ? 'Update' : 'Create' }} Admin</h4>
        </div>
        <div class="page-rightheader ml-md-auto">
            <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <div class="btn-list">
                    <a href="{{ admin_url('admins') }}" class="btn btn-primary mr-3">View Admin</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card">
                <form class="form" id="admin-form" method="post" action="{{ admin_url('admin/commit') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="admin_id" name="admin_id" value="{{ (isset($user->id) && $user->id != '') ? encreptIt($user->id) : '' }}" />
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">First Name<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="firstname" placeholder="First Name" value="{{ isset($user->firstname) ? $user->firstname : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Last Name<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="{{ isset($user->lastname) ? $user->lastname : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Phone Number<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="phone" placeholder="Number" value="{{ isset($user->phone) ? $user->phone : '' }}" maxlength="10">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Email address<small class="mandotory">*</small></label>
                                    <input type="email" class="form-control email" name="email" placeholder="Email" value="{{ isset($user->email) ? $user->email : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Password<small class="mandotory">*</small></label>
                                    <input type="password" class="form-control" name="password" placeholder="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2"><b>Allowed Login?</b></label>
                                    <label class="custom-switch">
                                        <input type="checkbox" name="allow_login" class="custom-switch-input" {{ (isset($user->allow_login) && $user->allow_login == 1) ?'checked' : '' }}>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Active/Inactive</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Avatar</label>
                                    <input type="file" class="dropify" name="avatar" data-default-file="{{ isset($user->avatar) && $user->avatar != '' ? $user->avatar_path : '' }}" data-height="180" />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary admin-submit">
                                {{ (isset($user->id) && $user->id != '') ? 'Update' : 'Save' }}
                                <i class="fa fa-circle-o-notch fa-spin hide mr-2"></i>
                            </button>
                        </div>
                    </div>
                <form>
            </div>
        </div>
    </div>
@endsection
