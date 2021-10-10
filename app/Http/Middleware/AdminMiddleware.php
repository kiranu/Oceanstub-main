<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Session;

class AdminMiddleware
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
        //  dd(Auth::guard('web')->user()->user_type);

        if(!Auth::guard('web')->check()){
            return redirect('/admin');
            Session::flash('error_message','Please Login');

        }
        elseif((Auth::guard('web')->user()->user_type)=='admin')
            {
                return $next($request);
            }
            else
            {
                Session::flash('error_message','You are not allowed to Login as Admin');
                return redirect('/admin');
            }
    
        }
}
