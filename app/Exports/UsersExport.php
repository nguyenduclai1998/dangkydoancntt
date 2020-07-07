<?php
namespace App\Exports;

use App\Models\Admin\Phandetai;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class UsersExport implements FromView, WithHeadings, ShouldAutoSize
{
    public function view(): View
    {
    	$ketquaphandoan = Phandetai::with('users', 'giangvienhuongdan', 'detai')->get();

    	$viewData = [
            'ketquaphandoan' => $ketquaphandoan
        ];
       	return view('admin.phandetai.exportexcel', $viewData);
    }

    public function headings():array 
    {
    	return [
            
    	];
    }

    public function registerEvents():array 
    {
    	return [
    		AfterSheet::class =>  function( AfterSheet $event) {

    	}];
    }
}