<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class NguyenVong extends Model
{
    protected $table = 'nguyenvong';
    protected $fillable = [
    	'id',
    	'user_id',
    	'detai_id',
    	'detaidexuat_id',
    	'linhvuc_id',
    	'trangthai',
    	'loainguyenvong'
    ];

    public function users()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function detai()
    {
        return $this->belongsTo('App\Models\Admin\DeTai');
    }

    public function detaidexuat()
    {
    	return $this->belongsTo('App\Models\Admin\DeXuatDeTai');
    }

    public function linhvuc()
    {
    	return $this->belongsTo('App\Models\Admin\LinhVuc');
    }
}
