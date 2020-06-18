<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\DeTai;
use App\Models\Admin\LinhVuc;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\NguyenVong;
use App\Models\Admin\Phandetai;
use App\User;

class PhandetaiController extends Controller
{
    public function index()
    {
    	$phandetai = Phandetai::with('users', 'detai', 'linhvuc', 'giangvienhuongdan')->get();

    	$viewData = [
    		'phandetai' => $phandetai
    	];
    	return view('admin.phandetai.index', $viewData);
    }


    public function phandetai()
    {


    	$mucdo1 = DeTai::whereNotNull('sinhvien_id')->get();

    	$sinhvien = User::where('role_id', 3)->get();

    	// foreach ($mucdo1 as $md1) {
    	// 	Phandetai::create([
    	// 		'user_id' 		=> $md1['sinhvien_id'],
    	// 		'detai_id' 		=> $md1['id'],
    	// 		'linhvuc_id' 	=> $md1['linhvuc_id'],
    	// 		'giangvien_id' 	=> $md1['user_id']
    	// 	]);
    	// }

    	// SELECT count(*) as SODETAI, giangvien_id FROM `ketquaphandoan` group by giangvien_id 


    	// SELECT count(*) as SODETAI, giangvien_id FROM `ketquaphandoan` group by giangvien_id
    	$teacherByNumTopic = Phandetai::selectRaw('count(*) as SODETAI, giangvien_id')->groupBy('giangvien_id')->get();

    	$usersTeacher = User::where('role_id', 2)->get();
    	$teacherValid = [];
    	foreach ($teacherByNumTopic as $key => $value) {
    		if($value['SODETAI'] < 5) {
    			$teacherValid[] = $value->giangvien_id;
    		}
    	}

    	dd($usersTeacher);

    	$usersHasTopic = DeTai::with('users')->whereNotNull('sinhvien_id')->get();

    	$usersHasTopicMap = [];
    	foreach ($usersHasTopic as $key => $value) {
    		$usersHasTopicMap[ $value['sinhvien_id'] ] = $value;
    	}

    	$usersWithoudTopic = [];
    	foreach ($sinhvien as $key => $value) {
    		if( !isset($usersHasTopicMap[$value['id']]) ) {
    			$usersWithoudTopic[] = $value;
    		}	
    	}

    	dd($usersWithoudTopic);


    	toastr()->success('Phân đề tài thành công.');      
    	return redirect()->back();
    }
}
