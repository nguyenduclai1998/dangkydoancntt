<?php

namespace App\Http\Controllers\Fontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function getLogin()
    {
    	return view('font-end.auth.login');
    }

    public function postLogin(Request $request)
    {
        $email      = $request->email;
        $password   = $request->password;

    	if(Auth::attempt(['email' => $email, 'password' => $password, 'role_id' => 3])) {
    		return redirect()->intended('');
    	}

    	return redirect()->back()->with('errors', 'Email hoặc mật khẩu không đúng.');
    }
}
