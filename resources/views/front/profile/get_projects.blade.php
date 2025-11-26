<div class="modal-header">
    <h5 class="modal-title">Set Project</h5>
    <button  class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<form class="form" method="post" action="{{ agent_url('switch-project') }}" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Project</label>
                    <select name="project" class="form-control custom-select select2" data-placeholder="Select Project">
                        <option label="Select Project"></option>
                        @if (isset($projects))
                            @foreach ($projects as $key => $project)
                                <option value="{{ isset($project->id) ? encreptIt($project->id) : ''}}" {{ isset($session_project_id) && $project->id == $session_project_id ? 'selected' : '' }}>{{ isset($project->title) ? $project->title : '' }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button  class="btn btn-outline-primary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary submit-btn">
            Update
            <i class="fa fa-circle-o-notch fa-spin hide mr-2"></i>
        </button>
    </div>
</form>
