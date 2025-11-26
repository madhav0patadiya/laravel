@extends('web.layouts.master')
@section('content')
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Agent Reset Password Page</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ web_url() }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="login-section padding-tb section-bg">
    <div class="container">
        <div class="account-wrapper">
            <h3 class="title">Reset Password for Agent</h3>
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i> {{ $message }}! 
                </div>
            @else
                @if($message = Session::get('error')) 
                <div class="alert alert-danger" role="alert">
                    <i class="fa fa-frown-o mr-2" aria-hidden="true"></i> {{ $message }}!
                </div>
                @endif
            @endif
            <form class="account-form" method="post" id="reset-form"  action="{{ agent_url('reset-password') }}">
                @csrf
                <input type="hidden" name="access_token" value="{{ (isset($token) && $token != '' ? $token : '') }}" />
                <div class="form-group">
                    <input placeholder="New password" id="new_password" name="new_password" type="password">
                </div>
                <div class="form-group">
                    <input placeholder="Confirm password" name="confirm_password" type="password">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="d-block lab-btn"><span>Proceed</span></button>
                </div>
            </form>
            <div class="account-bottom">
                <span class="d-block cate pt-10">Back to Login? <a href="{{ agent_url() }}">Login</a></span>
            </div>
        </div>
    </div>
</div>
@endsection