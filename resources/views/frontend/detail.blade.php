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
                                                @if(!$product->content_more)
                                                    Sản phẩm hiện chưa có mô tả
                                                @else
                                                    @foreach($product->content_more_json as $key => $value)
                                                        <div>{{ $key }} : {{$value}}</div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Đánh giá sản phẩm</h2>
                                                <form action="{{ route('rating') }}" method="POST" class="submit-review" enctype="multipart/form-data">
                                                @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <p><label for="review">Đánh giá sao</label>
                                                        <select name="rating" id="" class="form-control select2" style="width: 100%;">
                                                            <option value="#" selected="selected" disabled="disabled">Chọn sao</option>
                                                            <option value="1"> &#9733; </option>
                                                            <option value="2"> &#9733; &#9733; </option>
                                                            <option value="3"> &#9733; &#9733; &#9733;</option>
                                                            <option value="4"> &#9733; &#9733; &#9733; &#9733;</option>
                                                            <option value="5"> &#9733; &#9733; &#9733; &#9733; &#9733;</option>
                                                        </select>
                                                    </p>
                                                    
                                                    <p><label for="review">Nội dung đánh giá</label> <textarea name="content" id="" cols="30" rows="10"></textarea></p>
                                                    <p><label for="review">Ảnh mô tả</label>
                                                        <input type="file" class="form-control custom-file-input" name="images[]" id="exampleInputFile" multiple>
                                                    </p>
                                                    <p><input type="submit" value="Đánh giá"></p>
                                                </form>
                                                <p id="NX">Nhận xét trước</p>
                                                @if(count($nhan_xet) == 0)
                                                    <p>Sản phẩm này hiện chưa có nhận xét</p>
                                                @else
                                                    @foreach($nhan_xet as $value)
                                                    <div class="tong_avatar">
                                                        <div class="tong_ava_rating">
                                                            <div class="avatar">
                                                                @if($value->user->avatar)
                                                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($value->user->avatar) }}" class="img-circle elevation-2" alt="" style="width:40px;height:40px;border-radius:50%;object-fit: cover;">
                                                                @else
                                                                    <img src="https://st.quantrimang.com/photos/image/072015/22/avatar.jpg" class="img-circle elevation-2" alt="" style="width:40px;height:40px;border-radius:50%;object-fit: cover;">
                                                                @endif
                                                            </div>
                                                            <div class="tong_rating">
                                                                <span class="name_ava">{{ $value->user->name }}</span>
                                                                <span class="rating_ava">
                                                                    @php
                                                                        for($i = 0 ; $i < $value->rating ; $i++)
                                                                        {
                                                                            echo "<span> &#9733; </span>";
                                                                        }
                                                                    @endphp
                                                                </span>
                                                            </div>
                                                        </div><!-- Tong_ava_rating -->
                                                        <div class="content_ava">{{ $value->content }}</div>
                                                        @if(count($nx->images) > 0)
                                                            <div class="rating_home">
                                                                    @foreach($nx->images as $value)
                                                                            <img src="{{ $value->image_url }}" alt="" class="img_rating">
                                                                    @endforeach
                                                            </div> <!-- Phần ảnh mô tả -->
                                                        @endif
                                                        <div class="created_ava">{{ $value->created_at->toDateString() }}</div>
                                                    </div> <!-- end Tong -->
                                                    @endforeach
                                                @endif
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