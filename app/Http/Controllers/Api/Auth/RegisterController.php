<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\UserPreference;
use App\UserWallet;
use App\Mail\VerificationMail;
use Mail;
use App\Http\Requests\RegisterUserRequest as Request;

class RegisterController extends ApiController
{

  /**
   * @OA\Post(
   ** path="/api/register",
   *   tags={"Register"},
   *   summary="Register",
   *   operationId="register",
   *
   *  @OA\Parameter(
   *      name="name",
   *      in="query",
   *      required=true,
   *      @OA\Schema(
   *           type="string"
   *      )
   *   ),
   *  @OA\Parameter(
   *      name="username",
   *      in="query",
   *      required=true,
   *      @OA\Schema(
   *           type="string"
   *      )
      *   ),
   *  @OA\Parameter(
   *      name="email",
   *      in="query",
   *      required=true,
   *      @OA\Schema(
   *           type="string"
   *      )
   *   ),
   *   @OA\Parameter(
   *       name="phone",
   *      in="query",
   *      required=true,
   *      @OA\Schema(
   *           type="integer"
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

      $request['id_level'] = 4;
      $request['phone_token'] = rand(100000, 999999);
      $request['email_token'] = Str::random(40);
      $request['password'] = Hash::make($request->password);



      $user = User::create($request->all());
      $userPreference = UserPreference::create([
      'id_user' => $user->id,
      'notifications' => 1 ,
      'notifications_web' => 1,
      'notifications_movil' => 1 ,
      'notifications_email' => 1 ,
      '2fa' => 1
      ]);

      $userWallet = UserWallet::create([
      'id_user' => $user->id,
      'wallet' => 0
      ]);


      Mail::to($user->email)
           ->queue(new VerificationMail($user, 'Este correo es para verificar tu usuario y puedas empezar a usar la plataforma'));
      return $this->successResponse($user, 'Se ha creado el usuario correctamente');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($token)
    {
      $user = User::where('email_token', $token)->first();
      $user->email_verify = 1;
      $user->verified = 1;
      $user->save();

      return $this->successResponse($user, 'Ya tu usuario se ha verificado');
    }



}
