@extends('admin.layouts.master')
@section('content')
<div class="page-header d-xl-flex d-block">
    <div class="page-leftheader">
        <h4 class="page-title">{{ (isset($notice->id) && $notice->id != '') ? 'Update' : 'Create' }} Student Notice</h4>
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
            <form class="form" id="notice-form" method="post" action="{{ admin_url('setting/commit-notice') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="notice_id" name="notice_id" value="{{ (isset($notice->id) && $notice->id != '') ? encreptIt($notice->id) : '' }}" />
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="form-label">Description:</label>
                                <div class="summernote">
                                    @if ( isset($notice->description))
                                        {!! old('description', $notice->description) !!}
                                    @endif
                                </div>
                            </div>                    
                        </div>

                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="form-label">Notice Banner</label>
                                <input type="file" class="dropify" name="banner" data-default-file="{{ isset($notice->banner) && $notice->banner != '' ? $notice->banner_path : '' }}" data-height="180" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary submit-btn">{{ (isset($notice->id) && $notice->id != ''? 'Update' : 'Save' )  }} Student Notice
                        <i class="fa fa-circle-o-notch fa-spin hide mr-2"></i>
                    </button>        
                </div>
            </form>
        </div>
    </div>
</div>
@endsection