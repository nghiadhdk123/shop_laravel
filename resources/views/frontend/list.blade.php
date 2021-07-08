@extends('frontend.layoutss.master')

@section('main-content')
	<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
		@if(count($product) == 0)
			<p id="tbr">Hiện tại hãng {{ $zolo->name }} chưa có sản phẩm</p>
		@else
			@foreach($product as $key)
				<div class="col-md-3 col-sm-6">
					<div class="single-shop-product">
						<div class="product-upper">
							@if(count($key->images) > 0 && $key->images)
								<img src="{{ $key->images[0]->image_url }}" alt="" style ="width:300px; height:300px">
							@else
								<img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fkienxuong.thaibinh.gov.vn%2Fcong-dan%2Fchinh-sach-xa-hoi&psig=AOvVaw1SVPEDmSTo3dtD8LeMawKI&ust=1624805261188000&source=images&cd=vfe&ved=0CAoQjRxqFwoTCLDf97PFtfECFQAAAAAdAAAAABAJ" style ="width:400px; height:auto" alt="">
							@endif
						</div>
						<h2><a href="{{ route('frontend.show',$key->id) }}">{{ $key->name }}</a></h2>
						<div class="product-carousel-price">
						<ins>{{ number_format($key->price_sales ) }}</ins> <del>{{ number_format($key->origin_price) }}</del>
						</div>  
						
						<div class="product-option-shop">
							<a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{ route('add.cart',$key->id) }}">Thêm giỏ hàng</a>
							<a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{ route('frontend.show',$key->id) }}">Xem chi tiết</a>
						</div>                       
					</div>
				</div>
			@endforeach
		@endif
            </div>
    </div>
@endsection