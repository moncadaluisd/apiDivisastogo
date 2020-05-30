<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryRequest;
use App\Category;

class CategoryController extends ApiController
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
        $category = Category::create($request->all());

        return $this->successResponse($category, 'Se ha creado Correctamente');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        //
        $category = Category::findOrFail($id)
                              ->update($request->all());

        return $this->successResponse($category);
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
        $category = Category::findOrFail($id)
                              ->delete();

        return $this->successResponse($category, 'Se ha eliminado correctamente');
    }
}
