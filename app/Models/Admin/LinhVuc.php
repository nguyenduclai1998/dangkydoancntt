<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class LinhVuc extends Model
{
    protected $table = 'linhvuc';
    protected $fillable = [
    	'id',
    	'tenlinhvuc',
    	'mota',
    	'slug',
    ];

    protected $hidden = [
    	'id'
    ];
}
