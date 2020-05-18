<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ThongTin;
use App\Models\Admin\Role;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class QuanLySinhVienController extends Controller
{
    public function index()
    {
    	$sinhvien  = User::with('thongtin','role')->where('users.role_id', 3)->paginate(10);
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
    		'email.unique'	=> "Tài khoản email đã tồn tại."
    	];

    	$validator = Validator::make($data,[
    		'email'	=> 'unique:users'
    	], $messages);

    	if($validator->fails()) {
    		$errors = $validator->errors();
    		return redirect()->back()->with('errors', $errors);
    	}else {
    		$role_id = 3;
    		$user = new User();
    		$user->name 	= $request->name;
    		$user->email 	= $request->email;
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
    	$sinhvien  = User::with('thongtin','role')->where('users.id', $id)->first();

  		$viewData = [
			'sinhvien' => $sinhvien
		];
    	return view('admin.quanlysinhvien.view', $viewData);
    }
}
