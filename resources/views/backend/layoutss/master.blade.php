<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Computer Shop </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    
    <link rel="stylesheet" href="/backend/style.css">

    <link rel="stylesheet" href="/backend/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/backend/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/backend/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/backend/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/backend/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="/backend/plugins/daterangepicker/daterangepicker.css">
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
        @include('backend.includess.alert')
        @include('sweetalert::alert')
        
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
    <script src="/backend/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/backend/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="/backend/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/backend/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="/backend/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/backend/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/backend/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/backend/plugins/moment/moment.min.js"></script>
    <script src="/backend/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/backend/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/backend/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/backend/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/backend/dist/js/demo.js"></script> 
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script>
            $(document).ready(function () {
                var i = 1;
                $("#tes").click(function () {
                    i++;
                    $('#clone').append('<div class="row" id="row' + i + '">' +
                        '<div class="col-4 col-lg-2"><div class="form-group">' +
                        '<input type="text" class="form-control" id="" name="key[]" value="">' +
                        '</div></div><div class="col-8 col-lg-10">' +
                        '<div class="form-group" style="position: relative;">' +
                        '<input type="text" class="form-control" id="" name="val[]" value="">' +
                        '<span class="btn btn-sm btn-danger closee d-flex align-items-center justify-content-center" id="' + i + '" style="position: absolute; right: 0; top: 0; height: 100%; cursor: pointer;">Close</span>' +
                        '</div></div></div>')
                });
                $(document).on('click', '.closee', function () {
                    var button_id = $(this).attr("id");
                    $('#row' + button_id + '').remove();
                });
            });
        </script>
    <script>

    $(document).ready(function() {

        $('#bam').click(function(){
            $('#khung').slideToggle(200);
        });
});
    
    function previewImages()
    {
        var preview = document.querySelector('.gallery');

        if(this.files)
        {
            [].forEach.call(this.files, readAndPreview);
        }

        function readAndPreview(file)
        {
            if (!/\.(jpe?g|png|gif)$/i.test(file.name))
            {
                return alert(file.name + " is not an image");
            }

            var reader = new FileReader();

            reader.addEventListener("load", function() {
            var image = new Image();
            image.width = 150;
            image.height = 150;
            image.title  = file.name;
            image.src    = this.result;

            preview.appendChild(image);
            });

            reader.readAsDataURL(file);

        }
    }
    document.querySelector('#uploadFile').addEventListener("change", previewImages);
</script>
</body>
</html>