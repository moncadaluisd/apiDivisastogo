<?php

namespace App\Http\Controllers\Api\Announcement;

use App\Http\Controllers\ApiController;
use App\Announcement;
use App\Currency;
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
      $queryFrom = str_replace('-', ' ', $from);
      $queryTo = str_replace('-', ' ', $to);

      $currencyFrom = Currency::where('iso',  $queryFrom )->first();
      $currencyTo = Currency::where('iso',  $queryTo)->first();
      $getQuery = Announcement::with('user', 'category', 'currencyFrom', 'currencyTo')->where([['id_currency_from', '=', $currencyFrom->id],['id_currency_to', '=', $currencyTo->id] ])->paginate(15);
     return $this->successResponse($getQuery);

    }
}
