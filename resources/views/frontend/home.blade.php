@extends("frontend.layoutss.master")

@section('title')
    Wibu ShOp
@endsection

@section('content-menu')
    <div class="main">
    <div class="wrap">
      <h1><a href="index.html"><img src="/frontend/dist/images/logo.png" alt=""></a></h1>
      <div class="slogan">Clients choose us!</div>
      <div class="tooltips"> <a href="#"><img src="/frontend/dist/images/icon-1.png" alt=""></a><a href="#"><img src="/frontend/dist/images/icon-2.png" alt=""></a><a href="#"><img src="/frontend/dist/images/icon-3.png" alt=""></a> </div>
    </div>
    <div class="nav-shadow">
      <div>
        <nav>
          <ul class="menu">
            <li class="current"><a href="index.html">About</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="products.html">Products</a></li>
            <li><a href="employment.html">Employment</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="contacts.html">Contacts</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
@endsection