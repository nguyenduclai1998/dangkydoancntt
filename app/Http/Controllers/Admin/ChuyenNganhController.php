<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\ChuyenNganh;
use Illuminate\Support\Str;

class ChuyenNganhController extends Controller
{
    public function index()
    {
    	$chuyennganh = ChuyenNganh::paginate(10);
    	$viewData = [
    		'chuyennganh' => $chuyennganh
    	];
    	return view ('admin.chuyennganh.index', $viewData);
    }

    public function create()
    {
    	return view('admin.chuyennganh.create');
    }

    public function store(Request $request)
    {
    	$data = $request->except('_token');

    	$messages = [
    		'tenchuyennganh.unique'	=> "Tên chuyên ngành đã tồn tại."
    	];

    	$validator = Validator::make($data,[
    		'tenchuyennganh'	=> 'unique:chuyennganh'
    	], $messages);

    	if($validator->fails()) {
    		$errors = $validator->errors();
    		return redirect()->back()->with('errors', $errors);
    	}else {
    		$chuyennganh = new ChuyenNganh();
    		$chuyennganh->tenchuyennganh = $request->tenchuyennganh;
    		$chuyennganh->mota 			 = $request->mota;
    		$chuyennganh->slug 			 = Str::slug($request->tenchuyennganh);
    		$chuyennganh->save();

    		return redirect()->back()->with('notify','Thêm mới thành công.');
    	}
    }

    public function edit($id)
    {
    	$chuyennganh = ChuyenNganh::find($id);
    	$viewData = [
    		'chuyennganh' => $chuyennganh
    	];
    	return view('admin.chuyennganh.update', $viewData);
    }

    public function update(Request $request, $id)
    {
    	$data = $request->except('_token');

    	$messages = [
    		'tenchuyennganh.unique'	=> "Tên chuyên ngành đã tồn tại."
    	];

    	$validator = Validator::make($data,[
    		'tenchuyennganh'	=> 'unique:chuyennganh'
    	], $messages);

    	if($validator->fails()) {
    		$errors = $validator->errors();
    		return redirect()->back()->with('errors', $errors);
    	}else {
    		$chuyennganh = new ChuyenNganh();
			$chuyennganh = ChuyenNganh::find($id);
			$chuyennganh->tenchuyennganh = $request->tenchuyennganh;
			$chuyennganh->mota 			 = $request->mota;
			$chuyennganh->slug 			 = Str::slug($request->tenchuyennganh);
			
			$chuyennganh->update();

			return redirect()->back()->with('notify','Cập nhật thành công.');
    	}
		
    }

    public function delete($id)
    {
    	$chuyennganh = ChuyenNganh::find($id);
    	if($chuyennganh) {
    		$chuyennganh->delete();

    		return redirect()->back()->with('notify','Xóa thành công.');
    	} else {
    		return redirect()->back()->with('errors','Đã xảy ra lỗi.');
    	}
    }
}
