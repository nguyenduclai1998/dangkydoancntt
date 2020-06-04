@extends('layouts.app_master_admin')
@section('content')
<section class="content">
	@if(isset($sinhvien))
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @if($sinhvien->thongtin->avatar == null)
                                <img style="max-width: 128px; height: auto;" src="{{ asset('admin/dist/img/default-avatar.png')}}" alt="" class="img-circle img-fluid">
                            @else
                                <img style="max-width: 128px; height: auto;" src="{{ asset('admin/dist/img/user1-128x128.jpg')}}" alt="" class="img-circle img-fluid">
                            @endif
                        </div>
                        <h3 class="profile-username text-center">{{$sinhvien->name}}</h3>
                        <p class="text-muted text-center">{{$sinhvien->role->rolename}}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Giới tính</b> <a class="float-right">{{$sinhvien->thongtin->gioitinh}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Ngày sinh</b> <a class="float-right">{{$sinhvien->thongtin->ngaysinh}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right">{{$sinhvien->email}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Số điện thoại</b> <a class="float-right">{{$sinhvien->thongtin->sdt}}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin cá nhân</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i>Học hàm</strong>
                        <p class="text-muted">
                            {{$sinhvien->thongtin->hocham}}
                        </p>
                        <strong><i class="far fa-file-alt mr-1"></i> Ghi chú</strong>
                        <p class="text-muted">{{$sinhvien->thongtin->ghichu}}</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link" style="background-color: #007bff; color: #fff;" href="#activity" data-toggle="tab">Cấp quyền</a></li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane" id="activity">
                                
                            </div>
                            
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    @endif
</section>
@stop