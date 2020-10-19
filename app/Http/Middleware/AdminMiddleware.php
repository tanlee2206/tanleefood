<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class AdminMiddleware
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
            if ($user->permission->permission=='admin') {
                return $next($request);
            }else {
                return redirect()->route('loginAdmin.form');
            }
            
        }else {
            return redirect()->route('loginAdmin.form');
        }
    }
}
