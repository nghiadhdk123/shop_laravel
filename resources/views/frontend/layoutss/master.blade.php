<!DOCTYPE html>
<html lang="en">
<head>
<title> @yield('title') </title>
<meta charset="utf-8">
@include('frontend.includess.css')

</head>
<body>
<!--==============================header=================================-->

  <!-- Menu -->
@include('frontend.includess.navbar')
  <!-- End Menu -->

  <!--============================== main-cotent =================================-->
  @yield('main-content')
  
<!--==============================footer=================================-->
<footer>
  <p>© 2012 <a href="#" class="link">Security Group</a> Website Template by <a target="_blank" href="http://www.templatemonster.com/" class="link">TemplateMonster.com</a></p>
  <p>Phone: +1 800 559 6580 &nbsp; Email: <a href="#" class="link">info@security.com</a></p>
</footer>
</body>
</html>