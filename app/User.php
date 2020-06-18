<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'masv'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function thongtin()
    {
        return $this->hasOne('App\Models\Admin\ThongTin', 'user_id');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Admin\Role', 'role_id');
    }

    public function nguyenvong()
    {
        return $this->hasMany('App\Models\Admin\NguyenVong', 'user_id');
    }

    public function detai()
    {
        return $this->hasMany('App\Models\Admin\DeTai', 'user_id');
    }

    public function phandetai()
    {
        return $this->hasMany('App\Models\Admin\Phandetai', 'user_id');
    }

    public function giangvienhuongdan()
    {
        return $this->hasMany('App\Models\Admin\Phandetai', 'giangvien_id')
    }
}
