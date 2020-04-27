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

    protected $hiden = [
    	'id',
    	'chuyennganh_id',
    	'user_ids'
    ];
}
