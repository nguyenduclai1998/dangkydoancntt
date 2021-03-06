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
		$tintuc = DB::table('tintuc')->select('tintuc.id', 'tintuc.tenbaiviet', 'tintuc.noidung', 'tintuc.user_id', 'users.name', 'tintuc.created_at')
									 ->join('users', 'users.id', '=', 'tintuc.user_id')
									 ->paginate(5);

		$viewData = [
			'tintuc' => $tintuc
		];
		return view('admin.tintuc.index', $viewData);    
	}

	public function index($id)
	{
		$tintuc = DB::table('tintuc')->select('tintuc.id','tintuc.tenbaiviet', 'tintuc.noidung', 'users.name', 'tintuc.created_at')
    							     ->join('users', 'users.id', '=', 'tintuc.user_id')
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
    		'noidung.required' 			=> "Mô tả không được bỏ trống."
    	];

    	$validator = Validator::make($data,[
    		'tenbaiviet'		=> 'required|min:3|max:255',
    		'noidung'		    => 'required'
    	], $messages);

    	if($validator->fails()) {
    		$errors = $validator->errors();
    		return redirect()->back()->with('errors', $errors);
    	}else {
			if($request->hasFile('upload')) {
				$messages = [
					'upload.required' 		=> "Ảnh đại diện không được để trống.",
					'upload.mimes' 			=> "Ảnh đại diện không đúng định dạng",
					'upload.max'			=> "Ảnh đại diện quá lớn."
				];

				$validator = Validator::make($data,[
					'upload'  => 'required|file|mimes:jpeg,jpg,png,gif|max:10000'
				], $messages);
				if($validator->fails()) {
					$errors = $validator->errors();
					return redirect()->back()->with('errors', $errors);
				}
				//get filename with extension
				$filenamewithextension = $request->file('upload')->getClientOriginalName();
		   
				//get filename without extension
				$filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
		   
				//get file extension
				$extension = $request->file('upload')->getClientOriginalExtension();
		   
				//filename to store
				$filenametostore = $filename.'_'.time().'.'.$extension;

				//Upload File
				$request->file('upload')->storeAs('public/uploads', $filenametostore);
		 
			}
    		// Lấy thông tin người dùng thêm mới đề tài
    		$id = Auth::id();
    		$tintuc = new TinTuc();

			$tintuc->tenbaiviet 		= $request->tenbaiviet;
    		$tintuc->noidung 		    = $request->noidung;
    		$tintuc->slug 			    = Str::slug($request->tenbaiviet);
			$tintuc->avatar				= $filenametostore ?? '';
    		$tintuc->user_id 	   	    = $id;
    		$tintuc->save();

    		return redirect()->back()->with('notify','Thêm mới thành công.');
    		
    	}
    }

    public function edit($id)
    {
    	$tintuc = TinTuc::find($id);
    	$viewData = [
    		'tintuc' => $tintuc
    	];
    	return view('admin.tintuc.update', $viewData);
    }

    public function update (Request $request, $id)
    {
        $data = $request->except('_token');

        $messages = [
            'tenbaiviet.required'       => "Tên bài viết không được bỏ trống.",
            'tenbaiviet.min'            => "Tên bài viết tối thiểu là 3 ký tự",
            'tenbaiviet.max'            => "Tên bài viết quá dài.",
            'noidung.required'          => "Mô tả không được bỏ trống."
        ];

        $validator = Validator::make($data,[
            'tenbaiviet'        => 'required|min:3|max:255',
            'noidung'           => 'required'
        ], $messages);

        if($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('errors', $errors);
        }else {
			if($request->hasFile('upload')) {

				$messages = [
					'upload.required' 		=> "Ảnh đại diện không được để trống.",
					'upload.mimes' 			=> "Ảnh đại diện không đúng định dạng",
					'upload.max'			=> "Ảnh đại diện quá lớn."
				];

				$validator = Validator::make($data,[
					'upload'  => 'required|file|mimes:jpeg,jpg,png,gif|max:10000'
				], $messages);
				if($validator->fails()) {
					$errors = $validator->errors();
					return redirect()->back()->with('errors', $errors);
				}
				//get filename with extension
				$filenamewithextension = $request->file('upload')->getClientOriginalName();
		   
				//get filename without extension
				$filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
		   
				//get file extension
				$extension = $request->file('upload')->getClientOriginalExtension();
		   
				//filename to store
				$filenametostore = $filename.'_'.time().'.'.$extension;

				//Upload File
				$request->file('upload')->storeAs('public/uploads', $filenametostore);

				$tintuc = new TinTuc();
				$tintuc = TinTuc::find($id);
				$tintuc->tenbaiviet         = $request->tenbaiviet;
				$tintuc->noidung            = $request->noidung;
				$tintuc->slug               = Str::slug($request->tenbaiviet);
				$tintuc->avatar				= $filenametostore;
				$tintuc->update();

				toastr()->success('Cập nhật thành công.');
            	return redirect()->back();
		 
			} else {
				$tintuc = new TinTuc();
				$tintuc = TinTuc::find($id);
				$tintuc->tenbaiviet         = $request->tenbaiviet;
				$tintuc->noidung            = $request->noidung;
				$tintuc->slug               = Str::slug($request->tenbaiviet);
				$tintuc->update();
	
				toastr()->success('Cập nhật thành công.');
            	return redirect()->back();
			}
        }
    }

    public function delete($id)
    {
        $tintuc = TinTuc::find($id);
        if($tintuc) {
            $tintuc->delete();

            toastr()->success('Xóa thành công.');
            return redirect()->back();
    	} else {
    		toastr()->error('Đã xảy ra lỗi.');
            return redirect()->back();
        }
    }
}
