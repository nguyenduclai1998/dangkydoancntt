<?php
namespace App\Exports;

use App\Models\Admin\Phandetai;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    public function view(): View
    {
    	$ketquaphandoan = Phandetai::with('users', 'giangvienhuongdan', 'detai')->get();

    	$viewData = [
            'ketquaphandoan' => $ketquaphandoan
        ];
       	return view('admin.phandetai.exportexcel', $viewData);
    }
}