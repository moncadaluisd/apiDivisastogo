<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PlanRequest;
use App\Plan;

class PlanController extends ApiController
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanRequest $request)
    {
        //
        $plan = Plan::create($request->all());
        return $this->successResponse($plan, 'Se ha creado correctamente');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlanRequest $request, $id)
    {
        //
        $plan = Plan::findOrFail($id)
                      ->update($request->all());

        return $this->successResponse($plan, 'Se ha actualizado correctamente');

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
        $plan = Plan::findOrFail($id)
                      ->delete();
        return $this->successResponse($plan, 'Se ha eliminado correctamente');
    }
}
