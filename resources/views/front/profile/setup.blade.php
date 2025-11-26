@extends('front.layouts.master')
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
                <form class="form" method="post" id="profile-form" action="{{ agent_url('profile/update-profile') }}"  enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="employee_id" class="employee_id" value="{{ isset($login_user->id) && $login_user->id != ''? encreptIt($login_user->id) : '' }} "/>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">First Name<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="firstname" placeholder="First Name" value="{{ isset($login_user->firstname) ? $login_user->firstname : '' }}">
                                </div>
                            </div>
                            <!-- <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2">Father's Name<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control mb-md-0 mb-5" name="fathername" placeholder="Enter Father Name" value="{{ isset($login_user->fathername) ? $login_user->fathername :'' }}">
                                </div>
                            </div> -->
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
                                    <input type="text" class="form-control" name="phone" placeholder="Number" value="{{ isset($login_user->phone) ? $login_user->phone : '' }}">
                                </div>
                            </div>
                            <!-- <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Education<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="education" placeholder="Enter Education" value="{{ isset($login_user->education) ? $login_user->education :'' }}">
                                </div>
                            </div> -->
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Avatar</label>
                                    <input type="file" class="dropify" name="avatar" data-default-file="{{ isset($login_user->avatar) && $login_user->avatar != '' ? storage_url($login_user->avatar) : '' }}" data-height="180" />
                                </div>
                            </div>
                            <!-- <div class="col-sm-8 col-md-8">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label mb-0 mt-2"><b>Gender</b><small class="mandotory">*</small></label>
                                            <div class="d-flex">
                                                <label class="custom-control custom-radio mr-4">
                                                    <input type="radio" class="custom-control-input" name="gender" value="male"{{ (isset($login_user->gender) && $login_user->gender == "male") ? 'checked' : '' }}>
                                                    <span class="custom-control-label"><b>Male</b></span>
                                                </label>
                                                <label class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" name="gender" value="female"{{ (isset($login_user->gender) && $login_user->gender == "female") ?'checked' : '' }}>
                                                    <span class="custom-control-label"><b>Female</b></span>
                                                </label>
                                            </div>
                                        </div>
                                        @if($errors->has('gender'))
                                            <div class="error">{{ $errors->first('gender') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label mb-0 mt-2"><b>Birthdate</b><small class="mandotory">*</small></label>
                                            <input class="form-control fc-datepicker" name="birthdate" placeholder="DD/MM/YYYY" type="text" value="{{ isset($login_user->birthdate) ? showDate($login_user->birthdate) :'' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label mb-0 mt-2"><b>Hobbies</b><small class="mandotory">*</small> <small>(Type word and press SPACE)</small></label>
                                            <input type="text" class="form-control mb-md-0 mb-5 tags_input" name="hobby" placeholder="Eg. Cricket, Tennis, Swimming" value="{{ isset($login_user->hobby) ? $login_user->hobby :'' }}">
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <!-- <h5 class="mb-0 mt-2 text-primary"><b>Other Contact Details:</b></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2"><b>Name</b></label>
                                    <input type="text" class="form-control mb-md-0 mb-5" name="other_person_name" placeholder="Enter Name" value="{{ isset($login_user->other_person_name) ? $login_user->other_person_name :'' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2"><b>Phone Number</b></label>
                                    <input type="text" class="form-control mb-md-0 mb-5" maxlength="10" name="other_person_number" placeholder="Enter number" value="{{ isset($login_user->other_person_number) ? $login_user->other_person_number :'' }}">
                                </div>
                            </div>
                        </div>
                        <h5 class="mb-0 mt-2 text-primary"><b>Address Details:</b></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2"><b>Current Address</b><small class="mandotory">*</small></label>
                                    <textarea class="form-control" name="current_address" rows="4" placeholder="Enter current address">{{ isset($login_user->current_address) ? $login_user->current_address :'' }}</textarea>
                                </div>
                                @if($errors->has('address'))
                                    <div class="error">{{ $errors->first('address') }}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2"><b>Permanent Address</b><small class="mandotory">*</small></label>
                                    <textarea class="form-control" name="permanent_address" rows="4" placeholder="Enter permanent address">{{ isset($login_user->permanent_address) ? $login_user->permanent_address :'' }}</textarea>
                                </div>
                                @if($errors->has('address'))
                                <div class="error">{{ $errors->first('address') }}</div>
                                @endif
                            </div>
                        </div>
                        <h5 class="mb-0 mt-2 text-primary"><b>Bank Details:</b></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2">Bank Name<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="bank_name" placeholder="Enter Bank name" value="{{ isset($bankdetail->bankname) ? $bankdetail->bankname :'' }}">
                                </div>
                                @if($errors->has('bank_name'))
                                <div class="error">{{ $errors->first('bank_name') }}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2">Account Number<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="account_number" placeholder="Enter Account Number" value="{{ isset($bankdetail->account_number) ? $bankdetail->account_number :'' }}">
                                </div>
                                @if($errors->has('account_number'))
                                <div class="error">{{ $errors->first('account_number') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2">Account Holder<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="holder_name" placeholder="Enter Account Holder Name" value="{{ isset($bankdetail->holder_name) ? $bankdetail->holder_name :'' }}">
                                </div>
                                @if($errors->has('account_holder_name'))
                                <div class="error">{{ $errors->first('account_holder_name') }}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2">Branch<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="branch_name" placeholder="Enter Branch name" value="{{ isset($bankdetail->branch) ? $bankdetail->branch :'' }}">
                                </div>
                                @if($errors->has('branch_name'))
                                <div class="error">{{ $errors->first('branch_name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2">IFSC Code<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="ifsc_code" placeholder="Enter IFSC Code" value="{{ isset($bankdetail->ifsc_code) ? $bankdetail->ifsc_code :'' }}" maxlength="11">
                                </div>
                                @if($errors->has('ifsc_code'))
                                <div class="error">{{ $errors->first('ifsc_code') }}</div>
                                @endif
                            </div>
                        </div> -->
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
                <form class="form" method="post" id="password-form" action="{{ agent_url('profile/update-password') }}">
                    @csrf
                    <input type="hidden" name="employee_id" value="{{ isset($login_user->id) && $login_user->id != ''? encreptIt($login_user->id) : '' }} "/>
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