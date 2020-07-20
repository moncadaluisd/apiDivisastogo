<?php

namespace App\Http\Controllers\Api\Announcement;

use App\Http\Controllers\ApiController;
use App\AnnouncementRequest;
use App\AnnouncementMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\AnnouncementMessage as event;

class MessageController extends ApiController
{

    public function __construct()
    {
      $this->middleware('announcementRequest');
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
        $Arequest = AnnouncementRequest::with('message.user', 'user', 'announcement.user', 'announcement.currencyFrom', 'announcement.currencyTo')->findOrFail($id);
        return $this->successResponse($Arequest);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createMessage(Request $request, $idR)
    {

      $id = Auth::id();
      $request['id_user'] = $id;
      $announcement = AnnouncementRequest::findOrFail($idR);

      if ($announcement->state == 2 || $announcement->state == 3 || $announcement->state == 4) {
        # code...
          return $this->errorResponse('No tienes acceso a esta seccion ', 401);
      }

      $message = AnnouncementMessage::create($request->all());

      $messageGet =  AnnouncementMessage::with('user')->where('id', $message->id)->firstOrFail();
      broadcast(new event($messageGet->id_request,$messageGet));
      return $this->successResponse($message, 'El mensaje se ha enviado correctamente');

    }


}
