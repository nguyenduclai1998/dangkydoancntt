<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Trang chủ</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap&subset=vietnamese">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pushy/1.3.0/css/pushy.min.css">
	<link rel="stylesheet" href="{{ asset('font-end/css/index.css')}}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	@toastr_css
</head>
<style type="text/css">
	button.toast-close-button {
	    position: absolute;
	}

	section.content {
        min-height: 53.5vh;
    }

    li.time {
	  	display: inline-block;
	  	font-size: 1.5em;
	  	list-style-type: none;
	  	padding: 1em;
	  	text-transform: uppercase;
	}

	li.time span {
		display: block;
	  	font-size: 4.5rem;
	}

</style>
<body>
	<div class="fullscreeen">
			<!-- Pushy Menu -->
		<nav class="pushy pushy-left">
			<div class="pushy-content">
				<ul>
					<li class="pushy-link"><a href="#">Trang chủ</a></li>
					<li class="pushy-submenu">
						<button>Đề tài</button>
						<ul>
							@if(isset($CHUYENNGANHS))
								@foreach($CHUYENNGANHS as $cn)
									<li class="pushy-link"><a href="{{ route('fontend.detai.index',['slug' => $cn->slug, 'id' => $cn->id])}}" title="">{{$cn->tenchuyennganh}}</a></li>
								@endforeach
							@endif
						</ul>
					</li>
					<li class="pushy-link"><a href="{{ route('get.fontend.news')}}">Tin tức</a></li>
					<li class="pushy-link"><a href="#">Liên hệ</a></li>
					@if(!Auth::check())
					<li class="pushy-link"><a href="{{ route('get.admin.login')}}">Đăng nhập</a></li>
					@endif
					<!-- Submenu -->
					<li class="pushy-submenu">
						@if(Auth::check())
						<button>{{Auth::user()->name}}</button>
						@endif
						<ul>
							<li class="pushy-link"><a href="{{ route('get.fontend.info')}}">Cập nhật thông tin</a></li>
							<li class="pushy-link"><a href="{{ route('get.fontend.changepassword')}}">Đổi mật khẩu</a></li>
							<li class="pushy-link"><a href="{{ route('get.fontend.registerResult')}}">Kết quả đăng ký</a></li>
							<li class="pushy-link"><a href="{{ route('post.admin.logout')}}">Đăng xuất</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		<!-- navbarMain start -->
		<section class="navbarMain">
			<div class="container">
				<div class="navbarMain__wrap">
					<img src="{{ asset('font-end/img/logo.png')}}" alt="Trường đại học Công nghệ giao thông vận tải">
					@if(!Auth::check())
					<a href="{{ route('get.admin.login')}}" class="btn btn-default btn-login"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
					@endif
				</div>
			</div>
			<div class="navbarMain__menu">
				<div class="container">
					<div class="row">
						<div class="left-menu">
							<ul class="navbarMain__menu__wrap">
								<li class=""><a href="">Trang chủ</a></li>
								
								<li class="dropdown_menu" >
									<a href="" class="">Đề tài</a>
									<ul class="dropdown_content">
										@if(isset($CHUYENNGANHS))
											@foreach($CHUYENNGANHS as $cn)
												<a href="{{ route('fontend.detai.index',['slug' => $cn->slug, 'id' => $cn->id])}}" title="">{{$cn->tenchuyennganh}}</a>
											@endforeach
										@endif
									</ul>
								</li>
								<li class=""><a href="{{ route('get.fontend.news')}}">Tin tức</a></li>
								<li class=""><a href="">Liên hệ</a></li>
							</ul>
							<ul class="navbarMain__account">
								@if(Auth::check())
			                        <div class="info">
			                            <li class="dropdown_menu" >
											<a href="" class="">{{Auth::user()->name}}</a>
											<ul class="dropdown_content" style="min-width: 200px;">
												<a href="{{ route('get.fontend.info')}}">Cập nhật thông tin</a>
												<a href="{{ route('get.fontend.changepassword')}}">Đổi mật khẩu</a>
												<a href="{{ route('get.fontend.registerResult')}}">Kết quả đăng ký</a>
												<a href="{{ route('post.admin.logout')}}">Đăng xuất</a>
											</ul>
										</li>
			                        </div>
		                        @endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="navbarMain--mobile">
			<div class="container">
				<div class="navbarMain--mobile__wrap">
					<a href="" class="logo"><img src="{{ asset('font-end/img/logo.png')}}" alt="Trường đại học Công nghệ giao thông vận tải" class="img-fluid"></a>
					<a href="javascript:;" class="menu-btn"><i class="fas fa-align-justify"></i></a>
				</div>
			</div>
		</div>

		<div class="site-overlay"></div>

		<!-- End navbarMain -->
		@yield('content')

			<section class="footer-center">
			<div class="container">
				<div class="row">
					<div class="footer-content">
						<h6>Văn phòng Khoa Công nghệ thông tin</h6>
						<p>Địa chỉ: Phòng 401 Nhà H3, trường <a href="http://utt.edu.vn" target="_blank">Đại học Công nghệ Giao thông vận tải</a></p>
						<p>Điện thoại: 0243 552 4990</p>
						<p>Email: vpkcntt@utt.edu.vn | Fanpage : <a href="https://www.facebook.com/fit.utt" target="_blank">Fanpage FIT UTT</a></p>
					</div>
			</div>
		</section>
		<div class="copyright">
			<div class="container">
				<div class="copyright-inner">
					<div>
						<div id="block-gavias-edubiz-copyright" class="block block-block-content block-block-content61f17841-749f-436d-9799-1dfeefd7ad43 no-title">

							<div class="content block-content">

								<div class="field field--name-body field--type-text-with-summary field--label-hidden field__item">
									<div class="text-center">
										Copyright © 2020 by <a href="https://www.facebook.com/nguyenduclai" target="_blank">Nguyễn Đức Lai</a>
									</div>
								</div>

							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
</body>
	@jquery
	@toastr_js
	@toastr_render
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pushy/1.3.0/js/pushy.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
</html>