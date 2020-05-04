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

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
