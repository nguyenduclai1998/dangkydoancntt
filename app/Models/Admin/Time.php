<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $table = 'time';
    protected $fillable = [
    	'id',
    	'time_start',
    	'time_end'
    ];
}
