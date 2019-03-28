@extends('layout.master')
 @section('content')
 
  <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>SingIn</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="single-product.html">SingIn</a>
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
                    <div class="col-lg-12">
                    @if(count($errors) >0)
                        <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    {{$err}}<br>
                    @endforeach
                        </div>
                    @endif
                    @if(session('thongbao'))
                        <div>
                            {{session('thongbao')}}
                            <a class="btn primary-btn" href="dangnhap">Đăng nhập</a>
                        </div>
                    @endif
                        <h3 style="padding-top: 20px;">Đăng ký tài khoản</h3>
                        <form class="row contact_form" action="dangky" method="POST" novalidate="novalidate">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="col-md-8 form-group p_star">
                                <label for="name">Họ tên</label>
                                <input class="form-control" name="name" placeholder="Nhập họ tên...">
                            </div>
                            <div class="col-md-8 form-group p_star">
                                <label for="email">Địa chỉ Email</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" 
                                placeholder="Email của bạn...">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="col-md-8 form-group p_star">
                                <label for="pass">Password</label>
                                <input type="password" class="form-control" id="pass" name="pass" placeholder="Nhập mật khẩu">
                            </div>
                            <div class="col-md-8 form-group p_star">
                                <label for="passagain">Password confirm</label>
                                <input type="password" class="form-control" id="passagain" name="passagain" placeholder="Xác nhận mật khẩu">
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
                                <button type="submit" class="primary-btn">Đăng ký</button>   
                            </div>
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

@endsection