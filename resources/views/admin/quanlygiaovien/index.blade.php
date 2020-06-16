@extends('layouts.app_master_admin')
@section('content')
@if(isset($giaovien))
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý giáo viên</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Trang chủ</a></li>
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
            <section class="content">
                <div class="card-body pb-0">
                    <div class="row d-flex align-items-stretch">
                        <table id="usersTable" class="table table table-striped table-bordered" class="display" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Họ và tên</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Ghi chú</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($giaovien))
                                    @foreach($giaovien as $k => $gv)
                                        <tr>
                                            <th scope="row">{{$k + 1}}</th>
                                            <td>{{$gv->name}}</td>
                                            <td>{{$gv->email}}</td>
                                            <td>{{$gv->thongtin->ghichu}}</td>
                                            <td><a href="{{ route('admin.quanlygiaovien.view', ['id' => $gv->id])}}">Xem chi tiết</a></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.card -->
        <div>
            {{ $giaovien->links() }}
        </div>
    </div>
</div>
<style type="text/css">
    .card.bg-light {
        width: 100%;
    }
</style>
<!-- /.row -->
@endif
@stop