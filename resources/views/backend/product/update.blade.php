@extends("backend.layoutss.master")

@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Update sản phẩm</h1>
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
                <input type="text" name="name" class="form-control" id="" placeholder="Điền tên sản phẩm" value="{{ $product->name }}">
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
                        <input type="file" class="custom-file-input" name="image[]" id="exampleInputFile" multiple value="{{ Illuminate\Support\Facades\Storage::url($product->path) }}">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                    </div>
                </div>
            </div>
            @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div id="clone">
                <label for="">Thông số kỹ thuật</label>
                    <span id="tes" class="btn btn-sm btn-warning">Thêm</span>
                        @if(!empty($product->content_more_json))
                            @php
                                $i = 0;
                            @endphp
                            @foreach($product->content_more_json as $key => $value)
                                @php
                                    $i++;
                                @endphp
                                    <div class="row" id="row{{ $i }}">
                                        <div class="col-4 col-lg-2">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="" name="key[]"
                                                           value="{{ $key }}">
                                            </div>
                                        </div>
                                        <div class="col-8 col-lg-10">
                                            <div class="form-group" style="position: relative;">
                                                <input type="text" class="form-control" id="" name="val[]"
                                                           value="{{ $value }}">
                                                <span
                                                        class="btn btn-sm btn-danger closee d-flex align-items-center justify-content-center"
                                                        id="{{ $i }}"
                                                        style="position: absolute; right: 0; top: 0; height: 100%; cursor: pointer;">Close</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
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

<script>
            $(document).ready(function () {
                @if(!empty($product->content_more_json))
                var i = {{ count($product->content_more_json) }};
                @else
                var i = 0;
                @endif
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
