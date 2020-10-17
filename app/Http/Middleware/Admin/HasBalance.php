<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Auth;

class HasBalance
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
        if(Auth::user()->role_id != 100 && Auth::user()->role_id != 110){
            return redirect("/")->with('flash_info', " قسم الترصيد ليس تابع لصلاحياتك");
        }
        return $next($request);
    }
}
