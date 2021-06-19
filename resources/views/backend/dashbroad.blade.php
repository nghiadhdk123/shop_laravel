@extends("backend.layoutss.master")

@section('content-header')
    <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
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
                                <h3>150</h3>

                                <p>Đơn hàng</p>
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
                                <h3>5300</h3>

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
                                <h3>44</h3>

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
                                <h3>65,000,000 </h3>

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
                                        <th>ID</th>
                                        <th>Tên sản phẩm</th>
                                        <th style="width:160px">Hệ điều hành</th>
                                        <th>Ảnh mô tả</th>
                                        <th>Status</th>
                                        <th>Mô tả</th>
                                        <th>User</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($product as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->category->name }}</td>
                                        <td>
                                            @if(count($value->images) > 0)
                                                <img src="{{ $value->images[0]->image_url }}" alt="" width="90px" height="auto">
                                            @endif
                                        </td>
                                        <td style="width:100px">
                                            {{ $value->status_text }}
                                        </td>
                                        <td><span class="tag tag-success">{{ $value->slug }}</span></td>
                                        <td>{{ $value->user->name }}</td>
                                        <td>
                                            <th>
                                               <td>
                                                    <!-- @if(Illuminate\Support\Facades\Gate::allows('update-product',$value))
                                                        <a href="{{ route('product.edit', $value->id) }}" class="btn btn-warning">Update</a>
                                                    @endif -->

                                                    @can('update',$value)
                                                        <a href="{{ route('product.edit', $value->id) }}" class="btn btn-warning">Update</a>
                                                    @endcan
                                               </td>
                                               <td>
                                                    @if(Illuminate\Support\Facades\Gate::allows('delete-product',$value))
                                                        <a href="#" class="btn btn-danger">Delete</a>
                                                    @endif
                                               </td>
                                            </th>
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

@section('title')
    Hello WibuShop
@endsection






