@extends('admin.layout.index')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Danh sach san pham</h1>
          @if(session('thongbao'))
            <div class="alert alert-success">
              {{session('thongbao')}}
            </div>
          @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a class="btn btn-info" href="admin/product/add">Add Product</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="dataTables_length" id="dataTable_length">
                  <!--
                    <div class="col-sm-12 col-md-6">
                      <label>Show 
                        <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                          <option value="10">10</option>
                          <option value="25">25</option>
                          <option value="50">50</option>
                          <option value="100">100</option>
                          </select> entries
                        </label>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <div id="dataTable_filter" class="dataTables_filter">
                        <label>Search: <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
                        </label>
                      </div>
                    </div>
                     -->
                    <div class="row">
                      <div class="col-sm-12">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr align ="center">
                              <th>Ten San Pham</th>
                              <th>Nhan Hieu</th>
                              <th>The Loai</th>
                              <th>Gia</th>
                              <th>Gia Sale</th>
                              <th>Hinh Anh</th>
                              <th>So luong</th>
                              <th>Nguoi them</th>
                              <th>Tinh Trang</th>
                              <th>List view</th>
                              <th>Thao Tac</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($product as $prod)
                            <tr>
                              <td>{{$prod->name}}</td>
                              <td>{{$prod->category->name}}</td>
                              <td>{{$prod->brand_label->name}}</td>
                              <td>{{$prod->price}}</td>
                              <td>{{$prod->price_sale}}</td>
                              <td><img width="100px" src="img/product/{{$prod->avatar}}"></td>
                              <td>{{$prod->qty}}</td>
                              <td>Admin</td>
                              @if($prod->status == 1)
                                <td>Còn hàng</td>
                              @else
                                <td>Hết hàng</td>
                              @endif
                              <td class="center" style="text-align: center;"  >
                                <i class="fa fa-trash-o fa-w" style="padding-bottom: 2px;"><a class="btn btn-success" href="admin/product_size/list/{{$prod->id}}">Size</a></i>
                                <i class="fa fa-trash-o fa-w"><a class="btn btn-warning" href="admin/product_img/list/{{$prod->id}}">Img</a></i>
                              </td>
                              <td class="center" style="text-align: center;">
                                <i class="fa fa-trash-o fa-w" style="padding-bottom: 2px;"><a class="btn btn-primary" href="admin/product/update/{{$prod->id}}">Update</a></i>
                                <i class="fa fa-trash-o fa-w"><a class="btn btn-danger" href="admin/product/delete/{{$prod->id}}">Delete</a></i>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>  
              </div>
              <div class="row">{{$product->links()}}</div>
            </div>
          </div>

        </div>
        
        <!-- /.container-fluid -->

@endsection