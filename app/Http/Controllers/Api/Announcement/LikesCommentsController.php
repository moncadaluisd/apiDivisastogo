<?php

namespace App\Http\Controllers\Api\Announcement;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Review;
use App\Rating;
use App\AnnouncementRequest;
use Illuminate\Support\Facades\Auth;

class LikesCommentsController extends ApiController
{


    public function __construct(){
      $this->middleware('announcementRequest');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        $rules = [
          'message' => 'required',
          'punto' => 'required'
        ];
        $this->validate($request, $rules);
        $announcement = AnnouncementRequest::findOrFail($id);
        if ($announcement->id_user_issuer === Auth::id()) {
          # code...
          $recipient = $announcement->announcement->id_user;
          $announcement->stateIssuer = 1;
        }else{
          $recipient = $announcement->id_user_issuer;
          $announcement->stateRecipient = 1;
        }

        $review = Review::create([
          'message' => $request->message,
          'id_user_issuer' => Auth::id(),
          'id_user_recipient' => $recipient,
        ]);

        $review = Rating::create([
          'id_user_issuer' => Auth::id(),
          'id_user_recipient' => $recipient,
          'value' => $request->punto
        ]);

        if ($announcement->stateIssuer === 1 && $announcement->stateRecipient === 1 ) {
          $announcement->state = 2;
        }
        $announcement->save();

        return $this->successResponse('', 'Se ha calificado correcmente');
    }


}
