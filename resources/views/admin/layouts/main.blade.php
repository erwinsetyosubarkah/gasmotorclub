@php
    $site_profile = App\Models\Profile::first();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $site_profile->club_name_abbreviation }} | {{ $page_title }}</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('storage/'. $site_profile->club_logo) }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/') }}vendor/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/') }}vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}vendor/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}vendor/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('/') }}vendor/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('/') }}vendor/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('/') }}vendor/adminlte/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/') }}vendor/adminlte/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('/') }}vendor/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('/') }}vendor/adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('/') }}vendor/adminlte/plugins/summernote/summernote-bs4.min.css">


</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
      @include('admin.partials.navbar')    
      @include('admin.partials.sidebar') 
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">   
          @include('admin.partials.header') 
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <div class="card card-secondary">                  
                <div class="card-header">
                  <h3>Halaman {{ $page_title }}</h3>
                </div>         
                <div class="card-body">
                  @yield('content')                
                </div>
                <!-- /.card-body -->
              </div>
            </div>
          </section>
          <!-- end main content -->
        </div>

        <footer class="main-footer">
          <strong>{{ $site_profile->club_name }} - Copyright &copy; 2014-2021.</strong>
          All rights reserved.          
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{ asset('/') }}vendor/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('/') }}vendor/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/') }}vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('/') }}vendor/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}vendor/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}vendor/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/') }}vendor/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}vendor/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('/') }}vendor/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}vendor/adminlte/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('/') }}vendor/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('/') }}vendor/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('/') }}vendor/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('/') }}vendor/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('/') }}vendor/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('/') }}vendor/adminlte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('/') }}vendor/adminlte/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('/') }}vendor/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('/') }}vendor/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('/') }}vendor/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('/') }}vendor/adminlte/plugins/moment/moment.min.js"></script>
<script src="{{ asset('/') }}vendor/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('/') }}vendor/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('/') }}vendor/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('/') }}vendor/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/') }}vendor/adminlte/dist/js/adminlte.js"></script>


<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('/') }}vendor/adminlte/dist/js/pages/dashboard.js"></script>
@include('sweetalert::alert')
<script src="{{ asset('/') }}vendor/sweetalert/sweetalert.all.js"></script>
<script src="{{ asset('/') }}vendor/ckeditor5/ckeditor.js"></script>
<script>
    $(document).ready(function () {      
        ClassicEditor
          .create( document.querySelector( '.ckeditor' ), {
            // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
          } )
          .then( editor => {
            window.editor = editor;
          } )
          .catch( err => {
            console.error( err.stack );
          } );
    });

    function previmg(src){
            var modal;

            function removeModal() {
                modal.remove();
                $('body').off('keyup.modal-close');
            }
            modal = $('<div>').css({
                background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
                backgroundSize: 'contain',
                width: '100%',
                height: '100%',
                position: 'fixed',
                zIndex: '10000',
                top: '0',
                left: '0',
                cursor: 'zoom-out'
            }).click(function() {
                removeModal();
            }).appendTo('body');
            //handling ESC
            $('body').on('keyup.modal-close', function(e) {
                if (e.key === 'Escape') {
                removeModal();
                }
            });
        }
</script>
@yield('script') 

</body>
</html>
