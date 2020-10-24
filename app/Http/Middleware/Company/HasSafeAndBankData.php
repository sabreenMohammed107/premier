<?php

namespace App\Http\Middleware\Company;

use Closure;

class HasSafeAndBankData
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
        if(!\App\Http\Controllers\Company\SettingsController::CheckSafeAndBank()){
            return redirect("/Company")->with('flash_info', " برجاء ادخال بنك و خزينة لتوافر تلك الخدمة");
        }
        return $next($request);
    }
}
