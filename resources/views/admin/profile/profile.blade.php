@extends('layouts.app_master_admin')
@section('content')
@if(isset($user))
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @if($user->thongtin->avatar == null)
                                <img style="max-width: 128px; height: auto;" src="{{ asset('admin/dist/img/default-avatar.png')}}" alt="" class="img-circle img-fluid">
                            @else
                                <img style="max-width: 128px; height: auto;" src="{{ asset('admin/dist/img/user1-128x128.jpg')}}" alt="" class="img-circle img-fluid">
                            @endif
                        </div>
                        <h3 class="profile-username text-center">{{$user->name}}</h3>
                        <p class="text-muted text-center">{{$user->role->rolename}}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Giới tính</b> <a class="float-right">{{$user->thongtin->gioitinh}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Ngày sinh</b> <a class="float-right">{{$user->thongtin->ngaysinh}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right">{{$user->email}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Số điện thoại</b> <a class="float-right">{{$user->thongtin->sdt}}</a>
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
                            {{$user->thongtin->hocham}}
                        </p>
                        <strong><i class="far fa-file-alt mr-1"></i> Ghi chú</strong>
                        <p class="text-muted">{{$user->thongtin->ghichu}}</p>
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
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Cập nhật thông tin</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Đổi mật khẩu</a></li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    </div><!-- /.card-header -->
                        <div class="card-body" style="padding: 0">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="content">
                                        <form action="{{ route('post.fontend.info')}}" method="POST" style="padding: 0" id="updateProfile">
                                        @csrf
                                        <div class="content-main">
                                            <div class="form-group">
                                                <label for="">Họ tên</label>
                                                <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Họ tên">
                                                <label for="hoten" class="error"></label>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="text" class="form-control" name="email" value="{{$user->email}}" placeholder="Email">
                                                <label for="masv" class="error"></label>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Ngày sinh</label>
                                                <input type="date" class="form-control" name="birthday" value="{{$user->thongtin->ngaysinh}}" placeholder="Ngày sinh">
                                                <label for="masv" class="error"></label>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Phân quyền</label>
                                                <select style="height: 40px;" class="form-control" name="gioitinh">
                                                    <option value="">--Chọn giới tính--</option>
                                                        <option value="Nam">Nam</option>
                                                        <option value="Nữ">Nữ</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Số điện thoại</label>
                                                <input type="text" class="form-control" name="phonenumber" value="{{$user->thongtin->sdt}}" placeholder="Số điện thoại">
                                                <label for="masv" class="error"></label>
                                            </div>
                                            
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary role" style="font-size: .875rem; margin-top: 10px">Cập nhật</button>      
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <div class="content">
                                        <form action="{{ route('post.fontend.changepassword')}}" method="POST" id="changePassword" style="padding: 0">
                                        @csrf
                                        <div class="content-main">
                                            <div class="form-group">
                                                <label for="">Mật khẩu hiện tại</label>
                                                <input type="password" class="form-control" name="password" value="" placeholder="Mật khẩu hiện tại">
                                                <label for="hoten" class="error"></label>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Mật khẩu mới</label>
                                                <input id="newPassword" type="password" class="form-control" name="newPassword" value="" placeholder="Mật khẩu mới">
                                                <label for="masv" class="error"></label>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="">Xác nhận mật khẩu</label>
                                                <input type="password" class="form-control" name="confirmPassword" value="" placeholder="Xác nhận lại mật khẩu">
                                                <label for="masv" class="error"></label>
                                            </div>
                                            
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary role" style="font-size: .875rem; margin-top: 10px">Đổi mật khẩu</button>      
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
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

    $(document).ready(function() {
        $("#changePassword").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 8
                },
                newPassword: {
                    required: true,
                    minlength: 8
                },
                confirmPassword: {
                    required: true,
                    minlength: 8,
                    equalTo: "#newPassword",
                }
            },
            messages: {
                password: {
                    required: "Mật khẩu không được để trống.",
                    minlength: "Mật khẩu tối thiểu là 8 kí tự."
                },
                newPassword: {
                    required: "Mật khẩu không được để trống.",
                    minlength:  "Mật khẩu tối thiểu là 8 kí tự."
                },
                confirmPassword: {
                    required: "Mật khẩu không được để trống.",
                    minlength: "Mật khẩu tối thiểu là 8 kí tự.",
                    equalTo: "Mật khẩu không trùng nhau."
                }
            }
        });
    });
</script>
@endif
@stop