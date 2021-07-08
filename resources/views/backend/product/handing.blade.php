@extends('backend.layoutss.master')

@section('main-content')
<div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Xử lí đơn hàng</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('product.handing',$order->id) }}">
                    @csrf
                    <div class="form-group">
                    <select name="status" id="" class="form-control">
			       		<option value="{{ $order->status }}" disabled="disabled" selected="selected">{{ $order->status }}</option>
					    @foreach(\App\Models\Order::$status_text as $key => $value)
					    	<option value="{{ $key }}">{{$key}}-{{$value}}</option>
					    @endforeach	
			       </select>
                    </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ route('user.index') }}" class="btn btn-danger">Huỷ bỏ xử lí</a>
                            <button type="submit" class="btn btn-sucess">Xử lí</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection