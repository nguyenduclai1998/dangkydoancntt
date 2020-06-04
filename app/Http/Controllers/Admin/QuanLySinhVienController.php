<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ThongTin;
use App\Models\Admin\NguyenVong;
use App\Models\Admin\Role;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class QuanLySinhVienController extends Controller
{
    public function index()
    {
    	$sinhvien  = User::with('thongtin','role')->where('users.role_id', 3)->get();
        // dd($sinhvien);
    	$viewData = [
			'sinhvien' => $sinhvien
		];
		return view('admin.quanlysinhvien.index', $viewData);   
    }

    public function create()
    {
    	return view('admin.quanlysinhvien.create');
    }

    public function store(Request $request)
    {
    	$data = $request->except('_token');
    	$messages = [
    		'email.unique'	=> "Tài khoản email đã tồn tại.",
            'masv.unique'   => "Mã sinh viên đã tồn tại."
    	];

    	$validator = Validator::make($data,[
    		'email'	=> 'unique:users',
            'masv'  => 'unique:users',
    	], $messages);

    	if($validator->fails()) {
    		$errors = $validator->errors();
    		return redirect()->back()->with('errors', $errors);
    	}else {
    		$role_id = 3;
    		$user = new User();
    		$user->name 	= $request->name;
    		$user->email 	= $request->email;
            $user->masv     = $request->masv;
    		$user->password = bcrypt($request->password);
    		$user->role_id 	= $role_id;

    		$user->save();

    		//them id user vao bang thong tin
    		$id = $user->id;
    		$idUser = new ThongTin();
    		$idUser->user_id = $id;
    		$idUser->save();
    		return redirect()->back()->with('notify','Thêm mới tài khoản thành công');
    	}
    }

    public function view($id)
    {
    	$sinhvien      = User::with('thongtin','role')->where('users.id', $id)->first();
        $nguyenvong    = NguyenVong::with('linhvuc', 'detai')->where('user_id', $id)->where('trangthai', 0)->get();
        $finalResult   = NguyenVong::with('linhvuc', 'detai')->where('user_id', $id)->where('trangthai', 1)->get();
  		$viewData = [
			'sinhvien'   => $sinhvien,
            'nguyenvong' => $nguyenvong,
            'finalResult'=> $finalResult
		];
    	return view('admin.quanlysinhvien.view', $viewData);
    }

    public function resetPassword(Request $request, $user_id)
    {
        $user = new User();
        $user = User::find($user_id);
        $user->password = bcrypt($request->newPassword);
        $user->update();

        toastr()->success('Reset mật khẩu thành công.');
        return redirect()->back();
    }
}
