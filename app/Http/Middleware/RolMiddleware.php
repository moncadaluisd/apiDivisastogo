<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Traits\ApiResponser;

class RolMiddleware
{
  use ApiResponser;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $rol)
    {
      if (Auth::user()->id_level == $rol || Auth::user()->id_level == 1 || Auth::user()->id_level == 2) {
        return $next($request);
      }

      return $this->errorResponse('No tienes accesso', 401);
    }
}
