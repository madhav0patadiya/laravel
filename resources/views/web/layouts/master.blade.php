<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Abroad Initiative - GLscholars</title>
    <link rel="shortcut icon" href="{{ favicon_logo() ?? '' }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset_url('css/homepage/animate.css') }}">
    <link rel="stylesheet" href="{{ asset_url('css/homepage/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset_url('css/homepage/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset_url('css/homepage/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset_url('css/homepage/lightcase.css') }}">
    <link rel="stylesheet" href="{{ asset_url('css/homepage/style.css') }}">
    <link rel="stylesheet" href="{{ asset_url('css/homepage/custom.css') }}">

        @if(isset($css_files))
            @foreach ($css_files as $key => $css_value)
                <link rel="stylesheet" type="text/css" href="{{ asset_url($css_value) }}">
            @endforeach
        @endif

        <script>
            var base_url    = "{{  web_url() }}";
            var csrf_token  = "{{  csrf_token() }}";
        </script>
    </head>

<body>
    <!-- preloader start here -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- preloader ending here -->

    <!-- scrollToTop start here -->
    <a href="#" class="scrollToTop"><i class="icofont-rounded-up"></i></a>
    <!-- scrollToTop ending here -->
    
    @include('web.layouts.header')
    @yield('content')
    @include('web.layouts.footer')

    <script src="{{ asset_url('js/homepage/jquery.js') }}"></script>
    <script src="{{ asset_url('js/jquery.validate.min.js') }}"></script>

    <script src="{{ asset_url('js/homepage/bootstrap.min.js') }}"></script>
    <script src="{{ asset_url('js/homepage/swiper.min.js') }}"></script>
    <script src="{{ asset_url('js/homepage/progress.js') }}"></script>
    <script src="{{ asset_url('js/homepage/lightcase.js') }}"></script>
    <script src="{{ asset_url('js/homepage/counter-up.js') }}"></script>
    <script src="{{ asset_url('js/homepage/isotope.pkgd.js') }}"></script>
    <script src="{{ asset_url('js/homepage/functions.js') }}"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @if(isset($pre_js_files))
        @foreach ($pre_js_files as $pre_key => $pre_js_value)
            <script src="{{ asset_url($pre_js_value) }}"></script>
        @endforeach
    @endif

    @if(isset($js_files))
        @foreach ($js_files as $key => $js_value)
            <script src="{{ asset_url($js_value) }}"></script>
        @endforeach
    @endif
</body>
</html>
