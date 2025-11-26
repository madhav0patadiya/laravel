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
        <title>GL Scholars - Student Panel</title>
        <!--Favicon -->
        <link rel="icon" href="{{ favicon_logo() ?? '' }}" />

        <!-- Bootstrap css -->
        <link href="{{ asset_url('css/bootstrap.css') }}" rel="stylesheet" />
        <link href="{{ asset_url('css/notifIt.css') }}" rel="stylesheet">
        <!-- <link href="{{ asset_url('css/datatables.min.css') }}" rel="stylesheet"> -->
        <link href="{{ asset_url('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        <link href="{{ asset_url('css/bootstrap-datepicker.css') }}" rel="stylesheet">
        <link href="{{ asset_url('css/summernote-bs4.css') }}" rel="stylesheet">
        <!-- Animate css -->
        <link href="{{ asset_url('css/animated.css')}}" rel="stylesheet"/>
        <!-- Style css -->
        <link href="{{ asset_url('css/style.css')}}" rel="stylesheet" />
        <link href="{{ asset_url('css/introjs.css')}}" rel="stylesheet" />

        <!--Sidemenu css -->
        <link href="{{ asset_url('css/sidemenu.css') }}" rel="stylesheet">

        <link href="{{ asset_url('css/select2.min.css') }}" rel="stylesheet">

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
            var base_url    = "{{  student_url() }}";
            var csrf_token  = "{{  csrf_token() }}";
        </script>
    </head>

<body class="app sidebar-mini employee_portal" id="index1">
    <!---Global-loader-->
    <div id="global-loader">
        <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>
    <div class="page">
        <div class="page-main">
            @include('student.layouts.sidebar')
            <div class="app-content main-content">
                <div class="side-app">
                    @include('student.layouts.header')

                    <div class="page-box">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        @include('student.layouts.footer')
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
    <script src="{{ asset_url('js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset_url('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset_url('js/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset_url('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset_url('js/summernote-bs4.js') }}"></script>

    <!--Sidemenu js-->
    <script src="{{ asset_url('js/sidemenu.js') }}"></script>

    <script src="{{ asset_url('js/select2.full.min.js') }}"></script>
    <script src="{{ asset_url('js/notifIt.js') }}"></script>

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

    <!-- Custom js-->
    <script src="{{ asset_url('js/theme.js') }}"></script>
    <script src="{{ asset_url('js/confetti.min.js') }}"></script>
    <script src="{{ asset_url('js/jquery.sweet-modal.min.js') }}"></script>
    <script src="{{ asset_url('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset_url('js/interactive.v0.0.2.js') }}"></script>
    <script src="{{ asset_url('js/intro.js') }}"></script>
    @if(isset($js_files))
        @foreach ($js_files as $key => $js_value)
            <script src="{{ asset_url($js_value) }}"></script>
        @endforeach
    @endif
    <script src="{{ asset_url('js/student/modules/'.strtolower($controller).'.js') }}"></script>

    <script src="{{ asset_url('js/student/custom.js') }}"></script>

    <script>
            var message = '';
            var type = '';
            @if(Session::has('success'))
                message = "<?php echo Session::get('success'); ?>";
                type    = "success";
                // console.log("asdasd");
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
