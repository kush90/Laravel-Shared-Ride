<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class managertwo
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
        if(Auth::check())
        {
            $user=Auth::user();
            if($user->hasRole("rider"))
            {
                return $next($request);
            }
            else
            {
                return redirect(url('/'));
            }

        }
        else
        {
            return redirect(url('user/login'));
        }
       // return $next($request);
    }
}
