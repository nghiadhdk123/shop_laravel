@extends("backend.layoutss.master")

@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Update sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Tạo sản phẩm</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('main-content')
<div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update sản phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                   <form role="form" method="post" action="{{ route('product.update',$product->id) }}" enctype="multipart/form-data">
                    @csrf

                    @if ($errors->any())
                        <!-- <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div> -->
                @endif
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" id="" placeholder="Điền tên sản phẩm" value="{{$product->name}}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <!-- <input type="hidden" name="user_id" class="form-control" value=""> -->
            </div>
            <div class="form-group">
                <label>Danh mục sản phẩm</label>
                <select name="category_id" class="form-control select2" style="width: 100%;">
                    <option value="{{ $product->category->id }}">{{ $product->category->name }}</option>
                    @foreach($category as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Giá gốc</label>
                        <input type="text" name="origin_price" class="form-control" placeholder="Điền giá gốc" value="{{$product->origin_price}}">
                        @error('origin_price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Giá bán</label>
                        <input type="text" name="price_sales" class="form-control" placeholder="Điền giá gốc" value="{{$product->price_sales}}">
                        @error('price_sales')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                <textarea class="textarea" name="content" placeholder="Place some text here"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value="{{ $product->content }}"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image[]" id="exampleInputFile" multiple>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Trạng thái sản phẩm</label>
                <select name="status" class="form-control select2" style="width: 100%;">
                    <option value="{{$product->status}}">
		    	{{ $product->status_text }}
		    </option>
		    @foreach(App\Models\Product::$status_text as $key => $value)
		    		<option value="{{ $key }}">{{ $value }}</option>
		    @endforeach
                       
                </select>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <a href="{{ route('admin.index') }}" class="btn btn-default">Huỷ bỏ</a>
            <button type="submit" class="btn btn-success">Update</button>
        </div>
</form>
                </div>
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