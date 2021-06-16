@extends("frontend.layoutss.master")

@section('title')
    Wibu ShOp
@endsection

@section('main-content')
 <div class="header-content">
    <div class="wrap main">
    @foreach($product as $val)
        <div class="block-1"> <img src="/frontend/dist/images/page1-img1.jpg" alt="" class="img-radius">
        <div class="border-1">
          <p class="color-1 p2" style="font-size:20px;color:#088bed">{{ $val->name }}</p>
          <p class="color-1 p2">{{ $val->category->name }}</p>
          <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet domingid quod mazim placerat.</p>
          <a href="{{ $val->id }}" class="button top-1">Buy Now</a> 
          </div>
      </div>
    @endforeach
      </div>
    </div>
  </div>
</header>
<!--==============================content================================-->
<section id="content">
  <div>
    <div class="wrap">
      <div class="col-1 border-2">
        <h2 class="p3">Who We Are?</h2>
        <div class="wrap"> <img src="/frontend/dist/images/page1-img4.jpg" alt="" class="img-indent img-radius">
          <p class="extra-wrap">Security Group is one of free website templates created by TemplateMonster.com. This website template is optimized for 1280X1024 screen resolution. This Security Group Template goes with 2 packages – with PSD source files and without them. PSD source files are available for free for the registered members of TemplateMonster.com.</p>
        </div>
        <div class="wrap top-2">
          <ul class="list-1 fleft">
            <li><a href="#">Lorem ipsum dolor sit consetetur</a></li>
            <li><a href="#">Sadipscing elitred diam nonumy eirmod</a></li>
            <li><a href="#">Tempor invidunt labore dolore magna</a></li>
            <li><a href="#">Aliquyam erat, sed diam volupt</a></li>
          </ul>
          <ul class="list-1 fleft">
            <li><a href="#">At vero eos et accusam et justo duo</a></li>
            <li><a href="#">Dolores et ea rebum. stetasd gubergren</a></li>
            <li><a href="#">Takimata sanctus est lorem</a></li>
            <li><a href="#">Psum dolor sit amet orem ipsum</a></li>
          </ul>
        </div>
        <a href="#" class="button-1 top-3">Read More</a> </div>
      <div class="col-2">
        <h2 class="p2">Latest News</h2>
        <a href="#" class="link-2">29.02.2011</a>
        <p class="p4">At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus.</p>
        <a href="#" class="link-2">27.02.2011</a>
        <p class="p4">Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</p>
        <a href="#" class="link-2">22.02.2011</a>
        <p>Onvidunt ut labore dolore magna aliquym erat, sed diam voluptua vero eos accusam et justo duo dolores.</p>
        <a href="#" class="button-1 top-1">Read More</a> </div>
    </div>
  </div>
</section>
@endsection