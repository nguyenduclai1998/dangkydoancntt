<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\TinTuc;
use Illuminate\Support\Str;


class TinTucController extends Controller
{
	public function index()
	{
		$tintuc = TinTuc::paginate(10);
		$viewData = [
    		'tintuc' => $tintuc
    	];
		return view('admin.tintuc.index', $viewData);
	}

    public function create()
    {

    }
}
