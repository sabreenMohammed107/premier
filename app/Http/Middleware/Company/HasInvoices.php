<?php

namespace App\Http\Middleware\Company;

use Closure;
use Illuminate\Support\Facades\Auth;

class HasInvoices
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
        if(Auth::user()->role_id != 103 && Auth::user()->role_id != 104){
            return redirect("/Company")->with('flash_info', " قسم الفواتير ليس تابع لصلاحياتك");
        }
        return $next($request);
    }
}
