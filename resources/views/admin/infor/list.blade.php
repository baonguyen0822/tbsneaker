@extends('admin.layout.index')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Thông tin cửa hàng</h1>
          @if(session('thongbao'))
            <div class="alert alert-success">
              {{session('thongbao')}}
            </div>
          @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- <a class="btn btn-dark" href="admin/slide/add">Thêm slide</a>  -->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align ="center">
                      <th>Tên cửa hàng</th>
                      <th>Tựa đề</th>
                      <th>Logo</th>
                      <th>Hotline</th>
                      <th>Fax</th>
                      <th>Email</th>
                      <th>Địa chỉ</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                    @foreach($infor as $inf)
                    <tr> 
                      <td>{{$inf->name}}</td>
                      <td>{{$inf->title}}</td>
                      <td><img width="100px" src="img/{{$inf->logo}}"></td>
                      <td>{{$inf->hotline}}</td>
                      <td>{{$inf->fax}}</td>
                      <td>{{$inf->email}}</td>
                      <td>{{$inf->address}}</td>
                      <td class="center" style="text-align: center;">
                        <i class="fa fa-trash-o fa-w" style="padding-bottom: 2px;">
                          <a class="btn btn-primary" href="admin/infor/update/{{$inf->id}}">Update</a>
                        </i> 
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