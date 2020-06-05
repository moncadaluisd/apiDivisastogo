<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\ApiController;
use App\User;
use App\UserPayments;
use App\Http\Requests\UserPaymentsRequest as Request;

class UserPaymentsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::findOrFail(Auth::id())->with(['payments']);
        return $this->successResponse($user);
    }

    public function store(Request $request)
    {
      $request['id_user'] = Auth::id();
      $pago = UserPayments::create($request->all());
      $this->successResponse($pago, 'Se ha subido el pago. Espera por la verificacion');

    }



}
