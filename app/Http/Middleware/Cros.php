<?php

namespace App\Http\Middleware;

use Closure;

class Cros
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request)->header('Access-Controll-Alllow-Origin','*')
        ->header('Access-Controll-Alllow-Methods','PUT,POST,DELETE,GET')
        ->header('Access-Controll-Alllow-Headers','Accept,Autherization,Content-Type');
    }
}
