@extends("backend.layoutss.master")

@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách sản phẩm của người dùng</h1>
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
                        <h3 class="card-title">Sản phẩm của người dùng</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Hãng máy</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
			    		@if(count($showProducts) == 0)
					    <td colspan="5"> <p style="text-align:center;color:gray"> Hiện người dùng này chưa có sản phẩm </p> </td>
					@else
						@foreach($showProducts as $key)
						<tr>
							<td>{{ $key->id }}</td>
							<td>{{ $key->name }}</td>
							<td>{{ $key->category->name }}</td>
							<td>
								@if(count($key->images) > 0  && $key->images )
								<img src="{{ $key->images[0]->image_url }}" alt="" width="90px" height="auto">
								@else
								<img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fkienxuong.thaibinh.gov.vn%2Fcong-dan%2Fchinh-sach-xa-hoi&psig=AOvVaw1SVPEDmSTo3dtD8LeMawKI&ust=1624805261188000&source=images&cd=vfe&ved=0CAoQjRxqFwoTCLDf97PFtfECFQAAAAAdAAAAABAJ" alt="" width="90px" height="auto">
								@endif
							</td>
							<td>{{ $key->status_text }}</td>
						</tr>
						@endforeach
					@endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
		<a href="{{ route('user.index') }}" class="btn btn-primary" style="display:block;width:150px;margin:5% auto">Back</a>
            </div>
        </div>
        <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
@endsection