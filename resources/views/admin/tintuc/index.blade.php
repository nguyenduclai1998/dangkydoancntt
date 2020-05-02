@extends('layouts.app_master_admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý tin tức</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.tintuc.tintuc')}}">Tin tức</a></li>
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
                <h3 class="card-title">Danh sách tin tức</h3>
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
                <button type="submit" class="btn btn-primary" style="font-size: .875rem;"><a href="{{ route('admin.tintuc.create')}}" style="color: #fff">Thêm mới </a><i class="fas fa-plus"></i></button>
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
                            <th scope="col">Tên bài viết </th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Người tạo</th>
                            <th scope="col">Chuyên ngành</th>
                            <th scope="col">Hoạt động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($tintuc))
                            @foreach($tintuc as $tt)
                                <tr>
                                    <th scope="row">{{$tt->id}}</th>
                                    <td><p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px;">
                                        {{$tt->tenbaiviet}}
                                    </p></td>
                                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px;">
                                        {{$tt->noidung}}
                                    </td>
                                    <td>{{$tt->name}}</td>
                                    <td>{{$tt->tenchuyennganh}}</td>
                                    <td>
                                        <a href="{{ route('admin.tintuc.edit', $tt->id)}}" class="btn btn-xs btn-primary"><i class="fas fa-pencil-alt"></i> Sửa</a>
                                        <a href="{{ route('admin.tintuc.delete', $tt->id)}}" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i> Xóa</a>
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
            {{ $tintuc->links() }}
        </div>
    </div>
</div>
<!-- /.row -->
@stop