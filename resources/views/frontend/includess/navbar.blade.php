<div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="{{ route('login.form') }}"><i class="fa fa-user"></i>Đăng nhập</a></li>
                            <li><a href="{{ route('logout') }}"><i class="fa fa-user"></i>Đăng xuất</a></li>
                            <li>
                                @if(\Illuminate\Support\Facades\Auth::User())
                                    @if(\Illuminate\Support\Facades\Auth::User()->avatar)
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url(Illuminate\Support\Facades\Auth::User()->avatar) }}" class="img-circle elevation-2" alt="" style="width:40px;height:40px;border-radius:50%;object-fit: cover;">
                                    @else
                                        <img src="https://st.quantrimang.com/photos/image/072015/22/avatar.jpg" class="img-circle elevation-2" alt="" style="width:40px;height:40px;border-radius:50%;object-fit: cover;">
                                    @endif
                                    <b>{{ \Illuminate\Support\Facades\Auth::User()->name }}</b>
                                @else
                                    <img src="https://st.quantrimang.com/photos/image/072015/22/avatar.jpg" class="img-circle elevation-2" alt="" style="width:40px;height:40px;border-radius:50%;object-fit: cover;">
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="/frontend/dist/img/logoshop.png" id="logoshop"></a><span id="textLogo">Shop Wi Computer Bu</span></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="{{ route('list.cart') }}">Giỏ Hàng - <span class="cart-amunt">Đôla Mỹ</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">{{ Cart::count() }}</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav" style="width:100%">
                        <li class="active"><a href="{{ route('frontend.index') }}">Trang chủ</a></li>
                        @foreach($category as $value)
                            <li><a href="{{ route('frontend.list',$value->id) }}">{{ $value->name }}</a></li>
                        @endforeach
                        <li class="active" style="float:right"><a href="{{ route('follow') }}">Theo dõi đơn hàng</a></li>
                    </ul>
                    
                </div>

            </div>
        </div>
    </div> <!-- End mainmenu area -->