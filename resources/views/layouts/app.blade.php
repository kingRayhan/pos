<!DOCTYPE html>
<html lang="zxx">
  <head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="corporate, creative, general, portfolio, photography, blog, e-commerce, shop, product, gallery, retina, responsive">
    <meta name="author" content="ElectronThemes">
	<title>@yield('page-title')</title>

	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<script>
		var AppRootPath = '{{ url('/') }}';
	</script>
	
	<!-- Favicon icon -->
  	<link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.ico') }}" />
	
	<!-- Input:CSS -->
	<link rel="stylesheet" href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/app.css') }}" />
	<!-- EndInput -->

    @if (trim($__env->yieldContent('header')))
    <!-- Header Scripts only for this page start -->

        @yield('header')
        
    <!-- Header Scripts only for this page end -->
    @endif

  </head>
<body>
<div class="wrapper" id="app">
	@include('partials.sidemenu')

	<!-- START MAIN CONTENT -->
	<main class="main-content">
		@include('partials.navbar')
		@include('errors')
		@yield('page-content')
	</main>
	<!-- MAIN CONTENT END -->
</div>
	
	<script src="{{ asset('js/app.js') }}"></script>
	<!-- EndInput -->
	@if (trim($__env->yieldContent('footer')))
	<!-- Footer Scripts only for this page start -->
	@yield('footer')
	<!-- Footer Scripts only for this page end -->
	@endif
</body>
</html>