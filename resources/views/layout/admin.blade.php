<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META SECTION -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">




    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->
<title>@yield('title')</title>
    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="{{asset('admin/css/theme-default.css')}}"/>
    <!-- EOF CSS INCLUDE -->
</head>
<body>
<!-- START PAGE CONTAINER -->
<div class="page-container">

@include('layout.backend_sidebar')

    <!-- PAGE CONTENT -->
    <div class="page-content">

    @include('layout.backend_nav')

        <!-- START BREADCRUMB -->

        <!-- END BREADCRUMB -->

        <!-- PAGE CONTENT WRAPPER -->
     @yield('content')
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to log out?</p>
                <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->
@yield('script')
<script src="{{ asset('js/app.js') }}" async defer></script>
<!-- START PRELOADS -->
<audio id="audio-alert" src="{{asset('admin/audio/alert.mp3')}}" preload="auto"></audio>
<audio id="audio-fail" src="{{asset('admin/audio/fail.mp3')}}" preload="auto"></audio>
<!-- END PRELOADS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<script type="text/javascript" src="{{asset('admin/js/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/jquery/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/bootstrap/bootstrap.min.js')}}"></script>
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->
<script type='text/javascript' src="{{asset('admin/js/plugins/icheck/icheck.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/scrolltotop/scrolltopcontrol.js')}}"></script>

<script type="text/javascript" src="{{asset('admin/js/plugins/morris/raphael-min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/morris/morris.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/rickshaw/d3.v3.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/rickshaw/rickshaw.min.js')}}"></script>
<script type='text/javascript' src='{{asset('admin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}'></script>
<script type='text/javascript' src='{{asset('admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}'></script>
<script type='text/javascript' src='{{asset('admin/js/plugins/bootstrap/bootstrap-datepicker.js')}}'></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/owl/owl.carousel.min.js')}}"></script>

<script type="text/javascript" src="{{asset('admin/js/plugins/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- END THIS PAGE PLUGINS-->
<script type="text/javascript" src="{{asset('admin/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<!-- START TEMPLATE -->
<script type="text/javascript" src="{{asset('admin/js/settings.js')}}"></script>

<script type="text/javascript" src="{{asset('admin/js/plugins.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/actions.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/development.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/demo_dashboard.js')}}"></script>
<!-- END TEMPLATE -->
<!-- END SCRIPTS -->
</body>
</html>






