<?php

namespace App\Http\Controllers\Api\Announcement;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use App\Announcement;
use App\AnnouncementRequest;
use Illuminate\Http\Request;

class RequestController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $announcement = AnnouncementRequest::where([
          ['id_user_issuer', Auth::id()],
        ])->get();
        return $this->successResponse($announcement);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request['id_user_issuer'] = Auth::id();
        $announcement = Announcement::findOrFail($request->id_announcement);
        $request['price'] = $announcement->price;
        $request['min'] = $announcement->min;
        $request['max'] = $announcement->max;
        $announcementRequest = AnnouncementRequest::create($request->all());
        return $this->successResponse($announcementRequest, 'Se ha creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $announcementRequest = AnnouncementRequest::with('announcement.user')->findOrFail($id);
        if (Auth::id() == $announcementRequest->id_user_issuer || Auth::id() == $announcementRequest->announcement->user->id) {
          # code...
          return $this->successResponse($announcementRequest);
        }
        return $this->errorResponse('No tienes acceso a esta seccion', 401);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $announcementRequest =  AnnouncementRequest::with('announcement.user')->findOrFail($id);
        if ($announcementRequest->state == 3) {
          # code...
          return $this->errorResponse('Esta transaccion esta cancelada', 401);
        }

        if ($announcementRequest->state == 2) {
          # code...
          return $this->errorResponse('Esta transaccion esta terminada', 401);
        }



        if (Auth::id() !== $announcementRequest->id_user_issuer || Auth::id() !== $announcementRequest->announcement->user->id) {
          # code...
          return $this->errorResponse('No tienes acceso a esta seccion', 401);
        }
        if ($announcementRequest->stateIssuer == 1 && $announcementRequest->stateRecipient == 1) {
          return $this->errorResponse('Esta transaccion ya esta cerrada', 422);
        }
        if ($announcementRequest->id_user_issuer == Auth::id()) {
          # code...
          $announcementRequest->stateIssuer = 1;
        }

        if ($announcementRequest->announcement->user->id == Auth::id()) {
          # code...
          $announcementRequest->stateRecipient = 1;
        }

        if ($announcementRequest->stateIssuer == 1 && $announcementRequest->stateRecipient == 1) {
          # code...
          $announcementRequest->state = 3;
        }

        $announcementRequest->save();
        return $this->successResponse($announcementRequest, 'Se ha finalizado la transaccion');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cancelRequest(Request $request)
    {
      $announcementRequest =  AnnouncementRequest::with('announcement.user')->findOrFail($id);

      if (Auth::id() !== $announcementRequest->announcement->user->id) {
        # code...
        return $this->errorResponse('No tienes acceso a esta seccion', 401);
      }

      if ($announcementRequest->state == 3) {
        # code...
        return $this->errorResponse('Esta transaccion esta cancelada', 401);
      }

      if ($announcementRequest->state == 2) {
        # code...
        return $this->errorResponse('Esta transaccion esta terminada', 401);
      }

      $announcementRequest->state = 2;
      $announcementRequest->save();
      return $this->successResponse($announcementRequest, 'Se ha cancelado la transaccion');

    }

    public function getRequest($request)
    {
    switch ($request) {
      case 'cancelado':
        # code...
        $announcementRequest =  AnnouncementRequest::where('state', 3)->where('id_user_issuer', Auth::id())->paginate(10);
        break;

     case 'terminado':
       # code...
       $announcementRequest =  AnnouncementRequest::where('state', 2)->where('id_user_issuer', Auth::id())->paginate(10);
       break;

     case 'abierto':
       # code...
      $announcementRequest =  AnnouncementRequest::where('state', 1)->where('id_user_issuer', Auth::id())->paginate(10);
       break;

      default:
        # code...
        return $this->errorResponse('No existe nada aqui', 404);
        break;

    }
    return $this->successResponse($announcementRequest, 'mensaje');
    }
}
