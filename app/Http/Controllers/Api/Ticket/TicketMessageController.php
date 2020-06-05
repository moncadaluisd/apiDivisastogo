<?php

namespace App\Http\Controllers\Api\Ticket;

use App\Http\Controllers\Controller;
use App\Ticket;
use App\TicketMessage;
use App\Http\Requests\Ticket\TicketMessageRequest as Request;

class TicketMessageController extends Controller
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
        $ticket = Ticket::create($request->all());

        return $this->successResponse($ticket, 'Tu problema sera respondido lo antes posible');
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
