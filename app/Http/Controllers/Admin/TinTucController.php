<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\TinTuc;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TinTucController extends Controller
{
	public function tinTuc()
	{
		$tintuc = DB::table('tintuc')->select('tintuc.id', 'tintuc.tenbaiviet', 'tintuc.noidung', 'tintuc.chuyennganh_id', 'tintuc.user_id', 'users.name')
									 ->join('users', 'users.id', '=', 'tintuc.user_id')
									 ->join('chuyennganh', 'tintuc.chuyennganh_id', '=', 'chuyennganh.id')
									 ->paginate(5);

		$viewData = [
			'tintuc' => $tintuc
		];
		return view('admin.tintuc.index', $viewData);    
	}

	public function index($id)
	{
		$tintuc = DB::table('tintuc')->select('tintuc.id','tintuc.tenbaiviet', 'tintuc.noidung', 'users.name','chuyennganh.tenchuyennganh')
    							     ->join('users', 'users.id', '=', 'tintuc.user_id')
    							     ->join('chuyennganh', 'tintuc.chuyennganh_id', '=', 'chuyennganh.id')
                                     ->where('chuyennganh.id', $id)
    							     ->paginate(5); 
                           
    	$viewData = [
    		'tintuc' => $tintuc
    	];
    	return view('admin.tintuc.index', $viewData);
	}

    public function create()
    {
    	return view('admin.tintuc.create');
    }

    public function store(Request $request)
    {
    	$data = $request->except('_token');

    	$messages = [
    		'tenbaiviet.required'		=> "Tên bài viết không được bỏ trống.",
    		'tenbaiviet.min'			=> "Tên bài viết tối thiểu là 3 ký tự",
    		'tenbaiviet.max'			=> "Tên bài viết quá dài.",
    		'chuyennganh.required' 		=> "Chuyên ngành không được bỏ trống.",
    		'noidung.required' 			=> "Mô tả không được bỏ trống."
    	];

    	$validator = Validator::make($data,[
    		'tenbaiviet'		=> 'required|min:3|max:255',
    		'chuyennganh' 		=> 'required',
    		'noidung'				=> 'required'
    	], $messages);

    	if($validator->fails()) {
    		$errors = $validator->errors();
    		return redirect()->back()->with('errors', $errors);
    	}else {
    		// Lấy thông tin người dùng thêm mới đề tài
    		$id = Auth::id();
    		$detai = new TinTuc();
    		$detai->tenbaiviet 		= $request->tenbaiviet;
    		$detai->noidung 		= $request->noidung;
    		$detai->slug 			= Str::slug($request->tenbaiviet."-".time());
    		$detai->chuyennganh_id 	= $request->chuyennganh;
    		$detai->user_id 	   	= $id;
    		$detai->save();

    		return redirect()->back()->with('notify','Thêm mới thành công.');
    		
    	}
    }

    public function edit($id)
    {
    	$tintuc = TinTuc::find($id);
    	$viewDataTintin = [
    		'tintuc' => $tintuc
    	];

    	$tintuc = DB::table('chuyennganh')->select('chuyennganh.id', 'tenchuyennganh')
    										   ->get();
    	$viewDataChuyennganh = [
    		'chuyennganh' => $chuyennganh
    	];
    	return view('admin.topic.update', $viewDataDetai, $viewDataChuyennganh);
    }
}
