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
    	'chuyennganh_id'
    ];

    protected $hidden = [
    	'id',
    	'user_id',
    	'chuyennganh_id'
    ];
}
