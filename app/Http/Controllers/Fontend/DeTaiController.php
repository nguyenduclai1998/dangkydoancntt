<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\DeTai;
use App\Models\Admin\DeXuatDeTai;
use App\Models\Admin\LinhVuc;
use App\Models\Admin\NguyenVong;
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
        $id         = $request->id;
        $detai      = DeTai::with('chuyennganh','linhvuc')->where('detai.id',$id)->first();

        //Lay thong tin user hien tai
        $user_id    = Auth::id();
        $thongtin   = User::with('thongtin')->where('users.id', $user_id)->first();
        $viewData   = [
            'detai'     => $detai,
            'thongtin'  => $thongtin
        ];
    	return view('font-end.dangkydetai.index', $viewData);
    }

    public function postTopic(Request $request)
    {
        $user_id    = Auth::id();
        $detai_id   = $request->id;
        $linhvuc    = $request->linhvuc_id;
        $nguyenvong = $request->nguyenvong;

        //Check xem user da co bao nhieu ban ghi trong database.
        $checkNguyenvong = NguyenVong::where('user_id', $user_id)->get();
        $detai = new NguyenVong();

        if(count($checkNguyenvong) < 2)
        {
            $Nguyenvong = NguyenVong::where('user_id', $user_id)->first();
            if($Nguyenvong == null || $Nguyenvong->loainguyenvong != $nguyenvong ) {
                $detai->user_id         = $user_id;
                $detai->detai_id        = $detai_id;
                $detai->linhvuc_id      = $linhvuc;
                $detai->loainguyenvong  = $nguyenvong;
                $detai->save();

                toastr()->success('Đăng ký đề tài thành công.');
                return redirect()->back();
            }elseif($Nguyenvong->loainguyenvong == $nguyenvong) {
                toastr()->error('Bạn đã đăng ký nguyện vọng này trước đó.');
                return redirect()->back();
            }
        } else {
            toastr()->error('Bạn đã đăng ký 2 nguyện vọng.');
            return redirect()->back();
        }
    }
}

