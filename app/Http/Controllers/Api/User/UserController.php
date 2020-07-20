<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request as UpdateRequest;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\RegisterUserRequest as Request;

/**
 * @OA\SecurityScheme(
 *     type="http",
 *     description="Login with email and password to get the authentication token",
 *     name="Token based Based",
 *     in="header",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="Authorization",
 * )
 */

class UserController extends ApiController
{

  /**
 * @OA\Get(
 *  path="/api/me",
 *  summary="Get the user details",
 *  tags={"user"},
 *  @OA\Response(response=200, description="Return a list of resources"),
 *  security={{ "Authorization": {} }}
 * )
 */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = Auth::id();
        $user = User::with(['wallet', 'data'])->findOrFail($id);
        $admin = ($user->id_level == 1) ? true : false;
        $comprador = ($user->id_level == 3) ? true : false;
        $return = array('user' => $user, 'admin' => $admin, 'comprador' => $comprador);
        return $this->successResponse($return);
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
     * @OA\Put(
     ** path="/api/user/{id}",
     *   tags={"user"},
     *   summary="Put password",
     *  security={{ "Authorization": {} }}
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="oldPassword",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="password",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="password_confirmation",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=201,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request)
    {
        //
        $rules = [
          'oldPassword' => 'required|string',
          'password' => 'required|string|min:8|max:100|confirmed'
        ];
        $this->validate($request,$rules);
        $id = Auth::id();
        $user = User::FindOrFail($id);
        if (!Hash::check($request->oldPassword, $user->password)) {
          # code...
          return $this->errorResponse('Por favor coloca la clave bien', 422);
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return $this->successResponse($user, 'Se ha actualizado correctamente');




    }


}
