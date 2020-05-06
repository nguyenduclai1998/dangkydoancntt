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
                        @if(isset($giaovien))
                            @foreach($giaovien as $gv)
                                <div class="col-12 col-sm-4 col-md-4 d-flex align-items-stretch">
                                    <div class="card bg-light">
                                        <div class="card-header text-muted border-bottom-0">
                                            {{$gv->role->rolename}}
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="lead"><b>{{$gv->name}}</b></h2>
                                                    <p class="text-muted text-sm"><b>Email: </b>{{$gv->email}}</p>
                                                    <p class="text-muted text-sm"><b>Ngày sinh: </b>{{$gv->thongtin->ngaysinh}}</p>
                                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Học hàm: {{$gv->thongtin->hocham}}</li>
                                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{$gv->thongtin->sdt}}</li>
                                                    </ul>
                                                </div>
                                                <div class="col-5 text-center">
                                                    @if($gv->thongtin->avatar == null)
                                                        <img style="max-width: 128px; height: auto;" src="{{ asset('admin/dist/img/default-avatar.png')}}" alt="" class="img-circle img-fluid">
                                                    @else
                                                        <img style="max-width: 128px; height: auto;" src="{{ asset('admin/dist/img/user1-128x128.jpg')}}" alt="" class="img-circle img-fluid">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-right">
                                                <a href="#" class="btn btn-sm bg-teal">
                                                <i class="fas fa-comments"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-primary">
                                                <i class="fas fa-user"></i> View Profile
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
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