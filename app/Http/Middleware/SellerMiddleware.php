<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Session;

class SellerMiddleware
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
        /*dd(Auth::guard('web')->user()->user_type);*/

         if(!Auth::guard('web')->check()){
        return redirect('/seller')->with('error','You are not allowed to Login as Seller');
            

        }
        elseif((Auth::guard('web')->user()->user_type)=='seller')
            {
        return $next($request);
        }
            else
            {
                
                return redirect('/seller')->with('error','You are not allowed to Login as Seller');
            }
    }
}
