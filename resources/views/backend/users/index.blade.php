@extends("backend.layoutss.master")

@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách người dùng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('main-content')
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách người dùng</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Email</th>
                                <th>Tên</th>
                                <th>Chức vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $vale)
                            <tr>
                                <td>{{ $vale->email }}</td>
                                <td>{{ $vale->name }}</td>
                                <td>
                                    @if($vale->role == 2)
                                        <p style="background: green;
                                                    text-align: center;
                                                    box-shadow: 0px 0px 0px 2px green;
                                                    color: white;
                                                    font-weight: bold;
                                                    margin:0;
                                                    border-radius: 15px;
                                                    border: none;">admin</p>
                                                           
                                    @endif
                                    @if($vale->role == 1)
                                        <p style="background: black;
                                                    text-align: center;
                                                    box-shadow: 0px 0px 0px 2px green;
                                                    color: white;
                                                    font-weight: bold;
                                                    margin:0;
                                                    border-radius: 15px;
                                                    border: none;">user</p>
                                    @endif
                                    @if($vale->role == 3)
                                        <p style="background: red;
                                                    text-align: center;
                                                    box-shadow: 0px 0px 0px 2px green;
                                                    color: white;
                                                    font-weight: bold;
                                                    margin:0;
                                                    border-radius: 15px;
                                                    border: none;">boss</p>
                                    @endif
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="{{ route('user.show',$vale->id) }}" class="btn btn-primary">Xem chi tiết</a>
                                </td>
                                <td>
                                    <a href="{{ route('user.showProducts',$vale->id) }}"  class="btn btn-dark">Các sản phẩm đã tạo</a>
                                </td>
                                <td>
                                   @if($vale->role == 1 || $vale->role == 2)
                                     <th>
                                        <td>
                                            <a href="{{ route('user.pq',$vale->id) }}"  class="btn btn-success mr-2">Phân quyền</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('user.destroy',$vale->id) }}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa ?')">Xóa</a>
                                        </td>
                                    </th>
                                   @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection

@section('title')
    Hello WibuShop
@endsection

<!-- Link CSS -->
@section('css')
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
@endsection

<!-- Link JS - JQuery -->
@section('javascript')
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
@endsection