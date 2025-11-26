@if (isset($documents) && count($documents) > 0)
    @foreach ($documents as $value)
        @php
            $extension = strtolower(pathinfo($value->doc_path, PATHINFO_EXTENSION));
            $isPdf = $extension === 'pdf';
            $imageSrc = $isPdf ? pdf_image() : ($value->doc_path ?? default_img());
            $fileLink = $value->doc_path ?? '#';
        @endphp
        <div class="m-1 image_box" data-id="{{ isset($value->id) ? encreptIt($value->id) : '' }}" data-src="{{ $fileLink }}">
            <a href="{{ $fileLink }}" target="_blank">
                <img src="{{ $imageSrc }}" alt="document preview" style="width: 100px; height: auto;" />
            </a>
            <div class="remove_image">
                <a href="javascript:void(0)" class="delete-document" data-image-id="{{ encreptIt($value->id) }}">
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
