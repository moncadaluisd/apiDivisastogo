<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\ApiController;
use App\User;
use App\UserLog;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\LoginUserRequest as Request;


class LoginController extends ApiController
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    $credentials=   $request->only(['email', 'password']);
    $token = null;

    if (!$token = JWTAuth::attempt($credentials)) {
          # code...
      return $this->errorResponse('Error en las credenciales', 400);
    }
    $user = Auth::user();
    $admin = ($user->id_level == 1) ? true : false;
    $comprador = ($user->id_level == 2) ? true : false;
    $data = array('info' => $user, 'token' => $token, 'token_type' => 'Bearer', 'admin' => $admin, 'comprador' => $comprador);

    $userLog = UserLog::create([
      'login_date' => \Carbon\Carbon::now(),
      'id_user' => $user->id,
      'remote_ip' => $request->ip(),
    ]);
    return $this->successResponse($data, 'Te has logueado correctamente');


    }





}
