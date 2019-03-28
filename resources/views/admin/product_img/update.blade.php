@extends('admin.layout.index')
@section('content')


<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Update Img san pham {{$product_img->product->name}}</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="btn btn-dark" href="admin/product/list">Back to List</a>
            </div>
            <div class="card-body">
                <div class="table">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <div class="form-horizontal">
                            <h4>Product - Update Img</h4>
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

                            <form action="admin/product_img/update/{{$product_img->id}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="img_1">Anh san pham 1:  </label>
                                        <input type="file"  name="img_1" id="img_1" value="img_1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="img_2">Anh san pham 2:  </label>
                                        <input type="file"  name="img_2" id="img_2" value="img_2">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="img_3">Anh san pham 3:  </label>
                                        <input type="file"  name="img_3" id="img_3"value="img_3">
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