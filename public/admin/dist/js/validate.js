$(document).ready(function() {
	$("#formLogin").validate({
		rules: {
			email: {
				required: true,
			},
			password: {
				required: true,
				minlength: 8
			}
		},
		messages: {
			email: {
				required: "Email không được bỏ trống.",
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
    $("#linhvuc").validate({ 
        rules: {
            tenlinhvuc: {
                required: true,
            },
            mota: {
                required: true
            }
        },
        messages: {
            tenlinhvuc: {
                required: "Tên lĩnh vực không được bỏ trống.",
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

$("#register").validate({ 
    rules: {
        name: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        masv: {
            required: true
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
        masv: {
            required: "Mã sinh viên không được để trống."
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

});
