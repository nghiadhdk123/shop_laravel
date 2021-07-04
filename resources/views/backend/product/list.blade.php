@extends("backend.layoutss.master")

@section('content-header')
   <!-- Content Header -->
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh mục sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Trang chủ</a></li>
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
                        <h3 class="card-title">Danh mục sản phẩm</h3>
                        
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
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $key)
                            <tr>
                                <td>{{ $key->id }}</td>
                                <td>
                                    <a href="{{ route('frontend.show',$key->id) }}">{{ $key->name }} </a>
                                </td>
                                <td>
                                    @if(count($key->images) > 0 && $key->images)
                                        <img src="{{ $key->images[0]->image_url }}" alt="" width="90px" height="auto">
                                    @else
                                        <p>Không có ảnh</p>
                                    @endif
				                </td>
                                <td>{{ $key->category->name }}</td>
                                <td>{{ $key->status_text }}</td>
                                <td>
                                    <th>
                                        <td><a href="{{ route('product.show' , $key->id) }}" class="btn btn-primary">Xem chi tiết</a></td>
                                        <td>
						                    @can('update',$key)
                                                <a href="{{ route('product.edit', $key->id) }}" class="btn btn-warning">Cập nhật</a>
                                            @endcan
					                    </td>
					                    <td>
                                            @if(Illuminate\Support\Facades\Gate::allows('update-user',$key))
                                                <a href="{{ route('product.destroy', $key->id) }}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa ?')">Xóa</a>
                                            @endif
					                    </td>
                                    </th>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
		    <div style="margin: 20px auto">
			    {{ $products->links() }}
		    </div>
		    
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection