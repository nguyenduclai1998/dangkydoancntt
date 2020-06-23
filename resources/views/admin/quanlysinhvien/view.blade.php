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
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Kết quả đăng ký đồ án</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Kết quả phân đồ án</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Reset mật khẩu</a></li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    </div><!-- /.card-header -->
                        <div class="card-body" style="padding: 0">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="content">
                                        @if(isset($nguyenvong))
                                        <table class="table">
                                            <thead class="thead-inverse">
                                                <tr>
                                                    <th scope="col">Nguyện vọng</th>
                                                    <th scope="col">Tên đề tài</th>
                                                    <th scope="col">Lĩnh vực</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach($nguyenvong as $nv)
                                                    <tr>
                                                        <th scope="row">Nguyện vọng {{$nv->loainguyenvong}}</th>
                                                        <td>{{$nv->detai->tendetai}}</td>
                                                        <td>{{$nv->linhvuc->tenlinhvuc}}</td>
                                                    </tr>
                                                    @endforeach
                                            </tbody>
                                        </table> 
                                        @endif
                                    </div>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <div class="content">
                                        @if(isset($finalResult))
                                        <table class="table">
                                            <thead class="thead-inverse">
                                                <tr>
                                                    <th scope="col">Tên đề tài</th>
                                                    <th scope="col">Giảng viên hướng dẫn</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($finalResult as $fr)
                                                    <tr>
                                                        <td>{{$fr->detai->tendetai}}</td>
                                                        <td>{{$fr->giangvienhuongdan->name}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table> 
                                        @endif
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal" action="{{ route('admin.quanlysinhvien.resetpassword',['user_id' => $sinhvien->id])}}" method="POST" id="resetPassword">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Mật khẩu mới</label>
                                            <input id="newPassword" type="password" class="form-control" name="newPassword" placeholder="Mật khẩu mới">
                                            <label for="masv" class="error"></label>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Xác nhận mật khẩu</label>
                                            <input type="password" class="form-control" name="confirmPassword" placeholder="Xác nhận lại mật khẩu">
                                            <label for="masv" class="error"></label>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger">Reset mật khẩu</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.card-body -->
                    </div>
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