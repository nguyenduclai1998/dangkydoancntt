<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Bootstrap Example</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<style type="text/css">
	.header {
	    text-align: center;
	}

	h3 {
		font-size: 16px;
		font-weight: bold;
	}
	span {
		font-size: 16px;
	}
	.tr-table th {
		text-align: center;
	}
</style>

<body>
	{{-- <div class="container">
		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 header">
				<h3>BỘ GIAO THÔNG VẬN TẢI</h3>
				<span>TRƯỜNG ĐẠI HỌC CÔNG NGHỆ GTVT</span>
			</div>

			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
			
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 header">
				<h3>DANH SÁCH GIÁO VIÊN HƯỚNG DẪN SINH VIÊN LÀM ĐỒ ÁN TỐT NGHIỆP </h3>
				<h3>NGÀNH HỆ THỐNG THÔNG TIN - ĐỢT 2 NĂM 2020</h3>
					<p>(Kèm theo Quyết định số       /QĐ-ĐHCNGTVT ngày       /03/2020 của Hiệu trưởng trường Đại học Công nghệ GTVT)</p>
			</div>
		</div>
	</div> --}}
	<div class="container-fuild">
		<table class="table table-bordered">
		    <thead>
		        <tr class="tr-table">
		            <th>STT</th>
		            <th>Mã sinh viên</th>
		            <th>Họ và tên</th>
		            <th>GVHD</th>
		            <th>Tên đề tài</th>
		            <th>Có phải sửa lại không</th>
		        </tr>
		    </thead>
		    <tbody>
		    	@if(isset($ketquaphandoan))
		    		@foreach($ketquaphandoan as $k => $kq)
				        <tr>
				            <td>{{$k + 1}}</td>
				            <td>{{$kq->users->masv}}</td>
				            <td>{{$kq->users->name}}</td>
				            <td>{{$kq->giangvienhuongdan->name}}</td>
				            <td>{{$kq->detai->tendetai}}</td>
				            <td></td>
				        </tr>
			        @endforeach
			    @endif
		    </tbody>
		</table>
	</div>
</body>
</html>