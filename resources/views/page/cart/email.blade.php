<font face="Arial">
    <div>
        <div></div>
        <h3><font color="#FF9600">Thông tin khách hàng</font></h3>
        <p>
            <strong class="info">Khách hàng: </strong>
            {{$info['name']}}
        </p>
        <p>
            <strong class="info">Email: </strong>
            {{$info['email']}}
        </p>
        <p>
            <strong class="info">Số điện thoại: </strong>
            {{$info['phone']}}
        </p>
        <p>
            <strong class="info">Địa chỉ: </strong>
            {{$info['address']}}
        </p>
    </div>
    <div>
        <h3><font color="#FF9600">Hóa đơn mua hàng</font></h3>
        <table border="1" cellspacing="0">
            <tr>
                <td><strong>Tên sản phẩm</strong></td>
                <td><strong>Giá</strong></td>
                <td><strong>Số lượng</strong></td>
                <td><strong>Thành tiền</strong></td>
            </tr>
            @foreach($cart as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->price}} $</td>
                <td>{{$item->qty}}</td>
                <td>{{$item->price*$item->qty}} $</td>
            </tr>
            @endforeach
            <tr>
                <td>Tổng tiền: </td>
                <td colspan="3" align="right">{{$total}} $</td>
            </tr>
        </table>
    </div>
    <div>
        <h3><font color="#FF9600"> Cảm ơn bạn. Đơn hàng của bạn đã được chúng tôi tiếp nhận.</font> </h3>
    </div>
</font>