@extends('web.layouts.master')
@section('content')
<section class="banner-section">
</section>
<div class="course-section padding-tb section-bg">
    <div class="container">
        <div class="section-header text-center">
            <span class="subtitle">Featured All Scholarship</span>
            <h2 class="title">Pick A Scholarship To Get Started</h2>
        </div>
        <div class="section-wrapper">
            <div class="row g-4 justify-content-center row-cols-xl-3 row-cols-md-2 row-cols-1">
                @foreach($scholarship as $item)
                <div class="col">
                    <div class="course-item">
                        <div class="course-inner">
                            <a href="{{web_url('scholarship/'. encreptIt($item->id))}}">
                                <div class="course-thumb">
                                    <img src="{{ $item->thumbnail_path ?? default_img()}}" alt="course">
                                </div>
                            </a>
                            <div class="course-content">
                                @if($item->fees != '')
                                <div class="course-price">${{ $item->fees ?? 0}}</div>
                                @endif
                                <div class="course-category">
                                    <div class="course-reiew">
                                        <span class="ratting">
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                        </span>
                                    </div>
                                </div>
                                <a href="{{web_url('scholarship/'. encreptIt($item->id))}}"><h5>{{ $item->title ?? '' }}</h5></a>
                                <div class="course-footer">
                                    <div class="course-btn">
                                        <a href="{{web_url('scholarship/'. encreptIt($item->id))}}" class="lab-btn-text">Read More <i class="icofont-external-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection