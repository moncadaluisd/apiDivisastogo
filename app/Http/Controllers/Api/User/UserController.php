<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\ApiController;
use App\User;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\RegisterUserRequest as Request;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all();
        return $this->successResponse($user);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $token = $request->header('Autorization');
        if (!$token) {
          return $this->errorResponse('No hay codigo de authorizacion', 400);
        }

        $user = JWTAuth::toUser($token);
        return $this->successResponse($user);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $token = $request->header('Autorization');
        if (!$token) {
          return $this->errorResponse('No hay codigo de authorizacion', 400);
        }

        $user = JWTAuth::toUser($token);
        $user = $user->findOrFai($user->id)->update($request->all());
        return $this->successResponse($user, 'Se ha actualizado correctamente');

    }


}
