@extends('admin.layout.index')
@section('content')


<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Them san pham</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="btn btn-dark" href="admin/product/list">Back to List</a>
            </div>
            <div class="card-body">
                <div class="table">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <div class="form-horizontal">
                            <h4>Product - Add</h4>
                            <hr />
                            @if(count($errors) >0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        {{$err}}<br>
                                    @endforeach
                                </div>
                            @endif
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{session('thongbao')}}
                                </div>
                            @endif

                            <form action="admin/product/add" method="POST" enctype="multipart/form-data" >
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Ten san pham</label>
                                        <input class="form-control" name="name" placeholder="Nhap ten san pham">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Thuong hieu</label>
                                        <select class="form-control" name="c_id" id="exampleFormControlSelect1">
                                        @foreach($category as $cate)
                                            @if($cate->status == 1)        
                                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                                            @endif
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">The loai</label>
                                        <select class="form-control" name="b_id" id="exampleFormControlSelect1">
                                        @foreach($brand_label as $brand)
                                            @if($brand->status == 1)        
                                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endif
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-xs-2">Gia</label>
                                        <div class="ol-xs-10">
                                            <input type="price" class="form-control" name="price"  placeholder="Gia san pham">
                                        </div>
                                    </div>
                                </div><div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-xs-2">Gia sale</label>
                                        <div class="ol-xs-10">
                                            <input type="price_sale" class="form-control" name="price_sale" value="0" placeholder="Gia giam san pham">
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-xs-2">So luong</label>
                                        <div class="ol-xs-10">
                                            <input type="qty" class="form-control" name="qty" placeholder="So luong san pham">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="avatar">Anh san pham:  </label>
                                        <input type="file"  name="avatar" id="avatar">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Nguoi nhap</label>
                                        <select class="form-control" name="admin_id" id="exampleFormControlSelect1">
                                            <option>1</option>
                                            <option>1</option>
                                        </select>
                                    </div>
                                </div> 
                                <input type="submit" value="Add" class="btn btn-primary">
                            </form>
                        </div>           
                    </table>
                </div>
            </div>
        </div>
</div>


@endsection