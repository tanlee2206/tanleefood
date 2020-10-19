<?php

namespace App\Http\Middleware;
use Auth;

use Closure;

class ShopMiddleware
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
            if ($user->permission->permission=='shop') {
                return $next($request);
            }else {
                return redirect()->route('loginShop.form');
            }
            
        }else {
            return redirect()->route('loginShop.form');
        };
    }
}
