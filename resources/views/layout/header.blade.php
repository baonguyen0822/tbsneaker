

<!-- Start Header Area -->
<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="trangchu"><img style="width: 137px; height: 50px;" src="img/logo2.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="trangchu">Trang Chủ</a></li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Sản phẩm</a>
								<ul class="dropdown-menu">
									@foreach($category as $cate)
									<li class="nav-item"><a class="nav-link" href="sanpham/{{$cate->id}}">{{$cate->name}}</a></li>
									@endforeach
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Thể loại</a>
								<ul class="dropdown-menu">
									@foreach($brand_label as $brand)
									<li class="nav-item"><a class="nav-link" href="theloai/{{$brand->id}}">{{$brand->name}}</a></li>
									@endforeach
								</ul>
							</li>
							<li class="nav-item"><a class="nav-link" href="lienhe">Liên hệ</a></li>
							@if(Auth::check())
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Chào bạn {{Auth::user()->name}}</a>
								<ul class="dropdown-menu">						
									<li class="nav-item"><a class="nav-link" href="dangxuat">Đăng xuất</a></li>
								</ul>
							</li>
							@else			
							<li class="nav-item"><a class="nav-link" href="dangnhap">Đăng nhập</a></li>
							@endif
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="/sneaker/public/cart/show" class="cart" style="color: black">
								<span class="ti-bag" style="padding-right: 5px;"></span>{{Cart::count()}}</a></li> 
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between" method="get"  action="search">
					<input type="text" class="form-control" id="search_input" name="key" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->
