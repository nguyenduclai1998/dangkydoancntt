@extends('layouts.app_master_admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý giáo viên</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href=" {{ route('admin.quanlygiaovien.index')}}">Giáo viên</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh sách giáo viên</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" style="font-size: .875rem;"><a href="{{ route('admin.quanlygiaovien.create')}}" style="color: #fff">Thêm mới </a><i class="fas fa-plus"></i></button>
            </div>
            <!-- /.card-header -->
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
            <div class="card-body table-responsive p-0">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Mã</th>
                            <th scope="col">Họ và tên </th>
                            <th scope="col">Email</th>
                            <th scope="col">Quyền hạn</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($giaovien))
                            @foreach($giaovien as $gv)
                                <tr>
                                    <th scope="row">{{$gv->id}}</th>
                                    <td>{{$gv->name}}</td>
                                    <td>{{$gv->email}}</td>
                                    <td>{{$gv->rolename}}</td>
                                    <td>
                                        <a href="{{ route('admin.quanlygiaovien.view', $gv->id)}}" class="btn btn-xs btn-primary"><i class="fas fa-pencil-alt"></i> Xem</a>
                                        <a href="{{ route('admin.quanlygiaovien.delete', $gv->id)}}" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i> Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div>
            {{ $giaovien->links() }}
        </div>
    </div>
</div>
<!-- /.row -->
@stop