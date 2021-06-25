@extends("backend.layoutss.master")

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tạo mới người dùng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
                    <li class="breadcrumb-item active">Tạo mới</li>
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
                        <h3 class="card-title">Tạo mới người dùng</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
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
                                <label for="exampleInputEmail1">Tên</label>
                                <input type="text" class="form-control" name="name" id="" placeholder="Tên người dùng" value="{{ old('name') }}">
                            </div>
			    @error('name')
                    		<div class="alert alert-danger alert_tb">{{ $message }}</div>
                	    @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control" name="email" id="" placeholder="Email" value="{{ old('email') }}">
                            </div>
			    @error('email')
                    		<div class="alert alert-danger alert_tb">{{ $message }}</div>
                	    @enderror
			    <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu</label>
                                <input type="password" class="form-control" name="password" id="" placeholder="Mật khẩu">
                            </div>
			    @error('password')
                    		<div class="alert alert-danger alert_tb">{{ $message }}</div>
                	    @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" id="">
                            </div>
			    @error('phone')
                    		<div class="alert alert-danger alert_tb">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" id="">
                            </div>
			    @error('address')
                    		<div class="alert alert-danger alert_tb">{{ $message }}</div>
                	    @enderror
			    <div class="form-group">
                    		<select name="role" id="" class="form-control">
			       		<option value="#" disabled="disabled" selected="selected">Quyền của người dùng</option>
					<option value="1">1-User</option>				
					<option value="2">2-Admin</option>				
					<option value="3">3-Boss</option>				
			       </select>
                    </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ route('user.index') }}" class="btn btn-danger">Huỷ tạo mới</a>
                            <button type="submit" class="btn btn-sucess">Tạo mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection