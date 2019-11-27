<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset ('/AdminLTE-2.4.15/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset ('/AdminLTE-2.4.15/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset ('/AdminLTE-2.4.15/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('/AdminLTE-2.4.15/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset ('/AdminLTE-2.4.15/dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset ('/AdminLTE-2.4.15/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset ('/AdminLTE-2.4.15/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset ('/AdminLTE-2.4.15/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset ('/AdminLTE-2.4.15/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset ('/AdminLTE-2.4.15/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="{{ asset ('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic') }}">
  <script src="{{ asset ('/AdminLTE-2.4.15/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset ('/AdminLTE-2.4.15/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!--  jquery script  -->
<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<!--  validation script  -->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>
 
<!--  jsrender script  -->
<script src="http://cdn.syncfusion.com/js/assets/external/jsrender.min.js"></script>
 
<!-- Essential JS UI widget -->
<script src="http://cdn.syncfusion.com/16.4.0.52/js/web/ej.web.all.min.js"></script>
 
<!--Add custom scripts here -->
 
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset ('/AdminLTE-2.4.15/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset ('/AdminLTE-2.4.15/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset ('/AdminLTE-2.4.15/bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset ('/AdminLTE-2.4.15/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset ('/AdminLTE-2.4.15/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset ('/AdminLTE-2.4.15/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset ('/AdminLTE-2.4.15/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset ('/AdminLTE-2.4.15/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset ('/AdminLTE-2.4.15/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset ('/AdminLTE-2.4.15/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset ('/AdminLTE-2.4.15/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset ('/AdminLTE-2.4.15/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset ('/AdminLTE-2.4.15/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ('/AdminLTE-2.4.15/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset ('/AdminLTE-2.4.15/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset ('/AdminLTE-2.4.15/dist/js/demo.js') }}"></script>
    <title>Home | E-Shopper</title>
    <link href="{{ asset ('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset ('/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset ('/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset ('/css/price-range.css')}}" rel="stylesheet">
    <link href="{{ asset ('/css/animate.css')}}" rel="stylesheet">
	<link href="{{ asset ('/css/main.css')}}" rel="stylesheet">
	<link href="{{ asset ('/css/responsive.css')}}" rel="stylesheet">
     <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset ('/AdminLTE-2.4.15/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::asset('images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::asset('images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::asset('images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::asset('images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
<div class="wrapper">

    <!-- Header -->
    @include('frontend.without_login_header')

    <!-- Sidebar -->

    <!-- Content Wrapper. Contains page content -->
    
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('frontend.footer')

</div>
</body>
    <script src="{{ asset ('jss/js/jquery.js')}}"></script>
	<script src="{{ asset ('jss/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset ('jss/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{ asset ('jss/js/price-range.js')}}"></script>
    <script src="{{ asset ('jss/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{ asset ('jss/js/main.js')}}"></script>
    <script src="{{ asset ('jss/js/jquery.validate.js')}}"></script>
    <script src="{{ asset ('jss/js/main.js')}}"></script>
</html>