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
                        <h3 class="card-title">Bảng đánh giá</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th style="text-align:center">Mã sản phẩm</th>
                                <th style="text-align:center">Tên sản phẩm</th>
                                <th style="text-align:center">Mã người đánh giá</th>
                                <th style="text-align:center">Nội dung đánh giá</th>
                                <th style="text-align:center">Số sao đánh giá</th>
                                <th style="text-align:center">Thời gian đánh giá</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rating as $ratings)
                            <tr>
			    	<td style="text-align:center">{{ $ratings->product_id }}</td>
			    	<td style="text-align:center">{{ $ratings->product->name }}</td>
			    	<td style="text-align:center">{{ $ratings->user_id }}</td>
			    	<td style="text-align:center">{{ $ratings->content }}</td>
			    	<td style="text-align:center">
					@php
						$n = $ratings->rating;
						for($i = 1 ; $i <= $n ; $i++)
						{
							echo "<i> &#9733; </i>";
						}
					@endphp
				</td>
			    	<td style="text-align:center">{{ $ratings->created_at }}</td>
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