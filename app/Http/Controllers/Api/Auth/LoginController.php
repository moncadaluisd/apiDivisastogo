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
  * @OA\Post(
  ** path="/api/login",
  *   tags={"Login"},
  *   summary="Login",
  *   operationId="login",
  *
  *   @OA\Parameter(
  *      name="email",
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
  *          type="string"
  *      )
  *   ),
  *   @OA\Response(
  *      response=200,
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

    if (empty(auth()->user()->email_verified_at))
 {
     return response()->json(['error' => 'No has verificado el correo.'], 401);
 }
    $userLog = UserLog::create([
      'login_date' => \Carbon\Carbon::now(),
      'id_user' => $user->id,
      'remote_ip' => $request->ip(),
    ]);
    return $this->successResponse($data, 'Te has logueado correctamente');


    }





}
