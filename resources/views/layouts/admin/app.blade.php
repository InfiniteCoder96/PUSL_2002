<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RCSM v1.0.0</title>


    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('dist/img/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('dist/img/favicon.png')}}">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/skin-blue.min.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/pace/pace.min.css')}}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>


        .was-validated .form-control:invalid,
        .form-control.is-invalid {
            border-color: #e3342f;
            padding-right: calc(1.6em + 0.75rem);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='none' stroke='%23e3342f' viewBox='0 0 12 12'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23e3342f' stroke='none'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.4em + 0.1875rem) center;
            background-size: calc(0.8em + 0.375rem) calc(0.8em + 0.375rem);
        }

        .was-validated .form-control:invalid:focus,
        .form-control.is-invalid:focus {
            border-color: #e3342f;
            box-shadow: 0 0 0 0.2rem rgba(227, 52, 47, 0.25);
        }

        .was-validated textarea.form-control:invalid,
        textarea.form-control.is-invalid {
            padding-right: calc(1.6em + 0.75rem);
            background-position: top calc(0.4em + 0.1875rem) right calc(0.4em + 0.1875rem);
        }

        .was-validated .custom-select:invalid,
        .custom-select.is-invalid {
            border-color: #e3342f;
            padding-right: calc(0.75em + 2.3125rem);
            background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right 0.75rem center/8px 10px, url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='none' stroke='%23e3342f' viewBox='0 0 12 12'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23e3342f' stroke='none'/%3e%3c/svg%3e") #fff no-repeat center right 1.75rem/calc(0.8em + 0.375rem) calc(0.8em + 0.375rem);
        }

        .was-validated .custom-select:invalid:focus,
        .custom-select.is-invalid:focus {
            border-color: #e3342f;
            box-shadow: 0 0 0 0.2rem rgba(227, 52, 47, 0.25);
        }

        .was-validated .form-check-input:invalid ~ .form-check-label,
        .form-check-input.is-invalid ~ .form-check-label {
            color: #e3342f;
        }

        .was-validated .form-check-input:invalid ~ .invalid-feedback,
        .was-validated .form-check-input:invalid ~ .invalid-tooltip,
        .form-check-input.is-invalid ~ .invalid-feedback,
        .form-check-input.is-invalid ~ .invalid-tooltip {
            display: block;
        }

        .was-validated .custom-control-input:invalid ~ .custom-control-label,
        .custom-control-input.is-invalid ~ .custom-control-label {
            color: #e3342f;
        }

        .was-validated .custom-control-input:invalid ~ .custom-control-label::before,
        .custom-control-input.is-invalid ~ .custom-control-label::before {
            border-color: #e3342f;
        }

        .was-validated .custom-control-input:invalid:checked ~ .custom-control-label::before,
        .custom-control-input.is-invalid:checked ~ .custom-control-label::before {
            border-color: #e9605c;
            background-color: #e9605c;
        }

        .was-validated .custom-control-input:invalid:focus ~ .custom-control-label::before,
        .custom-control-input.is-invalid:focus ~ .custom-control-label::before {
            box-shadow: 0 0 0 0.2rem rgba(227, 52, 47, 0.25);
        }

        .was-validated .custom-control-input:invalid:focus:not(:checked) ~ .custom-control-label::before,
        .custom-control-input.is-invalid:focus:not(:checked) ~ .custom-control-label::before {
            border-color: #e3342f;
        }

        .was-validated .custom-file-input:invalid ~ .custom-file-label,
        .custom-file-input.is-invalid ~ .custom-file-label {
            border-color: #e3342f;
        }

        .was-validated .custom-file-input:invalid:focus ~ .custom-file-label,
        .custom-file-input.is-invalid:focus ~ .custom-file-label {
            border-color: #e3342f;
            box-shadow: 0 0 0 0.2rem rgba(227, 52, 47, 0.25);
        }




        .valid-feedback {
            display: none;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 80%;
            color: #38c172;
        }

        .valid-tooltip {
            position: absolute;
            top: 100%;
            z-index: 5;
            display: none;
            max-width: 100%;
            padding: 0.25rem 0.5rem;
            margin-top: 0.1rem;
            font-size: 0.7875rem;
            line-height: 1.6;
            color: #fff;
            background-color: rgba(56, 193, 114, 0.9);
            border-radius: 0.25rem;
        }

        .was-validated :valid ~ .valid-feedback,
        .was-validated :valid ~ .valid-tooltip,
        .is-valid ~ .valid-feedback,
        .is-valid ~ .valid-tooltip {
            display: block;
        }

        .was-validated .form-control:valid,
        .form-control.is-valid {
            border-color: #38c172;
            padding-right: calc(1.6em + 0.75rem);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath fill='%2338c172' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.4em + 0.1875rem) center;
            background-size: calc(0.8em + 0.375rem) calc(0.8em + 0.375rem);
        }

        .was-validated .form-control:valid:focus,
        .form-control.is-valid:focus {
            border-color: #38c172;
            box-shadow: 0 0 0 0.2rem rgba(56, 193, 114, 0.25);
        }

        .was-validated textarea.form-control:valid,
        textarea.form-control.is-valid {
            padding-right: calc(1.6em + 0.75rem);
            background-position: top calc(0.4em + 0.1875rem) right calc(0.4em + 0.1875rem);
        }

        .was-validated .custom-select:valid,
        .custom-select.is-valid {
            border-color: #38c172;
            padding-right: calc(0.75em + 2.3125rem);
            background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right 0.75rem center/8px 10px, url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath fill='%2338c172' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e") #fff no-repeat center right 1.75rem/calc(0.8em + 0.375rem) calc(0.8em + 0.375rem);
        }

        .was-validated .custom-select:valid:focus,
        .custom-select.is-valid:focus {
            border-color: #38c172;
            box-shadow: 0 0 0 0.2rem rgba(56, 193, 114, 0.25);
        }

        .was-validated .form-check-input:valid ~ .form-check-label,
        .form-check-input.is-valid ~ .form-check-label {
            color: #38c172;
        }

        .was-validated .form-check-input:valid ~ .valid-feedback,
        .was-validated .form-check-input:valid ~ .valid-tooltip,
        .form-check-input.is-valid ~ .valid-feedback,
        .form-check-input.is-valid ~ .valid-tooltip {
            display: block;
        }

        .was-validated .custom-control-input:valid ~ .custom-control-label,
        .custom-control-input.is-valid ~ .custom-control-label {
            color: #38c172;
        }

        .was-validated .custom-control-input:valid ~ .custom-control-label::before,
        .custom-control-input.is-valid ~ .custom-control-label::before {
            border-color: #38c172;
        }

        .was-validated .custom-control-input:valid:checked ~ .custom-control-label::before,
        .custom-control-input.is-valid:checked ~ .custom-control-label::before {
            border-color: #5cd08d;
            background-color: #5cd08d;
        }

        .was-validated .custom-control-input:valid:focus ~ .custom-control-label::before,
        .custom-control-input.is-valid:focus ~ .custom-control-label::before {
            box-shadow: 0 0 0 0.2rem rgba(56, 193, 114, 0.25);
        }

        .was-validated .custom-control-input:valid:focus:not(:checked) ~ .custom-control-label::before,
        .custom-control-input.is-valid:focus:not(:checked) ~ .custom-control-label::before {
            border-color: #38c172;
        }

        .was-validated .custom-file-input:valid ~ .custom-file-label,
        .custom-file-input.is-valid ~ .custom-file-label {
            border-color: #38c172;
        }

        .was-validated .custom-file-input:valid:focus ~ .custom-file-label,
        .custom-file-input.is-valid:focus ~ .custom-file-label {
            border-color: #38c172;
            box-shadow: 0 0 0 0.2rem rgba(56, 193, 114, 0.25);
        }

        .invalid-feedback {
            display: none;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 80%;
            color: #e3342f;
        }

        .invalid-tooltip {
            position: absolute;
            top: 100%;
            z-index: 5;
            display: none;
            max-width: 100%;
            padding: 0.25rem 0.5rem;
            margin-top: 0.1rem;
            font-size: 0.7875rem;
            line-height: 1.6;
            color: #fff;
            background-color: rgba(227, 52, 47, 0.9);
            border-radius: 0.25rem;
        }

        .was-validated :invalid ~ .invalid-feedback,
        .was-validated :invalid ~ .invalid-tooltip,
        .is-invalid ~ .invalid-feedback,
        .is-invalid ~ .invalid-tooltip {
            display: block;
        }


        #notification {
            position: absolute;
            bottom: 0;
            right: 0;
        }

        .show{
            display: block;
        }

        .hide{
            display: none;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice{
            outline-color: red;
            background-color: #007bff;
            color:white;
        }
    </style>

</head>
<!--

-->
<body class="hold-transition skin-blue sidebar-mini fixed">

<div class="wrapper">

    <!-- Main Header -->
@include('admin.includes.header')
<!-- Left side column. contains the logo and sidebar -->
@include('admin.includes.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @yield('page-header')

    <!-- Main content -->
        <section class="content container-fluid">

            @yield('content')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
@include('admin.includes.footer')

<!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->


<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<!-- Select2 -->
<script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>

<!-- FastClick -->
<script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS -->
<!-- jvectormap  -->
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!--Data tables -->
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script src="{{asset('bower_components/PACE/pace.min.js')}}"></script>

<script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>


<script src="{{asset('plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>

<script src="{{asset('bower_components/chart.js/Chart.js')}}"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>

@yield('scripts')
<script>

    $(document).ajaxStart(function() { Pace.restart(); });


    var url = window.location;

    // for sidebar menu entirely but not cover treeview
    $('ul.sidebar-menu a').filter(function() {
        return this.href != url;
    }).parent().removeClass('active');

    // for sidebar menu entirely but not cover treeview
    $('ul.sidebar-menu a').filter(function() {
        return this.href == url;
    }).parent().addClass('active');

    // for treeview
    $('ul.treeview-menu a').filter(function() {

        return this.href == url;
    }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
</script>
</body>
</html>
