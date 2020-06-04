<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\ThongTin;
use App\Models\Admin\NguyenVong;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function getInfo()
    {
    	$user_id = Auth::id();
    	$info  = User::with('thongtin','role')->where('users.id', $user_id)->first();
    	$viewData = [
			'info' => $info,
		];
    	return view('font-end.user.index', $viewData);
    }

    public function postInfo(Request $request)
    {
    	try {
             \DB::beginTransaction();
    		$user_id = Auth::id();

    		$thongtin = new ThongTin();
    		$user 	  = new User();

    		$user = User::find($user_id);
    		$thongtin = ThongTin::where('user_id', $user_id)->first();

    		$user->email 		= $request->email;
    		$user->name  		= $request->name;
    		$user->masv  		= $request->masv;
    		$user->update();
    		$thongtin->lop 		= $request->class;;
    		$thongtin->ngaysinh = $request->birthday;;
    		$thongtin->sdt 		= $request->phonenumber;
    		$thongtin->update();
            \DB::commit();
    		toastr()->success('Cập nhật thông tin thành công.');
            return redirect()->back();
    	} catch (\Exception $e) {
            \DB::rollback(); 
    		toastr()->error('Đã xảy ra lỗi, vui lòng kiểm tra lại.');
            return redirect()->back();
    	}
    }

    public function getChangePassword()
    {
    	return view('font-end.user.changepassword');
    }

    public function postChangePassword(Request $request)
    {
    	if(!(\Hash::check($request->password, Auth::user()->password))) {
    		toastr()->error('Mật khẩu không khớp với mật khẩu trong hệ thống.');
    		return redirect()->back();
    	} else if(strcmp($request->password, $request->newPassword) == 0){
    		toastr()->error('Mật khẩu cũ và mật khẩu mới giống nhau.');
    		return redirect()->back();
    	}

    	//change password
    	$user = Auth::user();
    	$user->password = bcrypt($request->newPassword);
    	$user->save();

    	toastr()->success('Đổi mật khẩu thành công.');
        return redirect()->back();
    }

    public function registerResult(Request $request)
    {
    	$user_id = Auth::id();

    	$nguyenvong = NguyenVong::with('linhvuc', 'detai')->where('user_id', $user_id)->get();

    	$viewData = [
    		'nguyenvong' => $nguyenvong
    	];
		return view('font-end.user.registerresult', $viewData);    	
    }
}
