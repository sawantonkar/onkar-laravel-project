<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class IsAdmin
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
        if(Session::get('admin')){
            return $next($request);
        }else{
            return redirect('login')->with('error_msg',"You don't have an access ");
        }
        
    }
}
