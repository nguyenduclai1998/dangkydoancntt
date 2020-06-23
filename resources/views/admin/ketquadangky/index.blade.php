@extends('layouts.app_master_admin')
@section('content')
<!-- Content Header (Page header) -->

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kết quả đăng ký</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.ketquadangky.index')}}">Kết quả đăng ký</a></li>
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
                <h3 class="card-title">Kết quả đăng ký</h3>
                <div class="card-tools">
                </div>
            </div>

            <div class="card-body pb-0">
                <div class="card-body table-responsive p-0">
                    <table id="ketquaTable" class="table table table-striped table-bordered" class="display" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Sinh viên</th>
                                <th scope="col">Mã sinh viên</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($ketquadangky))
                            @foreach($ketquadangky as $k => $kq)
                                <tr>
                                    <th scope="row">{{$k + 1}}</th>
                                    <td>{{$kq->users->name}}</td>
                                    <td>{{$kq->users->masv}}</td>
                                    <td><a href="{{ route('admin.quanlysinhvien.view', ['id' => $kq->users->id])}}">Xem chi tiết</a></td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div>
            {{-- {{ $detai->links() }} --}}
        </div>
    </div>
</div>
<!-- /.row -->
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
        $('#ketquaTable').DataTable({
            
        });
    });
</script>
@endpush
@stop
