<?php

namespace App\Http\Controllers\Api\Announcement;

use App\AnnouncementMessage;
use App\AnnouncementRequest;
use Illuminate\Http\Request;
use App\Events\UserNotification;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;
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

      $fun = $this->image($request->upload, 'chat', $announcement->id);
      $image = $fun['image'];

      $request['upload'] = $image;

      $message = AnnouncementMessage::create($request->all());

      $messageGet =  AnnouncementMessage::with('user', 'request.announcement')->where('id', $message->id)->firstOrFail();
      broadcast(new event($messageGet->request->id,$messageGet));

      if ($id === $messageGet->request->user->id){
          $idMail = $message->request->announcement->id_user;
      }else{
        $idMail = $messageGet->request->user->id;
      }
      
      $data = array(
        'username' => $messageGet->user->username,
        'url' => '/chat/' . $messageGet->id_request,
        'title' => 'Tienes una nueva notificacion del chat ' . $messageGet->id_request,
        'description' => 'el mensaje dice: ' . $messageGet->message,
        'button' => 'Ir al Chat'
      );
      broadcast(new UserNotification($data, $idMail));
      return $this->successResponse($message, 'El mensaje se ha enviado correctamente');

    }




}
