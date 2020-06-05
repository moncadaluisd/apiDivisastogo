<?php

namespace App\Http\Controllers\Api\Announcement;

use App\Http\Controllers\ApiController;
use App\AnnouncementRequest;
use App\AnnouncementMessage;
use Illuminate\Http\Request;

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
        $Arequest = AnnouncementRequest::with('message.user', 'user', 'announcement')->findOrFail();
        return $this->successResponse($Arequest);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createMessage(Request $request, $id)
    {

      $request['id_request'] = $id;
      $request['id_user'] = Auth::id();

      $message = AnnouncementMessage::create($request->all());
      return $this->successResponse($message);

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
}
