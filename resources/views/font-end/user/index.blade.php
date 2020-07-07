@extends('layouts.app_master_font_end')
@section('content')
@if(isset($info))
<!-- Content  -->
    <section class="content">
        <div class="breadcrumbs">
            <div class="breadcrumb-content-inner">
                <div class="gva-breadcrumb-content">
                    <div id="block-gavias-edubiz-breadcrumbs" class="text-dark block gva-block-breadcrumb block-system block-system-breadcrumb-block no-title">
                        <div class="breadcrumb-style">
                            <div class="container">
                                <div class="breadcrumb-content-main">
                                    <div class="">
                                        <div class="content block-content">
                                            <div class="breadcrumb-links">
                                                <div class="content-inner">
                                                    <nav class="breadcrumb" style="padding-left: 0px!important; margin-bottom: 0px!important;" role="navigation" aria-labelledby="system-breadcrumb">
                                                        <ol>
                                                            <li>
																<h2>Cập nhật thông tin cá nhân</h2>
                                                            </li>
                                                        </ol>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div role="main" class="main main-page">
            <div class="clearfix"></div>
            <div id="content" class="content content-full">
                <div class="container">
                    <div class="content-main-inner">
                        <div class="row">
                            <div id="page-main-content" class="main-content col-xs-12 col-md-9 sb-r">
                                <div class="main-content-inner">
                                    <form action="{{ route('post.fontend.info')}}" method="POST" style="padding: 0" id="updateProfile">
                                        @csrf
                                        <div class="content-main">
                                            <div class="form-group">
                                                <label for="">Họ tên</label>
                                                <input type="text" class="form-control" name="name" value="{{$info->name}}" placeholder="Họ tên">
                                                <label for="hoten" class="error"></label>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Mã sinh viên</label>
                                                <input type="text" class="form-control" name="masv" value="{{$info->masv}}"  placeholder="Mã sinh viên">
                                                <label for="masv" class="error"></label>
    										</div>
    										
    										<div class="form-group">
                                                <label for="">Email</label>
                                                <input type="text" class="form-control" name="email" value="{{$info->email}}" placeholder="Email">
                                                <label for="masv" class="error"></label>
    										</div>

                                            <div class="form-group">
                                                <label for="">Sở trường</label>
                                                <input type="text" class="form-control" name="sotruong" value="{{$info->thongtin->sotruong}}" placeholder="Sở trường">
                                                <label for="masv" class="error"></label>
                                            </div>
    										
                                            <div class="form-group">
                                                <label for="">Lớp</label>
                                                <input type="text" class="form-control" name="class" value="{{$info->thongtin->lop}}" placeholder="Lớp">
                                                <label for="masv" class="error"></label>
    										</div>

                                            <div class="form-group">
                                                <label for="">Ngày sinh</label>
                                                <input type="date" class="form-control" name="birthday" value="{{$info->thongtin->ngaysinh}}" placeholder="Ngày sinh">
                                                <label for="masv" class="error"></label>
                                            </div>

    										<div class="form-group">
                                                <label for="">Số điện thoại</label>
                                                <input type="text" class="form-control" name="phonenumber" value="{{$info->thongtin->sdt}}" placeholder="Số điện thoại">
                                                <label for="masv" class="error"></label>
    										</div>
    										
    										<div class="topic-content">
    											<div class="topic-buttom text-center" style="margin-bottom:15px">
    												<button type="submit" class="btn btn-primary update-buttom" style="background: #f4791e; border: #f4791e; max-height: 44px;">Cập nhật</button>
    											</div>
    										</div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Sidebar Right -->
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 sidebar sidebar-right theiaStickySidebar">
                                <div class="sidebar-inner">
                                    <div class="views-element-container block block-views block-views-blockpost-other-block-1">
                                        <h2 class="block-title" ><span>Tin mới</span></h2>
                                        <div class="content block-content">
                                            <div class="post-style-list small gva-view ">
                                                <div class="item-list">
                                                    <ul>
                                                        <li class="view-list-item" >
                                                            <div class="views-field views-field-nothing">
                                                                <div class="field-content">
                                                                    <div class="post-block">
                                                                        <div class="post-image">
                                                                            <a href="">
                                                                            <img src="{{asset('font-end/img/aa198226f6d778af0f29fcef70b6cbce.jpg')}}" alt="Thông báo mở lớp Đào tạo cấp chứng chỉ thẩm tra viên an toàn giao thông đường bộ" typeof="Image" />
                                                                            </a>
                                                                        </div>
                                                                        <div class="post-content">
                                                                            <div class="post-title">
                                                                                <a href="">
                                                                                Thông báo mở lớp Đào tạo cấp chứng chỉ thẩm tra viên an toàn giao thông đường bộ<img src="http://www.utt.edu.vn/publics/template/portal/images/newicon_vi.gif" alt="hot news">                                                        </a>
                                                                            </div>
                                                                            <div class="post-meta">
                                                                                <span class="post-created">10/05/2020 14:05</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--advertising area 1-->
                                </div>
                                <!-- End Sidebar Right -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Content  -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#updateProfile").validate({
                rules: {
                    email: {
                        email: true,
                    },
                    phonenumber: {
                        number: true,
                        maxlength: 10,
                        minlength: 10
                    },
                },
                messages: {
                    email: {
                        email: "Email chưa đúng định dạng.",
                    },
                    phonenumber: {
                        number: "Số điện thoại chưa đúng định dạng.",
                        maxlength: "Vui lòng nhập đúng số điện thoại.",
                        minlength: "Vui lòng nhập đúng số điện thoại.",
                    }
                }
            });
        });
    </script>
@endif
@stop