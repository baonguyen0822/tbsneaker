@extends('admin.layout.index')
@section('content')


<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Update Slide</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="btn btn-dark" href="admin/slide/list">Back to List</a>
            </div>
            <div class="card-body">
                <div class="table">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <div class="form-horizontal">
                            <h4>Slide - {{$slide->id}}</h4>
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

                            <form action="admin/slide/update/{{$slide->id}}" method="POST" enctype="multipart/form-data" >
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Tựa đề 1</label>
                                        <input class="form-control" name="title" placeholder="Nhap tựa đề" 
                                        value="{{$slide->title}}">
                                    </div>
                                </div>        
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Tựa đề 2</label>
                                        <input class="form-control" name="title2" placeholder="Nhap tựa đề" 
                                        value="{{$slide->title2}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="myFile1">Hình slide (file .png)</label>
                                        <input type="file" name="img" id="img" value="{{$slide->img}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="text">Nội dung</label>
                                        <textarea class="form-control" rows="3" name="text" id="text">{{$slide->text}} </textarea>
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