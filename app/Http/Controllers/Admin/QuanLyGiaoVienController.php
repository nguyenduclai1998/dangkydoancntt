<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ThongTin;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class QuanLyGiaoVienController extends Controller
{
    public function index()
    {
    	$giaovien = DB::table('users')->select('users.id', 'users.name', 'users.email', 'role.rolename', 'users.role_id')
    								  ->join('role','role.id', '=', 'users.role_id')
    								  ->where('users.role_id', '=', 2)
    								  ->paginate(5);
    	$viewData = [
			'giaovien' => $giaovien
		];
		return view('admin.quanlygiaovien.index', $viewData);   
    }

    public function create()
    {
    	return view('admin.quanlygiaovien.create');
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
    		$role_id = 2;
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

    public function delete($id)
    {

    }

    public function view($id)
    {
    	return view('admin.quanlygiaovien.view');
    }
}
