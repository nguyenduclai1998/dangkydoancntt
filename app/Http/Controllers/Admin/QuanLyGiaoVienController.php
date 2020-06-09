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

class QuanLyGiaoVienController extends Controller
{
    public function index()
    {
    	$giaovien  = User::with('thongtin','role')->where('users.role_id', 2)->paginate(10);
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
    		'email.unique'	=> "Tài khoản email đã tồn tại.",
    	];

    	$validator = Validator::make($data,[
    		'email'	=> 'unique:users',
    	], $messages);

    	if($validator->fails()) {
    		$errors = $validator->errors();
    		return redirect()->back()->with('errors', $errors);
    	}else {
    		$role_id = 2;
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
    	$giaovien  = User::with('thongtin','role')->where('users.id', $id)->first();
        $role = Role::get();

  		$viewData = [
			'giaovien' => $giaovien,
            'role'     => $role 
		];
    	return view('admin.quanlygiaovien.view', $viewData);
    }

    public function profile(Request $request)
    {
        $user_id = Auth::id();

        $user = new User();
        $user = User::with('thongtin','role')->where('users.id', $user_id)->first();

        $viewData = [
            'user' => $user
        ];
        return view('admin.profile.profile', $viewData);
    }

    public function role(Request $request, $id)
    {
        $user = new User();
        $user = User::find($id);
        $user->role_id = $request->role;
        $user->update();

        toastr()->success('Phân quyền thành công.');
        return redirect()->back();
    }
}
