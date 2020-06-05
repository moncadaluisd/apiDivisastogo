<?php

namespace App\Http\Middleware;

use Closure;
use App\Announcement;
use App\AnnouncementRequest;
use App\Traits\ApiResponser;

class AnnouncementRequestMiddleware
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
      $id = $request->route()->parameter('id');
      $announcementRequest =  AnnouncementRequest::with('announcement.user')->findOrFail($id);

      if ($announcementRequest->state == 3) {
        # code...
        return $this->errorResponse('Esta transaccion esta cancelada', 401);
      }

      if ($announcementRequest->state == 2) {
        # code...
        return $this->errorResponse('Esta transaccion esta terminada', 401);
      }

      if (Auth::id() !== $announcementRequest->id_user_issuer || Auth::id() !== $announcementRequest->announcement->user->id || Auth::id() !== 1 || Auth::id() !== 2) {
        # code...
        return $this->errorResponse('No tienes acceso a esta seccion', 401);
      }

      if ($announcementRequest->stateIssuer == 1 && $announcementRequest->stateRecipient == 1) {
        return $this->errorResponse('Esta transaccion ya esta cerrada', 422);
      }

        return $next($request);
    }
}
