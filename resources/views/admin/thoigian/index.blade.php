@extends('layouts.app_master_admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý thời gian</h1>
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
                <h3 class="card-title">Quản lý thời gian</h3>
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
                <form action="{{ route('admin.setTime')}}" method="POST" id="datetimePicker" id="formTime">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Thời gian mở đăng ký</label>
                            <input type="text" class="form-control datetimepicker-input" id="datetimepicker1" name="timestart" data-toggle="datetimepicker" data-target="#datetimepicker1" />
                        </div>

                        <div class="form-group col-md-6">
                            <label>Thời gian kết thức đăng ký</label>
                            <input type="text" class="form-control datetimepicker-input" id="datetimepicker2" name="timeend" data-toggle="datetimepicker" data-target="#datetimepicker2" />
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </form>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Mã</th>
                            <th scope="col">Thời gian mở đăng ký </th>
                            <th scope="col">Thời gian kết thúc đăng ký</th>
                            <th scope="col">Hoạt động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($checkTime))
                        <tr>
                            <th scope="row">1</th>
                            <td>{{$checkTime->time_start}}</td>
                            <td>{{$checkTime->time_end}}</td>
                            <td>
                                <a href="{{ route('admin.deteleTime', ['id' => $checkTime->id])}}" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i> Xóa</a>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.row -->

<script type="text/javascript">
    $('#datetimepicker1').datetimepicker({
        defaultDate: new Date(),
        format: 'YYYY-MM-DD H:mm:ss',
        sideBySide: true
    });

    $('#datetimepicker2').datetimepicker({
        defaultDate: new Date(),
        format: 'YYYY-MM-DD H:mm:ss',
        sideBySide: true
    });
</script>
@stop