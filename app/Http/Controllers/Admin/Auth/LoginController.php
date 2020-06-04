<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use App\User;

class LoginController extends Controller
{

	use AuthenticatesUsers;

    public function getLogin()
    {
    	return view ('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
    	$email     = $request->email;
        $password  = $request->password;
        //Login to website with email or masv.
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'masv';
    	if(Auth::attempt([$fieldType => $email, 'password' => $password, 'role_id' => 1])) {
    		return redirect()->intended('/quan-tri');
    	} elseif (Auth::attempt([$fieldType => $email, 'password' => $password, 'role_id' => 2])) {
            return redirect()->intended('/quan-tri');
        }elseif (Auth::attempt([$fieldType => $email, 'password' => $password, 'role_id' => 3])) {
            return redirect()->intended('');
        }

    	return redirect()->back()->with('errors', 'Tên đăng nhập hoặc mật khẩu không đúng.');
    }

    public function logOut()
    {
        Auth::logout();
        return redirect()->to('/users-auth/login');
    }
}
