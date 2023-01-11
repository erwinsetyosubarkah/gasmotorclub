<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/') }}vendor/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('/') }}vendor/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/') }}vendor/adminlte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
@yield('content')
<!-- jQuery -->
<script src="{{ asset('/') }}vendor/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/') }}vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/') }}vendor/adminlte/dist/js/adminlte.min.js"></script>
@include('sweetalert::alert')
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
</script>
</body>
</html>