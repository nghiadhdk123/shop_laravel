<div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2><a href="./"><img src="/frontend/dist/img/logoshop.png" id="logoshop"></a><span id="textLogo">Shop Wi Computer Bu</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                        <div class="footer-social">
                            <a href="https://www.facebook.com/profile.php?id=100026797158206" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.youtube.com/watch?v=J2MWqT9Tg-0" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.youtube.com/watch?v=J2MWqT9Tg-0" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="https://www.youtube.com/watch?v=J2MWqT9Tg-0" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Danh mục người dùng</h2>
                        <ul>
                            <li><a href="#">Tài khoản của tôi</a></li>
                            <li><a href="#">Lịch sử mua hàng</a></li>
                            <li><a href="#">Danh sách yêu thích</a></li>
                            <li><a href="#">Liên hệ nhà cung cấp</a></li>
                            <li><a href="#">Trang đầu</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Dạnh mục hãng máy</h2>
                        <ul>
                            @foreach($category as $key)
                                <li><a href="{{ route('frontend.list',$key->id) }}">{{ $key->name }}</a></li>
                            @endforeach
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Bản tin</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2015 uCommerce. All Rights Reserved. <a href="http://www.freshdesignweb.com" target="_blank">freshDesignweb.com</a></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->