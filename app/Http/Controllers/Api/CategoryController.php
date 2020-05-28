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
