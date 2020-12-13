<?php

namespace App\Http\Middleware;

use App\Commodity;
use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureLogIn
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

        if(Auth::check() && Auth::user()->identity == 'admin'){
            return $next($request);
        }else{
            return route('shop');
        }
    }
}
