@extends('admin.layouts.master')
@section('content')
<div class="page-header d-xl-flex d-block">
    <div class="page-leftheader">
        <h4 class="page-title">Upload University Logo</h4>
    </div>
    <div class="page-rightheader ml-md-auto">
        <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
            <div class="btn-list">
            </div>
        </div>
    </div>
</div>

<section class="">
    <div class="col-12">
        <div class="dropzone_container" data-url="{{ admin_url('setting/university-logo-upload') }}"></div>
    </div>
    <div class='gallery_container row'>
    </div>
</section>
@stop