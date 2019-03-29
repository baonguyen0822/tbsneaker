@extends('admin.layout.index')
@section('content')


<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Update Info</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="btn btn-dark" href="admin/infor/list">Back to Info</a>
            </div>
            <div class="card-body">
                <div class="table">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <div class="form-horizontal">
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

                            <form action="admin/infor/update/{{$infor->id}}" method="POST" enctype="multipart/form-data" >
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Tên cửa hàng</label>
                                        <input class="form-control" name="name" placeholder="Tên cửa hàng" 
                                        value="{{$infor->name}}">
                                    </div>
                                </div>        
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Tựa đề</label>
                                        <input class="form-control" name="title" placeholder="Nhập tựa đề" 
                                        value="{{$infor->title}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="myFile1">Logo:  </label>
                                        <input type="file" name="logo" id="logo" value="{{$infor->logo}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Hotline</label>
                                        <input class="form-control" name="hotline" placeholder="Số hotline..." 
                                        value="{{$infor->hotline}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Fax</label>
                                        <input class="form-control" name="fax" placeholder="Số fax..." 
                                        value="{{$infor->fax}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputEmail4">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email..." 
                                        value="{{$infor->email}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Address</label>
                                        <input class="form-control" name="address" placeholder="Địa chỉ..." 
                                        value="{{$infor->address}}">
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