@extends('layouts.app_master_admin')
@section('content')
@if(isset($giaovien))
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @if($giaovien->thongtin->avatar == null)
                                <img style="max-width: 128px; height: auto;" src="{{ asset('admin/dist/img/default-avatar.png')}}" alt="" class="img-circle img-fluid">
                            @else
                                <img style="max-width: 128px; height: auto;" src="{{ asset('admin/dist/img/user1-128x128.jpg')}}" alt="" class="img-circle img-fluid">
                            @endif
                        </div>
                        <h3 class="profile-username text-center">{{$giaovien->name}}</h3>
                        <p class="text-muted text-center">{{$giaovien->role->rolename}}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Giới tính</b> <a class="float-right">{{$giaovien->thongtin->gioitinh}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Ngày sinh</b> <a class="float-right">{{$giaovien->thongtin->ngaysinh}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right">{{$giaovien->email}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Số điện thoại</b> <a class="float-right">{{$giaovien->thongtin->sdt}}</a>
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
                            {{$giaovien->thongtin->hocham}}
                        </p>
                        <strong><i class="far fa-file-alt mr-1"></i> Ghi chú</strong>
                        <p class="text-muted">{{$giaovien->thongtin->ghichu}}</p>
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
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Phân quyền</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Danh sách sinh viên hướng dẫn</a></li>
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
                                        <form action="{{ route('admin.quanlygiaovien.role', ['id' => $giaovien->id])}}" method="POST" id="role">
                                            @csrf
                                            <label for="">Phân quyền</label>
                                            <select style="height: 40px;" class="form-control" name="role">
                                                <option value="">--Chọn quyền--</option>
                                                @if(isset($role))
                                                    @foreach($role as $rl)
                                                        <option value="{{$rl->id}}" {{$giaovien->role_id == $rl->id ? "selected='seleted'" : "" }}>{{$rl->rolename}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary role" style="font-size: .875rem; margin-top: 10px">Phân quyền</button>      
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <div class="content">
                                        
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal" action="{{ route('admin.quanlysinhvien.resetpassword',['user_id' => $giaovien->id])}}" method="POST" id="resetPassword">
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
</section>
<script type="text/javascript">
        $(document).ready(function() {
            $("#role").validate({
                rules: {
                    role: {
                        required: true,
                    }
                },
                messages: {
                    role: {
                        required: "Quyền không được để trống.",
                    }
                }
            });
        });
    </script>
@endif
@stop