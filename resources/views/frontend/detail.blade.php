@extends('frontend.layoutss.master')

@section('main-content')
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
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Tìm kiếm</h2>
                        <form action="">
                            <input type="text" placeholder="Tìm kiếm sản phẩm">
                            <input type="submit" value="Tìm kiếm">
                        </form>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Sản phẩm liên quan</h2>
                        @foreach($product_category as $value)
                            <div class="thubmnail-recent">
                                @if(count($value->images) > 0)
                                    <img src="{{ $value->images[0]->image_url }}" class="recent-thumb" alt="">
                                @endif
                                <h2><a href="{{ route('frontend.show',$value->id) }}">{{ $value->name }}</a></h2>
                                <div class="product-sidebar-price">
                                    <ins>{{ number_format($value->price_sales) }} VNĐ</ins> <del>{{ number_format($value->origin_price) }} VNĐ</del>
                                </div>                             
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        @if(count($product->images) > 0 && $product->images)
                                            <img src="{{ $product->images[0]->image_url }}" alt="" style ="width:400px; height:auto">
                                        @else
                                            <img src="https://cdn.tgdd.vn/Products/Images/42/228967/samsung-galaxy-a52-8gb-256gb-thumb-violet-600x600-200x200.jpg" style ="width:400px; height:auto" alt="">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">{{ $product->name }}</h2>
                                    <div class="product-inner-price">
                                        <ins>{{ number_format($product->price_sales) }} VNĐ</ins> <del>{{ number_format($product->origin_price) }} VNĐ</del>
                                    </div>    
                                    
                                    <form action="" class="cart">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <a href="{{ route('add.cart',$product->id) }}" class="add_to_cart_button">Thêm giỏ hàng</a>
                                    </form>   
                                    
                                    <div class="product-inner-category">
                                        <p>Hãng máy: <a href="">{{ $product->category->name }}</a>. Tags: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>
                                    </div> 
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Mô tả</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Đánh giá</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Mô tả sản phẩm</h2>  
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla. Quisque volutpat nulla risus, id maximus ex aliquet ut. Suspendisse potenti. Nulla varius lectus id turpis dignissim porta. Quisque magna arcu, blandit quis felis vehicula, feugiat gravida diam. Nullam nec turpis ligula. Aliquam quis blandit elit, ac sodales nisl. Aliquam eget dolor eget elit malesuada aliquet. In varius lorem lorem, semper bibendum lectus lobortis ac.</p>

                                                <p>Mauris placerat vitae lorem gravida viverra. Mauris in fringilla ex. Nulla facilisi. Etiam scelerisque tincidunt quam facilisis lobortis. In malesuada pulvinar neque a consectetur. Nunc aliquam gravida purus, non malesuada sem accumsan in. Morbi vel sodales libero.</p>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                    <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>

                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">CÁC SẢN PHẨM KHÁC</h2>
                            <div class="related-products-carousel">
                            @foreach($product_random as $value)
                                <div class="single-product">
                                    <div class="product-f-image">
                                    @if(count($value->images) > 0)
                                        <img src="{{ $value->images[0]->image_url }}" alt="" style="width:100%;height:265px">
                                    @endif
                                        <div class="product-hover">
                                            <a href="{{ route('add.cart',$value->id) }}" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                            <a href="{{ route('frontend.show',$value->id) }}" class="view-details-link"><i class="fa fa-link"></i>Xem chi tiết</a>
                                        </div>
                                    </div>

                                    <h2><a href="{{ route('frontend.show',$value->id) }}">{{ $value->name }}</a></h2>

                                    <div class="product-carousel-price">
                                    <ins>{{ number_format($value->price_sales) }} VNĐ</ins> <del>{{ number_format($value->origin_price) }} VNĐ</del>
                                    </div> 
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
@endsection