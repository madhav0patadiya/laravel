@extends('front.layouts.master')
@section('content')
    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <h4 class="page-title">My Profile</h4>
        </div>
        <div class="page-rightheader ml-md-auto">
            <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <div class="btn-list">
                    <a href="{{ agent_url('profile/setup') }}" class="btn btn-primary">
                        <i class="fa fa-pencil"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row employee_profile_view">
        <div class="col-xl-4 col-md-12 col-lg-12">
            <div class="card box-widget widget-user">
                <div class="card-body text-center">
                    <div class="widget-user-image mx-auto text-center">
                        @if(isset($login_user->avatar_path))
                            <img class="avatar avatar-xxl brround rounded-circle" alt="img" src="{{ $login_user->avatar_path }}">
                        @endif
                    </div>
                    <div class="pro-user mt-3">
                        @if(isset($login_user->firstname))
                            <h4 class="pro-user-username text-dark mb-1">{{ isset($login_user->firstname) ? $login_user->firstname :'' }} {{ isset($login_user->lastname) ? $login_user->lastname :'' }}</h4>
                        @endif
                        @if(isset($login_user->designation))
                            <h6 class="pro-user-desc text-muted fs-12">{{ isset($login_user->designation) ? $login_user->designation :'' }}</h6>
                        @endif
                        <div class="row mt-5">
                            <div class="col-12  text-center">
                                @if(isset($login_user->birthdate))
                                    <h6 class="pro-user-desc text-muted fs-12"><i class="fa fa-birthday-cake"></i> {{ isset($login_user->birthdate) ? date('M d Y', strtotime($login_user->birthdate)) :'' }}</h6>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header  border-0">
                    <div class="card-title">Personal Details</div>
                </div>
                <div class="card-body border-bottom pb-2">
                    <div class="row">
                        <div class="col-12">
                            @if(isset($login_user->email))
                                 <h6 class="fs-14"><i class="fa fa-envelope-o"></i> {{ isset($login_user->email) ? $login_user->email :'' }}</h6>
                            @endif

                            @if(isset($login_user->phone))
                                <h6 class="fs-14 mt-3"><i class="fa fa-mobile-phone"></i> {{ isset($login_user->phone) ? $login_user->phone :'' }}</h6>
                            @endif

                            @if(isset($login_user->education))
                                <h6 class="fs-14 mt-3"><i class="fa fa-book"></i> {{ isset($login_user->education) ? $login_user->education :'' }}</h6>
                            @endif
                            @if(isset($login_user->hobby) && !empty($login_user->hobby))
                                <h6 class="fs-14 mt-3 text-overflow"><i class="fa fa-futbol-o"></i> {{ isset($login_user->hobby) ? $login_user->hobby :'' }}</h6>
                            @endif
                        </div>
                    </div>
                </div>
                @if(isset($login_user->firstname) && isset($login_user->other_person_number))
                    <div class="card-header  border-0 pt-5">
                        <div class="card-title">Other Contact Detail</div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-12">
                                @if(isset($login_user->other_person_name))
                                    <h6 class="fs-14 mt-3"><i class="fa fa-user"></i> {{ isset($login_user->other_person_name) ? $login_user->other_person_name :'' }}</h6>
                                @endif
                                @if(isset($login_user->other_person_number))
                                    <h6 class="fs-14 mt-3"><i class="fa fa-mobile-phone"></i> {{ isset($login_user->other_person_number) ? $login_user->other_person_number :'' }}</h6>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
