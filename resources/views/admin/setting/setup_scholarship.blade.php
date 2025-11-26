@extends('admin.layouts.master')
@section('content')
    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <h4 class="page-title">{{ (isset($scholarship->id) && $scholarship->id != '') ? 'Update' : 'Create' }} Scholarship</h4>
        </div>
        <div class="page-rightheader ml-md-auto">
            <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <div class="btn-list">
                    <a href="{{ admin_url('setting/scholarship') }}" class="btn btn-primary mr-3">View Scholarship</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card">
                <form class="form" id="scholarship-form" method="post" action="{{ admin_url('setting/commit-scholarship') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="scholarship_id" name="scholarship_id" value="{{ (isset($scholarship->id) && $scholarship->id != '') ? encreptIt($scholarship->id) : '' }}" />
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Title<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ isset($scholarship->title) ? $scholarship->title : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Sub title</label>
                                    <input type="text" class="form-control" name="sub_title" placeholder="Sub Title" value="{{ isset($scholarship->sub_title) ? $scholarship->sub_title : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Video Link</label>
                                    <input type="text" class="form-control" name="video_link" placeholder="Video Link" value="{{ isset($scholarship->video_link) ? $scholarship->video_link : '' }}">
                                </div>
                            </div>
                            {{-- <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Scholar Ship Overview<small class="mandotory">*</small></label>
                                    <textarea class="form-control" name="overview">{{ isset($scholarship->overview) ? $scholarship->overview : '' }}</textarea>
                                </div>
                            </div> --}}
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Scholar Ship Overview:</label>
                                    <div id="overview-editor" class="summernote">
                                        @if ( isset($scholarship->overview))
                                            {!! old('overview', $scholarship->overview) !!}
                                        @endif
                                    </div>
                                </div>                    
                            </div>
    
                            <div class="col-sm-12 col-md-12">
                                <h3>Description:</h3>
                                <div class="form-group">
                                    <label class="form-label">Point 1</label>
                                    <input type="text" class="form-control" name="des_point1" placeholder="Point 1" value="{{ isset($scholarship->des_point1) ? $scholarship->des_point1 : '' }}">
                                    <label class="form-label mt-2">Point 2</label>
                                    <input type="text" class="form-control" name="des_point2" placeholder="Point 1" value="{{ isset($scholarship->des_point2) ? $scholarship->des_point2 : '' }}">
                                    <label class="form-label mt-2">Point 3</label>
                                    <input type="text" class="form-control" name="des_point3" placeholder="Point 1" value="{{ isset($scholarship->des_point3) ? $scholarship->des_point3 : '' }}">
                                    <label class="form-label mt-2">Point 4</label>
                                    <input type="text" class="form-control" name="des_point4" placeholder="Point 1" value="{{ isset($scholarship->des_point4) ? $scholarship->des_point4 : '' }}">
                                    <label class="form-label mt-2">Point 5</label>
                                    <input type="text" class="form-control" name="des_point5" placeholder="Point 1" value="{{ isset($scholarship->des_point5) ? $scholarship->des_point5 : '' }}">
                                </div>
                            </div>
                            {{-- <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Paragraph 1</label>
                                    <textarea class="form-control" name="paragraph_1">{{ isset($scholarship->paragraph_1) ? $scholarship->paragraph_1 : '' }}</textarea>
                                </div>
                            </div> --}}
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Paragraph 1</label>
                                    <div id="paragraph1-editor" class="summernote">
                                        @if ( isset($scholarship->paragraph_1))
                                            {!! old('paragraph_1', $scholarship->paragraph_1) !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
    
                            {{-- <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Paragraph 2</label>
                                    <textarea class="form-control" name="paragraph_2">{{ isset($scholarship->paragraph_2) ? $scholarship->paragraph_2 : '' }}</textarea>
                                </div>
                            </div> --}}
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Paragraph 2</label>
                                    <div id="paragraph2-editor" class="summernote">
                                        @if ( isset($scholarship->paragraph_2))
                                            {!! old('paragraph_2', $scholarship->paragraph_2) !!}
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Scholars Fees<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="fees" placeholder="Sub Title" value="{{ isset($scholarship->fees) ? $scholarship->fees : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Applications open<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="application_open" placeholder="Ex: 15 May 2024, 15:00 CEST" value="{{ isset($scholarship->application_open) ? $scholarship->application_open : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Applications close<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="application_close" placeholder="Ex: 15 May 2024, 15:00 CEST" value="{{ isset($scholarship->application_close) ? $scholarship->application_close : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Certificate</label>
                                    <input type="text" class="form-control" name="certificate" placeholder="Yes or No" value="{{ isset($scholarship->certificate) ? $scholarship->certificate : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Language</label>
                                    <input type="text" class="form-control" name="language" placeholder="Language" value="{{ isset($scholarship->language) ? $scholarship->language : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Apply Button Link</label>
                                    <input type="text" class="form-control" name="apply_link" placeholder="" value="{{ isset($scholarship->apply_link) ? $scholarship->apply_link : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Thumbnail</label>
                                    <input type="file" class="dropify" name="thumbnail" data-default-file="{{ isset($scholarship->thumbnail) && $scholarship->thumbnail != '' ? $scholarship->thumbnail_path : '' }}" data-height="180" />
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 mt-4">
                                <div class="form-group">
                                    <label class="form-label mb-0 mt-2"><b>Is Visible?</b></label>
                                    <label class="custom-switch">
                                        <input type="checkbox" name="is_visible" class="custom-switch-input" {{ (isset($scholarship->is_visible) && $scholarship->is_visible == 1) ?'checked' : '' }}>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Visible/Not Visible</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary scholarship-submit">
                                {{ (isset($scholarship->id) && $scholarship->id != '') ? 'Update' : 'Save' }}
                                <i class="fa fa-circle-o-notch fa-spin hide mr-2"></i>
                            </button>
                        </div>
                    </div>
                <form>
            </div>
        </div>
    </div>
@endsection
