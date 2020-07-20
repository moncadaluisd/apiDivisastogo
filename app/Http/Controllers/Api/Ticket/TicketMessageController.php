<?php

namespace App\Http\Controllers\Api\Ticket;

use App\Http\Controllers\ApiController;
use App\Ticket;
use App\TicketMessage;
use App\User;
use App\Http\Requests\Ticket\TicketMessageRequest as Request;

class TicketMessageController extends ApiController
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request['id_user'] = Auth::id();

        $user = User::findOrFail(Auth::id());

        if ($user->level_id === 1 || $user->level_id === 2) {
          # code...
          $request['type'] = 1;
        }else{
          $request['type'] = 2;
        }
        $ticket = Ticket::create($request->all());

        return $this->successResponse($ticket, 'Tu problema sera respondido lo antes posible');
    }


}
