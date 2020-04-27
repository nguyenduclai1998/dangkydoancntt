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
	public function deTai()
	{
		$detai = $detai = DB::table('detai')->select('detai.id','detai.tendetai', 'detai.mota', 'users.name','chuyennganh.tenchuyennganh')
											->join('users', 'users.id', '=', 'detai.user_id')
											->join('chuyennganh', 'detai.chuyennganh_id', '=', 'chuyennganh.id')
											->paginate(5);
		$viewData = [
			'detai' => $detai
		];
		return view('admin.topic.index', $viewData);    
	}

    public function index($id)
    {
    	$detai = DB::table('detai')->select('detai.id','detai.tendetai', 'detai.mota', 'users.name','chuyennganh.tenchuyennganh')
    							   ->join('users', 'users.id', '=', 'detai.user_id')
    							   ->join('chuyennganh', 'detai.chuyennganh_id', '=', 'chuyennganh.id')
                                   ->where('chuyennganh.id', $id)
    							   ->paginate(5);                               
    	$viewData = [
    		'detai' => $detai
    	];
    	return view('admin.topic.index', $viewData);
    }

    public function create()
    {
		dd('error');
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
    		'mota.required' 		=> "Mô tả không được bỏ trống."
    	];

    	$validator = Validator::make($data,[
    		'tendetai'		=> 'required|min:3|max:255',
    		'chuyennganh' 	=> 'required',
    		'mota'			=> 'required'
    	], $messages);

    	if($validator->fails()) {
    		$errors = $validator->errors();
    		return redirect()->back()->with('errors', $errors);
    	}else {
    		// Lấy thông tin người dùng thêm mới đề tài
    		$id = Auth::id();
    		$detai = new DeTai();
    		$detai->tendetai 		= $request->tendetai;
    		$detai->mota 			= $request->mota;
    		$detai->slug 			= Str::slug($request->tendetai."-".time());
    		$detai->chuyennganh_id 	= $request->chuyennganh;
    		$detai->user_id 	   	= $id;
    		$detai->save();

    		return redirect()->back()->with('notify','Thêm mới thành công.');
    		
    	}
    }

    public function edit($id)
    {
    	$detai = DeTai::find($id);
    	$viewDataDetai = [
    		'detai' => $detai
    	];

    	$chuyennganh = DB::table('chuyennganh')->select('chuyennganh.id', 'tenchuyennganh')
    										   ->get();
    	$viewDataChuyennganh = [
    		'chuyennganh' => $chuyennganh
    	];
    	return view('admin.topic.update', $viewDataDetai, $viewDataChuyennganh);
    }

    public function update(Request $request, $id)
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
    		$detai = new DeTai();
    		$detai = DeTai::find($id);
    		$detai->tendetai 		= $request->tendetai;
    		$detai->mota 	 		= $request->mota;
    		$detai->chuyennganh_id 	= $request->chuyennganh;
    		$detai->slug 	 		= Str::slug($request->tendetai."-".time());

    		$detai->update();

			return redirect()->back()->with('notify','Cập nhật thành công.');

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
