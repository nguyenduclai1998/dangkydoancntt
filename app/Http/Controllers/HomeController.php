<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Time;

class HomeController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {
    	$data = $request->except('_token');
    	$messages = [
    		'file.required'	=> "Trường này không được để trống.",
    		'file.file' 	=> "File chưa đúng định dạng"
    	];

    	$validator = Validator::make($data,[
    		'file'	=> 'required|file|mimes:csv,xls,xlsx',
    	], $messages);

    	if($validator->fails()) {
    		$errors = $validator->errors();
    		toastr()->error('Import lỗi vui lòng kiểm tra lại.'); 
    		return redirect()->back();
    	} else {
    		try {
	    		$import = Excel::import(new UsersImport,request()->file('file'));     
	    	} catch (Exception $e) {
	    		toastr()->error('Import lỗi vui lòng kiểm tra định dạng file.'); 
	    	}
	        
	        return back();
    	}
    	
    }

    public function indexTime()
    {
        $time = new Time();

        $checkTime = Time::first();
        
        $viewData = [
            'checkTime' => $checkTime
        ];   
        return view('admin.thoigian.index', $viewData);
    }

    public function setTime(Request $request)
    {
        $timeStart = $request->timestart;
        $timeEnd   = $request->timeend;
        $timeToday = time();

        $time = new Time();

        $checkTime = Time::first();
        if($checkTime) {
            toastr()->error('Bạn phải xóa thời gian trước đó để thêm mới.'); 
            return redirect()->back();
        }elseif (strtotime($timeStart) < strtotime($timeEnd) && strtotime($timeStart) > $timeToday && strtotime($timeEnd) > $timeToday ) {
            $time->time_start = $timeStart;
            $time->time_end   = $timeEnd;
            $time->save();

            toastr()->success('Thêm thời gian thành công.'); 
            return redirect()->back();
        } else{
            toastr()->error('Đã xảy ra lỗi vui lòng kiểm tra lại thời gian.'); 
            return redirect()->back();
        }
        
    }

    public function deteleTime($id)
    {
        $time = new Time();

        $checkTime = Time::first();
        if($checkTime) {
            $checkTime->delete();
            toastr()->success('Xóa thời gian thành công.'); 
            return redirect()->back();
        }else{
            toastr()->error('Đã xảy ra lỗi vui lòng kiểm tra lại.'); 
            return redirect()->back();
        }
    }
}
