@extends('layout.master')
@section('content')

<!-- start banner Area -->
    <section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div class="active-banner-slider owl-carousel">

				
						<!-- single-slide -->
						@foreach($slide as $sl)
						<div class="row single-slide align-items-center d-flex">
							<div class="col-lg-5 col-md-6">
								<div class="banner-content">
								<h1>"{{$sl->title}}"<br>{{$sl->title2}}</h1>
									<p>{{$sl->text}}</p>
									<div class="add-bag d-flex align-items-center">
										<a class="add-btn" href=""><span class="lnr lnr-cross"></span></a>
										<span class="add-text text-uppercase">Add to Bag</span>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="img/banner/{{$sl->img}}" alt="">
								</div>
							</div>
						</div>
						@endforeach
						<!-- single-slide -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->
	<!-- start features Area -->
	<section class="features-area section_gap">
		<div class="container">
			<div class="row features-inner">
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="source/img/features/f-icon1.png" alt="">
						</div>
						<h6>Free Delivery</h6>
						<p>Giao hàng miễn phí với mọi sản phẩm</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="source/img/features/f-icon2.png" alt="">
						</div>
						<h6>Return Policy</h6>
						<p>Chính sách đổi trả hợp lý</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="source/img/features/f-icon3.png" alt="">
						</div>
						<h6>24/7 Support</h6>
						<p>Hỗ trợ 24/7 khi khách hàng cần</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="source/img/features/f-icon4.png" alt="">
						</div>
						<h6>Secure Payment</h6>
						<p>Dịch vụ thanh toán an toàn và bảo mật tuyệt đối</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end features Area -->
	<!-- Start category Area -->
	<section class="category-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-12">
					<div class="row">
						<div class="col-lg-8 col-md-8">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="source/img/category/c1.jpg" alt="">
								<a href="source/img/category/c1.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Sneaker for Sports</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="source/img/category/c2.jpg" alt="">
								<a href="source/img/category/c2.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Sneaker for Sports</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="source/img/category/c3.jpg" alt="">
								<a href="source/img/category/c3.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Product for Couple</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-8 col-md-8">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="source/img/category/c4.jpg" alt="">
								<a href="source/img/category/c4.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Sneaker for Sports</h6>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-deal">
						<div class="overlay"></div>
						<img class="img-fluid w-100" src="img/category/c5.jpg" alt="">
						<a href="img/category/c5.jpg" class="img-pop-up" target="_blank">
							<div class="deal-details">
								<h6 class="deal-title">Sneaker for Sports</h6>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End category Area -->

	<!-- start product Area -->
	<section class="owl-carousel active-product-area section_gap">
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Sản phẩm mới</h1>
							<p>Những dòng sản phẩm mới ra mắt đã có mặt ở shop. Phục vụ tối ưu cho đam mê của bạn. Hãy chọn một sản phẩm 
								mà bạn yêu thích.
							</p>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- single product -->
					@foreach($new as $ne)
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="img/product/{{$ne->avatar}}" alt="">
							<div class="product-details">
								<h6>{{$ne->name}}</h6>
								<div class="price">
								@if($ne->price_sale==0)
									<h6>${{$ne->price}}</h6>
								@else
									<h6>${{$ne->price_sale}}</h6>
									<h6 class="l-through">${{$ne->price}}</h6>
								@endif
								</div>
								<div class="prd-bottom">
									<a href="" class="social-info">
										<span class="lnr lnr-heart"></span>
										<p class="hover-text">Wishlist</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-sync"></span>
										<p class="hover-text">compare</p>
									</a>
									<a href="chitietsanpham/{{$ne->id}}" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view more</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Sản phẩm Sale</h1>
							<p></p>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- single product -->
					@foreach($sale as $das)
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="img/product/{{$das->avatar}}" alt="">
							<div class="product-details">
								<h6>{{$das->name}}</h6>
								<div class="price">
								@if($das->price_sale==0)
									<h6>${{$das->price}}</h6>
								@else
									<h6>${{$das->price_sale}}</h6>
									<h6 class="l-through">${{$das->price}}</h6>
								@endif
								</div>
								<div class="prd-bottom">
									<a href="" class="social-info">
										<span class="lnr lnr-heart"></span>
										<p class="hover-text">Wishlist</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-sync"></span>
										<p class="hover-text">compare</p>
									</a>
									<a href="chitietsanpham/{{$das->id}}" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view more</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
	<!-- end product Area -->

	<!-- Start exclusive deal Area -->
	<section class="exclusive-deal-area">
		<div class="container-fluid">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-6 no-padding exclusive-left">
					<div class="row clock_sec clockdiv" id="clockdiv">
						<div class="col-lg-12">
							<h1>Exclusive Hot Deal Ends Soon!</h1>
							<p>Who are in extremely love with eco friendly system.</p>
						</div>
						<div class="col-lg-12">
							<div class="row clock-wrap">
								<div class="col clockinner1 clockinner">
									<h1 class="days">150</h1>
									<span class="smalltext">Days</span>
								</div>
								<div class="col clockinner clockinner1">
									<h1 class="hours">23</h1>
									<span class="smalltext">Hours</span>
								</div>
								<div class="col clockinner clockinner1">
									<h1 class="minutes">47</h1>
									<span class="smalltext">Mins</span>
								</div>
								<div class="col clockinner clockinner1">
									<h1 class="seconds">59</h1>
									<span class="smalltext">Secs</span>
								</div>
							</div>
						</div>
					</div>
					<a href="" class="primary-btn">Shop Now</a>
				</div>
				<div class="col-lg-6 no-padding exclusive-right">
					<div class="active-exclusive-product-slider">
						<!-- single exclusive carousel -->
						<div class="single-exclusive-slider">
							<img class="img-fluid" src="source/img/product/e-p1.png" alt="">
							<div class="product-details">
								<div class="price">
									<h6>$150.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
								<h4>addidas New Hammer sole
									for Sports person</h4>
								<div class="add-bag d-flex align-items-center justify-content-center">
									<a class="add-btn" href=""><span class="ti-bag"></span></a>
									<span class="add-text text-uppercase">Add to Bag</span>
								</div>
							</div>
						</div>
						<!-- single exclusive carousel -->
						<div class="single-exclusive-slider">
							<img class="img-fluid" src="source/img/product/e-p1.png" alt="">
							<div class="product-details">
								<div class="price">
									<h6>$150.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
								<h4>addidas New Hammer sole
									for Sports person</h4>
								<div class="add-bag d-flex align-items-center justify-content-center">
									<a class="add-btn" href=""><span class="ti-bag"></span></a>
									<span class="add-text text-uppercase">Add to Bag</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End exclusive deal Area -->

	<!-- Start brand Area -->
	<section class="brand-area section_gap" style="background:whitesmoke">
		<div class="container">
			<div class="row">
				<a class="col single-img" href="https://www.adidas.com.vn/">
					<img class="img-fluid d-block mx-auto" src="img/brand/adidas1.png" alt="">
				</a>
				<a class="col single-img" href="https://www.nike.com/">
					<img class="img-fluid d-block mx-auto" src="img/brand/nike.png" alt="">
				</a>
				<a class="col single-img" href="https://www.balenciaga.com/">
					<img class="img-fluid d-block mx-auto" src="img/brand/balen.png" alt="">
				</a>
				<a class="col single-img" href="https://www.vans.com/">
					<img class="img-fluid d-block mx-auto" src="img/brand/vans.png" alt="">
				</a>
				<a class="col single-img" href="https://www.gucci.com/">
					<img class="img-fluid d-block mx-auto" src="img/brand/gucci.png" alt="">
				</a>
			</div>
		</div>
	</section>
	<!-- End brand Area -->

	@include('layout.related')
	@endsection