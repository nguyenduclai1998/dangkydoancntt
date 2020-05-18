<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Đăng ký</title>
        <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap&subset=vietnamese" rel="stylesheet">
        <link rel="stylesheet" href="https://anvui.vn/libs/bootstrap-4.4.1/css/bootstrap.min.css">
        <script src="https://anvui.vn/libs/jquery-3.4.1/jquery-3.4.1.min.js"></script>
    </head>
    <body>
        <section class="login">
            <div class="container">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('post.admin.register')}}" id="register" method="POST">
                        @csrf             
                            <h3>Đăng Ký</h3>
                            <span class="error"></span>
                            <div class="form-group">
                                <label for="">Họ và tên</label>
                                <input type="text" class="form-control" name="name" value="" placeholder="Họ và tên">
                                <label for="name" class="error"></label>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" value="" placeholder="Email">
                                <label for="email" class="error"></label>
                            </div>
                            <div class="form-group">
                                <label for="">Mật khẩu</label>
                                <input type="password" id="password" class="form-control" name="password" value="" placeholder="Mật khẩu">
                                <label for="password" class="error"></label>
                            </div>

                            <div class="form-group">
                                <label for="">Xác nhận mật khẩu</label>
                                <input type="password" id="confirmpassword" class="form-control" name="confirmpassword" value="" placeholder="Xác nhận mật khẩu">
                                <label for="confirmpassword" class="error"></label>
                            </div>
                            <div class="form-group">
                                <button type="submit">Đăng ký</button>
                            </div>
                            <a href="{{ route('get.admin.login')}}">Đăng nhập</a>
                        </form>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </section>
        <style>
            * { font-family: Cabin;  }
            .error { font-size: 13px; font-weight: 500; color: #dc3333; margin-bottom: 10px; }
            .container{ margin-top: 10vh  }
            body { background-color: #ebebeb  }
            form h3 { margin-bottom: 24px; font-weight: 400  }
            form{  padding: 55px; border-radius: 10px; background-color: #fff }
            .form-group { margin-bottom: 36px;  }
            .form-group label::first-child{font-size: 13px; font-weight: 500; padding-bottom: 11px; color: #555555; line-height: 1.4; text-transform: uppercase;   }
            .form-group input { height: 45px;  }
            .form-group input.invalid { border: 1px solid #dc3333; } 
            label.error:empty{ display: none; }
            button:focus{ outline: none; }
            button{ font-size: 16px;
            color: #fff;
            display: flex;
            line-height: 1.2;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 20px;
            min-width: 150px;
            height: 55px; 
            background-color: #333333;
            border-radius: 27px;
            border: none; 
            }
        </style>
        <script src=" https://anvui.vn/libs/bootstrap-4.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        <script>
            $("#register").validate({ 
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                    confirmpassword: {
                        required: true,
                        minlength: 8,
                        equalTo: "#password"
                    }
                },
                messages: {
                    name: {
                        required: "Vui lòng nhập họ tên."
                    },
                    email: {
                        required: "Vui lòng nhập email.",
                        email: "Email chưa đúng định dạng."
                    },
                    
                    password: {
                        required: "Vui lòng nhập mật khẩu.",
                        minlength: "Mật khẩu tối thiểu là 8 kí tự."
                    },
                    confirmpassword: {
                        required: "Vui lòng nhập mật khẩu.",
                        minlength: "Mật khẩu tối thiểu là 8 kí tự.",
                        equalTo: 'Mật khẩu không khớp.'
                    }
                } 
            
            })
        </script>
    </body>
</html>