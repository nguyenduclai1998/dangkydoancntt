@extends('layouts.app_master_font_end')
@section('content')
@if(isset($tintuc))
<!-- Content  -->
<style type="text/css">
    .topic-content img {
        width: 90%;
        display: block; 
        margin-left: auto; 
        margin-right: auto;
    }
</style>
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
                                                                <a href="">{{$tintuc->tenbaiviet}}</a>
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
                                                                <span id="news-block-title" style="border-bottom:none; font-size: 22px!important">{{$tintuc->tenbaiviet}}</span>
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="topic-content">
                                                {!! $tintuc->noidung !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Sidebar Right -->
                             @if(isset($newNews))
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 sidebar sidebar-right theiaStickySidebar">
                                <div class="sidebar-inner">
                                    <div class="views-element-container block block-views block-views-blockpost-other-block-1">
                                        <h2 class="block-title" ><span>Tin mới</span></h2>
                                        <div class="content block-content">
                                            <div class="post-style-list small gva-view ">
                                                <div class="item-list">
                                                    <ul>
                                                        @foreach($newNews as $nn)
                                                        <li class="view-list-item" >
                                                            <div class="views-field views-field-nothing">
                                                                <div class="field-content">
                                                                    <div class="post-block">
                                                                        <div class="post-image" style="width: auto;">
                                                                            <a href="{{ route('fontend.tintuc.view', ['slug' => $nn->slug, 'id' => $nn->id])}}">
                                                                            @if($nn->avatar == null)
                                                                                <img style="max-width: 300px; height: auto;" src="{{asset('font-end/img/logo-utt.png')}}">
                                                                            @else
                                                                                <img style="max-width: 300px; height: auto;" src="{{asset('storage/uploads/'.$nn->avatar)}}">
                                                                            @endif
                                                                            </a>
                                                                        </div>
                                                                        <div class="post-content">
                                                                            <div class="post-title">
                                                                                <a href="{{ route('fontend.tintuc.view', ['slug' => $nn->slug, 'id' => $nn->id])}}">
                                                                                {{$nn->tenbaiviet}}<img src="{{asset('font-end/img/newicon_vi.gif')}}" alt="hot news">                                                        </a>
                                                                            </div>
                                                                            <div class="post-meta">
                                                                                <span class="post-created">10/05/2020 14:05</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--advertising area 1-->
                                </div>
                                <!-- End Sidebar Right -->
                            </div>
                            @endif
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