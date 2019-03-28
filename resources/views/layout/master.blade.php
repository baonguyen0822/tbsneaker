<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
    <title>Karma Shop</title>
    <base href="{{asset('')}}">
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="source/css/linearicons.css">
	<link rel="stylesheet" href="source/css/font-awesome.min.css">
	<link rel="stylesheet" href="source/css/themify-icons.css">
	<link rel="stylesheet" href="source/css/bootstrap.css">
	<link rel="stylesheet" href="source/css/owl.carousel.css">
	<link rel="stylesheet" href="source/css/nice-select.css">
	<link rel="stylesheet" href="source/css/nouislider.min.css">
	<link rel="stylesheet" href="source/css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="source/css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="source/css/magnific-popup.css">
	<link rel="stylesheet" href="source/css/main.css">
</head>

<body>

	@include('layout.header')

	@yield('content')
	
	@include('layout.footer')

	<script src="source/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="source/js/vendor/bootstrap.min.js"></script>
	<script src="source/js/jquery.ajaxchimp.min.js"></script>
	<script src="source/js/jquery.nice-select.min.js"></script>
	<script src="source/js/jquery.sticky.js"></script>
	<script src="source/js/nouislider.min.js"></script>
	<script src="source/js/countdown.js"></script>
	<script src="source/js/jquery.magnific-popup.min.js"></script>
	<script src="source/js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="source/js/gmaps.min.js"></script>
	<script src="source/js/main.js"></script>
	<script type="text/javascript" src="source/js/jquery-3.3.1.min"></script>
</body>

</html>