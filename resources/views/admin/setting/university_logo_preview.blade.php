@if (isset($logos) && count($logos) > 0)
    @foreach ($logos as $value)
        <div class="m-1 image_box" data-id="{{ isset($value->id) ? encreptIt($value->id) : '' }}" data-src="{{ $value->uni_logo_path ?? default_img() }}">
            <a href="{{ $value->uni_logo_path ?? default_img() }}" target="_blank">
                <img src="{{ $value->uni_logo_path ?? default_img() }}" alt="document preview" style="width: 100px; height: auto;" />
            </a>
            <div class="remove_image">
                <a href="javascript:void(0)" class="delete-logo" data-image-id="{{ encreptIt($value->id) }}">
                    <i class="feather feather-trash-2 mr-2"></i>
                </a>
            </div>
        </div>
    @endforeach
@else
    <div class="no_data_found">
        <i class="fa fa-image"></i>
        <h4 class="card-title">No data available!</h4>
    </div>
@endif
