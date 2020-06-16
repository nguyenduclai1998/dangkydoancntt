<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <title>Trang quản trị</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css')}}">

        <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css')}}">
        <link rel="stylesheet" href="{{ asset('admin/css/upload.css')}}">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap&subset=vietnamese">

        <!-- DataTables CSS -->
        <script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
        <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap&subset=vietnamese" rel="stylesheet">
        <script src="{{ asset('admin/ckeditor/ckeditor.js')}}"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

        <!-- Select2 from a CDN -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

        {{-- Datetime Picker --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
        <link rel="stylesheet" href="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css">
        <script src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/js/bootstrap-datetimepicker.min.js"></script>
        @toastr_css        
    </head>
    <style type="text/css">
        label.error {
            color: red;
        }
        .dataTables_length {
            margin-bottom: 16px;
        }

        .dataTables_length select {
            background-color: #fff;
            padding: 5px 10px;
        }

        .dataTables_filter { margin-bottom: 16px; }
        .dataTables_filter input {
            padding: 5px 10px;
            border: 1px solid #dee2e6;
        }
        .dataTable thead th{
            border-bottom: 2px solid #dee2e6!important;
        }
        table.dataTable.no-footer {
            border-bottom: 1px solid #dee2e6!important;
        }
        div#usersTable_wrapper {
            width: 100%;
        }

        .dropdown {
            float:left;
        }

        .dropdown .dropbtn {
          font-size: 16px;  
          border: none;
          outline: none;
          color: white;
          background-color: inherit;
          font-family: inherit;
          margin: 0;
        }

        .dropdown-content {
           display: none; 
          position: absolute;
          background-color: #f9f9f9;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }

        .dropdown-content a:hover {
          background-color: #3e84e0;
            color:white;
            box-shadow:2px 12px 20px 2px rgba(0,0,0,.5);
        }

        .dropdown:hover .dropdown-content {
          display: block;
        }

        .dropdown-content a {
          float: none;
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
          text-align: left;
        }

    </style>
    <body class="hold-transition sidebar-mini layout-navbar-fixed">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ route('admin.index')}}" class="nav-link">Home</a>
                    </li>   
                </ul>
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto" style="margin-right: 95px;">
                    <div class="dropdown">
                         <div class="image">
                            <button class="dropbtn" style="border: none;"><img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" style="width: 33.59px; height: auto;" class="img-circle elevation-2" alt="User Image"></button><span>{{Auth::user()->name}}</span>
                            <div class="dropdown-content">
                                <a href="{{ route('admin.quanlygiaovien.profile')}}">Cập nhật thông tin</a>
                                <a href="{{ route('post.admin.logout')}}"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                            </div>
                        </div>
                    </div>
                </ul>
            </nav>
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 100vh; position: fixed; margin-top: 0px">
                <!-- Brand Logo -->
                <a href="{{ route('admin.index')}}" class="brand-link elevation-4">
                <img src="{{asset('font-end/img/logo-utt.png')}}"
                    alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">UTT</span>
                </a>
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <a href="{{ route('admin.quanlygiaovien.profile')}}"><img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"></a>
                        </div>
                        @if(Auth::check())
                        <div class="info">
                            <a href="{{ route('admin.quanlygiaovien.profile')}}" class="d-block">{{Auth::user()->name}}</a>
                        </div>
                        @endif
                    </div>
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                with font-awesome or any other icon font library -->
                            <li class="nav-item has-treeview">
                                <a href="{{ route('admin.indexTime')}}" class="nav-link">
                                    <i class="nav-icon fas fa-table"></i>
                                    <p>
                                        Thời gian mở đăng ký
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Đề tài
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @if(isset($CHUYENNGANHS))
                                        @foreach($CHUYENNGANHS as $cn)
                                            <li class="nav-item">
                                                <a href="{{ route('admin.topic.index',$cn->id)}}" class="nav-link menu" style="max-width: 235px">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>{{$cn->tenchuyennganh}}</p>
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                    
                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="{{ route('admin.chuyennganh.index')}}" class="nav-link">
                                    <i class="nav-icon fas fa-table"></i>
                                    <p>
                                        Chuyên ngành
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="{{ route('admin.linhvuc.index')}}" class="nav-link">
                                    <i class="nav-icon fas fa-table"></i>
                                    <p>
                                        Lĩnh vực
                                    </p>
                                </a>
                            </li>
                            @if(Auth::check() && Auth::user()->role_id == 1)
                            <li class="nav-item has-treeview">
                                <a href="{{ route('admin.quanlygiaovien.index')}}" class="nav-link">
                                    <i class="nav-icon fas fa-table"></i>
                                    <p>
                                        Quản lý giáo viên
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="{{ route('admin.quanlysinhvien.index')}}" class="nav-link">
                                    <i class="nav-icon fas fa-table"></i>
                                    <p>
                                        Quản lý sinh viên
                                    </p>
                                </a>
                            </li>
                            @endif
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Tin tức
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @if(isset($CHUYENNGANHS))
                                        @foreach($CHUYENNGANHS as $cn)
                                            <li class="nav-item">
                                                <a href="{{ route('admin.tintuc.index',$cn->id)}}" class="nav-link menu" style="max-width: 235px">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>{{$cn->tenchuyennganh}}</p>
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                    
                                </ul>
                            </li>
                            @if(Auth::check() && Auth::user()->role_id == 1)
                            <li class="nav-item has-treeview">
                                <a href="{{ route('admin.ketquadangky.index')}}" class="nav-link">
                                    <i class="nav-icon fas fa-table"></i>
                                    <p>
                                        Kết quả đăng ký đề tài
                                    </p>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                @yield('content')
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
        <!-- jQuery -->
        
        <!-- Bootstrap 4 -->
        <script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('admin/dist/js/demo.js')}}"></script>
        <script src="{{asset('admin/js/main.js')}}"></script>
        <!-- jQuery -->
         
        <!-- DataTables -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <!-- Validate Jquery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        <script src="{{asset('admin/dist/js/validate.js')}}"></script>
        <script type="text/javascript">
            CKEDITOR.replace( 'content', {
                filebrowserUploadUrl: "{{route('admin.image.upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form',
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.sinhvien-select').select2();
            });
        </script>
    </body>

    @toastr_js
    @toastr_render

    @stack('scripts')
    
</html>