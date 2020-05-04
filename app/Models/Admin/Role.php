<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $fillable = [
    	'id',
    	'rolename'
    ];
}
