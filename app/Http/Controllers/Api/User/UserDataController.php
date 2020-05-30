<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\ApiController;
use App\Http\Requests\UserDataRequest as Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\UserData;

class UserDataController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userData = UserData::findOrFail(Auth::id());
        return $this->successResponse($userData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request['id_user'] = Auth::id();
       $userData = UserData::where('id_user', Auth::id())->first();
         if (!$userData) {
          # code...
           $userData = UserData::create($request->all());

            return $this->successResponse($userData, 'Se ha guardado correctamente');
        }

        return $this->errorResponse('Ya tienes esta informacion, no se puede crear una nueva', 401);

      //  return $userData;
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if (Auth::id() !== $id) {
          # code...
        return $this->errorResponse('No tienes autorizacion para ver esto', 401);
        }

          $userData = UserData::where('id_user', Auth::id())->first();
          $userData->update($request->all());
          return $this->successResponse($userData, 'Se ha actualizado correctamente');
    }


}
