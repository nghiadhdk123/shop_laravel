@extends('frontend.layoutss.master')

@section('title')
      Computer and Iphone WibuShop
@endsection

@section('main-content')
      <div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
        <!-- Xuat ra 4 san pham moi nhat -->
         @foreach($products as $val)
            <li>
              <img src="/frontend/dist/img/h4-slide.png" alt="Slide">
              <div class="caption-group">
                <h2 class="caption title">
                  iPhone <span class="primary">6 <strong>Plus</strong></span>
                </h2>
                <h4 class="caption subtitle">Dual SIM</h4>
                <a class="caption button-radius" href="{{ $val->id }}"><span class="icon"></span>Shop now</a>
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
                            <img src="/frontend/dist/img/product-2.jpg" alt="">
                        </div>
                        <h2><a href="">{{ $value->name }}</a></h2>
                        <div class="product-carousel-price">
                            <ins>$899.00</ins> <del>$999.00</del>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{ $value->id }}">View detail</a>
                        </div>                       
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <!-- end -->
@endsection


