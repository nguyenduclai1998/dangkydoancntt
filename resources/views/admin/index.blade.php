@extends('layouts.app_master_admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <form action="{{ route('admin.setTime')}}" method="POST" id="datetimePicker" id="formTime">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Thời gian mở đăng ký</label>
                    <input type="text" class="form-control datetimepicker-input" id="datetimepicker1" name="timestart" data-toggle="datetimepicker" data-target="#datetimepicker1" />
                </div>

                <div class="form-group col-md-6">
                    <label>Thời gian kết thức đăng ký</label>
                    <input type="text" class="form-control datetimepicker-input" id="datetimepicker2" name="timeend" data-toggle="datetimepicker" data-target="#datetimepicker2" />
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </form>
    </div>
    <!-- /.container-fluid -->
</section>
<script type="text/javascript">
    $('#datetimepicker1').datetimepicker({
        defaultDate: new Date(),
        format: 'YYYY-MM-DD H:mm:ss',
        sideBySide: true
    });

    $('#datetimepicker2').datetimepicker({
        defaultDate: new Date(),
        format: 'YYYY-MM-DD H:mm:ss',
        sideBySide: true
    });
</script>
<!-- Main content -->
@stop