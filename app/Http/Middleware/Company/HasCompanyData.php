<?php

namespace App\Http\Middleware\Company;

use Closure;
use Illuminate\Support\Facades\Auth;

class HasCompanyData
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
        if(Auth::user()->role_id != 103){
            return redirect("/Company")->with('flash_info', "هذا قسم ليس تابع لصلاحياتك");
        }
        return $next($request);
    }
}
