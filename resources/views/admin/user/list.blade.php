@extends('admin.layout.index')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Danh sách thành viên</h1>
          @if(session('thongbao'))
            <div class="alert alert-success">
              {{session('thongbao')}}
            </div>
          @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a class="btn btn-info" href="admin/user/add">Thêm thành viên</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align ="center">
                      <th>Tên thành viên</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Hiện trạng</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                    @foreach($user as $u)
                    <tr>
                      <td>{{$u->name}}</td>
                      <td>{{$u->email}}</td>
                      <td>{{$u->phone}}</td>
                      <td>{{$u->address}}</td>
                      @if($u->status == 1)
                        <td>Hoạt động</td>
                      @else
                        <td>Ngừng hoạt động</td>
                      @endif
                      <td class="center" style="text-align: center;">
                        <i class="fa fa-trash-o fa-w" style="padding-bottom: 2px;"><a class="btn btn-primary" href="admin/user/update/{{$u->id}}">Update</a></i>
                        <i class="fa fa-trash-o fa-w"><a class="btn btn-danger" href="admin/user/block/{{$u->id}}">Block</a></i>
                        <i class="fa fa-trash-o fa-w"><a class="btn btn-success" href="admin/user/unblock/{{$u->id}}">Unblock</a></i>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>  
              </div>
              <div class="row">{{$user->links()}}</div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

@endsection