@extends('admin.layout.index')
@section('content')

        <!-- Begin Page Content-->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Danh sách đơn đặt hàng - Transaction</h1>
          @if(session('thongbao'))
            <div class="alert alert-success">
              {{session('thongbao')}}
            </div>
          @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align ="center">
                      <th>Mã đơn</th>
                      <th>Tên khách hàng</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Địa chỉ</th>
                      <th>Tổng tiền</th>
                      <!-- 
                      <th>Mã Payment</th>
                      <th>Thông tin Payment</th>
                      <th>Ghi chú</th>
                      <th>Mã bảo mật</th>
                      -->
                      <th>Hiện trạng</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                    @foreach($trans as $tr)
                    <tr> 
                      <td>{{$tr->id}}</td>
                      <td>{{$tr->name}}</td>
                      <td>{{$tr->email}}</td>
                      <td>{{$tr->phone}}</td>
                      <td>{{$tr->address}}</td>
                      <td>{{$tr->amount}}</td>
                      <!-- 
                      <td>{{$tr->payment}}</td>
                      <td>{{$tr->payment_info}}</td>
                      <td>{{$tr->message}}</td>
                      <td>{{$tr->security}}</td>
                      -->
                      @if($tr->status == 0)
                        <td>Chưa giao</td>
                      @elseif($tr->status == 1)
                        <td>Đã giao</td>
                      @else($tr->status == 2)
                        <td>Hủy đơn</td>
                      @endif
                      <td class="center" style="text-align: center;">
                        <i class="fa fa-trash-o fa-w" style="padding-bottom: 2px;">
                          <a class="btn btn-warning" href="admin/order/list/{{$tr->id}}">Chi tiết</a>
                        </i>
                        <i class="fa fa-trash-o fa-w" style="padding-bottom: 2px;">
                          <a class="btn btn-primary" href="admin/transaction/update/{{$tr->id}}">Update</a>
                        </i>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>  
              </div>
              <div class="row">{{$trans->links()}}</div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

@endsection