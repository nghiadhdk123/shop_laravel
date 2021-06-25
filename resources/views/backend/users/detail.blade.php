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
                        <h3 class="card-title">Chi tiết người dùng</h3>

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
                                <th>Email</th>
                                <th>Tên</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Chức vụ</th>
                                <th></th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            
                            <tr>
                                <td>{{ $vale->id }}</td>
                                <td>{{ $vale->email }}</td>
                                <td>{{ $vale->name }}</td>
                                <td>
					@if(!$vale->userinfor->address)
						<p>NULL</p>
					@endif
						{{ $vale->userinfor->address }}
				</td>
                                <td>
					@if(!$vale->userinfor->phone)
						<p>NULL</p>
					@endif
						{{ $vale->userinfor->phone }}
				</td>
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
                            </tr>
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