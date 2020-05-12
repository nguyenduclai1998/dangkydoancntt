@extends('layouts.app_master_admin')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm mới tin tức</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.tintuc.tintuc')}}">Tin tức</a></li>
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
    <form action="{{ route('admin.tintuc.store')}}" method="POST" enctype="multipart/form-data" id="tintuc">
    @csrf
        <div class="row">
            <div class="form-group col-sm-12 col-md-8 col-lg-8">
                <label for="formGroupExampleInput">Tên tin tức</label>
                <input type="text" class="form-control" name="tenbaiviet" placeholder="Tên tin tức">
            </div>

            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Chuyên ngành</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="chuyennganh">
                        <option value="">--Chọn chuyên ngành--</option>
                        @if(isset($CHUYENNGANHS))
                            @foreach($CHUYENNGANHS as $cn)
                                <option value="{{$cn->id}}">{{$cn->tenchuyennganh}}</option>
                            @endforeach
                        @endif
                    </select>
                  </div>
            </div>

            <div class="mb-3 col-sm-12 col-md-8 col-lg-8 content">
                <label for="formGroupExampleInput">Mô tả</label>
                <textarea class="textarea" placeholder="Mô tả" id="content" name="noidung" 
                    style="width: 100%; height: 400px!important; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>

            <div class="form-group col-sm-12 col-md-4 col-lg-4">
                <label for="formGroupExampleInput">Ảnh đại diện</label>
                <div class="col-sm-6 imgUp">
                    <div class="imagePreview"></div>
                        <label class="btn btn-primary uploadImage"> Upload
                            <input type="file" class="uploadFile img" value="Upload Photo" name="upload" style="width: 0px;height: 0px;overflow: hidden;">
                        </label>
                </div>
            <!-- col-2 -->
            </div>
        </div>
        <div class="card-footer" style="padding: 0">
            <a href="{{ route('admin.tintuc.tintuc')}}" class="btn btn-secondary" style="font-size: .875rem;">Quay lại</a>
            <button type="submit" class="btn btn-primary" style="font-size: .875rem;">Thêm mới</button>
        </div>
    </form>
</div>

<style type="text/css">
    a.btn.btn-secondary {
        color: white;
}
</style>
@stop