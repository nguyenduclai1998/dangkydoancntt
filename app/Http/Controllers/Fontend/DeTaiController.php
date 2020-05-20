<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\DeTai;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Auth;

class DeTaiController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;
    	$detai = DB::table('detai')->select('detai.id','detai.tendetai', 'detai.mota', 'detai.chuyennganh_id', 'detai.slug as detai_slug', 'detai.sinhvien_id', 'detai.created_at', 'users.name','chuyennganh.tenchuyennganh','chuyennganh.slug', 'linhvuc.tenlinhvuc')
    							   ->join('users', 'users.id', '=', 'detai.user_id')
                                   ->join('linhvuc', 'detai.linhvuc_id', '=', 'linhvuc.id')
    							   ->join('chuyennganh', 'detai.chuyennganh_id', '=', 'chuyennganh.id')
                                   ->where('detai.chuyennganh_id', $id)
    							   ->paginate(5);
    	$viewData = [
			'detai' => $detai
		];
    	return view('font-end.detai.index', $viewData);
    }

    public function view(Request $request)
    {	
    	$id = $request->id;
    	$detai = DeTai::with('chuyennganh','linhvuc')->where('detai.id',$id)->first();

    	$viewData = [
			'detai' => $detai
		];
    	return view('font-end.detai.view', $viewData);
    }

    public function getTopic(Request $request)
    {
        $id = $request->id;
        $detai = DeTai::with('chuyennganh','linhvuc')->where('detai.id',$id)->first();

        //Lay thong tin user hien tai
        $user_id = Auth::user()->id;
        $thongtin = User::with('thongtin')->where('users.id', $user_id)->first();
        $viewData = [
            'detai'     => $detai,
            'thongtin'  => $thongtin
        ];
    	return view('font-end.dangkydetai.index', $viewData);
    }
}

