<?php

namespace App\Http\Middleware;

use Closure;

class CustomerMiddleware
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
            if ($user->permission != 3) {
                return $next($request);
            }else {
                Auth::logout();
                return redirect()->route('home');
            }
            
        }else {
            return redirect()->route('home');
        }
    }
}
