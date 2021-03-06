@extends('layouts.app_master_admin')
@section('content')
@if(isset($sinhvien))
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý sinh viên</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href=" {{ route('admin.quanlysinhvien.index')}}">Sinh viên</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh sách sinh viên</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" style="font-size: .875rem;"><a href="{{ route('admin.quanlysinhvien.create')}}" style="color: #fff">Thêm mới </a><i class="fas fa-plus"></i></button><br>
                <h3 class="card-title" style="margin: 10px 0px">Import file Excel</h3>
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="input-group mb-3" style="margin-top: 1rem!important">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file" id="inputGroupFile02">
                            <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
                        </div>
                    </div>
                    <button class="btn btn-primary">Upload</button>
                </form>
            </div>

            <section class="content">
                <div class="card-body pb-0">
                    <div class="row d-flex align-items-stretch">
                        <table id="usersTable" class="table table table-striped table-bordered" class="display" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Họ và tên</th>
                                    <th scope="col">Mã sinh viên</th>
                                    <th scope="col">Lớp</th>
                                    <th scope="col">Ghi chú</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($sinhvien))
                                    @foreach($sinhvien as $k => $sv)
                                        <tr>
                                            <th scope="row">{{$k + 1}}</th>
                                            <td>{{$sv->name}}</td>
                                            <td>{{$sv->masv}}</td>
                                            <td>{{$sv->thongtin->lop}}</td>
                                            <td>{{$sv->thongtin->ghichu}}</td>
                                            <td><a href="{{ route('admin.quanlysinhvien.view', ['id' => $sv->id])}}">Xem chi tiết</a></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.card -->
    </div>
</div>

@push('scripts')
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#usersTable').DataTable({
            // dom: 'Bfrtip',
            // buttons: [
            //     'excel', 'pdf', 'print'
            // ]
        });
    });
</script>
@endpush
<style type="text/css">
    .card.bg-light {
        width: 100%;
    }

    button.dt-button {
        height: 35px;
        width: 70px;
        font-weight: 500;
        border-radius: 1px;
        margin-left: 6px;
}
</style>
<!-- /.row -->
@endif
@stop