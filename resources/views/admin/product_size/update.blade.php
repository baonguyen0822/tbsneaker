@extends('admin.layout.index')
@section('content')


<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Update size san pham {{$product_size->product->name}}</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="btn btn-dark" href="admin/product_size/list/{{$product_size->product->id}}">Back to List</a>
            </div>
            <div class="card-body">
                <div class="table">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <div class="form-horizontal">
                            <h4>Product - Update Size</h4>
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

                            <form action="admin/product_size/update/{{$product_size->id}}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Size</label>
                                        <input class="form-control" name="size" value="{{$product_size->size}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">So luong</label>
                                        <input class="form-control" name="qty"  value="{{$product_size->qty}}">
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