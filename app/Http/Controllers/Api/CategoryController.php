<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Category;


class CategoryController extends ApiController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   /**
 * @OA\Get(
 *     path="/api/category",
 *     summary="Mostrar Categorias",
 *     @OA\Response(
 *         response=200,
 *         description="Mostrar todos los category."
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
      $category = Category::all();
      return $this->successResponse($category);
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
        $category = Category::findOrFail($id);

        return $this->successResponse($category);
    }


}
