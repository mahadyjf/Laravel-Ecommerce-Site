<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class front_user
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->has('FORNT_USER_LOGIN')!=null){
            
            return redirect('/');
        }else{
            return $next($request);
        }
        
    }
}
