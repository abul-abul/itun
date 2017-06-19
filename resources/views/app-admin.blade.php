<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Elements Of Nature | Admin Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    {!! HTML::style( asset('assets/admin/plugins/assets/global/plugins/font-awesome/css/font-awesome.min.css')) !!}
    {!! HTML::style( asset('assets/admin/plugins/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')) !!}
    {!! HTML::style( asset('assets/admin/plugins/assets/global/plugins/bootstrap/css/bootstrap.min.css')) !!}
    {!! HTML::style( asset('assets/admin/plugins/assets/global/plugins/uniform/css/uniform.default.css')) !!}
    {!! HTML::style( asset('assets/admin/plugins/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')) !!}
    {!! HTML::style( asset('assets/admin/plugins/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css')) !!}
    {!! HTML::style( asset('assets/admin/plugins/assets/global/plugins/fullcalendar/fullcalendar.min.css')) !!}
    {!! HTML::style( asset('assets/admin/plugins/assets/global/plugins/jqvmap/jqvmap/jqvmap.css')) !!}
    {!! HTML::style( asset('assets/admin/plugins/assets/admin/pages/css/tasks.css')) !!}
    {!! HTML::style( asset('assets/admin/plugins/assets/global/css/components.css')) !!}
    {!! HTML::style( asset('assets/admin/plugins/assets/global/css/plugins.css')) !!}
    {!! HTML::style( asset('assets/admin/plugins/assets/admin/layout/css/layout.css')) !!}
    {!! HTML::style( asset('assets/admin/plugins/assets/admin/layout/css/themes/darkblue.css')) !!}
    {!! HTML::style( asset('assets/admin/plugins/assets/admin/layout/css/custom.css')) !!}

    @yield('style')


</head>

<body class="page-header-fixed page-quick-sidebar-over-content page-style-square">

<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">


        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">


                <li class="dropdown dropdown-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="/assets/admin/images/avatar3_small.jpg"/>
					<span class="username username-hide-on-mobile">
					Admin </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">

                        <li>
                            <a href="{{action('AdminController@getLogout')}}">
                                <i class="icon-key"></i> Log Out </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">

            <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

                @if(isset($activeHome))
                    <li class="start active open">
                @else
                    <li class="start">
                        @endif
                        <a href="javascript:;">
                            <i class="icon-docs"></i>
                            <span class="title">Home</span>
                            <span class="selected"></span>
                            <span class="arrow open"></span>
                        </a>
                        <ul class="sub-menu">
                            @if(isset($activeHome))
                                <li class="active">
                            @else
                                <li>
                                    @endif
                                    <a href="">
                                        Home
                                    </a>
                                </li>


                        </ul>
                    </li>
                    @if(isset($blogactive))
                        <li class="start active open">
                    @else
                        <li class="start">
                            @endif
                            <a href="javascript:;">
                                <i class="icon-docs"></i>
                                <span class="title">Blog</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                @if(isset($blogactive))
                                    <li class="active">
                                @else
                                    <li>
                                        @endif
                                        <a href="{{action('AdminController@getBlog')}}">
                                            Blog
                                        </a>
                                    </li>
                            </ul>
                        </li>


            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            Widget settings form goes here
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn blue">Save changes</button>
                            <button type="button" class="btn default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>



            <div class="row">
                <div class="col-md-12">
                    @yield('admin-content')
                </div>
            </div>








        </div>
    </div>


    <!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner">
        2014 &copy; Metronic by keenthemes.
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>



{!! HTML::script( asset('assets/admin/plugins/assets/global/plugins/jquery.min.js') ) !!}

{!! HTML::script( asset('assets/admin/plugins/assets/global/plugins/jquery-migrate.min.js') ) !!}
{!! HTML::script( asset('assets/admin/plugins/assets/global/plugins/jquery-ui/jquery-ui.min.js') ) !!}
{!! HTML::script( asset('assets/admin/plugins/assets/global/plugins/bootstrap/js/bootstrap.min.js') ) !!}
{!! HTML::script( asset('assets/admin/plugins/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') ) !!}
{!! HTML::script( asset('assets/admin/plugins/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') ) !!}
{!! HTML::script( asset('assets/admin/plugins/assets/global/plugins/jquery.blockui.min.js') ) !!}
{!! HTML::script( asset('assets/admin/plugins/assets/global/plugins/jquery.cokie.min.js') ) !!}
{!! HTML::script( asset('assets/admin/plugins/assets/global/plugins/uniform/jquery.uniform.min.js') ) !!}
{!! HTML::script( asset('assets/admin/plugins/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') ) !!}
{!! HTML::script( asset('assets/admin/plugins/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') ) !!}
{!! HTML::script( asset('assets/admin/plugins/assets/global/plugins/flot/jquery.flot.min.js') ) !!}
{!! HTML::script( asset('assets/admin/plugins/assets/global/plugins/flot/jquery.flot.resize.min.js') ) !!}
{!! HTML::script( asset('assets/admin/plugins/assets/global/plugins/flot/jquery.flot.categories.min.js') ) !!}
{!! HTML::script( asset('assets/admin/plugins/assets/global/plugins/jquery.pulsate.min.js') ) !!}
{!! HTML::script( asset('assets/admin/plugins/assets/global/plugins/bootstrap-daterangepicker/moment.min.js') ) !!}
{!! HTML::script( asset('assets/admin/plugins/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js') ) !!}
{!! HTML::script( asset('assets/admin/plugins/assets/global/plugins/fullcalendar/fullcalendar.min.js') ) !!}
{!! HTML::script( asset('assets/admin/plugins/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') ) !!}
{!! HTML::script( asset('assets/admin/plugins/assets/global/plugins/jquery.sparkline.min.js') ) !!}


{!! HTML::script( asset('assets/admin/plugins/assets/global/scripts/metronic.js') ) !!}
{!! HTML::script( asset('assets/admin/plugins/assets/admin/layout/scripts/layout.js') ) !!}
{!! HTML::script( asset('assets/admin/plugins/assets/admin/layout/scripts/quick-sidebar.js') ) !!}
{!! HTML::script( asset('assets/admin/plugins/assets/admin/layout/scripts/demo.js') ) !!}
{!! HTML::script( asset('assets/admin/plugins/assets/admin/pages/scripts/index.js') ) !!}
{!! HTML::script( asset('assets/admin/plugins/assets/admin/pages/scripts/tasks.js') ) !!}


@yield('script')

{!! HTML::script( asset('assets/admin/js/main.js') ) !!}



<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core componets
        Layout.init(); // init layout
        QuickSidebar.init(); // init quick sidebar
        Demo.init(); // init demo features
        Index.init();
        Index.initDashboardDaterange();
        Index.initJQVMAP(); // init index page's custom scripts
        Index.initCalendar(); // init index page's custom scripts
        Index.initCharts(); // init index page's custom scripts
        Index.initChat();
        Index.initMiniCharts();
        Tasks.initDashboardWidget();
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>