<?php

namespace App\Http\Controllers\Api\Announcement;

use App\Http\Controllers\ApiController;
use App\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $announcement = Announcement::with('user', 'category', 'currencyFrom', 'currencyTo')->paginate(15);
      return $this->successResponse($announcement);
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
        $announcement = Announcement::with('user', 'category', 'currencyFrom', 'currencyTo')->findOrFail($id);
        return $this->successResponse($announcement);
    }




    public function search($from, $to)
    {

    }
}
