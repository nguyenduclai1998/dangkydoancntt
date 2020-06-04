<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    protected $table = 'tintuc';
    protected $fillable = [
    	'id',
    	'tenbaiviet',
    	'noidung',
    	'slug',
    	'chuyennganh_id',
    	'user_id'
    ];

    public function chuyennganh()
    {
        return $this->belongsTo('App\Models\Admin\ChuyenNganh');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
