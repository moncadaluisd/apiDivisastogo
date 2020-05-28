<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\UserPreference;
use App\Http\Requests\RegisterUserRequest as Request;

class RegisterController extends ApiController
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

      $request['id_level'] = 4;
      $request['phone_token'] = rand(100000, 999999);
      $request['email_token'] = Str::random(40);
      $request['last_login'] = \Carbon\Carbon::now();
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
      return $this->successResponse($user, 'Se ha creado el usuario correctamente');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
      $user = User::where('email_token', $token)->first();
      $user->email_verify = 1;
      $user->verified = 1;
      $user->save();

      return $this->successResponse($user, 'Ya tu usuario se ha verificado');
    }



}
