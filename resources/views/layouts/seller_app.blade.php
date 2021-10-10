<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<script></script>
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('assets/seller/plugins/fontawesome-free/css/all.min.css') }} ">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="{{ asset('assets/seller/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }} ">
	<!-- iCheck -->
	<link rel="stylesheet" href="{{ asset('assets/seller/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }} ">
	<!-- JQVMap -->
	<link rel="stylesheet" href="{{ asset('assets/seller/plugins/jqvmap/jqvmap.min.css') }} ">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('assets/seller/dist/css/adminlte.min.css') }} ">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="{{ asset('assets/seller/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }} ">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="{{ asset('assets/seller/plugins/daterangepicker/daterangepicker.css') }} ">
	<!-- summernote -->
	<link rel="stylesheet" href="{{ asset('assets/seller/plugins/summernote/summernote-bs4.min.css') }} ">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('assets/seller/plugins/select2/css/select2.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/seller/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

   <link rel="stylesheet" href="{{asset('assets/seller/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">

	<!-- datatables -->
<!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> -->
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->

	@yield('top_scripts')
	@yield('style')
</head>
<!-- <body> -->

	@yield('content')


	<!-- jQuery -->
	<script src="{{ asset('assets/seller/plugins/jquery/jquery.min.js') }} "></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="{{ asset('assets/seller/plugins/jquery-ui/jquery-ui.min.js') }} "></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	$.widget.bridge('uibutton', $.ui.button)
	</script>
	<!-- Bootstrap 4 -->
	<script src="{{ asset('assets/seller/plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
	<!-- ChartJS -->
	<script src="{{ asset('assets/seller/plugins/chart.js/Chart.min.js') }} "></script>
	<!-- Sparkline -->
	<script src="{{ asset('assets/seller/plugins/sparklines/sparkline.js') }} "></script>
	<!-- JQVMap -->
	<script src="{{ asset('assets/seller/plugins/jqvmap/jquery.vmap.min.js') }} "></script>
	<script src="{{ asset('assets/seller/plugins/jqvmap/maps/jquery.vmap.usa.js') }} "></script>
	<!-- jQuery Knob Chart -->
	<script src="{{ asset('assets/seller/plugins/jquery-knob/jquery.knob.min.js') }} "></script>
	<!-- daterangepicker -->
	<script src="{{ asset('assets/seller/plugins/moment/moment.min.js') }} "></script>
	<script src="{{ asset('assets/seller/plugins/daterangepicker/daterangepicker.js') }} "></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="{{ asset('assets/seller/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }} "></script>
	<!-- Summernote -->
	<script src="{{ asset('assets/seller/plugins/summernote/summernote-bs4.min.js') }} "></script>
	<!-- overlayScrollbars -->
	<script src="{{ asset('assets/seller/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }} "></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('assets/seller/dist/js/adminlte.js') }} "></script>
	<!-- AdminLTE for demo purposes -->
	<script src="{{ asset('assets/seller/dist/js/demo.js') }} "></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="{{ asset('assets/seller/dist/js/pages/dashboard.js') }} "></script>
    <!-- Select2 -->
    <script src="{{ asset('assets/seller/plugins/select2/js/select2.full.min.js')}}"></script>

    <script src="{{ asset('assets/seller/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <script>
        $(function () {

          //Initialize Select2 Elements
          $('.select2').select2()

        });
      </script>
	<!-- datatables -->
	 <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
   <!--  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	@yield('bottom_scripts')
</body>
</html>




