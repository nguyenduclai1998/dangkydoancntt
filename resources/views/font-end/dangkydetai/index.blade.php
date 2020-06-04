@extends('layouts.app_master_font_end')
@section('content')
@if(isset($detai))
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
                                                    <nav class="breadcrumb " style="padding-left: 0!important; margin-bottom: 0;" role="navigation" aria-labelledby="system-breadcrumb">
                                                        <ol>
                                                            <li class="title-topic">
                                                                <a href="{{route('home.index')}}">Trang chủ</a>
                                                                <span class="slash">»</span>
                                                                <a href="">{{$detai->chuyennganh->tenchuyennganh}}</a>
                                                                <span class="slash">»</span>
                                                                <a href="">{{$detai->tendetai}}</a>
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
                                <form action="{{ route('fontend.detai.postDangkydetai', ['id' => $detai->id, 'linhvuc_id' => $detai->linhvuc->id]) }}" method="POST" style="padding: 0;" id="dangkydetai">
                                    @csrf
                                    <div class="main-content-inner">
                                        @if(Auth::check())
                                        <div class="content-main">
                                            <div class="form-group">
                                                <label for="">Họ tên</label>
                                                <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" disabled placeholder="Họ tên">
                                                <label for="hoten" class="error"></label>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Mã sinh viên</label>
                                                <input type="text" class="form-control" name="masv" value="{{$thongtin->masv}}" disabled placeholder="Mã sinh viên">
                                                <label for="masv" class="error"></label>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Lớp</label>
                                                <input type="text" class="form-control" name="lop" value="{{$thongtin->thongtin->lop}}" disabled placeholder="Lớp">
                                                <label for="masv" class="error"></label>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Đề tài</label>
                                                <input type="text" class="form-control" name="detai" value="{{$detai->tendetai}}" disabled placeholder="Đề tài">
                                                <label for="masv" class="error"></label>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Lĩnh vực</label>
                                                <input type="text" class="form-control" name="linhvuc" value="{{$detai->linhvuc->tenlinhvuc}}" disabled placeholder="Đề tài">
                                                <label for="masv" class="error"></label>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Nguyện vọng</label>
                                                <select style="height: 40px;" class="form-control" name="nguyenvong">
                                                    <option value="">--Chọn nguyện vọng--</option>
                                                    <option value="1">Nguyện vọng 1</option>
                                                    <option value="2">Nguyện vọng 2</option>
                                                </select>
                                            </div>

                                            <div class="topic-content">
                                                <div class="topic-buttom text-center">
                                                    <button type="submit" class="btn btn-primary topic-buttom" style="background: #f4791e; border: #f4791e">ĐĂNG KÝ ĐỀ TÀI</button>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </form>
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
                                                                                Thông báo mở lớp Đào tạo cấp chứng chỉ thẩm tra viên an toàn giao thông đường bộ<img src="{{asset('font-end/img/newicon_vi.gif')}}" alt="hot news">                                                        </a>
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
            $("#dangkydetai").validate({
                rules: {
                    nguyenvong: {
                        required: true,
                    },
                },
                messages: {
                    nguyenvong: {
                        required: "Nguyện vọng không được bỏ trống.",
                    },
                }
            });
        });
    </script>
@endif
@stop