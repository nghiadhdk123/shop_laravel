@extends('frontend.layoutss.master')

@section('main-content')

      <div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
        <!-- Xuat ra 4 san pham moi nhat -->
         @foreach($products as $value)
            <li style=>
                @if(count($value->images) > 0 && $value->images)
                    <img src="{{ $value->images[0]->image_url }}" alt="" style ="width:300px; height:300px;margin-left: 15%">
                @else
                    <img src="https://cdn.tgdd.vn/Products/Images/42/228967/samsung-galaxy-a52-8gb-256gb-thumb-violet-600x600-200x200.jpg" style ="width:300px; height:300px;margin-left: 15%" alt="">
                @endif
              <div class="caption-group">
                <h2 class="caption title">
                <span class="primary"><strong>{{ $value->name }}</strong></span>
                </h2>
                <h4 class="caption subtitle">{{ $value->category->name }}</h4>
                <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
              </div>
					  </li>
          @endforeach
        
				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>30 Days return</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Free shipping</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Secure payments</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>New products</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- starts -->
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
            @foreach($all_pr as $key => $value)
                  <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            @if(count($value->images) > 0 && $value->images)
                                <img src="{{ $value->images[0]->image_url }}" alt="" style ="width:200px; height:200px">
                            @else
                                <img src="https://cdn.tgdd.vn/Products/Images/42/228967/samsung-galaxy-a52-8gb-256gb-thumb-violet-600x600-200x200.jpg" style ="width:200px; height:200px" alt="">
                            @endif
                        </div>
                        <h2><a href="">{{ $value->name }}</a></h2>
                        <div class="product-carousel-price">
                            <ins>{{ number_format($value->price_sales) }} VND</ins> <del>{{ number_format($value->origin_price) }} VND</del>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{ route('add.cart',$value->id) }}">Thêm giỏ hàng</a>
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{ route('frontend.show',$value->id) }}">Xem chi tiết</a>
                        </div>                       
                    </div>
                </div>
            @endforeach
            </div>
            {{ $all_pr->links() }}
        </div>
    </div>
    <!-- end -->
@endsection


