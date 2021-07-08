@extends('frontend.layoutss.master')

@section('main-content')
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Theo dõi đơn hàng</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
    
@include('sweetalert::alert')
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
	@if(count($order) == 0)
		<p id="tbdh">Hiện tại chưa có đơn hàng nào được đặt!!</p>
	@else
	@foreach($order as $value)
            <div class="row">
		    <h2>Tên đơn hàng : {{ $value->product->name }}</h2>
                <div class="col-md-12" style="display:flex;justify-content: center;align-items: center;border-bottom: 2px solid black;margin-bottom: 5%;padding-bottom: 5%;">
		
		<div class="khung_fl1">
			<i class="fa fa-clipboard icon_fl"></i>
			@if($value->status == 1)
				<p class="tron" style="background:green"></p>
			@else
				<p class="tron"></p>
			@endif
			
			<p class="text_fl">Đang xác nhận đơn hàng</p>
		</div>

		<div class="khung_fl1">
			<i class="fa fa-cube icon_fl"></i> 
			@if($value->status == 2)
				<p class="tron" style="background:green"></p>
			@else
				<p class="tron"></p>
			@endif
			<p class="text_fl">Đang lấy hàng</p>
		</div>

		<div class="khung_fl1">
			<i class="fa fa-bicycle icon_fl"></i>
			@if($value->status == 3)
				<p class="tron" style="background:green"></p>
			@else
				<p class="tron"></p>
			@endif
			<p class="text_fl">Đang vận chuyển</p>
		</div>

		<div class="khung_fl2">
			<i class="fa fa-check-circle icon_fl"></i>
			@if($value->status == 4)
				<p class="tron" style="background:green"></p>
			@else
				<p class="tron"></p>
			@endif
			<p class="text_fl">Giao hàng thành công</p>
		</div>
		<div class="required_cancel">
			@if($value->status == 1 || $value->status == 2)
		      		<a href="{{ route('product.cancel',$value->id) }}" class="btn btn-danger">Yêu cầu hủy đơn</a>
			@endif
			@if($value->status == 5)
				<p class="btn btn-danger">Đang yêu cầu hủy đơn</p>
			@endif
	    	</div>
            </div>
	    
	@endforeach
	@endif
            </div>
        </div>
    </div>
@endsection