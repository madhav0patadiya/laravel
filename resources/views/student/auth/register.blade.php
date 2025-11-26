@extends('web.layouts.master')
@section('content')
    <div class="pageheader-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pageheader-content text-center">
                        <h2>Student Register Page</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ web_url() }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Register as Student</li>
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
                <h3 class="title">Register as Student</h3>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i> {{ $message }}!
                    </div>
                @else
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger" role="alert">
                            <i class="fa fa-frown-o mr-2" aria-hidden="true"></i> {{ $message }}!
                        </div>
                    @endif
                @endif
                <form class="account-form" method="post" id="register-form" action="{{ student_url('commit-register') }}">
                    @csrf
                    <div class="form-group">
                        <input name="firstname" type="text" placeholder="Firstname">
                    </div>
                    <div class="form-group">
                        <input name="lastname" type="text" placeholder="Lastname">
                    </div>
                    <div class="form-group">
                        <input name="citizenship" type="text" placeholder="Citizenship">
                    </div>
                    <div class="form-group">
                        <input name="address" type="text" placeholder="Residentail Address">
                    </div>
                    <div class="form-group">
                        <input name="phone" type="text" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <div class="outline-select shipping-select">
                            <select name="country_id">
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{ encreptIt($country->id) }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input name="course" type="text" placeholder="Crouse Choice">
                    </div>
                    <div class="form-group">
                        <div class="outline-select shipping-select">
                            <select name="program_level_id">
                                <option value="">Select Program Level</option>
                                @foreach($program_levels as $program)
                                    <option value="{{ encreptIt($program->id) }}">{{ $program->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="checkemail" name="email" type="email" placeholder="Email">
                    </div>
                    @if(isset($agent_code))
                        <input type="hidden" name="agent_code" value="{{ $agent_code }}">
                        <div class="form-group">
                            <label style="font-weight:bold; text-align:left; display:block;">Referred by:</label>
                            <input type="text" class="form-control" value="{{ $agent_name ?? 'Unknown Agent' }}" readonly>
                        </div>
                    @endif
                    <div class="form-group text-center">
                        <button type="submit" class="d-block lab-btn"><span>Register</span></button>
                    </div>
                </form>
                <div class="account-bottom">
                    <span class="d-block cate pt-10">Already have an Student Login? <a href="{{ student_url() }}">Login</a></span>
                </div>
            </div>
        </div>
    </div>
@stop
