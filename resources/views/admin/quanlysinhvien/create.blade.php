@extends('layouts.app_master_admin')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm mới sinh viên</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href=" {{ route('admin.quanlygiaovien.index')}}">Giáo viên</a></li>
                    <li class="breadcrumb-item active">Thêm mới</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<div class="card-body pad">
    @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>
    @endif
    {{-- Hiển thị thông tin trạng thái tạo bài viết --}}
    @if (session('notify'))
        <div class="alert alert-info">{{session('notify')}}</div>
    @endif
    <form action="{{ route('admin.quanlysinhvien.store')}}" id="register" method="POST">
    @csrf             
        <span class="error"></span>
        <div class="form-group">
            <label for="">Họ và tên</label>
            <input type="text" class="form-control" name="name" value="" placeholder="Họ và tên">
            <label for="name" class="error"></label>
        </div>
        <div class="form-group">
            <label for="">Mã sinh viên</label>
            <input type="text" class="form-control" name="masv" value="" placeholder="Mã sinh viên">
            <label for="masv" class="error"></label>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" value="" placeholder="Email">
            <label for="email" class="error"></label>
        </div>
        <div class="form-group">
            <label for="">Mật khẩu</label>
            <input type="password" id="password" class="form-control" name="password" value="" placeholder="Mật khẩu">
            <label for="password" class="error"></label>
        </div>

        <div class="form-group">
            <label for="">Xác nhận mật khẩu</label>
            <input type="password" id="confirmpassword" class="form-control" name="confirmpassword" value="" placeholder="Xác nhận mật khẩu">
            <label for="confirmpassword" class="error"></label>
        </div>
        <div class="card-footer" style="padding: 0">
            <a href="{{ route('admin.quanlysinhvien.index')}}" class="btn btn-secondary" style="font-size: .875rem;">Quay lại</a>
            <button type="submit" class="btn btn-primary" style="font-size: .875rem;">Thêm mới</button>
        </div>
    </form>
</div>

<style type="text/css">
    a.btn.btn-secondary {
        color: white;
    }

    input.form-control {
        max-width: 50%;
    }
</style>
@stop