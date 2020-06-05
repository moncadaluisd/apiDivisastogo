<?php

namespace App\Http\Controllers\Api\Ticket;

use App\Http\Controllers\ApiController;
use App\Ticket;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Ticket\TicketRequest as Request;

class TicketController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ticket = Ticket::paginate(10);
        $this->successResponse($ticket);
    }

    public function store(Request $request)
    {
      $request['id_user'] = Auth::id();
      $ticket = Ticket::create($request->all());

      return $this->successResponse($ticket, 'Tu problema sera respondido lo antes posible');

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
        $ticket = Ticket::with(['message'])->findOrFail($id);
        return $this->successResponse($ticket);
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
        //
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
