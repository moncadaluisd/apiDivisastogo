<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Currency;


class CurrencyController extends ApiController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

   /**
 * @OA\Get(
 *     path="/api/currency",
 *     summary="Mostrar Monedas",
 *     @OA\Response(
 *         response=200,
 *         description="Mostrar todos las monedas."
 *     ),
 *     @OA\Response(
 *         response="default",
 *         description="Ha ocurrido un error."
 *     )
 * )
 */
  public function index()
  {
      //
      $currency = Currency::all();

      return $this->successResponse($currency);

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
      $currency = Currency::findOrFail($id);

      return $this->successResponse($currency);
  }



}
