<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class IsStudent
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
        if(Session::get('student_firstname')){
            return $next($request);
        }else{
            return redirect('login')->with('error_msg',"You don't have an access ");
        }
    }
}
