<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class DeXuatDeTai extends Model
{
    protected $table = 'dexuatdetai';
    protected $fillable = [
    	'id',
    	'tendetai',
    	'mota',
    	'slug',
    	'user_id',
    	'chuyennganh_id',
    	'linhvuc_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function chuyennganh()
    {
        return $this->belongsTo('App\Models\Admin\ChuyenNganh');
    }

    public function linhvuc()
    {
        return $this->belongsTo('App\Models\Admin\LinhVuc');
    }
}
