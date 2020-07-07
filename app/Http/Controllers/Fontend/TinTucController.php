<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\TinTuc;

class TinTucController extends Controller
{
    public function getNews()
    {	
    	$tintuc = TinTuc::paginate(10);
        $newNews = TinTuc::orderBy('created_at', 'ASC')->paginate(5);

    	$viewData = [
    		'tintuc' => $tintuc,
            'newNews' => $newNews
    	];
    	return view('font-end.tintuc.index', $viewData);
    }

    public function viewNews(Request $request)
    {
    	$tintuc_id = $request->id;
    	$tintuc = TinTuc::where('tintuc.id', $tintuc_id)->first();
        $newNews = TinTuc::orderBy('created_at', 'ASC')->paginate(5);

    	$viewData = [
    		'tintuc' => $tintuc,
            'newNews' => $newNews
    	];
    	return view('font-end.tintuc.view', $viewData);
    }
}
