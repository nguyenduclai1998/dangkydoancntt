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
}
