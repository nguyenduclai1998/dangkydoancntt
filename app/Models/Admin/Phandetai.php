<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Phandetai extends Model
{
    protected $table = 'ketquaphandoan';
    protected $fillable = [
    	'id',
    	'user_id',
    	'detai_id',
    	'giangvien_id',
    	'linhvuc_id'
    ];

    public function users()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function giangvienhuongdan()
    {
    	return $this->belongsTo('App\User', 'giangvien_id');
    }

    public function detai()
    {
        return $this->belongsTo('App\Models\Admin\DeTai', 'detai_id');
    }

    public function linhvuc()
    {
    	return $this->belongsTo('App\Models\Admin\LinhVuc', 'linhvuc_id');
    }
}
