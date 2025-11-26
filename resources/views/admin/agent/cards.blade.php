@if(isset($agents) && count($agents) > 0)
<div class="row">
    @foreach($agents as $agent)
        <div class="col-xl-3 col-lg-6">
            <div class="card text-center user-contact-list agent_card">
                <div class="p-5">
                    <div class="avatar avatar-xxl brround d-block cover-image mx-auto" data-image-src="{{ isset($agent->avatar_path) ? $agent->avatar_path : ''}}" style="background: url({{ isset($agent->avatar_path) ? $agent->avatar_path : '' }}) #ffffff center center;"></div>
                    <div class="wrapper mt-3">
                        <p class="mb-0 mt-1 text-dark font-weight-semibold">{{ isset($agent->fullname) ? $agent->fullname : ''}}({{ isset($agent->email) ? $agent->email : '' }})</p>
                        <small class="text-muted">Referral Code : {{ isset($agent->referral_code) ? $agent->referral_code : '' }}</small>
                    </div>
                    <div class="mt-5">
                        <a class="btn btn-outline-primary mr-1" href="{{isset($agent->id) ? admin_url('agent/setup/'.encreptIt($agent->id)) : 'javascript:void(0)'}}">
                            <i class="feather feather-edit-2 fs-15 my-auto"></i>
                        </a>
                        <a class="btn btn-outline-danger agent-delete" data-id="{{isset($agent->id) ? encreptIt($agent->id) : ''}}" href="javascript:void(0)">
                            <i class="feather feather-trash fs-15 my-auto"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
{{ $agents->links() }}
@else
    <div class="no-record-found">
        <h1><i class="fa fa-search"></i></h1>
        <h4 class="card-title mb-0">No record found!</h4>
    </div>
@endif

