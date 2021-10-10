<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class BuyerMiddleware
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
        if(!Auth::check()){
            return redirect()->route('home');


        }
        else{
            if((Auth::guard('web')->user()->user_type)=='buyer')
            {
                return $next($request);
            }
            else
            {
                return redirect()->route('home');
            }

        }
    }

}
