@extends('web.layouts.master')
@section('content')
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Agent Forgot Password Page</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ web_url() }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Forgot Password</li>
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
            <h3 class="title">Forgot Password for Agent</h3>
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
            <form class="account-form" method="post" id="forgot-form" action="{{ agent_url('forgot-password') }}">
                @csrf
                <div class="form-group">
                    <input name="email" type="email" placeholder="Email">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="d-block lab-btn"><span>Proceed</span></button>
                </div>
            </form>
            <div class="account-bottom">
                <span class="d-block cate pt-10">Back to login? <a href="{{ agent_url() }}">Login</a></span>
            </div>
        </div>
    </div>
</div>
@endsection