<?php

namespace App\Http\Middleware;

use Closure;

class AdminFlagMiddleware
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
        if ( $request->session()->has('adminFlag') ) {
             return $next($request);
        
        }else{
            
            return redirect('/admin/login');
          
        }
    }
}
