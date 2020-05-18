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
    	$credentials = $request->only('email','password');
    	if(Auth::attempt($credentials)) {
    		return redirect()->intended('');
    	}

    	return redirect()->back()->with('errors', 'Email hoặc mật khẩu không đúng.');
    }
}
