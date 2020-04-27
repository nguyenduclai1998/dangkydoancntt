<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

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
        $chuyennganh = DB::table('chuyennganh')->select('chuyennganh.id', 'tenchuyennganh')->get();

        View::share('CHUYENNGANHS', $chuyennganh);
    }
}
