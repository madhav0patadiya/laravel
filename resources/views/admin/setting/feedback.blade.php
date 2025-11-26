@extends('admin.layouts.master')
@section('content')
    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <h4 class="page-title">{{ (isset($feedback->id) && $feedback->id != '') ? 'Update' : 'Create' }} Feedback</h4>
        </div>
        <div class="page-rightheader ml-md-auto">
            <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <div class="btn-list">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card">
                <form class="form" id="scholarship-form" method="post" action="{{ admin_url('setting/commit-feedback') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="feedback_id" name="feedback_id" value="{{ (isset($feedback->id) && $feedback->id != '') ? encreptIt($feedback->id) : '' }}" />
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <h3>Feedback 1:</h3>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Name<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="feed1_name" placeholder="Feedback 1 Name" value="{{ isset($feedback->feed1_name) ? $feedback->feed1_name : '' }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Sub title</label>
                                    <input type="text" class="form-control" name="feed1_subtitle" placeholder="Feedback 1 Sub Title" value="{{ isset($feedback->feed1_subtitle) ? $feedback->feed1_subtitle : '' }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Review</label>
                                    <textarea class="form-control" name="feed1_description">{{ isset($feedback->feed1_description) ? $feedback->feed1_description : '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Profile Pic</label>
                                    <input type="file" class="dropify" name="feed1_img" data-default-file="{{ isset($feedback->feed1_img) && $feedback->feed1_img != '' ? $feedback->feed1_img_path : '' }}" data-height="180" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <h3>Feedback 2:</h3>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Name<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="feed2_name" placeholder="Name" value="{{ isset($feedback->feed2_name) ? $feedback->feed2_name : '' }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Sub title</label>
                                    <input type="text" class="form-control" name="feed2_subtitle" placeholder="Sub Title" value="{{ isset($feedback->feed2_subtitle) ? $feedback->feed2_subtitle : '' }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Review</label>
                                    <textarea class="form-control" name="feed2_description">{{ isset($feedback->feed2_description) ? $feedback->feed2_description : '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Profile Pic</label>
                                    <input type="file" class="dropify" name="feed2_img" data-default-file="{{ isset($feedback->feed2_img) && $feedback->feed2_img != '' ? $feedback->feed2_img_path : '' }}" data-height="180" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <h3>Feedback 3:</h3>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Name<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="feed3_name" placeholder="Name" value="{{ isset($feedback->feed3_name) ? $feedback->feed3_name : '' }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Sub title</label>
                                    <input type="text" class="form-control" name="feed3_subtitle" placeholder="Sub Title" value="{{ isset($feedback->feed3_subtitle) ? $feedback->feed3_subtitle : '' }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Review</label>
                                    <textarea class="form-control" name="feed3_description">{{ isset($feedback->feed3_description) ? $feedback->feed3_description : '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Profile Pic</label>
                                    <input type="file" class="dropify" name="feed3_img" data-default-file="{{ isset($feedback->feed3_img) && $feedback->feed3_img != '' ? $feedback->feed3_img_path : '' }}" data-height="180" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <h3>Feedback 4:</h3>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Name<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="feed4_name" placeholder="Name" value="{{ isset($feedback->feed4_name) ? $feedback->feed4_name : '' }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Sub title</label>
                                    <input type="text" class="form-control" name="feed4_subtitle" placeholder="Sub Title" value="{{ isset($feedback->feed4_subtitle) ? $feedback->feed4_subtitle : '' }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Review</label>
                                    <textarea class="form-control" name="feed4_description">{{ isset($feedback->feed4_description) ? $feedback->feed4_description : '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Profile Pic</label>
                                    <input type="file" class="dropify" name="feed4_img" data-default-file="{{ isset($feedback->feed4_img) && $feedback->feed4_img != '' ? $feedback->feed4_img_path : '' }}" data-height="180" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <h3>Video 1:</h3>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Thumbnail</label>
                                    <input type="file" class="dropify" name="video1_img" data-default-file="{{ isset($feedback->video1_img) && $feedback->video1_img != '' ? $feedback->video1_img_path : '' }}" data-height="180" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Link</label>
                                    <input type="text" class="form-control" name="video1_link" placeholder="Video 1 Link" value="{{ isset($feedback->video1_link) ? $feedback->video1_link : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <h3>Video 2:</h3>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Thumbnail</label>
                                    <input type="file" class="dropify" name="video2_img" data-default-file="{{ isset($feedback->video2_img) && $feedback->video2_img != '' ? $feedback->video2_img_path : '' }}" data-height="180" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Link</label>
                                    <input type="text" class="form-control" name="video2_link" placeholder="Video 1 Link" value="{{ isset($feedback->video2_link) ? $feedback->video2_link : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary scholarship-submit">
                                {{ (isset($feedback->id) && $feedback->id != '') ? 'Update' : 'Save' }}
                                <i class="fa fa-circle-o-notch fa-spin hide mr-2"></i>
                            </button>
                        </div>
                    </div>
                <form>
            </div>
        </div>
    </div>
@endsection
