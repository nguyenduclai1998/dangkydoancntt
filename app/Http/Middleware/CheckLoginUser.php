<?php
namespace App\Http\Middleware;

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
        if(get_data_user('web')) {
            return $next($request);
        }

        return redirect()->to('/');
    }
} 
