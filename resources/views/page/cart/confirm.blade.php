@extends('layout.master')
 @section('content')
 
 <section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Xác nhận đơn hàng</h1>
					<nav class="d-flex align-items-center">
						<a href="trangchu">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a style="color:white;">Xác nhận đơn hàng</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Order Details Area =================-->
	<section class="order_details section_gap">
		<div class="container">
			<h3 class="title_confirmation">Cảm ơn bạn. Đơn hàng của bạn đã được chúng tôi tiếp nhận.</h3>
			<!--
			<div class="row order_d_inner">
				<div class="col-lg-3">
					<div class="details_item">
						<h4>Tên khách hàng</h4>
						<ul class="list">
							<li><a><span></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="details_item">
						<h4>Email</h4>
						<ul class="list">
                            <li><a><span></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="details_item">
						<h4>Địa chỉ</h4>
						<ul class="list">
                            <li><a><span></span></a></li>
						</ul>
					</div>
                </div>
                <div class="col-lg-3">
					<div class="details_item">
						<h4>Số điện thoại</h4>
						<ul class="list">
                            <li><a><span></span></a></li>
						</ul>
					</div>
				</div>
			</div>
			 -->
			<div class="order_details_table">
				<h2>Chi tiết đơn hàng</h2>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Sản phẩm</th>
								<th scope="col">Số lượng</th>
								<th scope="col">Tổng tiền</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($cart as $item)
							<tr>
								<td>
									<p>{{$item->name}}</p>
								</td>
								<td>
									<h5>x {{$item->qty}}</h5>
								</td>
								<td>
									<p>$ {{($item->price*$item->qty)}}</p>
								</td>
							</tr>
							@endforeach
							<tr>
								<td>
									<h4>Tạm tính</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>$ {{$total}}</p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Shipping</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>Free Shipping</p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Tổng tiền</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>$ {{($total)}}</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Order Details Area =================-->


@endsection