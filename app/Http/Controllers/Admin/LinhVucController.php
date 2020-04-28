<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\LinhVuc;
use Illuminate\Support\Str;

class LinhVucController extends Controller
{
    public function index()
    {
    	$linhvuc = LinhVuc::paginate(10);
    	$viewData = [
    		'linhvuc' => $linhvuc
    	];
    	return view ('admin.linhvuc.index', $viewData);
    }

    public function create()
    {
    	return view('admin.linhvuc.create');
    }

    public function store(Request $request)
    {
    	$data = $request->except('_token');

    	$messages = [
    		'tenlinhvuc.unique'	=> "Tên lĩnh vực đã tồn tại."
    	];

    	$validator = Validator::make($data,[
    		'tenlinhvuc'	=> 'unique:linhvuc'
    	], $messages);

    	if($validator->fails()) {
    		$errors = $validator->errors();
    		return redirect()->back()->with('errors', $errors);
    	}else {
    		$linhvuc = new LinhVuc();
    		$linhvuc->tenlinhvuc 	 = $request->tenlinhvuc;
    		$linhvuc->mota 			 = $request->mota;
    		$linhvuc->slug 			 = Str::slug($request->tenlinhvuc);
    		$linhvuc->save();

    		return redirect()->back()->with('notify','Thêm mới thành công.');
    	}
    }

    public function edit($id)
    {
    	$linhvuc = LinhVuc::find($id);
    	$viewData = [
    		'linhvuc' => $linhvuc
    	];
    	return view('admin.linhvuc.update', $viewData);
    }

    public function update(Request $request, $id)
    {
		$linhvuc = new LinhVuc();
		$linhvuc = LinhVuc::find($id);
		$linhvuc->tenlinhvuc     = $request->tenlinhvuc;
		$linhvuc->mota 			 = $request->mota;
		$linhvuc->slug 			 = Str::slug($request->tenlinhvuc);
		
		$linhvuc->update();

		return redirect()->back()->with('notify','Cập nhật thành công.');
    }

    public function delete($id)
    {
    	$linhvuc = LinhVuc::find($id);
    	if($linhvuc) {
    		$linhvuc->delete();

    		return redirect()->back()->with('notify','Xóa thành công.');
    	} else {
    		return redirect()->back()->with('errors','Đã xảy ra lỗi.');
    	}
    }
}
