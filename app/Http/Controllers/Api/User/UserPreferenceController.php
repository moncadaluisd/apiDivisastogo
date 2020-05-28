<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\UserPreference as Request;

class UserPreferenceController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


          $userPreference = UserPreference::findOrFail(Auth::id());
          return $this->successResponse($userPreference);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
/*    public function store(Request $request)
    {
    $userPreference = UserPreference::where('id_user', Auth::id())->first();
        if ($userPreference) {
          # code...
          $request['id_user'] = Auth::id();

          $userPreference = UserPreference::create($request->all());

          return $this->successResponse($userPreference, 'Se ha guardado correctamente');
        }

        return $this->errorResponse('No se puede', 401);



    }*/



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

          $userPreference = UserPrefence::where('id_user', Auth::id())->first();
          $userPreference->update($request->all());
          return $this->successResponse($userPreference, 'Se ha actualizado correctamente');
    }


}
