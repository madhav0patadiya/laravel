<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

    <head>
        <!-- Meta data -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Title -->
        <title>GL Scholars - Admin Panel</title>
        <!--Favicon -->
        <link rel="icon" href="{{ favicon_logo() ?? '' }}" type="image/x-icon" />

        <!-- Bootstrap css -->
        <link href="{{ asset_url('css/bootstrap.css') }}" rel="stylesheet" />
        <!-- Animate css -->
        <link href="{{ asset_url('css/animated.css')}}" rel="stylesheet" />
        <!-- Style css -->
        <link href="{{ asset_url('css/style.css')}}" rel="stylesheet" />

        <!--Sidemenu css -->
        <link href="{{ asset_url('css/sidemenu.css') }}" rel="stylesheet">

        <link href="{{ asset_url('css/notifIt.css') }}" rel="stylesheet">
        <link href="{{ asset_url('css/datatables.min.css') }}" rel="stylesheet">
        <link href="{{ asset_url('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

        <link href="{{ asset_url('css/select2.min.css') }}" rel="stylesheet">

        <link href="{{ asset_url('css/p-scrollbar.css') }}" rel="stylesheet">
        <link href="{{ asset_url('css/jquery.sweet-modal.min.css') }}" rel="stylesheet">
        <link href="{{ asset_url('css/sweetalert.css') }}" rel="stylesheet">

        <!---Icons css-->
        <link href="{{ asset_url('css/icons.css')}}" rel="stylesheet" />
        @if(isset($css_files))
            @foreach ($css_files as $key => $css_value)
            <link rel="stylesheet" type="text/css" href="{{ asset_url($css_value) }}">
            @endforeach
        @endif

        <!--custom css -->
        <link href="{{ asset_url('css/custom.css') }}" rel="stylesheet">

        <script>
            var admin_url   = "{{  url('/admin'); }}";
            var csrf_token  = "{{  csrf_token(); }}";
        </script>
    </head>

<body class="app sidebar-mini" id="index1">

    <!---Global-loader-->
    <div id="global-loader">
        <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>

    <div class="page">
        <div class="page-main">
            <!--aside-start-->
            @include('admin.layouts.sidebar')
            <!--aside-end-->
            <!-- start app-content-->
            <div class="app-content main-content">
                <div class="side-app">
                    <!--app header-->
                    @include('admin.layouts.header')
                    <!--end header-->
                    @yield('content')
                </div>
            </div>
            <!-- end app-content-->
        </div>
        <!--Footer-->
        @include('admin.layouts.footer')
        <!--end footer-->
    </div>

    <!--Back to top-->
    <a href="#top" id="back-to-top"><span class="feather feather-chevrons-up"></span></a>

    <!-- Jquery js-->
    <script src="{{ asset_url('js/jquery.min.js') }}"></script>

    <!--Bootstrap4 js-->
    <script src="{{ asset_url('js/popper.min.js') }}"></script>
    <script src="{{ asset_url('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset_url('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset_url('js/jquery.dataTables.min.js') }}"></script>
    <!--Sidemenu js-->
    <script src="{{ asset_url('js/sidemenu.js') }}"></script>
    <!-- Custom js-->
    <script src="{{ asset_url('js/notifIt.js') }}"></script>
    <script src="{{ asset_url('js/p-scrollbar.js') }}"></script>
    <script src="{{ asset_url('js/select2.full.min.js') }}"></script>
    <script src="{{ asset_url('js/theme.js') }}"></script>
    <script src="{{ asset_url('js/confetti.min.js') }}"></script>
    <script src="{{ asset_url('js/jquery.sweet-modal.min.js') }}"></script>
    <script src="{{ asset_url('js/sweetalert.min.js') }}"></script>

    @if(isset($js_files))
        @foreach ($js_files as $key => $js_value)
            <script src="{{ asset_url($js_value) }}"></script>
        @endforeach
    @endif

    <script src="{{ asset_url('js/admin/modules/'.strtolower($controller).'.js') }}"></script>
    <script src="{{ asset_url('js/admin/custom.js') }}"></script>
    <script>
            var message = '';
            var type = '';
            @if(Session::has('success'))
                message = "<?php echo Session::get('success'); ?>";
                type    = "success";
            @endif

            @if(Session::has('error'))
                message = "<?php echo Session::get('error'); ?>";
                type    = "error";
            @endif
            setTimeout(function(){
                showMessage(type,message);
            }, 500);

    </script>
</body>
</html>
