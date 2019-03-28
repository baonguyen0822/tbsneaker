@extends('layout.master')
@section('content')
<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Thông tin liên hệ</h1>
					<nav class="d-flex align-items-center">
						<a href="trangchu">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a style="color:white;">Liên hệ</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Contact Area =================-->
	<section class="contact_area section_gap_bottom">
		<div class="container">	
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1258111773036!2d106.71224331474923!3d10.801674992304402!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528a501281b1f%3A0x6f43044e459b3132!2zNDc1YSDEkGnhu4duIEJpw6puIFBo4bunLCBQaMaw4budbmcgMjUsIELDrG5oIFRo4bqhbmgsIEjhu5MgQ2jDrSBNaW5oIDcwMDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1553008261055" width="1109" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			<div class="row">
				<div class="col-lg-3">
					<div class="contact_info">
					@foreach($infor as $infor)
						<div class="info_item">
							<i class="lnr lnr-home"></i>
							<h6>{{$infor->address}}</h6>
							<p></p>
						</div>
						<div class="info_item">
							<i class="lnr lnr-phone-handset"></i>
							<h6><a href="#">{{$infor->hotline}}</a></h6>
							<p>Hỗ trợ từ 8:00 - 19:00 hằng ngày.</p>
						</div>
						<div class="info_item">
							<i class="lnr lnr-envelope"></i>
							<h6><a href="#">{{$infor->email}}</a></h6>
							<p>Hãy gửi thư cho chúng tôi bất cứ khi nào bạn cần.</p>
						</div>
					@endforeach
					</div>
				</div>
				<div class="col-lg-9">
					<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'">
							</div>
							<div class="form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"></textarea>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<button type="submit" value="submit" class="primary-btn">Send Message</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!--================Contact Area =================-->

@endsection