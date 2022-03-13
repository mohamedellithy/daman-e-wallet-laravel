<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
class LanguageDeticated
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
        if(is_null(session('locale'))){
            session(['locale'=> "ar"]);
        }
        App::setLocale(session('locale'));
        define('Dir_Theme',in_array(app()->getLocale(),['en','fr']) ? 'ltr':'rtl');
        return $next($request);
    }
}
