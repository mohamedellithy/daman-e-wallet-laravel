<?php

namespace App\Http\Middleware;

use Closure;

class MemberAuthenticated
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
        if(auth()->user()){
            if(auth()->user()->role == 0){
                return $next($request);
            }
            return abort(404);
        }

        return redirect()->route('login');
    }
}
