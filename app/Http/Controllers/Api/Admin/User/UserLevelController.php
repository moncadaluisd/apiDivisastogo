<?php

namespace App\Http\Controllers\Api\Admin\User;

use App\Http\Controllers\ApiController;
use App\UserLevel;
use App\Http\Requests\Admin\User\UserLevelRequest;

class UserLevelController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = UserLevel::all();
        return $this->successResponse($category);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserLevelRequest $request)
    {
      $level = UserLevel::create($request->all());

      return $this->successResponse($level, 'Se ha creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $level = UserLevel::findOrFail($id);

      return $this->successResponse($level);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserLevelRequest $request, $id)
    {
        //
        $level = UserLevel::findOrFail($id)
                              ->update($request->all());

        return $this->successResponse($level);

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
        $level = UserLevel::findOrFail($id)
                              ->delete();

        return $this->successResponse($level, 'Se ha eliminado correctamente');
    }
}
