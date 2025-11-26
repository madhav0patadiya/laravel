@extends('student.layouts.master')
@section('content')
<div class="page-header d-xl-flex d-block">
    <div class="page-leftheader">
        <h4 class="page-title">Upload Documents for {{isset($student->fullname) ? $student->fullname : '' }}</h4>
    </div>
    <div class="page-rightheader ml-md-auto">
        <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
            <div class="btn-list">
            </div>
        </div>
    </div>
</div>

<section class="">
    @if (isset($student->id))
        <input type="hidden" name="student_id" class="student_id" value="{{ isset($student->id) && $student->id != '' ? encreptIt($student->id) : '' }}" />
        <div class="col-12">
            <div class="dropzone_container" data-url="{{ student_url('document-upload/' . encreptIt($student->id)) }}"></div>
        </div>
        <div class='gallery_container row'>
        </div>
    @endif
</section>
@stop