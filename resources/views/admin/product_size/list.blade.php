@extends('admin.layout.index')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Danh sach size san pham</h1>
          @if(session('thongbao'))
            <div class="alert alert-success">
              {{session('thongbao')}}
            </div>
          @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">Product - {{$product->name}}</h4>
              <a class="btn btn-info" href="admin/product_size/add/{{$product->id}}">Add size Product</a>
            </div>
            <div class="card-body">
              <div class="table-responsive" >
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align ="center">
                      <th>Size</th>
                      <th>So luong</th>
                      <th>Thao Tac</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($product_size as $prodsize)
                    <tr>
                    @if($prodsize->p_id == $product->id)
                      <td>{{$prodsize->size}}</td>
                      <td>{{$prodsize->qty}}</td>
                      <td class="center" style="text-align: center;">
                        <i class="fa fa-trash-o fa-w"><a class="btn btn-primary" href="admin/product_size/update/{{$prodsize->id}}">Update</a></i>
                        <i class="fa fa-trash-o fa-w"><a class="btn btn-danger" href="admin/product_size/delete/{{$prodsize->id}}">Delete</a></i>
                      </td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
              <a class="btn btn-dark" href="admin/product/list">Back to List</a>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

@endsection