<?php
namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class CheckLoginAdmin
{
    /**
     * @param \Illuminate\Http\Request  $request
     * @param \Closure $next
     * @return mixed
     */
    
    public function handle($request, Closure $next)
    {
        if(Auth::check()) {
            return $next($request);
        }

        return redirect()->to('/users-auth/login');
    }
} 
