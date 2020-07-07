@extends('layouts.app_master_font_end')
@section('content')
@if(isset($nguyenvong))
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
																<h2>Kết quả đăng ký</h2>
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
                                    <table class="table">
									    <thead class="thead-inverse">
									        <tr>
									            <th scope="col">Nguyện vọng</th>
									            <th scope="col">Tên đề tài</th>
									            <th scope="col">Lĩnh vực</th>
									        </tr>
									    </thead>
									    <tbody>
									    	@foreach( $nguyenvong as $nv)
										        <tr>
										            <th scope="row">Nguyện vọng {{$nv->loainguyenvong}}</th>
										            <td>{{$nv->detai->tendetai}}</td>
										            <td>{{$nv->linhvuc->tenlinhvuc}}</td>
										        </tr>
										    @endforeach
									    </tbody>
									</table>
                                </div>

                                @if(isset($ketqua))
                                <div class="content-inner">
                                    <nav class="breadcrumb" style="padding-left: 0px!important; margin-bottom: 0px!important;" role="navigation" aria-labelledby="system-breadcrumb">
                                        <ol>
                                            <li>
                                                <h2>Kết quả phân đồ án</h2>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>

                                <div class="main-content-inner">
                                    <table class="table">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th scope="col">Tên đề tài</th>
                                                <th scope="col">Giảng viên hướng dẫn</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$ketqua->detai->tendetai}}</td>
                                                <td>{{$ketqua->giangvienhuongdan->name}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @endif
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
                                                                            <img src="{{ asset('font-end/img/aa198226f6d778af0f29fcef70b6cbce.jpg')}}" alt="Thông báo mở lớp Đào tạo cấp chứng chỉ thẩm tra viên an toàn giao thông đường bộ" typeof="Image" />
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
@endif
@stop