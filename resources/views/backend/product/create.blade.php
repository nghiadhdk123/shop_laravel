@extends("backend.layoutss.master")

@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tạo sản phẩm</h1>
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
                        <h3 class="card-title">Tạo sản phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                   <form role="form" method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
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
                <input type="text" name="name" class="form-control" id="" placeholder="Điền tên sản phẩm" value="{{ old('name') }}">
                @error('name')
                    <div class="alert alert-danger alert_tb">{{ $message }}</div>
                @enderror
                <!-- <input type="hidden" name="user_id" class="form-control" value=""> -->
            </div>
            <div class="form-group">
                <label>Danh mục sản phẩm</label>
                <select name="category_id" class="form-control select2" style="width: 100%;">
                    <option>--Chọn danh mục---</option>
                    @foreach($category as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Giá gốc</label>
                        <input type="text" name="origin_price" class="form-control" placeholder="Điền giá gốc"  value="{{ old('origin_price') }}">
                        @error('origin_price')
                            <div class="alert alert-danger alert_tb">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Giá bán</label>
                        <input type="text" name="price_sales" class="form-control" placeholder="Điền giá gốc"  value="{{ old('price_sales') }}">
                        @error('price_sales')
                            <div class="alert alert-danger alert_tb">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                <textarea class="textarea" name="content" placeholder="Place some text here"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image[]" id="uploadFile" multiple>
                        <label class="custom-file-label" for="exampleInputFile">Chọn ảnh</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                    </div>
                </div>
                <div class="gallery" style="display: flex; flex-wrap: wrap;"></div>
            </div>
             @error('image')
                            <div class="alert alert-danger alert_tb">{{ $message }}</div>
             @enderror

            <div id="clone">
                <label for="">Thông số kỹ thuật</label>
                <span id="tes" class="btn btn-sm btn-warning">Thêm</span>

            </div>

            <div class="form-group">
                <label>Trạng thái sản phẩm</label>
                <select name="status" class="form-control select2" style="width: 100%;">
                    <option>--Chọn trạng thái---</option>
                        @foreach(App\Models\Product::$status_text as $key => $value)
                            <option value="{{ $key }}"> {{ $value }} </option>
                        @endforeach
                </select>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <a href="{{ route('admin.index') }}" class="btn btn-default">Huỷ bỏ</a>
            <button type="submit" class="btn btn-success">Tạo mới</button>
        </div>
</form>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
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
