<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ThongTin extends Model
{
    protected $table = 'thongtin';
    protected $fillable = [
    	'id',
    	'ngaysinh',
    	'sdt',
    	'masv',
    	'gioitinh',
        'avatar',
        'user_id'
    ];

    protected $hidden = [
    	'id',
    	'user_id'
    ];
}
