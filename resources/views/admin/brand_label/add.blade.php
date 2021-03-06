@extends('admin.layout.index')
@section('content')


<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Thêm thể loại sản phẩm</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="btn btn-dark" href="admin/brand_label/list">Back to List</a>
            </div>
            <div class="card-body">
                <div class="table">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <div class="form-horizontal">
                            <h4>Brand Label - Add</h4>
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

                            <form action="admin/brand_label/add" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Tên thể loại</label>
                                        <input class="form-control" name="name" placeholder="Nhập tên thể loại">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Tình trạng</label>
                                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                                            <option value="1">Hoạt động</option>
                                            <option value="0">Ngừng hoạt động</option>
                                        </select>
                                    </div>
                                </div>  
                                <button type="submit" class="btn btn-primary">Add</button>   
                            </form>
                        </div>           
                    </table>
                </div>
            </div>
        </div>
</div>


@endsection