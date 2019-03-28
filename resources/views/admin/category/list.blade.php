@extends('admin.layout.index')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Danh sách các hãng sản phẩm</h1>
          @if(session('thongbao'))
            <div class="alert alert-success">
              {{session('thongbao')}}
            </div>
          @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a class="btn btn-info" href="admin/category/add">Thêm hãng sản phẩm</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align ="center">
                      <th>Mã số</th>
                      <th>Tên hãng</th>
                      <th>Hiện trạng</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                    @foreach($category as $cate)
                    <tr>
                      <td>{{$cate->id}}</td>
                      <td>{{$cate->name}}</td>
                      @if($cate->status == 1)
                        <td>Hoạt động</td>
                      @else
                        <td>Ngừng hoạt động</td>
                      @endif
                      <td class="center" style="text-align: center;">
                        <i class="fa fa-trash-o fa-w" style="padding-bottom: 2px;"><a class="btn btn-primary" href="admin/category/update/{{$cate->id}}">Update</a></i>
                        <i class="fa fa-trash-o fa-w"><a class="btn btn-danger" href="admin/category/delete/{{$cate->id}}">Delete</a></i>
                      </td>
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