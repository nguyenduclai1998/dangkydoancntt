@extends('layouts.app_master_font_end')
@section('content')
<!-- Start contentMain -->
	<section class="contentMain">
		<!-- Main Teacher  -->
		<div class="main-row mainTeacher">
			<div class="container">
				<div class="title-main">
					DỊCH VỤ CHO GIẢNG VIÊN
				</div>
					<div class="row">
						<div class="col-xs-12 col-sm-3 item-teacher">
							<div>
								<div class="img-item">
									<img src="{{ asset('font-end/img/calendar-1.png')}}" alt="">
								</div>
								<p>Nhận đề tài và danh sách sinh viên hướng dẫn sau khi kết thúc thời gian đăng ký của sinh viên</p>
							</div>
						</div>
		
						<div class="col-xs-12 col-sm-3 item-teacher">
							<div>
								<div class="img-item">
									<img src="{{ asset('font-end/img/notebook-2.png')}}" alt="">
								</div>
								<p>Phân công đồ án tốt nghiệp và đồ án môn học</p>
							</div>
						</div>
	
						<div class="col-xs-12 col-sm-3 item-teacher">
							<div>
								<div class="img-item">
									<img src="{{ asset('font-end/img/search-3.png')}}" alt="">
								</div>
								<p>Tra cứu thông tin sinh viên</p>
							</div>
						</div>
			
						<div class="col-xs-12 col-sm-3 item-teacher">
							<div>
								<div class="img-item">
									<img src="{{ asset('font-end/img/file-5.png')}}" alt="">
								</div>
								<p>Quản lý đề tài, biểu mẫu</p>
							</div>
						</div>
					</div>
		
					<div class="row">
						<div class="col-xs-12 col-sm-3 item-teacher">
							<div>
								<div class="img-item">
									<img src="{{ asset('font-end/img/summary-6.png')}}" alt="">
								</div>
								<p>Thống kê, báo cáo những sinh viên đã đăng ký đề tài</p>
							</div>
						</div>
			
						<div class="col-xs-12 col-sm-3 item-teacher">
							<div>
								<div class="img-item">
									<img src="{{ asset('font-end/img/search-4.png')}}" alt="">
								</div>
								<p>Tra cứu thông tin đề tài</p>
							</div>
						</div>
			
						<div class="col-xs-12 col-sm-3 item-teacher">
							<div>
								<div class="img-item">
									<img src="{{ asset('font-end/img/search-4.png')}}" alt="">
								</div>
								<p>Thống kê tổng hợp số liệu</p>
							</div>
						</div>
		
						<div class="col-xs-12 col-sm-3 item-teacher">
							<div>
								<div class="img-item">
									<img src=" {{ asset('font-end/img/search-4.png')}}" alt="">
								</div>
								<p>Thống kê tổng hợp số liệu</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--End Main Teacher -->

		<!-- Main Student -->
		<div class="main-row mainStudent">
			<div class="container">
				<div class="title-main">
					DỊCH VỤ CHO SINH VIÊN
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-4 item-student">
						<div>
							<img src="{{ asset('font-end/img/book-search-1.png')}}" alt="">
							<p><strong>Tra cứu thông tin đồ án</strong></p>
							<p>Tra cứu thông tin phân công đồ án, chi tiết đồ án.</p>
						</div>	
					</div>

					<div class="col-xs-12 col-sm-4 item-student">
						<div>
							<img src="{{ asset('font-end/img/desktop-2.png')}}" alt="">
							<p><strong>Yêu cầu biểu mẫu online</strong></p>
							<p>Điền thông tin và gửi yêu cầu các loại biểu mẫu online. Viện sẽ xử lý và thông báo qua email cho Sinh viên khi hoàn thành, Sinh viên chỉ lên một lần để nhận kết quả.</p>
						</div>			
					</div>

					<div class="col-xs-12 col-sm-4 item-student">
						<div>
							<img src="{{ asset('font-end/img/templates-3.png')}}" alt="">
							<p><strong>Đăng ký nguyện vọng Đồ án</strong></p>
							<p>Tham khảo các hướng đề tài của Giáo viên, đăng ký nguyện vọng là Đồ án với giáo viên và đề tài mong muốn.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- End MainStudent  -->
		<div class="main-row mainInstruction">
			<div class="container">
				<div class="main-row instruction">
					<div class="title-main">
						HƯỚNG DẪN SỬ DỤNG DỊCH VỤ TRỰC TUYẾN
					</div>
				</div>
				<div class="col-xs-12 col-sm-5 col-sm-offset-1 col-instruction">
					<div class="item-instruction">
						<div class="item-instruction-icon step-1">
							<img src="{{ asset('font-end/img/step-5.png')}}" alt="">
						</div>
						<div class="item-instruction-content">
							<div class="item-instruction-content-title" style="color:#582d7a">NHẬN TÀI KHOẢN</div>
							Mỗi sinh viên được cấp một tài khoản với tài khoản và mật khẩu mặc định là mã số sinh viên
						</div>
					</div>
	
					<div class="item-instruction">
						<div class="item-instruction-icon step-2">
							<img src="{{ asset('font-end/img/step-2.png')}}" alt="">
						</div>
						<div class="item-instruction-content">
							<div class="item-instruction-content-title" style="color:#1b998f">GỬI YÊU CẦU</div>
							Mỗi sinh viên được cấp một tài khoản với tài khoản và mật khẩu mặc định là mã số sinh viên
						</div>
					</div>
				</div>
	
				<div class="col-xs-12 col-sm-5 col-sm-offset-1 col-instruction">
					<div class="item-instruction">
						<div class="item-instruction-icon step-3">
							<img src="{{ asset('font-end/img/step-3.png')}}" alt="">
						</div>
						<div class="item-instruction-content">
							<div class="item-instruction-content-title" style="color:#7caa46">NHẬN TÀI KHOẢN</div>
							Mỗi sinh viên được cấp một tài khoản với tài khoản và mật khẩu mặc định là mã số sinh viên
						</div>
					</div>
	
					<div class="item-instruction">
						<div class="item-instruction-icon step-4">
							<img src="{{ asset('font-end/img/step-4.png')}}" alt="">
						</div>
						<div class="item-instruction-content">
							<div class="item-instruction-content-title" style="color:#582d7a">GỬI YÊU CẦU</div>
							Mỗi sinh viên được cấp một tài khoản với tài khoản và mật khẩu mặc định là mã số sinh viên
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row-main mainContact">
			<div class="container">
				<div class="title-main">
					LIÊN HỆ
				</div>
				<div class="main-row contact-item">
					<p>Nếu bạn có câu hỏi/đề xuất/vấn đề gì, hãy Gửi phản hồi cho chúng tôi.</p>
				</div>
			</div>
		</div>
	
	</section>
	<!-- End ContentMain -->
@stop