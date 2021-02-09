<?php

namespace App\Http\Middleware\Company;

use Closure;
use Illuminate\Support\Facades\Auth;

class HasCash
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
        if(Auth::user()->role_id != 102 && Auth::user()->role_id != 104){
            return redirect("/Company")->with('flash_info', " قسم الخزينة ليس تابع لصلاحياتك");
        }
        return $next($request);
    }
}
