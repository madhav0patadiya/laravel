<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="" name="description">
    <meta content="" name="author">
    <meta name="keywords" content="" />
    <!-- Title -->
    <title>GL Scholars - Agent Panel</title>

    <!--Favicon -->
    <link rel="icon" href="{{ favicon_logo() ?? '' }}" />

    <!-- Bootstrap css -->
    <link href="{{ asset_url('css/bootstrap.css') }}" rel="stylesheet" />
    
    <!-- Style css -->
    <link href="{{ asset_url('css/style.css')}}" rel="stylesheet" />
    <link href="{{ asset_url('css/custom.css')}}" rel="stylesheet" />
    <script>
        var base_url    = "{{  agent_url() }}";
        var csrf_token  = "{{  csrf_token() }}";
    </script>

    @if(isset($css_files))
        @foreach ($css_files as $key => $css_value)
            <link rel="stylesheet" type="text/css" href="{{ asset_url($css_value) }}">
        @endforeach
    @endif
</head>

<body>

    <div class="page responsive-log login-bg1">
        <div class="page-single">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Jquery js-->
    <script src="{{ asset_url('js/jquery.min.js') }}"></script>
    <script src="{{ asset_url('js/jquery.validate.min.js') }}"></script>

    <!-- Bootstrap4 js-->
    <script src="{{ asset_url('js/popper.min.js') }}"></script>
    <script src="{{ asset_url('js/bootstrap.min.js') }}"></script>
    <!-- Custom js-->
    <script src="{{ asset_url('js/theme.js') }}"></script>
    @if(isset($js_files))
        @foreach ($js_files as $key => $js_value)
            <script src="{{ asset_url($js_value) }}"></script>
        @endforeach
    @endif
    <script src="{{ asset_url('js/front/custom.js') }}"></script>
</body>

</html>