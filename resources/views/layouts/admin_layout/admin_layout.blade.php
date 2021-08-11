<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Shopping Onlie | Dashboard</title>
  <link rel="icon" href="{{ url ( 'images/admin_images/AdminLTELogo.png')}}" type="image/png" sizes="16x16">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url ('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url ('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url ( 'css/admin_css/adminlte.min.css')}}">

  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ url ('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
   <!-- Select2 -->
   <link rel="stylesheet" href="{{ url ('plugins/select2/css/select2.min.css')}}">
  
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ url ( 'images/admin_images/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  @include('layouts.admin_layout.admin_header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.admin_layout.admin_sidebar')

  @yield('content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  @include('layouts.admin_layout.admin_footer')
  <!-- Main Footer -->
 
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ url ('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ url ('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url ('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url ( 'js/admin_js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ url ('plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ url ('plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ url ('plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ url ('plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ url ('plugins/chart.js/Chart.min.js') }}"></script>


<!-- DataTables  & Plugins -->
<script src="{{ url ('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url ('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url ('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url ('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ url ('plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ url ('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ url ('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ url ('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ url ('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ url ('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ url ('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ url ('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ url ('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


<!-- AdminLTE for demo purposes -->
<script src="{{ url ( 'js/admin_js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url ( 'js/admin_js/pages/dashboard2.js') }}"></script>
<script src="{{ url ( 'js/admin_js/admin_scripts.js') }}"></script>

<script>
  $(function () {

     //Initialize Select2 Elements
    $('.select2').select2()

    $("#sections").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#sections_wrapper .col-md-6:eq(0)');

    $("#categories").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#categories_wrapper .col-md-6:eq(0)');
  });

</script>
</body>
</html>
