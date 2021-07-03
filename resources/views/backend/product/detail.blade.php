@extends("backend.layoutss.master")

@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
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
                        <h3 class="card-title">Chi tiết sản phẩm</h3>

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
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Hãng máy</th>
                                <th>Giá gốc</th>
                                <th>Giá bán</th>
                                <th>Trạng thái</th>
                                <th>Người tạo sản phẩm</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name}}</td>
                                <td>
					@if(count($product->images) > 0 && $product->images)
						<img src="{{ $product->images[0]->image_url }}" alt="" width="90px" height="auto">
					@else
						<p>NULL</p>
					@endif
				</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ number_format($product->origin_price) }} VNĐ</td>
                                <td>{{ number_format($product->price_sales) }} VNĐ</td>
                                <td>{{ $product->status_text }}</td>
                                <td>{{ $product->user->name }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
		<a href="{{ route('admin.index') }}" class="btn btn-primary" style="display:block;width:150px;margin:5% auto">Back</a>
            </div>
        </div>
        <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
@endsection
