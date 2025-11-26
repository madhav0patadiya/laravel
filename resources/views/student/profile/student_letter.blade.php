@extends('student.layouts.master')
@section('content')
<div class="page-header d-xl-flex d-block">
    <div class="page-leftheader">
        <h4 class="page-title">Student Letter</h4>
    </div>
    <div class="page-rightheader ml-md-auto">
        <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
            <div class="btn-list">
            </div>
        </div>
    </div>
</div>
@if (isset($student_letter) && count($student_letter) > 0)
<div class="gallery_container row">
    @foreach ($student_letter as $value)
        @php
            $extension = strtolower(pathinfo($value->doc_path, PATHINFO_EXTENSION));
            $isPdf = $extension === 'pdf';
            $imageSrc = $isPdf ? pdf_image() : ($value->doc_path ?? default_img());
            $fileLink = $value->doc_path ?? '#';
        @endphp
        <div class="m-1 image_box" data-id="{{ isset($value->id) ? encreptIt($value->id) : '' }}" data-src="{{ $fileLink }}">
            <a href="{{ $fileLink }}" target="_blank">
                <img src="{{ $imageSrc }}" alt="document preview" style="width: 100px; height: auto;" />
            </a>
        </div>
    @endforeach
</div>

@else
    <div class="no_data_found">
        <i class="fa fa-image"></i>
        <h4 class="card-title">No data available!</h4>
    </div>
@endif

@endsection