@extends('admin.layout.index')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Danh sach Img san pham</h1>
          @if(session('thongbao'))
            <div class="alert alert-success">
              {{session('thongbao')}}
            </div>
          @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a class="btn btn-dark" href="admin/product/list">Back to List</a>
              <h4 class="m-0 font-weight-bold text-primary">San pham - {{$product->name}}</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive" >
                <table class="table table-bordered" id="dataTable" width="100%" cellsp  acing="0">
                  <thead>
                    <tr align ="center">
                      <th>Hinh anh 1</th>
                      <th>Hinh anh 2</th>
                      <th>Hinh anh 3</th>
                      <th>Thao Tac</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($product_img as $prodimg)
                    <tr style="text-align: center;">
                    @if($prodimg->id == $product->id)
                      <td><img width="100px" src="img/productimg/{{$prodimg->img_1}}"></td>
                      <td><img width="100px" src="img/productimg/{{$prodimg->img_2}}"></td>
                      <td><img width="100px" src="img/productimg/{{$prodimg->img_3}}"></td>
                      <td class="center" style="text-align: center;">
                        <i class="fa fa-trash-o fa-w"><a class="btn btn-primary" href="admin/product_img/update/{{$prodimg->id}}">Update</a></i>
                      </td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

@endsection