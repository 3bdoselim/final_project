<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //auth()->user()  
        //auth()->guard()->user()
        //Auth::guard()->user()
        // if (Auth::user()->role =="user")
        // {
        //     return redirect()->route("login");  
        // }else{ 
        //     return $next($request);
        // }

        if (Auth::check() && Auth::user()->role == 'super admin') {
            return $next($request);
        }
        Session::flush();
        abort(403);
    }
}
