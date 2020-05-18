<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Models\Admin\LinhVuc;
use App\Models\Admin\ChuyenNganh;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $chuyennganh = ChuyenNganh::get();
        $linhvuc     = LinhVuc::get();
        $sinhvien    = User::where('role_id', 3)->get();
        
        View::share('CHUYENNGANHS', $chuyennganh);
        View::share('LINHVUCS', $linhvuc);
        View::share('SINHVIENS', $sinhvien);
    }
}
