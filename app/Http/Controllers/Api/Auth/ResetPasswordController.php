<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
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
        if (!$user) {
          # code...
          return $this->errorResponse('No se consigue el usuario'. 401);
        }
        $user->remember_token = Str::random(40);
        $user->save();

        return $this->successResponse('', 'Se ha enviado el correo correctamente');

    }



    public function update(Request $request, $id)
    {
      $rules = [
        'password' => 'required|string|min:8|max:100|confirmed'
      ];
      $this->validate($request,$rules);
      $user = User::where('remember_token', $id)->first();


      if (!$user) {
        # code...
        return $this->errorResponse('No se consigue el usuario o el token ya ha expirado', 401);
      }

      $user->password = Hash::make($request->password);
      $user->remember_token = '';
      $user->save();
      return $this->successResponse($user, 'Se ha actualizado correctamente');
    }




}
