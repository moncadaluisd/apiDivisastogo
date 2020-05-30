<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CurrencyRequest;
use App\Currency;

class CurrencyController extends ApiController
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrencyRequest $request)
    {
        //
        $currency = Currency::create($request->all());

        return $this->successResponse($currency, 'Se ha creado Correctamente');

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CurrencyRequest $request, $id)
    {
        //
        $currency = Currency::findOrFail($id);
        return $this->successResponse($currency, 'Se ha actualizado Correctamente');

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
        $currency = Currency::findOrFail($id)
                              ->delete();
        return $this->successResponse($currency, 'Se ha eliminado Correctamente');
    }
}
