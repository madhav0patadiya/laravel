@extends('student.layouts.master')
@section('content')
    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <h4 class="page-title">My Profile</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card">
                <div class="card-header border-bottom-0">
                    <div class="card-title">Edit Details</div>
                </div>
                <form class="form" method="post" id="profile-form" action="{{ student_url('profile/update-profile') }}"  enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="student_id" class="student_id" value="{{ isset($login_user->id) && $login_user->id != ''? encreptIt($login_user->id) : '' }} "/>
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
                                    <label class="form-label">Phone<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ isset($login_user->phone) ? $login_user->phone : '' }}">
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
                                    <label class="form-label">Citizenship<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="citizenship" placeholder="Citizenship" value="{{ isset($login_user->citizenship) ? $login_user->citizenship : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Country<small class="mandotory">*</small></label>
                                    <select class="form-control" name="country_id">
                                        <option value="">Select Country</option>
                                        @if(isset($countries))
                                            @foreach($countries as $country)
                                                <option value="{{ encreptIt($country->id) }}" {{ isset($login_user->country_id) && $country->id == $login_user->country_id ? 'selected' : ''}}>{{ $country->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Program Level<small class="mandotory">*</small></label>
                                    <select class="form-control" name="program_level_id">
                                        <option value="">Select Program Level</option>
                                        @if(isset($program_levels))
                                            @foreach($program_levels as $program)
                                                <option value="{{ encreptIt($program->id) }}" {{ isset($login_user->program_level_id) && $program->id == $login_user->program_level_id ? 'selected' : ''}}>{{ $program->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Course<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="course" placeholder="Course" value="{{ isset($login_user->course) ? $login_user->course : '' }}">
                                </div>
                            </div>
                            @if(isset($login_user->agent_code))
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Agent<small class="mandotory">*</small></label>
                                        <input type="text" class="form-control" name="agent_code" value="{{ isset($login_user->agent_code) ? $login_user->agent_code : '' }}" readonly>
                                    </div>
                                </div>
                            @else
                                <div class="col-sm-6 col-md-6">
                                </div>
                            @endif
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Address<small class="mandotory">*</small></label>
                                    <textarea class="form-control" name="address" placeholder="Address">{{ isset($login_user->address) ? $login_user->address : '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Avatar</label>
                                    <input type="file" class="dropify" name="avatar" data-default-file="{{ isset($login_user->avatar) && $login_user->avatar != '' ? storage_url($login_user->avatar) : '' }}" data-height="180" />
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
                <form class="form" method="post" id="password-form" action="{{ student_url('profile/update-password') }}">
                    @csrf
                    <input type="hidden" name="student_id" value="{{ isset($login_user->id) && $login_user->id != ''? encreptIt($login_user->id) : '' }} "/>
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