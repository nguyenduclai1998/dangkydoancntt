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

    	$credentials = $request->only('email','password');
    	if(Auth::attempt($credentials)) {
            $role  = User::role($request->email);
            dd($role);
    		return redirect()->intended('/quan-tri');
    	}

    	return redirect()->back()->with('errors', 'Email hoặc mật khẩu không đúng.');
    }

    public function logOut()
    {
        Auth::logout();
        return redirect()->to('/users-auth/login');
    }
}
