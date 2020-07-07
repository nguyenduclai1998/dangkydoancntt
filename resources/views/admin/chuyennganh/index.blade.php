@extends('layouts.app_master_admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý chuyên ngành</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href=" {{ route('admin.chuyennganh.index')}}">Chuyên ngành</a></li>
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
                <h3 class="card-title">Danh sách chuyên ngành</h3>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" style="font-size: .875rem;"><a href="{{ route('admin.chuyennganh.create')}}" style="color: #fff">Thêm mới </a><i class="fas fa-plus"></i></button>
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
                            <th scope="col">Tên chuyên ngành </th>
                            <th scope="col">Mô tả chuyên ngành</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($chuyennganh))
                            @foreach($chuyennganh as $cn)
                                <tr>
                                    <th scope="row">{{$cn->id}}</th>
                                    <td>{{$cn->tenchuyennganh}}</td>
                                    <td>{{$cn->mota}}</td>
                                    <td class="active">
                                        <a href="{{ route('admin.chuyennganh.edit', $cn->id)}}"><i class="far fa-edit"></i></a>
                                        <a href="{{ route('admin.chuyennganh.delete', $cn->id)}}"><i class="far fa-trash-alt"></i></a>
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
            {{ $chuyennganh->links() }}
        </div>
    </div>
</div>
<!-- /.row -->
@stop