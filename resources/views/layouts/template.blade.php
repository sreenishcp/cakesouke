<!DOCTYPE html>
    <!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
    -->
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>CakeSouke App| Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset("/bower_components/bootstrap/dist/css/bootstrap.min.css")}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("/bower_components/font-awesome/css/font-awesome.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset("/bower_components/Ionicons/css/ionicons.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("/bower_components/dist/css/AdminLTE.min.css")}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset("/bower_components/dist/css/skins/_all-skins.min.css")}}">

  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset("/bower_components/jvectormap/jquery-jvectormap.css")}}">
  <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset("/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css")}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset("/bower_components/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}">
   <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

   <!-- REQUIRED JS SCRIPTS -->
<script src="{{ asset("/bower_components/jquery/dist/jquery.min.js")}}"></script>

<!-- Bootstrap 3.3.7 -->
<script src="{{ asset("/bower_components/bootstrap/dist/js/bootstrap.min.js")}}"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset("/bower_components/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}"></script>
<script src="{{ asset("bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}"></script>
    </head>
    <body class="hold-transition skin-blue fixed sidebar-mini" >
    <div class="wrapper">

        <!-- Main Header -->     
        @include('layouts.header')
        <!-- Left side column. contains the logo and sidebar -->
        
     
        @include('layouts.left_menu')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-color:#ffffff">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <!-- Page Header -->
                    <small> {{@$page_title}} </small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                    @if(!empty($breadcrump))
                    @foreach($breadcrump as $key => $bread)
                      <li class="active"><a href="{{url($key)}}">{!!$bread!!}</a></li>
                     @endforeach
                     @endif
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Your Page Content Here -->
                 @yield('content')
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

       @include('layouts.footer')

    </div><!-- ./wrapper -->

<!-- Slimscroll -->
<script src="{{ asset("/bower_components/jquery-slimscroll/jquery.slimscroll.min.js")}}"></script>
<!-- FastClick -->
<script src="{{ asset("/bower_components/fastclick/lib/fastclick.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("/bower_components/dist/js/adminlte.min.js")}}"></script>
<script src="{{ asset("/bower_components/dist/js/demo.js")}}"></script>

    </body>
</html>