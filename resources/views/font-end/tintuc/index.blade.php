@extends('layouts.app_master_font_end')
@section('content')
@if(isset($tintuc))
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
                                                    <nav class="breadcrumb " role="navigation" aria-labelledby="system-breadcrumb">
                                                        <ol>
                                                            <li>
                                                                <a href="index.html">Trang chủ</a>
                                                                <span class="slash">»</span>
                                                                <a href="{{ route('get.fontend.news')}}">Tin tức</a>
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
                                    <div class="content-main">
                                        <div>
                                            <div id="" class="block block-block-content no-title">
                                                <div class="content block-content">
                                                    <div class="field field--name-body field--type-text-with-summary field--label-hidden field__item">
                                                        <div class="block news-cat-title">
                                                            <h2 class="block-title">
                                                                <span id="news-block-title">Tin tức sự kiện</span>
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @foreach($tintuc as $tt)
                                                <div id="block-gavias-edubiz-content" class="block block-system block-system-main-block no-title">
                                                    <div class="content block-content">
                                                        <div class="views-element-container">
                                                            <div class="post-style-list gva-view view-page">
                                                                <div class="item-list">
                                                                    <ul>
                                                                        <li class="view-list-item" >
                                                                            <div class="views-field views-field-nothing">
                                                                                <span class="field-content">
                                                                                    <div class="post-block">
                                                                                        <div class="post-image img">
                                                                                            {{-- {{dd($tt->slug)}} --}}
                                                                                            <a href="{{ route('fontend.tintuc.view', ['slug' => $tt->slug, 'id' => $tt->id])}}">
                                                                                                @if($tt->avatar == null)
                                                                                                    <img style="max-width: 300px; height: auto;" src="{{asset('font-end/img/logo-utt.png')}}">
                                                                                                @else
                                                                                                    <img style="max-width: 300px; height: auto;" src="{{asset('storage/uploads/'.$tintuc->avatar)}}">
                                                                                                @endif
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="post-content">
                                                                                            <div class="post-title"><a href="{{ route('fontend.tintuc.view', ['slug' => $tt->slug, 'id' => $tt->id])}}">{{$tt->tenbaiviet}}</a></div>
                                                                                            <div class="post-meta margin-bottom-10">
                                                                                                <span class="post-created">Ngày tạo: {{$tt->created_at}}</span>
                                                                                            </div>
                                                                                            <div class="body hidden-xs">{!! Str::limit(strip_tags($tt->noidung), 230) !!}</div>
                                                                                            <div class="tags"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </span>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <!-- Pagination -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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
                        </div>
                    </div>
                    <div>
                        {{ $tintuc->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Content  -->
@endif
@stop