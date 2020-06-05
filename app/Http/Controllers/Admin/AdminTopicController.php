<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\DeTai;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminTopicController extends AdminController
{
	public function deTai(DeTai $deTai)
	{
        $user_id = Auth::user()->id;
        $user_role = Auth::user()->role_id;


        if($user_role == 1)
        {
            $detai = DB::table('detai')->select('detai.id','detai.tendetai', 'detai.mota', 'users.name','chuyennganh.tenchuyennganh', 'linhvuc.tenlinhvuc')
                                            ->join('users', 'users.id', '=', 'detai.user_id')
                                            ->join('linhvuc', 'detai.linhvuc_id', '=', 'linhvuc.id')
                                            ->join('chuyennganh', 'detai.chuyennganh_id', '=', 'chuyennganh.id')
                                            ->paginate(10);
        }else {
            $detai = DB::table('detai')->select('detai.id','detai.tendetai', 'detai.mota', 'users.name','chuyennganh.tenchuyennganh', 'linhvuc.tenlinhvuc')
                                            ->join('users', 'users.id', '=', 'detai.user_id')
                                            ->join('linhvuc', 'detai.linhvuc_id', '=', 'linhvuc.id')
                                            ->join('chuyennganh', 'detai.chuyennganh_id', '=', 'chuyennganh.id')
                                            ->where('detai.user_id', $user_id)
                                            ->paginate(10);
        }
		
		$viewData = [
			'detai' => $detai
		];
		return view('admin.topic.index', $viewData);
	}

    public function show($id)
    {
        $user_id = Auth::user()->id;
        $user_role = Auth::user()->role_id;


        if($user_role == 1)
        {
            $detai = DB::table('detai')->select('detai.id','detai.tendetai', 'detai.mota', 'users.name','chuyennganh.tenchuyennganh', 'linhvuc.tenlinhvuc')
                                   ->join('users', 'users.id', '=', 'detai.user_id')
                                   ->join('linhvuc', 'detai.linhvuc_id', '=', 'linhvuc.id')
                                   ->join('chuyennganh', 'detai.chuyennganh_id', '=', 'chuyennganh.id')
                                   ->where('chuyennganh.id', $id)
                                   ->paginate(10);
        }else {
           $detai = DB::table('detai')->select('detai.id','detai.tendetai', 'detai.mota', 'users.name','chuyennganh.tenchuyennganh', 'linhvuc.tenlinhvuc')
                                   ->join('users', 'users.id', '=', 'detai.user_id')
                                   ->join('linhvuc', 'detai.linhvuc_id', '=', 'linhvuc.id')
                                   ->join('chuyennganh', 'detai.chuyennganh_id', '=', 'chuyennganh.id')
                                   ->where('chuyennganh.id', $id)
                                   ->where('detai.user_id', $user_id)
                                   ->paginate(10);
        }
    	
        $viewData = [
            'detai' => $detai
        ];
        return view('admin.topic.index', $viewData);
    }

    public function create()
    {
    	return view('admin.topic.create');
    }

    public function store(Request $request)
    {
    	$data = $request->except('_token');

    	$messages = [
    		'tendetai.required'		=> "Tên đề tài không được bỏ trống.",
    		'tendetai.min'			=> "Tên đề tài tối thiểu là 3 ký tự",
    		'tendetai.max'			=> "Tên đề tài quá dài.",
    		'chuyennganh.required' 	=> "Chuyên ngành không được bỏ trống.",
            'linhvuc.required'      => "Lĩnh vực không được bỏ trống.",
    		'mota.required' 		=> "Mô tả không được bỏ trống."
    	];

    	$validator = Validator::make($data,[
    		'tendetai'		=> 'required|min:3|max:255',
    		'chuyennganh' 	=> 'required',
            'linhvuc'       => 'required',
    		'mota'			=> 'required'
    	], $messages);

    	if($validator->fails()) {
    		$errors = $validator->errors();
    		return redirect()->back()->with('errors', $errors);
    	}else {
            // Lấy thông tin người dùng thêm mới đề tài
            $user = Auth::user();
            $id = Auth::id();
            $detai = new DeTai();
            $sinhvien_id            = $request->sinhvien;

            if(isset($sinhvien_id)) {
                //Check sinh viên đã được thêm vào đề tài nào trước đó hay chưa
                $checkSinhvien = DeTai::where('sinhvien_id', $sinhvien_id)->first();

                //Check giảng viên đã thêm bao nhiêu sinh viên vào đề tài
                $checkDetai = DeTai::where('user_id', $id)->whereNotNull('sinhvien_id')->get();
                if(isset($checkSinhvien->sinhvien_id)) {
                    toastr()->error('Sinh viên này đã được đăng ký đề tài.');
                    return redirect()->back();
                } elseif (count($checkDetai) >= 5) {
                    toastr()->error('Bạn đã thêm quá 5 sinh viên vào đề tài.');
                    return redirect()->back();
                }
                $detai->tendetai        = $request->tendetai;
                $detai->mota            = $request->mota;
                $detai->slug            = Str::slug($request->tendetai);
                $detai->chuyennganh_id  = $request->chuyennganh;
                $detai->linhvuc_id      = $request->linhvuc;
                $detai->user_id         = $id;
                $detai->sinhvien_id     = $sinhvien_id;
                $detai->save();

                toastr()->success('Thêm mới thành công.');
                return redirect()->back();
            }

            $detai->tendetai        = $request->tendetai;
            $detai->mota            = $request->mota;
            $detai->slug            = Str::slug($request->tendetai);
            $detai->chuyennganh_id  = $request->chuyennganh;
            $detai->linhvuc_id      = $request->linhvuc;
            $detai->user_id         = $id;
            $detai->save();

            toastr()->success('Thêm mới thành công.');
            return redirect()->back();
    	}
    }

    public function edit($id)
    {
        $detai = DeTai::find($id);

        $user = Auth::user();

        $viewDataDetai = [
            'detai' => $detai
        ];

        return view('admin.topic.update', $viewDataDetai);
    }

    public function update(Request $request, $detai_id)
    {
    	$data = $request->except('_token');

    	$messages = [
    		'tendetai.required'		=> "Tên đề tài không được bỏ trống.",
    		'tendetai.min'			=> "Tên đề tài tối thiểu là 3 ký tự",
    		'tendetai.max'			=> "Tên đề tài quá dài.",
    		'chuyennganh.required' => "Chuyên ngành không được bỏ trống."
    	];

    	$validator = Validator::make($data,[
    		'tendetai'		=> 'required|min:3|max:255',
    		'chuyennganh' 	=> 'required'
    	], $messages);

    	if($validator->fails()) {
    		$errors = $validator->errors();
    		return redirect()->back()->with('errors', $errors);
    	}else {
            $id = Auth::id();
            $sinhvien_id = $request->sinhvien;
            //Check sinh viên đã được thêm vào đề tài nào trước đó hay chưa
            $checkSinhvien = DeTai::where('sinhvien_id', $sinhvien_id)->get();

            //Check giảng viên đã thêm bao nhiêu sinh viên vào đề tài
            $checkDetai = DeTai::where('user_id', $id)->whereNotNull('sinhvien_id')->get();
            if(isset($checkSinhvien->sinhvien_id)) {
                toastr()->error('Sinh viên này đã được đăng ký đề tài.');
                return redirect()->back();
            } elseif (count($checkDetai) >= 5) {
                toastr()->error('Bạn đã thêm quá 5 sinh viên vào đề tài.');
                return redirect()->back();
            }
    		$detai = new DeTai();
    		$detai = DeTai::find($detai_id);
            $sinhvien_id            = $request->sinhvien;
    		$detai->tendetai 		= $request->tendetai;
    		$detai->mota 	 		= $request->mota;
    		$detai->chuyennganh_id 	= $request->chuyennganh;
            $detai->linhvuc_id      = $request->linhvuc;
            $detai->sinhvien_id     = $sinhvien_id;
    		$detai->slug 	 		= Str::slug($request->tendetai);

    		$detai->update();

            toastr()->success('Cập nhật thành công.');
            return redirect()->back();
    	}
    }

    public function delete($id)
    {
    	$detai = DeTai::find($id);
    	if($detai) {
    		$detai->delete();

    		return redirect()->back()->with('notify','Xóa thành công.');
    	} else {
    		return redirect()->back()->with('errors','Đã xảy ra lỗi.');
    	}
    }


}
