@extends('admin.layout.index')
@section('content')


<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Update Product</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form update product</h6>
            </div>
            <div class="card-body">
                <div class="table">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <div class="form-horizontal">
                            <h4>Product - {{$product->name}}</h4>
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

                            <form action="admin/product/update/{{$product->id}}" method="POST" enctype="multipart/form-data" >
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Ten san pham</label>
                                        <input class="form-control" name="name" placeholder="Nhap ten san pham" 
                                        value="{{$product->name}}">
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-xs-2">Gia</label>
                                        <div class="ol-xs-10">
                                            <input type="price" class="form-control" name="price"  placeholder="Gia san pham" 
                                            value="{{$product->price}}">
                                        </div>
                                    </div>
                                </div><div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-xs-2">Gia sale</label>
                                        <div class="ol-xs-10">
                                            <input type="price_sale" class="form-control" name="price_sale" placeholder="Gia giam san pham" 
                                            value="{{$product->price_sale}}">
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-xs-2">So luong</label>
                                        <div class="ol-xs-10">
                                            <input type="qty" class="form-control" name="qty" placeholder="So luong san pham"
                                            value="{{$product->qty}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="myFile1">Anh san pham</label>
                                        <input type="file" name="avatar" id="avatar" value="{{$product->avatar}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Nguoi nhap</label>
                                        <select class="form-control" name="admin_id" id="exampleFormControlSelect1" value="{{$product->admin_id}}">
                                            <option>1</option>
                                            <option>1</option>
                                        </select>
                                    </div>
                                </div> 
                                <button type="submit" class="btn btn-primary">Update</button>   
                            </form>
                        </div>           
                    </table>
                </div>
            </div>
        </div>
</div>


@endsection