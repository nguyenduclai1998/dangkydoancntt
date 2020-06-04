<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ChuyenNganh extends Model
{
    protected $table = 'chuyennganh';
    protected $fillable = [
    	'id',
    	'tenchuyennganh',
    	'mota',
    	'slug',
    ];
}
