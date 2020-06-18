<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class DeTai extends Model
{
    protected $table = 'detai';
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
        return $this->belongsTo('App\User', 'user_id');
    }

    public function chuyennganh()
    {
        return $this->belongsTo('App\Models\Admin\ChuyenNganh');
    }

    public function linhvuc()
    {
        return $this->belongsTo('App\Models\Admin\LinhVuc');
    }

    public function dangkydetai()
    {
       return $this->hasOne('App\Models\Admin\NguyenVong'); 
    }
}
