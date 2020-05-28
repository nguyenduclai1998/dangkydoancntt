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
                                                                <a href="{{ route('fontend.detai.index',['slug' => $detai->chuyennganh->slug, 'id' => $detai->chuyennganh->id])}}">{{$detai->chuyennganh->tenchuyennganh}}</a>
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

            <div id="content" class="content content-full">
                <div class="container">
                    <div class="content-main-inner">
                        <div class="row">
                            <div id="page-main-content" class="main-content col-xs-12 col-md-9 sb-r">
                                <div class="main-content-inner">
                                    <div class="content-main">
                                        <div>
                                            <div id="" class="block block-block-content no-title">
                                                <div class="content block-content">
                                                    <div class="field field--name-body field--type-text-with-summary field--label-hidden field__item">
                                                        <div class="block news-cat-title">
                                                            <h2 class="block-title">
                                                                <span id="news-block-title" style="border-bottom:none; font-size: 22px!important">{{$detai->tendetai}}</span>
                                                            </h2>
                                                            <div class="post-meta">
                                                                <span class="post-created">Số người đăng ký: {{count($subscribers)}} </span>
                                                                <span class="post-created"> | Lượt xem: {{$detai->view}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="topic-content">
                                                {!! $detai->mota !!}
                                                <div class="topic-buttom text-center">
                                                    <a href="{{route('fontend.detai.getDangkydetai', ['id' => $detai->id])}}" class="btn btn-primary topic-buttom" style="background: #f4791e; border: #f4791e" title=""> ĐĂNG KÝ ĐỀ TÀI</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Content  -->
@endif
@stop