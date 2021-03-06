@extends("backend.layoutss.master")

@section('content-header')
    <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Trang Chủ</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Bảng điều khiển</li>
                        </ol>
                    </div><!-- /.col -->
                </div>
            </div>
        </div>
@endsection

@section('main-content')
    <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ count($order) }}</h3>

                                <p>Đơn hàng bán ra</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ count($products) }}</h3>

                                <p>Sản phẩm</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ count($user) }}</h3>
                                <p>Người dùng</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>
                                    @php
                                        $tong=0;
                                        foreach($order as $value)
                                        {
                                            $tong+=$value->total;
                                        }
                                        echo number_format($tong);
                                    @endphp
                                </h3>

                                <p>Doanh thu</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>

                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Sản phẩm mới nhập</h3>
                               
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                        <form action="{{ route('product.search') }}" method="GET" style="display:flex">
                                        @csrf
                                            <input type="text" name="name" class="form-control float-right" placeholder="Tìm kiếm" value="{{ Request()->get('name') }}">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>

                                    <div class="card-tools" style="margin-right: 1%;">
                                        <div class="input-group input-group-sm" style="width: 225px;">
                                        <form action="{{ route('product.searchcategory') }}" method="GET" style="display:flex">
                                        @csrf
                                            <select name="category_id" id="" class="form-control select2" style="width: 100%;">
                                                <option value="#" selected="selected" disabled="disabled">Tìm theo hãng máy</option>
                                                @foreach($category as $key => $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 225px; ">
                                        <form action="{{ route('product.searchstatus') }}" method="GET" style="display:flex">
                                        @csrf
                                            <select name="status" id="" class="form-control select2" style="width: 75%;">
                                                <option value="#" selected="selected" disabled="disabled">Tìm theo trạng thái</option>
                                                @foreach(App\Models\Product::$status_text as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div>

                                </div>
                            
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th style="width:160px">Mã sản phẩm</th>
                                        <th style="text-align:center">Tên sản phẩm</th>
                                        <th style="width:160px;text-align:center">Hãng máy</th>
                                        <th style="text-align:center">Ảnh mô tả</th>
                                        <th style="text-align:center">Giá</th>
                                        <th style="text-align:center">Trạng thái</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    @foreach($product as $value)
                                    <tr>
                                        <td style="text-align:center">{{ $value->id }}</td>
                                        <td style="text-align:center">{{ $value->name }}</td>
                                        <td style="text-align:center">{{ $value->category->name }}</td>
                                        <td style="text-align:center">
                                            @if(count($value->images) > 0)
                                                <img src="{{ $value->images[0]->image_url }}" alt="" width="90px" height="auto">
                                            @endif
                                        </td>
                                        <td style="width:160px;text-align:center">
                                            {{ number_format($value->price_sales) }} VNĐ
                                        </td>
                                        <td style="width:100px;text-align:center">
                                            {{ $value->status_text }}
                                        </td>
                                        <td>
                                            <th>
                                               <td style="width:115px">
                                                    <!-- @if(Illuminate\Support\Facades\Gate::allows('update-product',$value))
                                                        <a href="{{ route('product.edit', $value->id) }}" class="btn btn-warning">Update</a>
                                                    @endif -->

                                                    @can('update',$value)
                                                        <a href="{{ route('product.edit', $value->id) }}" class="btn btn-warning">Cập nhật</a>
                                                    @endcan
                                               </td>
                                               <td>
                                                    @if(Illuminate\Support\Facades\Gate::allows('delete-product',$value))
                                                        <a href="{{ route('product.destroy', $value->id) }}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa ?')">Xóa</a>
                                                    @endif
                                               </td>
                                            </th>
                                        </td>
                                        <td  style="width:150px">
                                            <a href="{{ route('product.show', $value->id) }}" class="btn btn-primary">Xem chi tiết</a>
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
            </div>
        </section>
@endsection







