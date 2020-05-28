<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Plan;


class PlanController extends ApiController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      //
      $plan = Plan::all();

      return $this->successResponse($plan);
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
      $plan = Plan::findOrFail($id);
      return $this->successResponse($plan);
  }

}
