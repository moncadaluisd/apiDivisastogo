<?php

namespace App\Http\Controllers\Api\Ticket;

use App\Http\Controllers\ApiController;
use App\TicketCategory;

class TicketCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = TicketCategory::all();
        return $this->successResponse($category);

    }




}
