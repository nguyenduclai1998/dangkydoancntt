<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\DeTai;
use Illuminate\Support\Facades\DB;

class DeTaiController extends Controller
{
    public function index($id)
    {
    	$detai = DB::table('detai')->select('detai.id','detai.tendetai', 'detai.mota', 'users.name','chuyennganh.tenchuyennganh','chuyennganh.slug', 'linhvuc.tenlinhvuc')
    							   ->join('users', 'users.id', '=', 'detai.user_id')
                                   ->join('linhvuc', 'detai.linhvuc_id', '=', 'linhvuc.id')
    							   ->join('chuyennganh', 'detai.chuyennganh_id', '=', 'chuyennganh.id')
                                   ->where('chuyennganh.id', $id)
    							   ->paginate(5);      
    	dd($detai);
    	$viewData = [
			'detai' => $detai
		];
    	return view('font-end.detai.index', $viewData);
    }
}

