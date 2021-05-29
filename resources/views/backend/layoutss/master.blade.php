<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title') </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->

    @yield('css')
    
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    @include('backend.includess.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('backend.includess.sidebar')
    

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
        <!-- /.content-header -->
        @yield('content-header')
      
        <!-- Main content -->
        @yield('main-content')
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2019 <a href="#">Zent</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0
        </div>
    </footer>
        <!-- @yield('content-footer') -->
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
@yield('javascript')
</body>
</html>