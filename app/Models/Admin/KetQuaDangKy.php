<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class KetQuaDangKy extends Model
{
    protected $table = 'nguyenvong';
    protected $fillable = [
    	'user_id',
    	'detai_id',
    	'detaidexuat_id',
    	'linhvuc_id',
    	'trangthai',
    	'loainguyenvong'
    ];

    public function users()
    {
    	return $this->belongsTo('App\User');
    }

    public function detai()
    {
    	return $this->belongsTo('App\Models\Admin\DeTai');
    }

    public function dexuatdetai()
    {
    	return $this->belongsTo('App\Models\Admin\DeXuatDeTai');
    }

    public function linhvuc()
    {
    	return $this->belongsTo('App\Models\Admin\LinhVuc');
    }
}
