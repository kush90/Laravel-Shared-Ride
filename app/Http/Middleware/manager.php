<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Routing\Route;

class manager
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
          if($user->hasRole("driver"))
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


    }
}
