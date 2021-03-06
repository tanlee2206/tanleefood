<?php

namespace App\Http\Middleware;

use Closure;

class UserMiddleware
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
        if(Auth::check()){
            $user = Auth::user();
            // if ($user->group_users['permission']==1) {
                return $next($request);
            // }else {
            //     return redirect()->route('login.admin');
            // }
            
        }else {
            return redirect()->route('login.users');
        }
    }
}
