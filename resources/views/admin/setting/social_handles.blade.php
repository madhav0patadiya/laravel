@extends('admin.layouts.master')
@section('content')
    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <h4 class="page-title">{{ (isset($social->id) && $social->id != '') ? 'Update' : 'Create' }} Settings</h4>
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
                <form class="form" id="social-form" method="post" action="{{ admin_url('setting/commit-social-handles') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="social_id" name="social_id" value="{{ (isset($social->id) && $social->id != '') ? encreptIt($social->id) : '' }}" />
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Facebook<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="facebook" placeholder="Facebook" value="{{ isset($social->facebook) ? $social->facebook : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Instagram<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="instagram" placeholder="Instagram" value="{{ isset($social->instagram) ? $social->instagram : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">LinkedIn<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="twitter" placeholder="Twitter" value="{{ isset($social->twitter) ? $social->twitter : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Whatsapp<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="whatsapp" placeholder="Whatsapp" value="{{ isset($social->whatsapp) ? $social->whatsapp : '' }}" maxlength="10">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Phone<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ isset($social->phone) ? $social->phone : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Address<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="address" placeholder="Address" value="{{ isset($social->address) ? $social->address : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Email<small class="mandotory">*</small></label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ isset($social->email) ? $social->email : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Map Link<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="map" placeholder="Map Link" value="{{ isset($social->map) ? $social->map : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Student Register Page Notice<small class="mandotory">*</small></label>
                                    <textarea class="form-control" name="student_notice">{{ isset($social->student_notice) ? $social->student_notice : '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <h3>Write up Section 1</h3>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Subtitle<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="sec1_subtitle" placeholder="Subtitle" value="{{ isset($social->sec1_subtitle) ? $social->sec1_subtitle : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Heading<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="sec1_heading" placeholder="Heading" value="{{ isset($social->sec1_heading) ? $social->sec1_heading : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Paragraph 1<small class="mandotory">*</small></label>
                                    <textarea class="form-control" name="sec1_para1">{{ isset($social->sec1_para1) ? $social->sec1_para1 : '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Paragraph 2<small class="mandotory">*</small></label>
                                    <textarea class="form-control" name="sec1_para2">{{ isset($social->sec1_para2) ? $social->sec1_para2 : '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="dropify" name="sec1_img" data-default-file="{{ isset($social->sec1_img) && $social->sec1_img != '' ? $social->image_path : '' }}" data-height="180" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <h3>Write up Section 2</h3>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Subtitle<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="sec2_subtitle" placeholder="Subtitle" value="{{ isset($social->sec2_subtitle) ? $social->sec2_subtitle : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Heading<small class="mandotory">*</small></label>
                                    <input type="text" class="form-control" name="sec2_heading" placeholder="Heading" value="{{ isset($social->sec2_heading) ? $social->sec2_heading : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Paragraph 1<small class="mandotory">*</small></label>
                                    <textarea class="form-control" name="sec2_para1">{{ isset($social->sec2_para1) ? $social->sec2_para1 : '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Paragraph 2<small class="mandotory">*</small></label>
                                    <textarea class="form-control" name="sec2_para2">{{ isset($social->sec2_para2) ? $social->sec2_para2 : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary scholarship-submit">
                                {{ (isset($social->id) && $social->id != '') ? 'Update' : 'Save' }}
                                <i class="fa fa-circle-o-notch fa-spin hide mr-2"></i>
                            </button>
                        </div>
                    </div>
                <form>
            </div>
        </div>
    </div>
@endsection
