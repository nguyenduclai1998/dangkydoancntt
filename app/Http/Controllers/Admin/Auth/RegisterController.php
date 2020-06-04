<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Models\Admin\ThongTin;

class RegisterController extends Controller
{
    public function getRegister()
    {
    	return view ('admin.auth.register');
    }

    public function postRegister(Request $request)
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
    		$user = new User([
    			'name'       => $request->name,
                'email'      => $request->email,
                'password'   => bcrypt($request->password)
    		]);
    		$user->save();

    		//them id user vao bang thong tin
    		$id = $user->id;
    		$idUser = new ThongTin();
    		$idUser->user_id = $id;
    		$idUser->save();
    		return redirect()->route('get.admin.login')->with('notify','Đăng ký tài khoản thành công');
    	}
    }
}
