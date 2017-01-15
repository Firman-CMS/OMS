<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="{{ csrf_token() }}" name="csrf-token" />
        <title>OMS | Dashboard</title>

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- jQuery 2.2.0 -->
        {!! Html::script('/js/jQuery/jQuery-2.2.0.min.js') !!}
        <!-- Bootstrap 3.3.6 -->
        {!! Html::style('/css-admin/bootstrap/css/bootstrap.min.css') !!}
        <!-- Font Awesome -->
        {!! Html::style('/css-admin/font-awesome.min.css') !!}
        <!-- Ionicons -->
        {!! Html::style('/css-admin/ionicons.min.css') !!}
        <!-- Theme style -->
        {!! Html::style('/css-admin/AdminLTE.min.css') !!} 
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        {!! Html::style('/css-admin/skins/_all-skins.min.css') !!}
        <!-- iCheck -->
        {!! Html::style('/plugins/iCheck/flat/blue.css') !!} 
        <!-- Morris chart -->
        {!! Html::style('/plugins/morris/morris.css') !!}
        
        {!! Html::style('/js/easyAutoComplete/easy-autocomplete.min.css') !!}
        {!! Html::style('/js/easyAutoComplete/easy-autocomplete.themes.min.css') !!}
        {!! Html::script('/js/easyAutoComplete/jquery.easy-autocomplete.min.js') !!}

        <!-- jvectormap -->
        <!--<link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">-->
        <!-- Date Picker -->
        {!! Html::style('/plugins/datepicker/datepicker3.css') !!} 
        <!-- Daterange picker -->
        {!! Html::style('/plugins/daterangepicker/daterangepicker-bs3.css') !!}
        <!-- bootstrap wysihtml5 - text editor -->
        {!! Html::style('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}

        <!----- FORM ------->
        <!-- iCheck for checkboxes and radio inputs -->
        {!! Html::style('/plugins/iCheck/all.css') !!} 
        <!-- Bootstrap Color Picker -->
        {!! Html::style('/plugins/colorpicker/bootstrap-colorpicker.min.css') !!}
        <!-- Bootstrap time Picker -->
        {!! Html::style('/plugins/timepicker/bootstrap-timepicker.min.css') !!}
        <!-- Select2 -->
        {!! Html::script('/plugins/select2/select2.full.min.js') !!}
        {!! Html::style('plugins/select2/select2.min.css') !!}
        <!--<link rel="stylesheet" href="plugins/select2/select2.min.css">-->
        <!----- FORM ------->

        <!----- TABLE ------->
        <!-- DataTables -->
        {!! Html::style('/plugins/datatables/dataTables.bootstrap.css') !!}
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <!--<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">-->
        <!----- TABLE ------->
        <!----- CALENDER ------->
        <!-- fullCalendar 2.2.5-->
        {!! Html::style('/plugins/fullcalendar/fullcalendar.min.css') !!}
        {!! Html::style('/plugins/timepicker/bootstrap-timepicker.min.css') !!}

        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <!--<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">-->
        <!----- CALENDER ------->


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                @include('oms::layouts.dashboardheader')
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                @include('oms::layouts.menu')
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- /.content-wrapper -->


            <footer class="main-footer">
                @include('oms::layouts.footer')
            </footer>

            <!-- Control Sidebar -->
            <!--  
              <aside class="control-sidebar control-sidebar-dark">
            <?php //include "sidebar2.php"; ?>  
              </aside>
            -->
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->



        <!-- jQuery UI 1.11.4 -->
        {!! Html::script('/js/jQuery/jquery-ui.min.js') !!}
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.6 -->
        {!! Html::script('/css-admin/bootstrap/js/bootstrap.min.js') !!}
        <!-- Morris.js charts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        {!! Html::script('/plugins/morris/morris.min.js') !!}
        <!-- Sparkline -->
        {!! Html::script('/plugins/sparkline/jquery.sparkline.min.js') !!}
        <!-- jvectormap -->
        <!--<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>-->
        <!--<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
        <!-- jQuery Knob Chart -->
        {!! Html::script('/plugins/knob/jquery.knob.js') !!}
        <!-- daterangepicker -->
        {!! Html::script('/js/moment.min.js') !!}
        {!! Html::script('/plugins/daterangepicker/daterangepicker.js') !!}
        <!-- datepicker -->
        {!! Html::script('/plugins/datepicker/bootstrap-datepicker.js') !!}
        <!-- Bootstrap WYSIHTML5 -->
        {!! Html::script('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') !!}
        <!-- Slimscroll -->
        {!! Html::script('/plugins/slimScroll/jquery.slimscroll.min.js') !!}
        <!-- FastClick -->
        <!--<script src="plugins/fastclick/fastclick.js"></script>-->
        <!-- AdminLTE App -->
        {!! Html::script('/js/oms/app.min.js') !!}
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        {!! Html::script('/js/oms/dashboard.js') !!}
        <!-- AdminLTE for demo purposes -->
        <!--<script src="dist/js/demo.js"></script>-->
        <!-- DataTables -->
        {!! Html::script('/plugins/datatables/jquery.dataTables.min.js') !!}
        {!! Html::script('/plugins/datatables/dataTables.bootstrap.min.js') !!}
        <!-- additional yung fei-->
        {!! Html::script('/js/oms/jsFunction.js') !!}
        <!--<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>-->
        <!--{!! Html::script('/js/oms/ckeditor.js') !!}-->
    </body>
</html>
