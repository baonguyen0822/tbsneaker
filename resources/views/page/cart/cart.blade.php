 @extends('layout.master')
 @section('content')
 
<script type="text/javascript">
    function updateCart(qty,rowId)
    {
        $.get(
            '{{asset('cart/update')}}',
            {qty:qty,rowId:rowId},
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
                    <h1>Giỏ Hàng</h1>
                    <nav class="d-flex align-items-center">
                        <a href="trangchu">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a style="color:white">Giỏ hàng</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
            @if(Cart::count() >=1)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr style="text-align:center">
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Giá sale</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img width="100px" height="100px" src="img/product/{{$item->options->avatar}}" alt="">
                                        </div>
                                        <div class="media-body">
                                            <p>{{$item->name}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td style="text-align:center">
                                    <h5>{{$item->price}} $</h5>
                                </td>
                                <td style="text-align:center">
                                    <h5>{{$item->options->price_sale}} $</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input type="number" name="qty" id="sst" maxlength="12" value="{{$item->qty}}" title="Quantity:"
                                            class="input-text qty" onchange="updateCart(this.value,'{{$item->rowId}}')">
                                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                            class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                            class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                    </div>
                                </td>
                                <td>
                                    @if($item->options->price_sale ==0)
                                    <h5>{{number_format($item->price*$item->qty)}} $</h5>
                                    @else
                                    <h5>{{number_format($item->options->price_sale*$item->qty)}} $</h5>
                                    @endif
                                </td>
                                <td style="text-align:center">
                                    <a href="{{asset('cart/delete/'.$item->rowId)}}" class="btn btn-xs btn-danger "><span class="glyphicon glyphicon-remove"></span>X</a>
                                </td>
                            </tr>
                            
                        @endforeach 
                            <tr class="bottom_button">
                                <td>
                                    <a class="gray_btn" href="#">Update Cart</a>
                                    <a class="gray_btn" href="{{asset('cart/delete/all')}}">Delete All</a>
                                </td>
                                
                                <td>    
                                </td>
                                <td>
                                    <h5>Total</h5>
                                </td>
                                <td>
                                    <h5>{{$total}}$</h5>
                                </td>
                            </tr>
                            
                            
                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="trangchu">Tiếp tục mua hàng</a>
                                        <a class="primary-btn" href="cart/checkout">Thanh toán</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @else
                <h1 style="text-align:center">Giỏ hàng rỗng.</h1>
                <h3  style="text-align:center">Vui lòng trở về trang chủ.</h3>
            @endif
        </div>
    </section>
    <!--================End Cart Area =================-->

@endsection