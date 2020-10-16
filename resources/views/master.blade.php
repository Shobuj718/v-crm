
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/adminlte/') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('/adminlte/') }}/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- daterange picker -->
  <!-- <link rel="stylesheet" href="{{ asset('/adminlte/') }}/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="{{ asset('/adminlte/') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('/adminlte/') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="{{ asset('/adminlte/') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->

  <!-- Select2 -->
   <!-- <link rel="stylesheet" href="{{ asset('/adminlte/') }}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{ asset('/adminlte/') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"> -->

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  
   
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
  @yield('styles')

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('layouts.header')
  <!-- /.navbar -->  

  <!-- Sidebar -->
  @include('layouts.leftbar')
  <!-- /.sidebar -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        @yield('page-header')
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    @yield('content')
      
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('layouts.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

 <script src="{{ asset('/adminlte/') }}/plugins/jquery/jquery.min.js"></script>
<script src="{{ asset('/adminlte/') }}/plugins/select2/js/select2.full.min.js"></script>
<!-- <script src="{{ asset('/adminlte/') }}/plugins/moment/moment.min.js"></script> -->
<!-- <script src="{{ asset('/adminlte/') }}/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="{{ asset('/adminlte/') }}/plugins/daterangepicker/daterangepicker.js"></script>
<script src="{{ asset('/adminlte/') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>-->

<script src="{{ asset('/adminlte/') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 


<script src="{{ asset('/adminlte/') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ asset('/adminlte/') }}/plugins/jquery-validation/additional-methods.min.js"></script>
 <script src="{{ asset('/adminlte/') }}/dist/js/adminlte.min.js"></script>
<script src="{{ asset('/adminlte/') }}/dist/js/demo.js"></script>



@yield('scripts')

</body>
</html>
