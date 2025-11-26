@extends('web.layouts.master')
@section('content')
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Student Login Page</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ web_url() }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Login as Student</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@if(isset(socialHandles()->student_notice))
<div class="section-bg pt-5">
    <div class="container">
        <div class="account-wrapper" style="background: #ff8554; padding: 10px;">
            <h3 class="title">Import Notice</h3>
            <div>
                <p class="text-white"><b>{{ socialHandles()->student_notice ?? '' }}</b></p>
            </div>
        </div>
    </div>
</div>
@endif
<div class="login-section padding-tb section-bg">
    <div class="container">
        <div class="account-wrapper">
            <h3 class="title">Login as Student</h3>
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
            <form class="account-form" method="post" id="login-form" name="login" action="{{ student_url('login') }}">
                @csrf
                <div class="form-group">
                    <input name="email" type="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input name="password" type="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <div class="d-flex justify-content-end flex-wrap pt-sm-2">
                        <a href="{{student_url('forgot-password')}}">Forget Password?</a>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="d-block lab-btn"><span>Login</span></button>
                </div>
            </form>
            <div class="account-bottom">
                <span class="d-block cate pt-10">Don’t Have any Account?  <a href="{{ student_url('register') }}">Register</a></span>
            </div>
        </div>
    </div>
</div>
@stop