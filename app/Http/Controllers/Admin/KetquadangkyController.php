<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\DeTai;
use App\Models\Admin\LinhVuc;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\NguyenVong;
use App\User;

class KetquadangkyController extends Controller
{
    public function index(Request $request)
    {
    	$ketquadangky = NguyenVong::with('linhvuc', 'detai', 'users')->get();
    	// dd($ketquadangky);
    	$viewData = [
    		'ketquadangky' => $ketquadangky
    	];
    	return view('admin.ketquadangky.index', $viewData);
    }
}
