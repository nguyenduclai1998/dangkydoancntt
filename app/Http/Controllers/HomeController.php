<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

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
}
