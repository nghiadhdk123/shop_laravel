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
                        <h3 class="card-title">Bảng quản lí đơn hàng</h3>
                        <div class="card-tools" style="margin-right: 1%;">
                            <div class="input-group input-group-sm" style="width: 225px;">
                                <form action="{{ route('product.searchProduct') }}" method="GET" style="display:flex">
                                @csrf
                                    <select name="status" id="" class="form-control select2" style="width: 100%;">
                                        <option value="#" selected="selected" disabled="disabled">Tìm theo trang thai</option>
                                            @foreach(App\Models\Order::$status_text as $key => $value)
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
                    
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th style="text-align:center">Người mua hàng</th>
                                <th style="text-align:center">Mã sản phẩm</th>
                                <th style="text-align:center">Tên sản phẩm</th>
                                <th style="text-align:center">Số lượng mua</th>
                                <th style="text-align:center">Số điện thoại</th>
                                <th style="text-align:center">Địa chỉ giao hàng</th>
                                <th style="text-align:center">Tổng tiền</th>
                                <th style="text-align:center">Thời gian mua hàng</th>
                                <th style="text-align:center">Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order as $value)
                            <tr>
                                <td style="text-align:center;width:155px;display:inline-block">{{ $value->name }}</td>
                                <td style="text-align:center">{{ $value->product_id }}</td>
                                <td style="text-align:center">{{ $value->product->name }}</td>
                                <td style="text-align:center">{{ $value->qty }}</td>
                                <td style="text-align:center">{{ $value->phone }}</td>
                                <td style="text-align:center">{{ $value->address }}</td>
                                <td style="text-align:center">{{ $value->total }}</td>
                                <td style="text-align:center">{{ $value->created_at }}</td>
                                <td>
                                    @if($value->status == 1)
                                        <p style="text-align:center;width:155px;display:inline-block;background: black;
                                                                                                height: 30px;
                                                                                                line-height: 30px;
                                                                                                padding: 0;
                                                                                                margin-top: 3%;
                                                                                                color: white;
                                                                                                font-weight: bold;">{{ $value->status_text }}</p>
                                    @elseif($value->status ==2)
                                        <p style="text-align:center;width:155px;display:inline-block;background: blue;
                                                                                                height: 30px;
                                                                                                line-height: 30px;
                                                                                                padding: 0;
                                                                                                margin-top: 3%;
                                                                                                color: white;
                                                                                                font-weight: bold;">{{ $value->status_text }}</p>
                                    @elseif($value->status ==3)
                                        <p style="text-align:center;width:155px;display:inline-block;background: orange;
                                                                                                height: 30px;
                                                                                                line-height: 30px;
                                                                                                padding: 0;
                                                                                                margin-top: 3%;
                                                                                                color: white;
                                                                                                font-weight: bold;">{{ $value->status_text }}</p>
                                    @elseif($value->status == 4)
                                        <p style="text-align:center;width:155px;display:inline-block;background: green;
                                                                                                height: 30px;
                                                                                                line-height: 30px;
                                                                                                padding: 0;
                                                                                                margin-top: 3%;
                                                                                                color: white;
                                                                                                font-weight: bold;">{{ $value->status_text }}</p>
                                    @else
                                        <p style="text-align:center;width:155px;display:inline-block;background: red;
                                                                                                height: 30px;
                                                                                                line-height: 30px;
                                                                                                padding: 0;
                                                                                                margin-top: 3%;
                                                                                                color: white;
                                                                                                font-weight: bold;">{{ $value->status_text }}</p>
                                    @endif
                                    
                                </td>
                                <td>
                                    @if($value->status == 1 || $value->status == 2 || $value->status == 3)
                                        <a href="{{ route('product.formhanding',$value->id) }}" class="btn btn-primary" style="width:100px">Xử lí đơn</a>
                                    @endif
                                    @if($value->status == 5)
                                        <a href="{{ route('product.check',$value->id) }}" class="btn btn-primary"> <i class="fa fa-check"></i> </a>
                                        <a href="{{ route('product.destroyCart',$value->id) }}" class="btn btn-danger"> <i class="fa fa-ban"></i> </a>
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