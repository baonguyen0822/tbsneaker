@extends('admin.layout.index')
@section('content')


<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Cập nhật thông tin</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="btn btn-dark" href="admin/admin/list">Back to List</a>
            </div>
            <div class="card-body">
                <div class="table">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <div class="form-horizontal">
                            <h4>{{$admin->name}} - Cập nhật</h4>
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

                            <form action="admin/admin/update/{{$admin->id}}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Họ tên</label>
                                        <input class="form-control" name="name" placeholder="Nhập tên..." value="{{$admin->name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Địa chỉ Email</label>
                                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" 
                                        placeholder="Email của bạn..." value="{{$admin->email}}" readonly="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input  type="checkbox" id="changepass" name="changepass">
                                        <label for="pass">Thay đổi Password</label>
                                        <input type="password" class="form-control pass" id="pass" name="pass" 
                                        placeholder="Password" disabled="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="passagain">Nhập lại Password</label>
                                        <input type="password" class="form-control pass" id="passagain" name="passagain" 
                                        placeholder="Password" disabled="">
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

@section('script')
    <script>
        $(document).ready(function(){
            $("#changepass").change(function(){
                if($(this).is(":checked")) 
                {
                    $(".pass").removeAttr('disabled');
                }   
                else
                {
                    $(".pass").attr('disabled','');
                }    
            });
        });
    </script>
@endsection