<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Plan;

/**
* @OA\Info(title="API Divisastogo", version="1.0")
*
* @OA\Server(url="http://localhost:8000")
*/
class PlanController extends ApiController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

   /**
 * @OA\Get(
 *     path="/api/plan",
 *     summary="Mostrar Plans",
 *     @OA\Response(
 *         response=200,
 *         description="Mostrar todos los plans."
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
