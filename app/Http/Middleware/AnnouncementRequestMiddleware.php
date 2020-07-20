<?php

namespace App\Http\Middleware;

use Closure;
use App\Announcement;
use App\AnnouncementRequest;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;

class AnnouncementRequestMiddleware
{
  use ApiResponser;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $id = $request->route()->parameter('id');
      $announcementRequest =  AnnouncementRequest::with('announcement.user')->findOrFail($id);



      if (Auth::id() !== $announcementRequest->id_user_issuer && Auth::id() !== $announcementRequest->announcement->user->id ) {
        # code...
        return $this->errorResponse('No tienes acceso a esta seccion ', 401);
      }



        return $next($request);
    }
}
