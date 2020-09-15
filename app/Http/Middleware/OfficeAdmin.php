<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class OfficeAdmin
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
        if(Auth::user()->role_id != 100 && Auth::user()->role_id != 101){
            return redirect("/Company")->with('flash_info', "هذه الصفحات ليست تابعة لصلاحياتك");
        }
        return $next($request);
    }
}
