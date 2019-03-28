 @extends('layout.master')
 @section('content')
 
  <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Thanh toán</h1>
                    <nav class="d-flex align-items-center">
                        <a href="trangchu">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a style="color:white;">Thanh toán</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    @if(Auth::check())
                    <div class="col-lg-8">
                        <h3>Thông tin khách hàng</h3>
                        <form class="row contact_form"  method="post" novalidate="novalidate">
                            <div class="col-md-8 form-group p_star">
                                <label for="name">Họ tên</label>
                                <input class="form-control" name="name" placeholder="Nhập họ tên..." value="{{Auth::user()->name}}">
                            </div>
                            <div class="col-md-8 form-group p_star">
                                <label for="email">Địa chỉ Email</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" 
                                placeholder="Email của bạn..." value="{{Auth::user()->email}}">
                                <small id="emailHelp" class="form-text text-muted">
                                    Chúng tôi sẽ không bao giờ chia sẻ email của bạn với bất cứ ai khác.
                                </small>
                            </div>
                            <div class="col-md-8 form-group p_star">
                                <label for="phone">Số điện thoại</label>
                                <input class="form-control" name="phone" placeholder="Số điện thoại" value="{{Auth::user()->phone}}"> 
                            </div>
                            <div class="col-md-8 form-group p_star">
                                <label for="address">Địa chỉ</label>
                                <input class="form-control" name="address" placeholder="Địa chỉ" value="{{Auth::user()->address}}">
                            </div>
                            <div class="col-md-8 form-group p_star">
                                <button type="submit" class="primary-btn">Xác nhận</button>   
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div>
                    @else
                    <div class="col-lg-8">
                        <h3>Thông tin khách hàng</h3>
                        <form class="row contact_form"  method="post" novalidate="novalidate">
                            <div class="col-md-8 form-group p_star">
                                <label for="name">Họ tên</label>
                                <input class="form-control" name="name" placeholder="Nhập họ tên...">
                            </div>
                            <div class="col-md-8 form-group p_star">
                                <label for="email">Địa chỉ Email</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" 
                                placeholder="Email của bạn...">
                                <small id="emailHelp" class="form-text text-muted">
                                    Chúng tôi sẽ không bao giờ chia sẻ email của bạn với bất cứ ai khác.
                                </small>
                            </div>
                            <div class="col-md-8 form-group p_star">
                                <label for="phone">Số điện thoại</label>
                                <input class="form-control" name="phone" placeholder="Số điện thoại">
                            </div>
                            <div class="col-md-8 form-group p_star">
                                <label for="address">Địa chỉ</label>
                                <input class="form-control" name="address" placeholder="Địa chỉ">
                            </div>
                            <div class="col-md-8 form-group p_star">
                                <button type="submit" class="primary-btn">Xác nhận</button>   
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div>
                    @endif
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li><a>Sản phẩm <span>Tổng cộng</span></a></li>
                                @foreach($cart as $item)
                                <li><a >{{$item->name}} <span class="middle">x {{$item->qty}}</span> <span class="last"></span></a></li>
                                @endforeach
                            </ul>
                            <ul class="list list_2">
                                <li><a>Subtotal <span>${{($total)}}</span></a></li>
                                <li><a>Shipping <span>Free Shipping</span></a></li>
                                <li><a>Total <span>${{($total)}}</span></a></li>
                            </ul>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="selector">
                                    <label for="f-option5">Check payments</label>
                                    <div class="check"></div>
                                </div>
                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County,
                                    Store Postcode.</p>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="selector">
                                    <label for="f-option6">Paypal </label>
                                    <img src="img/product/card.jpg" alt="">
                                    <div class="check"></div>
                                </div>
                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                    account.</p>
                            </div>
                            <div class="creat_account">
                                <input type="checkbox" id="f-option4" name="selector">
                                <label for="f-option4">I’ve read and accept the </label>
                                <a href="#">terms & conditions*</a>
                            </div>
                            <a class="primary-btn" href="#">Proceed to Paypal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

@endsection