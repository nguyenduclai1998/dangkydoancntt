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
    	$giaovien  = User::with('thongtin','role')->where('users.id', $id)->first();

  		$viewData = [
			'giaovien' => $giaovien
		];
    	return view('admin.quanlygiaovien.view', $viewData);
    }

    public function changePassword(Request $request)
    {
    	$user_id = \Auth::user()->id;
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("errors","Mật khẩu bạn nhập không đúng, vui lòng thử lại.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("errors","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = User::find($user_id);
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("notify","Password changed successfully !");
    }

    public function updateProfile(Request $request)
    {

    }
}
