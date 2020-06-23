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
        $checkData = Phandetai::get();
    	$viewData = [
    		'phandetai' => $phandetai,
            'checkData' => $checkData
    	];

    	return view('admin.phandetai.index', $viewData);
    }


    public function phandetai()
    {
        //Lay ra nhung sinh vien da duoc GVHD them vao de tai
        $mucdo1 = DeTai::whereNotNull('sinhvien_id')->get();
    	foreach ($mucdo1 as $md1) {
    		Phandetai::create([
    			'user_id' 		=> $md1['sinhvien_id'],
    			'detai_id' 		=> $md1['id'],
    			'giangvien_id' 	=> $md1['user_id']
    		]);
    	}

        //Lay ra nhung sinh vien da co de tai sau khi insert truong hop 1.
    	$usersHasTopic = Phandetai::get();

    	$usersHasTopicMap = [];
    	foreach ($usersHasTopic as $key => $value) {
    		$usersHasTopicMap[ $value['user_id'] ] = $value;
    	}

        //Lay ra nhung sinh vien dang ky nguyen vong mot som nhat
        $nguyenvong1 = NguyenVong::selectRaw('*, MIN(created_at)')
                                ->groupBy('detai_id')
                                ->where('loainguyenvong', 1)
                                ->get();
        $nguyenvong1Map = [];
        foreach ($nguyenvong1 as $key => $value) {
            $nguyenvong1Map[$value['user_id']] = $value;
        }

        //Tru di sinh vien dang ky nguyen vong 1 nhung da ton tai trong phan de tai th1
        $nguyenVong1 = [];
        foreach ($nguyenvong1Map as $key => $value) {
            if(!isset($usersHasTopicMap[$value['user_id']])) {
                $nguyenVong1[] = $value;
            }
        }

        //Lay ra giang vien het slot huong dan sinh vien
        $teachersValid = Phandetai::with('giangvienhuongdan')->havingRaw('count(giangvien_id) >= 5')->get();

        $teachersValidMap = [];
        foreach ($teachersValid as $key => $value) {
            $teachersValidMap[$value['giangvien_id']] = $value;
        }

        $giangvien = User::where('role_id', 2)->get();
        //Lay ra nhung giang vien con slot huong dan sinh vien
        $teachersWithoudUser = [];
        foreach ($giangvien as $key => $value) {
            if(!isset($teachersValidMap[$value['id']])) {
                $teachersWithoudUser[] = $value;
            }
        }

        //Lay id giang vien con slot huong dan 
        $teachersWithoudUserMap = [];

        foreach ($teachersWithoudUser as $key => $value) {
            $teachersWithoudUserMap[$value['id']] = $value;
        }

        // Insert sinh vien dang ky nguyen vong 1 som nhat
        foreach ($nguyenVong1 as $nv1) {
            Phandetai::create([
                'user_id'       => $nv1['user_id'],
                'detai_id'      => $nv1['detai_id'],
                'giangvien_id'  => array_rand($teachersWithoudUserMap)
            ]);
        }

        //Lay ra nhung sinh vien da co de tai sau khi phan nguyen vong 1.
        $usersHasTopicc = Phandetai::get();

        $usersHasTopiccMap = [];
        foreach ($usersHasTopicc as $key => $value) {
            $usersHasTopiccMap[ $value['user_id'] ] = $value;
        }
        //Lay ra nhung sinh vien dang ky nguyen vong 2 som nhat
        $nguyenvong2 = NguyenVong::selectRaw('*, MIN(created_at)')
                                ->groupBy('detai_id')
                                ->where('loainguyenvong', 2)
                                ->get();

        $nguyenvong2Map = [];
        foreach ($nguyenvong2 as $key => $value) {
            $nguyenvong2Map[$value['user_id']] = $value;
        }

        //Tru di sinh vien dang ky nguyen vong 2 nhung da duoc phan de tai o nhung truong hop truoc.
        $nguyenVong2 = [];
        foreach ($nguyenvong2Map as $key => $value) {
            if(!isset($usersHasTopiccMap[$value['user_id']])) {
                $nguyenVong2[] = $value;
            }
        }

        //Insert sinh vien dang ky nguyen vong 2 som nhat
        foreach ($nguyenVong2 as $nv2) {
            Phandetai::create([
                'user_id'       => $nv2['user_id'],
                'detai_id'      => $nv2['detai_id'],
                'giangvien_id'  => array_rand($teachersWithoudUserMap)
            ]);
        }

        //Random de tai cho truong hop cuoi cung
        
        $sinhvien = User::where('role_id', 3)->get();

        //Lay ra nhung sinh vien da co de tai sau khi phan nguyen vong 1 va nguyen vong 2.
        $usersHasTopiccc = Phandetai::get();
        $usersHasTopicccMap = [];
        foreach ($usersHasTopiccc as $key => $value) {
            $usersHasTopicccMap[ $value['user_id'] ] = $value;
        }

        //Lay ra nhung sinh vien chua co de tai
        $usersWithoudTopic = [];
        foreach ($sinhvien as $key => $value) {
            if( !isset($usersHasTopicccMap[$value['id']]) ) {
                $usersWithoudTopic[] = $value;
            }   
        }

        //Convert Users tu array sang collection
        $usersCollection = collect($usersWithoudTopic);

        foreach ($usersCollection as $key => $user) {
            
            $topicHasUsers = Phandetai::with('detai')->get();

            $topicHasUsersMap = [];
            foreach ($topicHasUsers as $key => $ths) {
                $topicHasUsersMap[$ths['detai_id']] = $ths;
            }

            //Lay ra nhung de tai chua duoc phan
            $topic = DeTai::with('users')->whereNull('sinhvien_id')->get();
            $topicWithoundUser = [];
            foreach ($topic as $key => $tp) {
                if(!isset($topicHasUsersMap[$tp['id']])) {
                    $topicWithoundUser[] = $tp;
                }
            }

            $topicCollection = collect($topicWithoundUser);
            //random de tai
            $topicRandom = $topicCollection->random();
            Phandetai::create([
                'user_id'       => $user['id'],
                'detai_id'      => $topicRandom->id,
                'giangvien_id'  => array_rand($teachersWithoudUserMap)
            ]);
        }

    	toastr()->success('Phân đề tài thành công.');      
    	return redirect()->back();
    }
}
