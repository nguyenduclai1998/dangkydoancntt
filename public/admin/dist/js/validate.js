$(document).ready(function() {
	$("#formLogin").validate({
		rules: {
			email: {
				required: true,
				email: true
			},
			password: {
				required: true,
				minlength: 8
			}
		},
		messages: {
			email: {
				required: "Email không được bỏ trống.",
				email: "Địa chỉ email chưa đúng định dạng."
			},
			password: {
				required: "Mật khẩu không được bỏ trống.",
				minlength: "Mật khẩu tối thiểu là 8 kí tự."
			}
		}
	});
});

$(document).ready(function() {
    $("#chuyennganh").validate({ 
        rules: {
            tenchuyennganh: {
                required: true,
            },
            mota: {
                required: true
            }
        },
        messages: {
            tenchuyennganh: {
                required: "Tên chuyên ngành không được bỏ trống.",
            },
            mota: {
                required: "Mô tả không được bỏ trống."
            }
        }
    });
});

$(document).ready(function() {
    $("#detai").validate({ 
        rules: {
            tendetai: {
                required: true,
            },
            chuyennganh: {
            	require: true
            },
            mota: {
                required: true
            }
        },
        messages: {
            tendetai: {
                required: "Tên đề tài không được bỏ trống.",
            },
            chuyennganh: {
            	required: "Chuyên ngành không được bỏ trống"
            },
            mota: {
                required: "Mô tả không được bỏ trống."
            }
        }
    });
});