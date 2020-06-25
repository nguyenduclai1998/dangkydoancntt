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
    	'gioitinh',
        'hocham',
        'lop',
        'ghichu',
        'avatar',
        'user_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function phandetai()
    {
        return $this->belongsTo('App\Models\Admin\Phandetai', 'user_id');
    }
}
