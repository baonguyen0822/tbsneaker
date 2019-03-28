@extends('admin.layout.index')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Danh sách đơn đặt hàng</h1>
          @if(session('thongbao'))
            <div class="alert alert-success">
              {{session('thongbao')}}
            </div>
          @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a class="btn btn-dark" href="admin/transaction/list">Back to list</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align ="center">
                      <th>Mã đơn</th>
                      <th>Mã giao dịch</th>
                      <th>Mã sản phẩm</th>
                      <th>Size</th>
                      <th>Số lượng</th>
                      <th>Giá</th>
                      <th>Thành tiền</th>
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                    @foreach($oder as $od)
                    <tr> 
                      <td>{{$od->id}}</td>
                      <td>{{$od->t_id}}</td>
                      <td>{{$od->product->name}}</td>
                      <td>{{$od->size}}</td>
                      <td>{{$od->qty}}</td>
                      <td>{{$od->price}}</td>
                      <td>{{$od->amount}}</td>  
                    </tr>
                    @endforeach
                  </tbody>
                </table>  
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

@endsection