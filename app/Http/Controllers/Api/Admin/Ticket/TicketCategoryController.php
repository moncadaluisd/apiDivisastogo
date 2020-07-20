<?php

namespace App\Http\Controllers\Api\Admin\Ticket;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\TicketCategory;

class TicketCategoryController extends ApiController
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
        $rules = ['name' => 'string|min:5|max:255'];
        $this->validate($rules,$request);
        $category = TicketCategory::create($request->all());

        return $this->successResponse($category, 'Se ha creado correctamente');
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
        $ticket = TicketCategory::with('tickets')->findOrFail($id);
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
        $rules = ['name' => 'string|min:5|max:255'];
        $this->validate($rules,$request);
        $category = TicketCategory::findOrFail($id)->update($request->all());

        return $this->successResponse($category, 'Se ha creado correctamente');
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
        $category = TicketCategory::findOrFail($id);
        $category->delete();

        return $this->successResponse($category, 'Se ha eliminado correctamente');
    }
}
