<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ResetPasswordController extends ApiController
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
        $request->validate([
          'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();
        $user->remember_token = Str::random(40);
        $user->save();

        return $this->successResponse('', 'Se ha enviado el correo correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
      $user = User::where('remember_token', $token)->first();
      $user->email_verify = 1;
      $user->verified = 1;
      $user->save();

      return $this->successResponse(1, 'Ya puedes cambiar tu clave');
    }




}
