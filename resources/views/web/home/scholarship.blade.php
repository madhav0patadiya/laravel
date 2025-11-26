@extends('web.layouts.master')
@section('content')
    <!-- Page Header section start here -->
    <div class="pageheader-section style-2">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-between align-items-center flex-row-reverse">
                <div class="col-lg-7 col-12">
                    <div class="pageheader-thumb">
                        <img src="{{ $scholarship->thumbnail_path ?? default_img() }}" alt="rajibraj91" class="w-100">
                        <a href="{{ $scholarship->video_link ?? '#' }}" class="video-button" data-rel="lightcase"><i class="icofont-ui-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <div class="pageheader-content">
                        <h2 class="phs-title">{{ $scholarship->title ?? '' }}</h2>
                        <p class="phs-desc">{{ $scholarship->sub_title ?? '' }}</p>
                        <div class="phs-thumb">
                            <div class="course-reiew">
                                <span class="ratting">
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                </span>
                                {{-- <span class="ratting-count">
                                    03 reviews
                                </span> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header section ending here -->

    <!-- course section start here -->
    <div class="course-single-section padding-tb section-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="main-part">
                        <div class="course-item">
                            <div class="course-inner">
                                <div class="course-content">
                                    <h3>Scholarship Overview</h3>
                                    <p>{!! $scholarship->overview ?? '' !!}</p>
                                    <h4>What You'll Learn in This Scholarship:</h4>
                                    <ul class="lab-ul">
                                        @if(isset($scholarship->des_point1))
                                        <li><i class="icofont-tick-mark"></i>{{ $scholarship->des_point1 ?? '' }}</li>
                                        @endif  
                                        @if(isset($scholarship->des_point2))
                                        <li><i class="icofont-tick-mark"></i>{{ $scholarship->des_point2 ?? '' }}</li>
                                        @endif  
                                        @if(isset($scholarship->des_point3))
                                        <li><i class="icofont-tick-mark"></i>{{ $scholarship->des_point3 ?? '' }}</li>
                                        @endif  
                                        @if(isset($scholarship->des_point4))
                                        <li><i class="icofont-tick-mark"></i>{{ $scholarship->des_point4 ?? '' }}</li>
                                        @endif  
                                        @if(isset($scholarship->des_point5))
                                        <li><i class="icofont-tick-mark"></i>{{ $scholarship->des_point5 ?? '' }}</li>
                                        @endif  
                                    </ul>
                                    @if(isset($scholarship->paragraph_1))
                                    <p>{!! $scholarship->paragraph_1 ?? '' !!}</p>
                                    @endif
                                    @if(isset($scholarship->paragraph_1))
                                    <p>{!! $scholarship->paragraph_2 ?? '' !!}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-part">
                        <div class="course-side-detail">
                            <div class="csd-title">
                                <div class="csdt-left">
                                    <h4 class="mb-0"><sup>$</sup>{{ $scholarship->fees ?? '' }}</h4>
                                </div>
                                <div class="csdt-right">
                                    <p class="mb-0"><i class="icofont-clock-time"></i>Limited time offer</p>
                                </div>
                            </div>
                            <div class="csd-content">
                                <div class="csdc-lists">
                                    <ul class="lab-ul">
                                        <li>
                                            <div class="csdc-left"><i class="icofont-ui-alarm"></i>Application Open</div>
                                            <div class="csdc-right">{{ $scholarship->application_open ?? '' }}</div>
                                        </li>
                                        <li>
                                            <div class="csdc-left"><i class="icofont-hour-glass"></i>Application Close</div>
                                            <div class="csdc-right">{{ $scholarship->application_close ?? '' }}</div>
                                        </li>
                                        <li>
                                            <div class="csdc-left"><i class="icofont-certificate"></i>Certificate</div>
                                            <div class="csdc-right">{{ $scholarship->certificate ?? '' }}</div>
                                        </li>
                                        <li>
                                            <div class="csdc-left"><i class="icofont-globe"></i>Language</div>
                                            <div class="csdc-right">{{ $scholarship->language ?? '' }}</div>
                                        </li>
                                    </ul>
                                </div>
                                @if(isset($scholarship->apply_link))
                                <div class="course-enroll text-end">
                                    <a href="{{ $scholarship->apply_link ?? '' }}" class="lab-btn"><span>Apply Directly</span></a>
                                </div>
                                @endif
                                <div class="text-end">
                                    <a href="{{web_url('student/register')}}" class="lab-btn"><span>Apply from GL Scholars</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- course section ending here -->

@endsection