@extends('layout.master')
@section('content')

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Sản phẩm</h1>
					<nav class="d-flex align-items-center">
						<a href="trangchu">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						@if($cate)
						<a style="color:white;">{{$cate->name}}</a>
						@endif
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head" style="text-align:center;">Sản phẩm</div>
					<ul class="main-categories">
						<li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable"><span
								 class="lnr lnr-arrow-right"></span>Thương hiệu<span class="number"> </span></a>
							<ul class="collapse" id="fruitsVegetable" data-toggle="collapse" aria-expanded="false" aria-controls="fruitsVegetable">
								@foreach($category as $cate)
								<li class="main-nav-list child"><a href="#">{{$cate->name}}<span class="number"></span></a></li>
								@endforeach
							</ul>
						</li>
						<li class="main-nav-list"><a data-toggle="collapse" href="#meatFish" aria-expanded="false" aria-controls="meatFish"><span
								 class="lnr lnr-arrow-right"></span>Thể loại<span class="number"></span></a>
							<ul class="collapse" id="meatFish" data-toggle="collapse" aria-expanded="false" aria-controls="meatFish">
								@foreach($brand_label as $brand)
								<li class="main-nav-list child"><a href="#">{{$brand->name}}<span class="number"></span></a></li>
								@endforeach
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7" style="width: 855px; height: 1647.55px;">
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
						<!-- single product -->
						@foreach($product as $prod)
						<div class="col-lg-4 col-md-6">
							<div class="single-product">
								<img class="img-fluid" src="img/product/{{$prod->avatar}}" alt="">
								<div class="product-details">
									<h6>{{$prod->name}}</h6>
									<div class="price">
									@if($prod->price_sale==0)
										<h6>${{$prod->price}}</h6>
									@else
										<h6>${{$prod->price_sale}}</h6>
										<h6 class="l-through">${{$prod->price}}</h6>
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
										<a href="chitietsanpham/{{$prod->id}}" class="social-info">
											<span class="lnr lnr-move"></span>
											<p class="hover-text">view more</p>
										</a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</section>
				<div class="row">{{$product->links()}}</div>
				<!-- End Filter Bar -->
			</div>
		</div>
  </div>
@include('layout.related')
@endsection