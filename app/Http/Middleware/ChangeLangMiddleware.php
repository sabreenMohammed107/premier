<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use App;
class ChangeLangMiddleware
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
        $lang_param = session()->get('locale');
         
            if (in_array($lang_param, Config::get('app.locales')))
            {
                $lang = $lang_param;
               
            }
    
            else
            {
                $lang = Config::get('app.locale');
            }
  
            App::setLocale($lang);
           
            return $next($request);
        }
    
}
