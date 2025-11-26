@extends('admin.layouts.master')
@section('content')
    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <h4 class="page-title">{{ (isset($aboutus->id) && $aboutus->id != '') ? 'Update' : 'Create' }} Founders</h4>
        </div>
        <div class="page-rightheader ml-md-auto">
            <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <div class="btn-list">
                    <a href="{{ admin_url('setting/about_us') }}" class="btn btn-primary mr-3">View Founders</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card">
                <form class="form" id="aboutus-form" method="post" action="{{ admin_url('setting/commit-about-us') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="aboutus_id" name="aboutus_id" value="{{ (isset($aboutus->id) && $aboutus->id != '') ? encreptIt($aboutus->id) : '' }}" />
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Title<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="name" placeholder="Title" value="{{ isset($aboutus->name) ? $aboutus->name : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Title<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ isset($aboutus->title) ? $aboutus->title : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="dropify" name="image" data-default-file="{{ isset($aboutus->image) && $aboutus->image != '' ? $scholarship->image_path : '' }}" data-height="180" />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary scholarship-submit">
                                {{ (isset($aboutus->id) && $aboutus->id != '') ? 'Update' : 'Save' }}
                                <i class="fa fa-circle-o-notch fa-spin hide mr-2"></i>
                            </button>
                        </div>
                    </div>
                <form>
            </div>
        </div>
    </div>
@endsection
