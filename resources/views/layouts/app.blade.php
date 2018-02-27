<!DOCTYPE html>
<html lang="zxx">
  <head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="corporate, creative, general, portfolio, photography, blog, e-commerce, shop, product, gallery, retina, responsive">
    <meta name="author" content="ElectronThemes">
	<title>@yield('page-title')</title>
	
	<!-- Favicon icon -->
  	<link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.ico') }}" />
	
	<!-- Input:CSS -->
	<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />
	<!-- EndInput -->

    @if (trim($__env->yieldContent('header')))
    <!-- Header Scripts only for this page start -->

        @yield('header')
        
    <!-- Header Scripts only for this page end -->
    @endif

  </head>
<body>
<div class="wrapper">

    @include('partials.sidemenu')

	<!-- START MAIN CONTENT -->
	<main class="main-content">
		@yield('page-content')
	</main>
	<!-- MAIN CONTENT END -->
</div>
	
	<!-- Input:js -->
	<script src="{{ asset('assets/plugins/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/app.js') }}"></script>
	<!-- EndInput -->
	@if (trim($__env->yieldContent('footer')))
	<!-- Footer Scripts only for this page start -->
	@yield('footer')
	<!-- Footer Scripts only for this page end -->
	@endif
</body>
</html>