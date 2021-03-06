@extends('layouts.app_master_admin')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cập nhật chuyên ngành</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href=" {{ route('admin.chuyennganh.index')}}">Chuyên ngành</a></li>
                    <li class="breadcrumb-item active">Cập nhật</li>
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
    
    @if(isset($chuyennganh))
        <form action="{{ route('admin.chuyennganh.update', [$chuyennganh->id])}}" method="POST" id="chuyennganh">
        @csrf
            <div class="form-group">
                <label for="formGroupExampleInput">Tên chuyên ngành</label>
                <input type="text" class="form-control" value="{{$chuyennganh->tenchuyennganh}}" name="tenchuyennganh" placeholder="Tên chuyên ngành">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput">Mô tả</label>
                <textarea class="textarea" placeholder="Mô tả" id="" value="" name="mota" 
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$chuyennganh->mota}}</textarea>
            </div>
            <div class="card-footer" style="padding: 0">
                <a href="{{ route('admin.chuyennganh.index')}}" class="btn btn-secondary" style="font-size: .875rem;">Quay lại</a>
                <button type="submit" class="btn btn-primary" style="font-size: .875rem;">Cập nhật</button>
            </div>
        </form>
    @endif
</div>

<style type="text/css">
    a.btn.btn-secondary {
        color: white;
}
</style>
@stop