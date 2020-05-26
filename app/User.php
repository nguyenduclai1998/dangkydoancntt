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
        'name', 'email', 'password', 'role_id'
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
        return $this->hasMany('App\Models\Admin\NguyenVong');
    }

    /**
    // * @param string|array $roles
    */
    // public function authorizeRoles($roles)
    // {
    //     if (is_array($roles)) {
    //         return $this->hasAnyRole($roles) || 
    //                 abort(401, 'Bạn có quyền truy cập trang này.');
    //     }
    //     return $this->hasRole($roles) || 
    //             abort(401, 'Bạn có quyền truy cập trang này.');
    // }
    /**
    * Check multiple roles
    // * @param array $roles
    */
    // public function hasAnyRole($roles)
    // {
    //   return null !== $this->role()->whereIn('rolename', $roles)->first();
    // }
    /**
    * Check one role
    // * @param string $role
    */
    // public function hasRole($role)
    // {
    //   return null !== $this->role()->where('rolename', $role)->first();
    // }
}
