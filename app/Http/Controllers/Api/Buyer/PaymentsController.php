<?php

namespace App\Http\Controllers\Api\Buyer;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use App\UserPayment;
use App\UserWallet;
use App\Http\Requests\UserPaymentsRequest;
use Illuminate\Http\Request;

class PaymentsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($request)
    {
        //
        switch ($request) {
          case 'rechazados':
            # code...
              $pagos = UserPayment::with(['user'])->where('state', 3)->where('id_user', Auth::id())->paginate(10);
            break;

         case 'confirmados':
           # code...
           $pagos = UserPayment::with(['user'])->where('state', 2)->where('id_user', Auth::id())->paginate(10);
           break;

         case 'sinconfirmar':
           # code...
          $pagos = UserPayment::with(['user'])->where('state', 1)->where('id_user', Auth::id())->paginate(10);;
           break;

          default:
            # code...
            return $this->errorResponse('No existe nada aqui', 404);
            break;

        }
        return $this->successResponse($pagos, 'mensaje');


    }

    public function wallet()
    {
      $user = UserWallet::where('id_user', Auth::id())->firstOrFail();
      return $this->successResponse($user, 'mensaje');

    }

    public function store(UserPaymentsRequest $request)
    {
      //$pago =  UserPayment::create($request->all());
      //return $this->successResponse($pago, 'Se ha subido tu pago, espera que lo confirmen');
      return $request;
    }
}
