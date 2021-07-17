@extends('frontend.layoutss.master')

@section('main-content')
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Giỏ hàng</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="#">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Tên Sản Phẩm</th>
                                            <th class="product-price">Giá Bán</th>
                                            <th class="product-quantity">Số lượng</th>
                                            <th class="product-subtotal">Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
				    	@foreach($items as $key)
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="{{ route('remove.cart',['id' => $key->rowId]) }}"><i class="fa fa-trash"></i></a> 
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="#"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="{{ $key->options->image }}"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="single-product.html">{{ $key->name }}</a> 
                                            </td>

                                            <td class="product-price">
                                                <span class="amount">{{ number_format($key->price) }}</span> 
                                            </td>

                                            <td class="product-quantity">
                                                {{ $key->qty }}
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="amount">{{ number_format($key->price * $key->qty) }}</span> 
                                            </td>
                                        </tr>
					   @endforeach
                                        <tr>
                                            <td class="actions" colspan="6">
                                                <div class="coupon">
                                                    <label for="coupon_code">Coupon:</label>
                                                    <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_code">
						                            <a href="#" class="nut">Nhập mã code</a>
                                                </div>
                                                    <a href="{{ route('frontend.index') }}" class="nut">Tiếp tục mua hàng</a>
                                                    <a href="{{ route('destroy.cart') }}" class="nut">Xóa tất cả sản phẩm</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>

                            <div class="cart-collaterals">

                    <form action="{{ route('pay.cart') }}" method="POST">
                    @csrf
                    @if ($errors->any())
                        
                    @endif
                            <div class="cross-sells">
                                <h2>Thanh toán đơn hàng</h2>
                                    @if(Cart::count() == 0)
                                        <div class="form-group">Chưa có đơn hàng nào !!</div>
                                    @else
                                    <div class="form-group">
                                        <label>Tên người nhận</label>
                                        <input type="text" name="name" class="form-control" placeholder="Tên người nhận"  value="{{ old('price_sales') }}">
                                        @foreach($items as $key)
                                            <input type="hidden" name="product_id" class="form-control" value="{{ $key->id }}">
                                        @endforeach
                                    </div>
                                    @error('name')
                    		            <div class="alert alert-danger alert_tb">{{ $message }}</div>
                	                @enderror
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Số điện thoại"  value="{{ old('price_sales') }}">
                                    </div>
                                    @error('phone')
                    		            <div class="alert alert-danger alert_tb">{{ $message }}</div>
                	                @enderror
                                    <div class="form-group">
                                        <label>Địa chỉ giao hàng</label>
                                        <input type="text" name="address" class="form-control" placeholder="Địa chỉ giao hàng"  value="{{ old('price_sales') }}">
                                    </div>
                                    @error('address')
                    		            <div class="alert alert-danger alert_tb">{{ $message }}</div>
                	                @enderror
                                    <div class="form-group">
                                        <label>Số lượng mua hàng</label>
                                        <input type="text" name="qty" class="form-control" value="{{ Cart::count() }}">
                                        <input type="hidden" name="total" class="form-control" value="{{ Cart::total() }}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ghi chú khi giao hàng</label>
                                        <textarea class="textarea" name="content" placeholder="Ghi chú khi giao hàng"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                    <button class="btn btn-primary">Thanh Toán</button>
                            </div>
                        </form>
                    @endif

                            <div class="cart_totals ">
                                <h2>Tổng tất cả đơn hàng</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Tổng số sản phẩm</th>
                                            <td><span class="amount">{{ Cart::count() }}</span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Giá vận chuyển</th>
                                            <td>Vẫn chuyển miễn phí</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Tổng Tiền</th>
                                            <td><strong><span class="amount">
                                               {{ number_format(Cart::total()) }}
                                            </span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
@endsection