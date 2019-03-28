@extends('layout.master')
@section('content')
<script type="text/javascript">
    function updateSize(size,rowId)
    {
        $.get(
            '{{asset('cart/update')}}',
            {size:size,rowId:rowId},
            function(){
                location.reload();
            }
        );
    }
</script>
	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Chi tiết sản phẩm</h1>
					<nav class="d-flex align-items-center">
						<a href="trangchu">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="sanpham/{{$product->c_id}}">{{$product->category->name}}<span class="lnr lnr-arrow-right"></span></a>
						<a style="color:white;">{{$product->name}}</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner" style="padding-bottom: 100px;">
				<div class="col-lg-6">
					<div class="s_Product_carousel">
						<div class="single-prd-item">
							<img class="img-fluid" src="img/productimg/{{$product->product_img->img_1}}" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="img/productimg/{{$product->product_img->img_2}}" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="img/productimg/{{$product->product_img->img_3}}" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text" >
						<h3 style="text-align:center;">{{$product->category->name}}</h3>
						<h2 style="text-align:center;">{{$product->name}}</h2>
						<h4 style="text-align:center;">{{$product->brand_label->name}}</h4>
						@if($product->price_sale==0)
						<h3 style="text-align:center;">{{$product->price}} $</h3>
						@else
						<h3 style="text-align:center;">Sale: {{$product->price_sale}} $</h3>
						<h5 style="text-align:center;">{{$product->price}} $</h5>
						@endif
						
						<div class="product_count">
							<label for="qty">Quantity:</label>
							<input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
							 class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
							 class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
						</div>
						<div class="clearfix"></div>
						<div class="product_count" style="padding-left: 69px;">
							<select class="mdb-select md-form" name="size">
								<option value="" disabled selected>Size</option>
								@foreach($product_size as $size)
								<option onchange="updataSize(this.value,'{{$size->rowId}}')">{{$size->size}}</option>
								@endforeach
							</select>
							
						</div>
						<div class="card_area d-flex align-items-center">
							<a class="primary-btn" href="{{asset('cart/add/'.$product->id)}}">Add to Cart</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->
	<hr>
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
									<a href="" class="social-info">
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
@include('layout.related')
@endsection